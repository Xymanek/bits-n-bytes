<?php
namespace App\Learning\Question;

class TrueFalseQuestion extends MultipleChoiceQuestion
{
    public function __construct (string $id, string $question, bool $answer)
    {
        parent::__construct(
            $id,
            $question,
            $answer ? 0 : 1,
            ['True', 'False'],
            []
        );
    }

    public function getMaxTries (): int
    {
        return 1;
    }
}