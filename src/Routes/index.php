<?php

use App\Controllers\UserController;
use App\Controllers\Welcome;
use Config\Router;
$router = new Router();


$router->get('/', Welcome::class);
$router->get('/users', UserController::class, 'index');
$router->post('/users', UserController::class, 'store');
$router->get('/users/create', UserController::class, 'create');
$router->get('/users/{id}', UserController::class, 'show');
$router->post('/users/{id}', UserController::class, 'update');
$router->get('/users/{id}/edit', UserController::class, 'edit');
$router->post('/users/{id}/delete', UserController::class, 'destroy');







$router->dispatch();