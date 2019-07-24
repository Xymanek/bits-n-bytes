<?php
namespace App\Learning\Lesson;

class SimpleLesson extends AbstractLesson
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    public function __construct (string $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getId (): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle (): string
    {
        return $this->title;
    }

}