<?php

// /Migrations/Migration1.php
namespace App\Database\Migrations;

use Config\Migration;

class CreateTodoList extends Migration {
    public function up() {
        $this->__invoke([
            'user' => [
                'id' => 'int(11) NOT NULL AUTO_INCREMENT',
                'name' => 'varchar(255) NOT NULL',
                'email' => 'varchar(255) NOT NULL',
                'password' => 'varchar(255) NOT NULL',
            ]
        ]);
    }

    public function down() {
        $this->down([
            'user' => [] 
        ]);
    }
}


