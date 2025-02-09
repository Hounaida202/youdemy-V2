<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/App/Core/Router.php';

use App\Core\Router;

$router = new Router();
$router->add('GET', '/youdemy-V2/', 'App\Controllers\HomeController', 'index');
$router->add('GET', '/youdemy-V2/categories', 'App\Controllers\CategorieController', 'index');
$router->add('GET', '/youdemy-V2/categories/cours/{id}', 'App\Controllers\CoursController', 'index');

$router->dispatch();
