<?php
namespace App\Controller;

use App\Learning\Exercise\AbstractExercise;
use App\Learning\LearningPath;
use App\Learning\Lesson\AbstractLesson;
use App\Learning\Test\AbstractTest;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Class LearningController
 *
 * @property \App\Model\Table\ProgressTable              $Progress
 * @property \App\Controller\Component\LearningComponent $Learning
 * @property \App\Controller\Component\AttemptsComponent $Attempts
 */
class LearningController extends AppController
{
    public function init ()
    {
        $this->loadModel('Progress');

        $this->loadComponent('Learning');
        $this->loadComponent('Attempts');
    }

    public function beforeRender (Event $event)
    {
        $this->viewBuilder()->setLayout('learn');
    }

    public function lesson (string $id)
    {
        // Checks
        try {
            $lesson = LearningPath::getStep($id);
        } catch (\LogicException $e) {
            throw new NotFoundException();
        }

        if (!$lesson instanceof AbstractLesson) {
            throw new NotFoundException();
        }

        if (!$this->Learning->canAccess($lesson)) {
            $current = LearningPath::getStep($this->Learning->getCurrentId());

            return $this->redirect($current->getUrl());
        }

        // Completed?
        if ($this->request->is('post')) {
            $this->Learning->markCompleted($lesson);

            $next = $this->Learning->getNext($lesson);
            return $this->redirect($next->getUrl());
        }

        $this->set([
            'selected_id' => $lesson->getId(),
            'current_id' => $this->Learning->getCurrentId()
        ]);
    }

    public function exercise (string $id)
    {
        // Checks
        try {
            $exercise = LearningPath::getStep($id);
        } catch (\LogicException $e) {
            throw new NotFoundException();
        }

        if (!$exercise instanceof AbstractExercise) {
            throw new NotFoundException();
        }

        if (!$this->Learning->canAccess($exercise)) {
            $current = LearningPath::getStep($this->Learning->getCurrentId());

            return $this->redirect($current->getUrl());
        }

        $question = $this->Attempts->getCurrentQuestion($exercise);

        if ($question === null) {
            $this->Progress->getConnection()->transactional(function () use ($exercise) {
                $this->Attempts->markCompleted($exercise);
                $this->Learning->markCompleted($exercise);
            });

            $next = $this->Learning->getNext($exercise);
            return $this->redirect($next->getUrl());
        }

        $result = null;
        $retry = null;

        if ($this->request->is('post')) {
            $result = $question->isCorrect($this->request->getData());

            if ($result) {
                $this->Attempts->recordAnswer($exercise, $question, true);
                $retry = false;
            } else {
                $retry = $this->Attempts->recordFailedTry($exercise, $question);

                if (!$retry) {
                    $this->Attempts->recordAnswer($exercise, $question, false);
                }
            }
        }

        $hints = [];
        if ($retry) {
            $hints = $question->getHints();
        }

        $this->set([
            'selected_id' => $id,
            'current_id' => $this->Learning->getCurrentId(),
            'progress' => $this->Attempts->getAttemptProgress($exercise),
            'question' => $question,
            'result' => $result,
            'hints' => $hints,
            'retry' => $retry,
        ]);
    }

    public function test (string $id)
    {
        // Checks
        try {
            $test = LearningPath::getStep($id);
        } catch (\LogicException $e) {
            throw new NotFoundException();
        }

        if (!$test instanceof AbstractTest) {
            throw new NotFoundException();
        }

        if (!$this->Learning->canAccess($test)) {
            $current = LearningPath::getStep($this->Learning->getCurrentId());

            return $this->redirect($current->getUrl());
        }

        $question = $this->Attempts->getCurrentQuestion($test);

        $this->set([
            'selected_id' => $id,
            'current_id' => $this->Learning->getCurrentId(),
        ]);

        if ($question === null) {
            // Finished test
            $progress = $this->Attempts->getAttemptProgress($test);
            $correct = 0;

            foreach ($progress as $item) {
                if ($item === true) {
                    $correct ++;
                }
            }

            $failed = ($correct / count($progress)) < 0.5;
            $badgeGranted = !$failed && !in_array($test->getId(), $this->Learning->getCompletedTests(), true);

            if ($this->request->is('post')) {
                $this->Progress->getConnection()->transactional(function () use ($test, $badgeGranted) {
                    $this->Attempts->markCompleted($test);

                    if ($badgeGranted) {
                        $this->Learning->grantBadge($test);
                    }

                    $this->Learning->markCompleted($test);
                });

                $next = $this->Learning->getNext($test);

                if ($next === null) {
                    return $this->redirect(['controller' => 'Personal', 'action' => 'progress']);
                }

                return $this->redirect($next->getUrl());
            }

            $result = [];
            foreach ($test->getQuestions() as $question) {
                $result[$question->getQuestion()] = $progress[$question->getId()];
            }

            $this->set([
                'test' => $test,
                'failed' => $failed,
                'result' => $result,
                'badgeGranted' => $badgeGranted
            ]);

            $this->render('test_result');
        } else {
            $result = null;

            if ($this->request->is('post')) {
                $result = $question->isCorrect($this->request->getData());

                if (!$result) {
                    $this->Attempts->recordFailedTry($test, $question);
                }

                $this->Attempts->recordAnswer($test, $question, $result);
                return $this->redirect([]);
            }

            $this->set([
                'progress' => $this->Attempts->getAttemptProgress($test),
                'question' => $question,
                'result' => $result,
            ]);
        }
    }
}