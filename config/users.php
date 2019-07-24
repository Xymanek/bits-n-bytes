<?php
return [
    'Users' => [
        //Table used to manage users
        'table' => 'CakeDC/Users.Users',

        'Tos' => [
            //determines if the user should include tos accepted
            'required' => true,
        ],

        'Profile' => [
            //Allow view other users profiles
            'viewOthers' => true,
            'route' => ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'profile'],
        ],

        //Avatar placeholder
        'Avatar' => ['placeholder' => 'CakeDC/Users.avatar_placeholder.png'],

        'RememberMe' => [
            //configure Remember Me component
            'active' => true,
            'Cookie' => [
                'name' => 'remember_me',
                'Config' => [
                    'expires' => '1 month',
                    'httpOnly' => true,
                ]
            ]
        ],
    ],

    //default configuration used to auto-load the Auth Component, override to change the way Auth works
    'Auth' => [
        'flash' => [
            'element' => 'Flash/error',
            'params' => []
        ]

        /*'loginAction' => [
            'plugin' => 'CakeDC/Users',
            'controller' => 'Users',
            'action' => 'login',
            'prefix' => false
        ],
        'authenticate' => [
            'all' => [
                'finder' => 'auth',
            ],
            'CakeDC/Users.ApiKey',
            'CakeDC/Users.RememberMe',
            'Form',
        ],
        'authorize' => [
            'CakeDC/Users.Superuser',
            'CakeDC/Users.SimpleRbac',
        ],*/
    ],
    'OAuth' => [
        'path' => false,
        'providers' => [],
    ]
];