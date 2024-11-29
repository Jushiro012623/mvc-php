<?php

use App\Controllers\UserController;
use App\Controllers\Welcome;
use Core\Router;
$router = new Router();

/*
|----------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------
|
| Here is where you can register web routes for your application. 
|
*/
$router->get('/', Welcome::class);
$router->resource('users', UserController::class);
$router->dispatch();
