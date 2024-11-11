<?php
use App\Controllers\Welcome;
use App\Router;

$router = new Router();

$router->get('/', Welcome::class, 'index');


$router->dispatch();