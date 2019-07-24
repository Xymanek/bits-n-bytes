<?php
namespace App\Learning\Question;

class MatchOptionsQuestion extends AbstractQuestion
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
     * @var array
     */
    protected $left;

    /**
     * @var array
     */
    protected $right;

    /**
     * @var array
     */
    protected $hints;

    /**
     * SimpleQuestion constructor.
     *
     * @param string $id
     * @param string $question
     * @param array  $left
     * @param array  $right
     * @param array  $hints
     */
    public function __construct (string $id, string $question, array $left, array $right, array $hints = [])
    {
        foreach ($left as $key => $value) {
            if (!isset($right[$key])) {
                throw new \InvalidArgumentException('"' . $value . '" matches to nothing');
            }
        }

        $this->id = $id;
        $this->question = $question;
        $this->left = $left;
        $this->right = $right;
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
     * @return array
     */
    public function getLeft (): array
    {
        return $this->left;
    }

    /**
     * @return array
     */
    public function getRight (): array
    {
        return $this->right;
    }

    public function getHints (): array
    {
        return $this->hints;
    }

    public function getElement (): string
    {
        return 'match_options';
    }

    public function isCorrect (array $data): bool
    {
        $correct = array_keys($this->left);
        $answers = $data['answers'];

        for ($i = 0; $i < count($answers); $i++) {
            $answers[$i] = ((int) $answers[$i]) - 1;
        }

        return $answers === $correct;
    }

    public function getMaxTries (): int
    {
        return 2;
    }
}