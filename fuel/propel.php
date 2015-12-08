<?php
return [
    'propel' => [
        'database' => [
            'connections' => [
                'default' => [
                    'adapter' => 'mysql',
                    'dsn' => 'mysql:host=' . (getenv('DB_HOSTNAME') ? getenv('DB_HOSTNAME') : 'localhost') . ';port=3306;dbname=' . (getenv('DB_NAME') ? getenv('DB_NAME') : 'php_dev'),
                    'user' => getenv('DB_USER') ? getenv('DB_USER') : 'root',
                    'password' => getenv('DB_PW') ? getenv('DB_PW') : 'root',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ]
    ]
];
