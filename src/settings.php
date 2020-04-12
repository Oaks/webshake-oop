<?php

return [
    'db' => [
        'host' => getenv('DB_HOST'),
        'dbname' => 'my_project',
        'user' => 'webshake',
        'password' => 'secret',
    ],
    'templates' => __DIR__ . '/../templates'
];
