<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__file__));

//Autoload classes
require_once(ROOT . DS . 'core' . DS .'autoload.php');

//load configuration
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

//load application configuration
require_once(ROOT . DS . 'config' . DS . 'config.php');

session_start();

use App\Controllers\ScrapingController;

$app = new Core\Application();

$app->router->get('/', [ScrapingController::class, 'index']);
$app->router->post('/scrape', [ScrapingController::class, 'scrape']);


$app->run();
