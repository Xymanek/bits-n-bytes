<?php
namespace App\Learning;

use App\Learning\Test\AbstractTest;

class LearningUI
{
    const STATUS_COMPLETED = 'completed';
    const STATUS_CURRENT = 'current';
    const STATUS_LOCKED = 'locked';

    public static function buildNestedList (string $selected = null, string $current = null): array
    {
        $result = [];
        $stepsInTier = [];
        $foundCurrent = false;
        $tierIsSelected = false;
        $tierStatus = self::STATUS_LOCKED;

        foreach (LearningPath::getSteps() as $step) {
            // Check for current
            if ($step->getId() === $current) {
                $tierStatus = self::STATUS_CURRENT;
                $stepStatus = self::STATUS_CURRENT;
                $foundCurrent = true;
            } elseif ($foundCurrent) {
                $stepStatus = self::STATUS_LOCKED;
            } else {
                $stepStatus = self::STATUS_COMPLETED;
            }

            // Check for selection
            $stepSelected = $step->getId() === $selected;
            if ($stepSelected) {
                $tierIsSelected = true;
            }

            $stepsInTier[] = [
                'title' => $step->getTitle(),
                'url' => $step->getUrl(),
                'selected' => $stepSelected,
                'status' => $stepStatus
            ];

            if ($step instanceof AbstractTest) {
                if ($stepStatus === self::STATUS_COMPLETED) {
                    $tierStatus = self::STATUS_COMPLETED;
                }

                $result[] = [
                    'title' => $step->getTierTitle(),
                    'id' => $step->getTierId(),
                    'status' => $tierStatus,
                    'steps' => $stepsInTier,
                    'selected' => $tierIsSelected,
                ];

                $tierIsSelected = false;
                $tierStatus = self::STATUS_LOCKED;
                $stepsInTier = [];
            }
        }

        if (count($stepsInTier) > 0) {
            throw new \LogicException('Found steps without tier');
        }

        return $result;
    }
}