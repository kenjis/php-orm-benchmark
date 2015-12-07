<?php
// bootstrap.php
require __DIR__ . '/fuel/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [__DIR__ . '/fuel/app/classes/model/doctrine'];
$isDevMode = true;

// the connection configuration
$dbParams = [
    'driver'    => 'pdo_mysql',
    'host'      => getenv('DB_HOSTNAME') ? getenv('DB_HOSTNAME') : 'localhost',
    'dbname'    => getenv('DB_NAME') ? getenv('DB_NAME') : 'php_dev',
    'user'      => getenv('DB_USER') ? getenv('DB_USER') : 'root',
    'password'  => getenv('DB_PW') ? getenv('DB_PW') : 'root',
    'charset'   => 'utf8',
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
