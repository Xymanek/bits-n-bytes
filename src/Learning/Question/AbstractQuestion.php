<?php
namespace App\Learning\Question;

abstract class AbstractQuestion
{
    /**
     * @var int
     */
    protected $tries;

    abstract public function getId (): string;

    abstract public function getQuestion (): string;

    abstract public function getHints (): array;

    abstract public function getElement (): string;

    abstract public function isCorrect (array $data): bool;

    public function getMaxTries (): int
    {
        return 1;
    }

    /**
     * @return int
     */
    public function getTries (): int
    {
        return $this->tries;
    }

    /**
     * @param int $tries
     */
    public function setTries (int $tries)
    {
        $this->tries = $tries;
    }

    public function __debugInfo (): array
    {
        return get_object_vars($this);
    }
}