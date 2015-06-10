<?php
// bootstrap.php
require __DIR__ . '/fuel/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [__DIR__ . '/fuel/app/model/doctrine/entity'];
$isDevMode = false;

// the connection configuration
$dbParams = [
    'driver'    => 'pdo_mysql',
    'host'      => 'localhost',
    'dbname'    => 'php_dev',
    'user'      => 'root',
    'password'  => 'root',
    'charset'   => 'utf8',
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
