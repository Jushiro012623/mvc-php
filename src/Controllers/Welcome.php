<?php

namespace App\Controllers;

use Config\Controller;
use App\Models\User;

class Welcome extends Controller
{
    public function index()
    {
        // $names = [
        //     new User('Ivan', '2023'),
        //     new User('Allen', '2022'),
        //     new User('Martin', '2021')
        // ];
        // $this->render('index', ['names' => $names]);
        $this->render('index', ['user' => 'IVAN']);
    }
}