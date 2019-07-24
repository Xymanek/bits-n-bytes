<?php
namespace App\Learning\Test;

use App\Learning\Question\MultipleChoiceQuestion;

class NormalTest extends AbstractTest
{
    public function getTierTitle (): string
    {
        return 'Normal';
    }

    public function getId (): string
    {
        return 'normal-test';
    }

    public function getTitle (): string
    {
        return 'Normal test';
    }

    public function getBadgeCompleted (): string
    {
        return 'normal.png';
    }

    public function getBadgeNotCompleted (): string
    {
        return 'normal_grey.png';
    }

    public function getQuestions (): array
    {
        return [
            new MultipleChoiceQuestion('what-is-alu', 'What is Arithmetic/logic unit (ALU)?', 2, [
                'Is secondary storage',
                'Is main memory',
                'A unit that performs all arithmetic and logical operations within the CPU',
                'A unit that converts that stores data',
            ]),
            new MultipleChoiceQuestion('what-is-cu', 'What is Control unit (CU)?', 0, [
                'Is inside the CPU and handles all processors signals',
                'Is a unit that transfers data and instructions that are being used immediately by the CPU',
                'Is a unit that is used by the CPU to communicate with devices that are contained within the computer',
                'A unit that is used to synchronize things inside the computer',
            ]),
            new MultipleChoiceQuestion('address-bus', 'What is the Address bus?', 2, [
                'An input device',
                'Is a part of the computer CPU  that is dedicated for specifying a physical address',
                'Is a part of the computer system bus that is dedicated for specifying a physical address',
                'Is an IPV4 address',
            ]),
            new MultipleChoiceQuestion('control-bus', 'What is the Control bus?', 0, [
                'Is a computer bus that is used by the CPU to communicate with devices that are contained within the computer',
                'Is a computer bus that is used by the ALU to communicate with devices that are contained within the computer',
                'Is a computer bus that is used by the CU to communicate with devices that are contained within the computer',
                'Is a part of the computer system bus that is dedicated for specifying a physical address',
            ]),
            new MultipleChoiceQuestion('common-cpu-controls', 'Which two controls are common to all CPUs?', 1, [
                'Interrupt Request Lines and System Clock Address Line',
                'Interrupt Request Lines and System Clock Control Line',
                'System Clock Address Line and System Clock Control Line',
                'System Clock Address Line and Interrupt Request Wires',
            ]),
            new MultipleChoiceQuestion('von-neumann', 'What the von Neumann architecture describes?', 2, [
                'The von Neumann architecture describes a general framework, or the flow of data',
                'The von Neumann architecture describes how cloud storage work',
                'The von Neumann architecture describes a general framework, or structure, that a computer\'s hardware, programming, and data should follow',
                'The von Neumann architecture describes what embedded systems are',
            ]),

        ];
    }
}