<?php
namespace App\Learning\Exercise;

use App\Learning\Question\ContainsQuestionsInterface;
use Cake\Routing\Router;

abstract class AbstractExercise implements ContainsQuestionsInterface
{
    public function __construct ()
    {
        $ids = [];
        foreach ($this->getQuestions() as $question) {
            $ids[] = $question->getId();
        }

        if (count($ids) !== count(array_unique($ids))) {
            throw new \InvalidArgumentException('Found questions with duplicate IDs');
        }
    }

    public function getUrl (bool $full = false): string
    {
        return Router::url(
            [
                'controller' => 'Learning',
                'action' => 'exercise',
                'id' => $this->getId()
            ],
            $full
        );
    }
}