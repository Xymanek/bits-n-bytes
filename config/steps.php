<?php
use App\Learning\Exercise\SimpleExercise;
use App\Learning\LearningPath;
use App\Learning\Lesson\SimpleLesson;
use App\Learning\Question\MatchOptionsQuestion;
use App\Learning\Question\MultipleChoiceQuestion;
use App\Learning\Question\TrueFalseQuestion;
use App\Learning\Test\HardcoreTest;
use App\Learning\Test\NormalTest;
use App\Learning\Test\RookieTest;

LearningPath::addStep(new SimpleLesson('hardware', 'Hardware'));
LearningPath::addStep(new SimpleExercise('quiz-1', 'Quiz 1', [
    new MultipleChoiceQuestion('what-is-hardware', 'What is hardware?', 0, [
        'Physical devices that a computer is made of',
        'The programs that run on the computer',
        'The devices which are used to input the data and the programs in the computer',
        'Storage devices',
    ], ['Hardware has weight and form']),
]));
LearningPath::addStep(new SimpleLesson('cpu-main-memory', 'CPU and main memory'));
LearningPath::addStep(new SimpleExercise('quiz-2', 'Quiz 2', [
    new MultipleChoiceQuestion('what-is-cpu', 'What is CPU?', 1, [
        'Storage device',
        'Is a type of processor that runs the system',
        'Input Device',
        'A software device',
    ], ['it is the heart of the PC']),
    new MultipleChoiceQuestion('cpu-purpose', 'What is CPU purpose?', 3, [
        'To store and retrieve information',
        'To control the flow of data within the system',
        'To produce sound',
        'To process data',
    ], ['All data flows through it']),
    new MultipleChoiceQuestion('what-is-main-memory', 'What is main memory?', 0, [
        'Is where programs and data are kept when the processor is actively using them',
        'Is a storage medium that is used with computers and other electronic devices',
        'Is where data is stored on remote servers accessed from the Internet',
        'Is a storage medium which contains every memory in PC',
    ], ['Data constantly moves through it']),
]));
LearningPath::addStep(new SimpleLesson('storage-io', 'Secontary storage and I/O devices'));
LearningPath::addStep(new SimpleExercise('quiz-3', 'Quiz 3', [
    new MultipleChoiceQuestion('what-is-secondary-storage', 'What is secondary storage?', 3, [
        'Is software',
        'Is used to control the flow of data',
        'Is a major component of the central processing unit (CPU)',
        'Is non-volatile storage that is not under the direct control of a computer\'s CPU',
    ], ['Data is just stored inside']),
    new MultipleChoiceQuestion('output-device', 'Which is an output device?', 0, [
        ['file' => 'monitor.jpg', 'class' => 'img-responsive'],
        ['file' => 'webcam.jpg', 'class' => 'img-responsive'],
        ['file' => 'cpu-brain.png', 'class' => 'img-responsive'],
        ['file' => 'keyboard.jpg', 'class' => 'img-responsive'],
    ], ['Try to remember what is output']),
]));
LearningPath::addStep(new SimpleLesson('memory', 'Memory'));
LearningPath::addStep(new SimpleExercise('quiz-4', 'Quiz 4', [
    new MatchOptionsQuestion(
        'match-difference', 'Match the differences',
        [
            3 => 'Main memory',
            0 => 'RAM',
            2 => 'ROM',
            1 => 'Secondary storage',
        ],
        [
            "is a hardware device that allows information to be stored and retrieved on a computer",
            "is non-volatile storage that is not under the direct control of a computer's central processing unit (CPU) or does not directly interact with an application",
            'is a storage medium that is used with computers and other electronic devices',
            "where programs and data are kept when the processor is actively using them. Main memory refers to physical memory that is internal to the computer",
        ],
        ['What does "M" stand for in RAM and ROM?']
    ),
    new TrueFalseQuestion('rom-is-main-memory', 'ROM is a main memory?', false),
    new MultipleChoiceQuestion('temporary-files',
        'You execute a program, and it creates temporary files, which are deleted after PC turns off. Where are they stored before turn off the PC?',
        0,
        [
            'Stored in RAM',
            'Stored in ROM',
            'Nowhere',
            'Stored in the CPU',
        ],
        ['Data can only be stored inside the memory segment']
    ),
    new MultipleChoiceQuestion('what-is-cache', 'What is Cache?', 3, [
        'Cache is secondary storage',
        'Is an input device',
        'Is Optical storage',
        'Is a high-speed access area',
    ], ['Cached data is deleted after use']),
    new MultipleChoiceQuestion('types-of-cache', 'What are the two main types of cache?', 1, [
        'Address cache and log cache',
        'Memory cache and disk cache',
        'Memory cache and link cache',
        'Address cache and disk cache',
    ], ['They occupy most space']),
]));
LearningPath::addStep(new SimpleLesson('working-together', 'How hardware components work'));
LearningPath::addStep(new RookieTest());


