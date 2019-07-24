<?php
namespace App\Learning;

use App\Model\Entity\Attempt;

class TranscriptItem
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var \Cake\I18n\Time|\Cake\I18n\FrozenTime
     */
    protected $started_at;

    /**
     * @var \Cake\I18n\Time|\Cake\I18n\FrozenTime
     */
    protected $completed_at;

    /**
     * @var bool[]
     */
    protected $answers = [];

    /**
     * @var int
     */
    protected $correct;

    public function __construct (Attempt $attempt)
    {
        $this->title = LearningPath::getStep($attempt->step_id)->getTitle();

        $this->started_at = $attempt->started_at;
        $this->completed_at = $attempt->completed_at;

        $correct = 0;

        foreach ($attempt->answers as $answer) {
            if ($answer->correct) {
                $correct++;
            }

            $this->answers[] = $answer->correct;
        }

        $this->correct = $correct;
    }

    /**
     * @return string
     */
    public function getTitle (): string
    {
        return $this->title;
    }

    /**
     * @return \Cake\I18n\FrozenTime|\Cake\I18n\Time
     */
    public function getStartedAt ()
    {
        return $this->started_at;
    }

    /**
     * @return \Cake\I18n\FrozenTime|\Cake\I18n\Time
     */
    public function getCompletedAt ()
    {
        return $this->completed_at;
    }

    /**
     * @return \bool[]
     */
    public function getAnswers (): array
    {
        return $this->answers;
    }

    /**
     * @return int
     */
    public function getCorrect (): int
    {
        return $this->correct;
    }
}