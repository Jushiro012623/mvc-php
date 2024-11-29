<?php

use App\Controllers\UserController;
use App\Controllers\Welcome;
use Config\Router;
$router = new Router();


$router->get('/', Welcome::class);
$router->resource('users', UserController::class);
$router->dispatch();