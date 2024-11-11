<?php

namespace App\Models;

class User
{
    public $name;
    public $dateOfBirth;

    public function __construct($name, $dateOfBirth)
    {
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
    }
}