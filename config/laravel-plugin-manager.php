<?php

return [
    'plugin' => [
        [
            'name' => \Baijunyao\LaravelFlash\Manager::class,
            'except' => [
                '/',
                'article/*',
                'category/*',
                'tag/*',
                'site'
            ]
        ],
    ]
];
