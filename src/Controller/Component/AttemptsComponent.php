<?php
namespace App\Controller\Component;

use App\Learning\Question\AbstractQuestion;
use App\Learning\Question\ContainsQuestionsInterface;
use App\Learning\Test\AbstractTest;
use App\Model\Entity\Answer;
use App\Model\Entity\Attempt;
use Cake\Controller\Component;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Questions component
 *
 * @property \Cake\Controller\Component\AuthComponent $Auth
 */
class AttemptsComponent extends Component
{
    /**
     * Other Components this component uses.
     *
     * @var array
     */
    public $components = ['Auth'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'session_key' => 'attempts.'
    ];

    /**
     * @var \App\Model\Table\AttemptsTable
     */
    protected $Attempts;

    /**
     * @var \Cake\Network\Session
     */
    protected $session;

    /**
     * @var \App\Model\Table\BadgesTable
     */
    protected $Badges;

    public function initialize (array $config)
    {
        $this->session = $this->_registry->getController()->request->session();

        $this->Attempts = TableRegistry::get('Attempts');
        $this->Badges = TableRegistry::get('Badges');
    }

    public function hasCurrent (ContainsQuestionsInterface $step): bool
    {
        return $this->session->check($this->getSessionKey($step->getId()));
    }

    public function start (ContainsQuestionsInterface $step): Attempt
    {
        if ($this->hasCurrent($step)) {
            throw new \LogicException('Cannot start an attempt when one already exists');
        }

        $user_id = $this->getUserId();

        $attempt = $this->Attempts->newEntity();
        $attempt->user_id = $user_id;
        $attempt->step_id = $step->getId();
        $attempt->started_at = new Time();
        $attempt->answers = [];

        $this->Attempts->saveOrFail($attempt);

        $this->session->write($this->getSessionKey($step->getId()), [
            'attempt_id' => $attempt->id,
        ]);

        return $attempt;
    }

    public function getCurrentAttempt (ContainsQuestionsInterface $step): Attempt
    {
        if (!$this->hasCurrent($step)) {
            throw new \LogicException('No current attempt for this step');
        }

        return $this->Attempts->get(
            $this->session->read($this->getSessionKey($step->getId() . '.attempt_id')),
            ['contain' => ['Answers']]
        );
    }

    public function markCompleted (ContainsQuestionsInterface $step)
    {
        $attempt = $this->getCurrentAttempt($step);
        $attempt->completed_at = new Time();

        $this->Attempts->saveOrFail($attempt);
        $this->session->delete($this->getSessionKey($step->getId()));
    }

    public function getCurrentQuestion (ContainsQuestionsInterface $step)
    {
        if (!$this->hasCurrent($step)) {
            $attempt = $this->start($step);
        } else {
            $attempt = $this->getCurrentAttempt($step);
        }

        $completed = array_map(
            function (Answer $answer) {
                return $answer->question_id;
            },
            $attempt->answers
        );

        foreach ($step->getQuestions() as $question) {
            if (!in_array($question->getId(), $completed, true)) {
                $tries = $this->session->read($this->getSessionKey($step->getId() . '.' . $question->getId()));
                if ($tries === null) {
                    $tries = 0;
                }

                $question->setTries($tries);

                return $question;
            }
        }

        return null;
    }

    public function getAttemptProgress (ContainsQuestionsInterface $step): array
    {
        $progress = [];

        foreach ($step->getQuestions() as $question) {
            $progress[$question->getId()] = null;
        }

        foreach ($this->getCurrentAttempt($step)->answers as $answer) {
            $progress[$answer->question_id] = $answer->correct;
        }

        return $progress;
    }

    /**
     * Returns whether the user can retry
     *
     * @param \App\Learning\Question\ContainsQuestionsInterface $step
     * @param \App\Learning\Question\AbstractQuestion           $question
     * @return bool
     */
    public function recordFailedTry (ContainsQuestionsInterface $step, AbstractQuestion $question): bool
    {
        $question->setTries($question->getTries() + 1);

        if ($question->getTries() === $question->getMaxTries()) {
            return false;
        }

        $this->session->write(
            $this->getSessionKey($step->getId() . '.' . $question->getId()),
            $question->getTries()
        );

        return true;
    }

    public function recordAnswer (ContainsQuestionsInterface $step, AbstractQuestion $question, bool $correct)
    {
        $attempt = $this->getCurrentAttempt($step);

        /** @var \App\Model\Entity\Answer $answer */
        $answer = $this->Attempts->Answers->newEntity();

        $answer->attempt = $attempt;
        $answer->question_id = $question->getId();
        $answer->completed_at = new Time();
        $answer->correct = $correct;

        $this->Attempts->Answers->saveOrFail($answer);
    }

    protected function getSessionKey (string $key): string
    {
        return $this->_config['session_key'] . $key;
    }

    protected function getUserId (): string
    {
        $user_id = $this->Auth->user('id');

        if ($user_id === null) {
            throw new \LogicException('User must be logged in');
        }

        return $user_id;
    }
}
