<?php
return [
    'page/{id:\d+}' => [
        'controller' => 'news',
        'action' => 'index',
    ],
    '' => [
        'controller' => 'news',
        'action' => 'index',
    ],
    'news/show/{id:\d+}' => [
        'controller' => 'news',
        'action' => 'show',
    ],
    'news/create' => [
        'controller' => 'news',
        'action' => 'create',
    ],
    'news/edit/{id:\d+}' => [
        'controller' => 'news',
        'action' => 'edit',
    ],
    'news/delete/{id:\d+}' => [
        'controller' => 'news',
        'action' => 'delete',
    ],
];
