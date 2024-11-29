<?php

namespace Database;
/*
|------------------------------------------------
| Database Connection
|------------------------------------------------
|
| Here is where this app connects to the database 
|
*/
class DbConnection {
    private $host;
    private $root;
    private $password;
    private $db;
    public function __construct(){
        $this->host = 'localhost';
        $this->root = 'root';
        $this->password = '';
        $this->db = 'test';
    }

    public function __invoke(){
        $conn = mysqli_connect(
            $this->host,
            $this->root,
            $this->password,
            $this->db
        );
        if(!$conn){
            echo "Error.\n";
            die('Error'. mysqli_connect_error());
        }
        date_default_timezone_set('Asia/Manila');
        return $conn;
    }

} 