LearningPath::addStep(new SimpleLesson('cu-alu-registers', 'CU, ALU and Registers'));
LearningPath::addStep(new SimpleExercise('normal-quiz-1', 'Quiz 1', [
    new MultipleChoiceQuestion('what-is-cu', 'What is Control unit (CU)?', 0, [
        'Is inside the CPU and handles all processors signals',
        'Is a unit that transfers data and instructions that are being used immediately by the CPU',
        'Is a unit that is used by the CPU to communicate with devices that are contained within the computer',
        'A unit that is used to synchronize things inside the computer',
    ], ['Providing control and timing signals']),
    new MultipleChoiceQuestion('what-is-alu', 'What is Arithmetic/logic unit (ALU)?', 2, [
        'Is secondary storage',
        'Is main memory',
        'A unit that performs all arithmetic and logical operations within the CPU',
        'A unit that converts that stores data',
    ], ['Has to do with logical operations.']),
    new MultipleChoiceQuestion('what-is-registers', 'What are the Registers?', 3, [
        'Is an embedded system',
        'Is one of a small set of data holding IP addresses',
        'A magnetic storage device',
        'Is one of a small set of data holding places that are part of the computer processor',
    ], ['May hold something like an instruction or a storage address']),
    new MultipleChoiceQuestion('alu-operations', 'Which one is an operation that ALU performs', 1, [
        'Logical operations: these include AND,IF, NOT',
        'Logical operations: these include AND,OR, NOT',
        'Controls sequential instruction execution',
        'None of listed',
    ], ['Uses Binary Logic']),
    new MultipleChoiceQuestion('cu-function', 'Which one is CU function?', 0, [
        'Guides data flow through different computer areas',
        'Multiplication',
        'Store data',
        'All of the above',
    ], ['Helps the CPU']),
]));
LearningPath::addStep(new SimpleLesson('registers-performance', 'Registers performance'));
LearningPath::addStep(new SimpleExercise('normal-quiz-2', 'Quiz 2', [
    new MultipleChoiceQuestion('register-step', '… is one step that registers perform', 2, [
        'Save data',
        'Send message to the user',
        'Decode',
        'Encode',
    ], ['Is used for interpreting the Instructions']),
    new MultipleChoiceQuestion('fetch-operation', 'The Fetch Operation is used ...', 0, [
        'For taking the instructions those are given by the user and the Instructions those are stored into the Main Memory will be fetch by using Registers',
        'For taking the instructions those are given by the user will be fetching by using Registers',
        'For taking the Instructions those are stored into the Main Memory will be fetch by using Encoding',
        'For interpreting the Instructions',
    ], ['They stored in the Main memory']),
    new MultipleChoiceQuestion('decode-operation', 'The Decode Operation is used ...', 2, [
        'For taking the instructions those are given by the user and the Instructions those are stored into the Main Memory will be fetch by using Registers',
        'To synchronize things inside the computer',
        'For interpreting the Instructions means',
        'For displaying the results on the user Screen',
    ], ['The instructions are decoded']),
    new MultipleChoiceQuestion('execute-operation', 'The Execute Operation is used for ...', 3, [
        'taking the instructions those are given by the user will be fetching by using Registers',
        'Nothing',
        'Storing the data',
        'For storing the results into the Memory and after that they are displayed on the user Screen',
    ], ['Execute is User Oriented']),
]));
LearningPath::addStep(new SimpleLesson('clock', 'Internal clock'));
LearningPath::addStep(new SimpleExercise('normal-quiz-3', 'Quiz 3', [
    new MultipleChoiceQuestion('internal-clock', 'Internal clock is……', 1, [
        'Is a part of the computer system bus that is dedicated for specifying a physical address',
        'Is a signal that used to synchronize things inside the computer',
        'Is a storage device',
        'Is an output device',
    ], ['It is a metronome']),
]));
LearningPath::addStep(new SimpleLesson('buses', 'Buses'));
LearningPath::addStep(new SimpleExercise('normal-quiz-4', 'Quiz 4', [
    new MultipleChoiceQuestion('address-bus', 'What is the Address bus?', 2, [
        'An input device',
        'Is a part of the computer CPU  that is dedicated for specifying a physical address',
        'Is a part of the computer system bus that is dedicated for specifying a physical address',
        'Is an IPV4 address',
    ], ['Aligned to a specific physical address']),
    new MultipleChoiceQuestion('data-bus', 'What a Data bus does?', 3, [
        'Carries an IPV6 address',
        'Store the data',
        'Simply carries memory',
        'Simply carries data',
    ], ['Carries something']),
    new MultipleChoiceQuestion('control-bus', 'What is the Control bus?', 0, [
        'Is a computer bus that is used by the CPU to communicate with devices that are contained within the computer',
        'Is a computer bus that is used by the ALU to communicate with devices that are contained within the computer',
        'Is a computer bus that is used by the CU to communicate with devices that are contained within the computer',
        'Is a part of the computer system bus that is dedicated for specifying a physical address',
    ], ['Is used for communication']),
]));
LearningPath::addStep(new SimpleLesson('address-vs-data', 'Address bus VS Data bus'));
LearningPath::addStep(new SimpleLesson('von-neumann', 'Von Neumann model'));
LearningPath::addStep(new SimpleExercise('normal-quiz-5', 'Quiz 5', [
    new MultipleChoiceQuestion('data-vs-address', 'Which two are differences between Address bus and Data bus?', 1, [
        'Data bus is unidirectional, Address bus is unidirectional',
        'Data bus travels in both directions, Address bus is unidirectional',
        'Data bus is unidirectional, Address bus travels in both directions',
        'Data bus travels in both directions, Address bus travels in both directions',
    ], ['It is not ine directional']),
    new MultipleChoiceQuestion('internal-clock', 'The von Neumann architecture describes …', 0, [
        '... a general framework, or structure, that a computer\'s hardware, programming, and data should follow',
        '... a general framework, or the flow of data',
        '... how cloud storage work',
        '... what embedded systems are',
    ], ['Describes a framework']),
]));
LearningPath::addStep(new SimpleLesson('cpu-buses', 'CPU and the control bus'));
LearningPath::addStep(new SimpleExercise('normal-quiz-6', 'Quiz 6', [
    new MultipleChoiceQuestion(
        'usb-disconnect',
        'USB was disconnected from a PC, which bus signals that it was removed?', 0,
        [
            'Address bus',
            'Control bus',
            'Data bus',
            'All of them',
        ],
        ['lines that are used to transfer the addresses of Memory']
    ),
    new MultipleChoiceQuestion(
        'cpu-without-control-bus',
        'Without the control bus the CPU cannot determine whether the system ...', 3,
        [
            '... is receiving emails',
            '... stores the data',
            '... is sending data',
            '... is receiving or sending data',
        ],
        ['Has to do with flow direction']
    ),
    new MultipleChoiceQuestion('common-cpu-controls', 'Which two controls are common to all CPUs?', 1, [
        'Interrupt Request Lines and System Clock Address Line',
        'Interrupt Request Lines and System Clock Control Line',
        'System Clock Address Line and System Clock Control Line',
        'System Clock Address Line and Interrupt Request Wires',
    ], ['They all need to be able to stop action']),
    new MultipleChoiceQuestion('control-bus-contains', 'A control bus contains ...', 2, [
        '... one control line for write and read instructions',
        '... one address Line',
        '... a control line for write instructions and a control line for read instructions',
        '... control line for decoding',
    ], ['It has a control line']),
]));
LearningPath::addStep(new NormalTest());


