<?php
namespace App\Learning\Test;

use App\Learning\Question\MatchOptionsQuestion;
use App\Learning\Question\MultipleChoiceQuestion;

class HardcoreTest extends AbstractTest
{
    public function getTierTitle (): string
    {
        return 'Hardcore';
    }

    public function getId (): string
    {
        return 'hardcore-test';
    }

    public function getTitle (): string
    {
        return 'Hardcore test';
    }

    public function getBadgeCompleted (): string
    {
        return 'hardcore.png';
    }

    public function getBadgeNotCompleted (): string
    {
        return 'hardcore_grey.png';
    }

    public function getQuestions (): array
    {
        return [
            new MultipleChoiceQuestion('what-is-cloud', 'What is Cloud storage?', 0, [
                'Online storage unit',
                'Magnetic storage',
                'CCTV device',
                'None of listed here',
            ]),
            new MatchOptionsQuestion(
                'match-correct', 'Match the correct answers',
                [
                    2 => 'Cloud computer',
                    3 => 'Magnetic storage devices',
                    0 => 'Solid State',
                    1 => 'Optical',
                ],
                [
                    'The only drives that are faster than hard drives; however the cost to store date is pennies per gigabyte.',
                    "is a storage method in which data is written and read with optical beam (laser).",
                    "is a type of Internet-based computing that provides shared computer processing resources and data to computers and other devices on demand",
                    "Gradually lose their charge over time - data lost(a)",
                ]
            ),
            new MultipleChoiceQuestion('which-is-secondary-storage', 'Which is secondary storage?', 3, [
                'External solid state',
                'USB',
                'RAM',
                'ROM',
            ]),
            new MultipleChoiceQuestion('which-is-magnetic-storage', 'Which is magnetic storage?', 0, [
                'Harddrive',
                'CD',
                'USB',
                'DVD',
            ]),
            new MultipleChoiceQuestion('cloud-company', 'Pick an example of cloud storage company', 1, [
                'Microsoft',
                'Dropbox',
                'Ubuntu',
                'Google drive',
            ]),
            new MultipleChoiceQuestion('amazon-cloud', 'Which of the following is Cloud Platform by Amazon?', 1, [
                'Azure',
                'AWS',
                'Cloudera',
                'Rackspace',
            ]),
        ];
    }
}