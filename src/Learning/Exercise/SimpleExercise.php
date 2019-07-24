<?php
namespace App\Learning\Exercise;

class SimpleExercise extends AbstractExercise
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var \App\Learning\Question\AbstractQuestion[]
     */
    protected $questions;

    /**
     * SimpleExercise constructor.
     *
     * @param string                                    $id
     * @param string                                    $title
     * @param \App\Learning\Question\AbstractQuestion[] $questions
     */
    public function __construct (string $id, string $title, array $questions)
    {
        $this->id = $id;
        $this->title = $title;
        $this->questions = $questions;

        parent::__construct();
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

    /**
     * @return \App\Learning\Question\AbstractQuestion[]
     */
    public function getQuestions (): array
    {
        return $this->questions;
    }
}