LearningPath::addStep(new SimpleLesson('physical-devices', 'Physical devices'));
LearningPath::addStep(new SimpleExercise('hardcore-quiz-1', 'Quiz 1', [
    new MultipleChoiceQuestion('ssd-are', 'Solid state drives are ...', 0, [
        'Storage units',
        'Coffee machine ',
        'CPU',
        'None of listed here',
    ], ['Secondary storage units']),
    new MultipleChoiceQuestion('what-is-cache', 'Which is magnetic storage?', 0, [
        'Hardrive',
        'CD',
        'USB',
        'DVD',
    ], ['it uses magnets to record data']),
    new MatchOptionsQuestion(
        'match-difference', 'Match the differences',
        [
            2 => 'Advantages of Magnetic Storage Devices',
            0 => 'Disadvantages of Magnetic storage devices',
        ],
        [
            "Eventually fail which stops the computer from working",
            "Faster than hard drives and the cost to store date is low",
            'Inexpensive storage',
            "Use magnets to record data on rotating metal platters",
        ],
        ['Made out of cheap materials']
    )
]));
LearningPath::addStep(new SimpleLesson('cloud', 'Cloud and contemporary secondary storage'));
LearningPath::addStep(new SimpleLesson('embedded-systems', 'Embedded systems'));
LearningPath::addStep(new SimpleExercise('hardcore-quiz-2', 'Quiz 2', [
    new MultipleChoiceQuestion('cloud-is', 'Cloud storage is ...', 0, [
        '... a cloud computing model in which data is stored on remote servers accessed from the Internet',
        '... magnetic storage',
        '... a CCTV device',
        'None of listed here',
    ], ['Does not deal with magnets']),
    new MultipleChoiceQuestion('what-is-cloud', 'Which is cloud storage?', 1, [
        'Microsoft',
        'Google Drive',
        'USB',
        'None of listed here',
    ], ['Used to store data']),
    new MultipleChoiceQuestion('which-is-secondary-storage', 'Which is secondary storage?', 3, [
        'External solid state',
        'USB',
        'RAM',
        'ROM',
    ], ['The data does not move through it']),
    new MultipleChoiceQuestion('what-is-secondary-storage', 'What is secondary storage?', 0, [
        'Is a non-volatile storage which is not under direct control of CPU',
        'Is a external storage drive that can be easily removed from the system',
        'Is a non-volatile storage which stores data permanently',
        'None of listed here',
    ], ['Located inside the PC']),
    new MultipleChoiceQuestion('embedded-systems', 'What are embedded systems?', 0, [
        'Car satellite navigation system',
        'The Internet',
        'Car stereo system',
        'Fridge built-in display',
    ], ['Connected worldwide']),
]));
LearningPath::addStep(new HardcoreTest());