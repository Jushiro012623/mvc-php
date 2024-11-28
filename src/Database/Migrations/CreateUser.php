<?php

// /Migrations/Migration1.php
namespace App\Database\Migrations;

use Config\Migration;

class CreateUser extends Migration {
    public function up() {
        $this->__invoke([
            'todo' => [
                'id' => 'int(11) NOT NULL AUTO_INCREMENT',
                'title' => 'varchar(255) NOT NULL',
                'description' => 'varchar(255) NOT NULL',
            ]
        ]);
    }

    public function down() {
        $this->down([
            'user' => [] 
        ]);
    }
}


