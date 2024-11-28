<?php

namespace App\Controllers;

use Config\Controller;
class Welcome extends Controller
{
    public function index()
    {
        $this->render('welcome');
    }
}