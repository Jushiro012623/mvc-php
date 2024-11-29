<?php

// /Migrations/Migration1.php
namespace App\Database\Migrations;

use Config\Migration;
/*
|---------------------------------------------
| Sample User Migration
|---------------------------------------------
|
| Here is where you can define your migrations
|
*/
class CreateUser extends Migration {
    public function up() {
        $this->__invoke([
            'users' => [
                'id' => 'int(11) NOT NULL AUTO_INCREMENT',
                'name' => 'varchar(255) NOT NULL',
                'email' => 'varchar(255) NOT NULL',
                'password' => 'varchar(255) NOT NULL',
            ]
        ]);
    }

    public function down() {
        $this->dropTable('users');
    }
}


