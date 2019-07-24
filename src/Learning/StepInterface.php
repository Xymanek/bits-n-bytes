<?php
namespace App\Learning;

interface StepInterface
{
    public function getId (): string;

    public function getTitle (): string;

    public function getUrl (): string;
}