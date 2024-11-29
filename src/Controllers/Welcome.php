<?php

namespace App\Controllers;

use Config\Controller;

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