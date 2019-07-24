<?php
namespace App\Learning;

class LearningPath
{
    /**
     * @var StepInterface[]
     */
    protected static $steps;

    public static function addStep (StepInterface $step)
    {
        $id = $step->getId();

        if (isset(static::$steps[$id])) {
            throw new \LogicException('A step with this id already exists');
        }

        static::$steps[$id] = $step;
    }

    /**
     * @return \App\Learning\StepInterface[]
     */
    public static function getSteps (): array
    {
        return static::$steps;
    }

    public static function hasStep (string $id): bool
    {
        return isset(static::$steps[$id]);
    }

    public static function getStep (string $id): StepInterface
    {
        if (!self::hasStep($id)) {
            throw new \LogicException('Step not found');
        }

        return static::$steps[$id];
    }
}