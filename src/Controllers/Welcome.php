<?php

namespace App\Controllers;

use Config\Controller;
class Welcome extends Controller
{
    public function __invoke()
    {
        $this->render('welcome');
    }
}