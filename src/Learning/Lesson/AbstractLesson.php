<?php
namespace App\Learning\Lesson;

use App\Learning\StepInterface;
use Cake\Routing\Router;

abstract class AbstractLesson implements StepInterface
{
    public function getUrl (bool $full = false): string
    {
        return Router::url(
            [
                'controller' => 'Learning',
                'action' => 'lesson',
                'id' => $this->getId()
            ],
            $full
        );
    }
}