<?php
namespace App\Learning\Question;

use App\Learning\StepInterface;

interface ContainsQuestionsInterface extends StepInterface
{
    /**
     * @return \App\Learning\Question\AbstractQuestion[]
     */
    public function getQuestions (): array;
}