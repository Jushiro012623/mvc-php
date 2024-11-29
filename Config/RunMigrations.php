<?php
/*
|---------------------------------
| Up Migration
|---------------------------------
|
| Here is where the migration runs
|
*/
require_once __DIR__ . '../../vendor/autoload.php';
require_once __DIR__ . '/Migrations.php';

foreach (glob(__DIR__ . '../../src/Database/Migrations/*.php') as $migrationFile) {
    require_once $migrationFile;
}

/**
 * define the folder locations of the migrations
 */
$migrations = [
    'App\Database\Migrations\CreateUser',
    # 'App\Database\Migrations\CreateTodoList',
];

foreach ($migrations as $migrationClass) {
    $migration = new $migrationClass();
    $migration->up();
}
