<?php

namespace App\Controllers;

use Core\Controller;

/*
 * 
 * Starter controller
 * @return view 
 */
class Welcome extends Controller
{
    public function __invoke()
    {
        return $this->render('welcome');
    }
}