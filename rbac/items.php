<?php
return [
    'login' => [
        'type' => 2,
    ],
    'logout' => [
        'type' => 2,
    ],
    'error' => [
        'type' => 2,
    ],
    'sign-up' => [
        'type' => 2,
    ],
    'index' => [
        'type' => 2,
    ],
    'view' => [
        'type' => 2,
    ],
    'update' => [
        'type' => 2,
    ],
    'delete' => [
        'type' => 2,
    ],
    'create' => [
        'type' => 2,
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'login',
            'logout',
            'error',
            'sign-up',
            'index',
            'view',
            
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'user',
            'create',
            'update',
            'delete',
            
        ],
    ],
];
