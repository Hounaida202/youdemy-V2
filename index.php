<?php
require __DIR__ . '/vendor/autoload.php';
use App\Core\Router;
$router = new Router();
$router->add('GET', '/youdemy-V2/', 'App\Controllers\HomeController', 'index');
$router->dispatch();