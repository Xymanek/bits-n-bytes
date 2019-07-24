<?php
namespace App\Controller\Component;

use App\Learning\LearningPath;
use App\Learning\StepInterface;
use App\Learning\Test\AbstractTest;
use App\Model\Entity\Badge;
use App\Model\Entity\Progress;
use Cake\Controller\Component;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Learning component
 *
 * @property \Cake\Controller\Component\AuthComponent $Auth
 */
class LearningComponent extends Component
{
    /**
     * Other Components this component uses.
     *
     * @var array
     */
    public $components = ['Auth'];

    /**
     * @var \App\Model\Table\ProgressTable
     */
    protected $Progress;

    /**
     * @var \App\Model\Table\BadgesTable
     */
    protected $Badges;

    public function initialize (array $config)
    {
        $this->Progress = TableRegistry::get('Progress');
        $this->Badges = TableRegistry::get('Badges');
    }

    public function getCurrentId ()
    {
        $user_id = $this->getUserId();

        // Get list of completed steps
        $progress = $this->Progress
            ->find('all', ['fields' => ['step_id']])
            ->where(['user_id' => $user_id])
            ->all()
            ->map(function (Progress $entity) {
                return $entity->step_id;
            });

        // Loop over path until we find uncompleted step
        foreach (array_keys(LearningPath::getSteps()) as $step_id) {
            if (!$progress->contains($step_id)) {
                return $step_id;
            }
        }

        // Everything is completed, no current step
        return null;
    }

    public function canAccess (StepInterface $step): bool
    {
        $current = $this->getCurrentId();

        if ($current === null || $step->getId() === $current) {
            return true;
        }

        $steps = array_keys(LearningPath::getSteps());

        $targetIndex = array_search($step->getId(), $steps, true);
        $currentIndex = array_search($current, $steps, true);

        return $targetIndex < $currentIndex;
    }

    public function markCompleted (StepInterface $step)
    {
        $user_id = $this->getUserId();

        $completed = $this->Progress->exists([
            'user_id' => $user_id,
            'step_id' => $step->getId()
        ]);

        if ($completed) {
            return;
        }

        $entity = new Progress();
        $entity->user_id = $user_id;
        $entity->step_id = $step->getId();
        $entity->completed_at = new Time();

        $this->Progress->saveOrFail($entity);
    }

    /**
     * @param \App\Learning\StepInterface $current
     * @return \App\Learning\StepInterface|null
     */
    public function getNext (StepInterface $current)
    {
        $steps = array_values(LearningPath::getSteps());
        $currentIndex = array_search($current, $steps, true);

        if ($currentIndex === false) {
            throw new \LogicException('Unregistered step');
        }

        if ($currentIndex + 1 === count($steps)) {
            return null; // Last step
        }

        return $steps[$currentIndex + 1];
    }

    public function getCompletedTests (): array
    {
        return $this->Badges->find()
            ->where(['user_id' => $this->getUserId()])
            ->map(function (Badge $badge) {
                return $badge->step_id;
            })
            ->toArray();
    }

    public function getBadges (): array
    {
        $completed_tests = $this->getCompletedTests();

        $badges = [];
        foreach (LearningPath::getSteps() as $step) {
            if ($step instanceof AbstractTest) {
                $completed = in_array($step->getId(), $completed_tests, true);
                $badges[] = $completed ? $step->getBadgeCompleted() : $step->getBadgeNotCompleted();
            }
        }

        return $badges;
    }

    public function grantBadge (AbstractTest $test)
    {
        $badge = $this->Badges->newEntity();

        $badge->step_id = $test->getId();
        $badge->user_id = $this->getUserId();
        $badge->unlocked_at = new Time();

        $this->Badges->saveOrFail($badge);
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
