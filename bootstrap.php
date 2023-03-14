<?php

require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/src"),
    isDevMode: true,
);



// configuring the database connection
$connection = DriverManager::getConnection([
    // mysql driver
    'dbname' => 'timeoff',
    'user' => $_ENV['DB_USERNAME'],
    'password' =>$_ENV['DB_PASSWORD'],
    'host' => 'localhost',
    'driver' => 'pdo_mysql',

], $config);

// obtaining the entity manager
try {
    $entityManager = new EntityManager($connection, $config);
} catch (\Doctrine\ORM\Exception\MissingMappingDriverImplementation $e) {
}


$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates',__DIR__);

$twig = new \Twig\Environment($loader, [
    'cache' => '/cache/',
    'auto_reload' => true,
]);

function getActions(){
    return [
        'home' => 'index.php',
        'departments' => 'departments.php',
        'sectors' => 'sectors.php',
        'employees' => 'employee.php',
        'timeoff' => 'timeoff.php',
        'reports' => 'reports.php',
    ];
}

function render($template, $data = [])
{
    global $twig;
    $template = $twig->load($template);
    echo $template->render($data);
}
