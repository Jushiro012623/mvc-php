<?php

namespace Config;

class DbConnection {
    public function __invoke(){
        $conn = mysqli_connect(
            'localhost',
            'root',
            '',
            'test'
        );
        if(!$conn){
            echo "Error.\n";
            die('Error'. mysqli_connect_error());
        }
        date_default_timezone_set('Asia/Manila');
        // echo 'Connection Success';
        return $conn;
    }

} 
