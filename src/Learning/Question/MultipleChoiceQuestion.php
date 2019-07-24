<?php
namespace App\Learning\Question;

class MultipleChoiceQuestion extends AbstractQuestion
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $question;

    /**
     * @var int
     */
    protected $correct;

    /**
     * @var string[]
     */
    protected $answers;

    /**
     * @var array
     */
    protected $hints;

    /**
     * SimpleQuestion constructor.
     *
     * @param string   $id
     * @param string   $question
     * @param int      $correct
     * @param string[] $answers
     * @param array    $hints
     */
    public function __construct (string $id, string $question, int $correct, array $answers, array $hints = [])
    {
        $this->id = $id;
        $this->question = $question;
        $this->correct = $correct;
        $this->answers = $answers;
        $this->hints = $hints;
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
    public function getQuestion (): string
    {
        return $this->question;
    }

    /**
     * @return int
     */
    public function getCorrect (): int
    {
        return $this->correct;
    }

    /**
     * @return string[]
     */
    public function getAnswers (): array
    {
        return $this->answers;
    }

    public function getHints (): array
    {
        return $this->hints;
    }

    public function getElement (): string
    {
        return 'multiple_choice';
    }

    public function isCorrect (array $data): bool
    {
        $answer = (int) $data['answer'];

        return $answer === $this->correct;
    }

    public function getMaxTries (): int
    {
        return 2;
    }
}