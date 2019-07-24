<?php
namespace App\Learning\Test;

use App\Learning\Question\MatchOptionsQuestion;
use App\Learning\Question\MultipleChoiceQuestion;

class RookieTest extends AbstractTest
{
    public function getId (): string
    {
        return 'rookie-test';
    }

    public function getTitle (): string
    {
        return 'Rookie test';
    }

    public function getTierTitle (): string
    {
        return 'Rookie';
    }

    public function getBadgeCompleted (): string
    {
        return 'rookie.png';
    }

    public function getBadgeNotCompleted (): string
    {
        return 'rookie_grey.png';
    }

    public function getQuestions (): array
    {
        return [
            new MultipleChoiceQuestion('what-is-rom', 'What is Read-only memory and why it is used in the computer system?', 0, [
                'ROM is a storage medium that is used with computers and other electronic devices.  It is used for firmware updates',
                'ROM is a storage medium that is used with computers and other electronic devices. It is used to perform all arithmetic and logical operations within the CPU',
                'ROM is a hardware device that allows information to be stored and retrieved on a computer. It is used to find the total number of subnets',
            ]),
            new MultipleChoiceQuestion('what-is-ram', 'What RAM means?', 2, [
                'Random Address Memory',
                'Random Arithmetic Memory',
                'Random Access Memory',
                'Register Access Memory',
            ]),
            new MultipleChoiceQuestion('gameboy-rom', 'You have bought yourself a new GameBoy Advance and a new cartridge. After you started playing, the cartridge accidently falls of, and all the data is lost. Why is it so?', 1, [
                'Because there is no device in the GameBoy Advance that can save the data',
                'Because the data is stored in the cartridge ROM',
                'Because you didn’t have backup',
                'None of the above',
            ]),
            new MultipleChoiceQuestion('bios-job', 'What is the job of BIOS?', 2, [
                'Make sure that the CPU will not be overwhelmed by distractions. Also helps the computer to interact with its environment',
                'To store data',
                'Fetching instructions from memory and executing them',
                'All of the above',
            ]),
            new MultipleChoiceQuestion('what-is-ram', 'What is the job of CPU?', 2, [
                'To control the flow of data within the system',
                'To synchronize things inside the computer',
                'Fetching instructions from memory and executing them',
                'Provide interaction between the computer and the computer environment',
            ]),
            new MatchOptionsQuestion(
                'io-devices', 'Which one is an input device and which an output',
                [
                    2 => 'Input',
                    0 => 'Output',
                ],
                [
                    ['file' => 'speakers.jpg', 'class' => 'img-responsive'],
                    ['file' => 'hdd.jpg', 'class' => 'img-responsive'],
                    ['file' => 'webcam.jpg', 'class' => 'img-responsive'],
                    ['file' => 'usb-stick.jpg', 'class' => 'img-responsive'],
                ]
            ),
            new MultipleChoiceQuestion('what-is-cache', 'What is cache?', 2, [
                'A subnet mask',
                'A Hardware device',
                'A portion of the high-speed static RAM',
                'A portion of the high-speed static ROM',
            ]),
        ];
    }
}