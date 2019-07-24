<?php
namespace App\Learning\Test;

use App\Learning\Question\ContainsQuestionsInterface;
use Cake\Routing\Router;

abstract class AbstractTest implements ContainsQuestionsInterface
{
    abstract public function getBadgeCompleted (): string;

    abstract public function getBadgeNotCompleted (): string;

    abstract public function getTierTitle (): string;

    public function getTierId (): string
    {
        return explode('-', $this->getId())[0];
    }

    public function getUrl (bool $full = false): string
    {
        return Router::url(
            [
                'controller' => 'Learning',
                'action' => 'test',
                'id' => $this->getId()
            ],
            $full
        );
    }

    /**
     * @return \App\Learning\Question\AbstractQuestion[]
     */
    public function getQuestions (): array
    {
        return [];
    }
}