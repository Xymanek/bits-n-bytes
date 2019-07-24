<?php
namespace App\Controller;

use App\Learning\LearningPath;
use App\Learning\LearningUI;
use App\Learning\Test\AbstractTest;
use App\Learning\TranscriptItem;
use App\Model\Entity\Attempt;
use Cake\I18n\Time;

/**
 * Class PersonalController
 *
 * @property \App\Model\Table\CommentsTable              $Comments
 * @property \App\Model\Table\AttemptsTable              $Attempts
 * @property \App\Model\Table\BadgesTable                $Badges
 *
 * @property \App\Controller\Component\LearningComponent $Learning
 */
class PersonalController extends AppController
{
    public function init ()
    {
        $this->loadModel('Comments');
        $this->loadModel('Attempts');
        $this->loadModel('Badges');

        $this->loadComponent('Learning');
    }

    public function progress ()
    {
        $current = $this->Learning->getCurrentId();
        $path = LearningUI::buildNestedList($current, $current);
        $badges = $this->Learning->getBadges();

        $this->set(compact('path', 'badges'));
    }

    public function transcript ()
    {
        $user_id = $this->Auth->user('id');

        $tests = [];
        foreach (LearningPath::getSteps() as $step) {
            if ($step instanceof AbstractTest) {
                $tests[] = $step->getId();
            }
        }

        $attempts = $this->Attempts->find()
            ->where([
                'user_id' => $user_id,
                'step_id IN' => $tests,
                'completed_at IS NOT NULL'
            ])
            ->contain('Answers')
            ->orderDesc('completed_at')
            ->map(function (Attempt $attempt) {
                return new TranscriptItem($attempt);
            })
            ->toArray();

        $this->set(compact('attempts'));
    }

    public function discussion ()
    {
        $newComment = $this->Comments->newEntity();

        if ($this->request->is('post')) {
            $newComment = $this->Comments->patchEntity($newComment, $this->request->getData());

            $newComment->user_id = $this->Auth->user('id');
            $newComment->created = new Time();

            if ($this->Comments->save($newComment)) {
                $this->Flash->success('Your comment was successfully added');
                return $this->redirect([]);
            } else {
                $this->Flash->error('Failed to add your comment');
            }
        }

        $comments = $this->Comments->find()
            ->orderDesc($this->Comments->aliasField('created'))
            ->contain(['Users'])
            ->toArray();

        $this->set(compact('comments', 'newComment'));
    }
}