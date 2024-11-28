<?php
use App\Controllers\Welcome;
use Config\Router;

$router = new Router();

$router->get('/', Welcome::class, 'index');


$router->dispatch();