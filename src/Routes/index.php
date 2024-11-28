<?php

use App\Controllers\UserController;
use App\Controllers\Welcome;
use Config\Router;
$router = new Router();


$router->get('/', Welcome::class, 'index');

$router->get('/users', UserController::class, 'index');
$router->get('/users/create', UserController::class, 'create');
$router->post('/users/create', UserController::class, 'store');
// $router->get('/user/{view}', UserController::class, 'show');







$router->dispatch();