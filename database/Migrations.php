<?php

namespace Database;
use Database\DbConnection;

class Migration {
    private $conn;

    public function __construct() {
        $dbConnection = new DbConnection();
        $this->conn = $dbConnection(); 
    }

    public function __invoke($tables) {
        foreach ($tables as $table => $columns) {
            $createQuery = "CREATE TABLE `" . $table . "` (";

            $columnDefs = [];
            foreach ($columns as $columnName => $columnDefinition) {
                $columnDefs[] = "`$columnName` $columnDefinition";
            }

            $createQuery .= implode(", ", $columnDefs);
            $createQuery .= ", PRIMARY KEY (`id`)";
            $createQuery .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

            if (mysqli_query($this->conn, $createQuery)) {
                echo "Table `$table` created successfully.\n";
            } else {
                echo "Error creating table `$table`: " . mysqli_error($this->conn) . "\n";
            }
        }
    }
    
    public function dropTable($table) {
        $query = "DROP TABLE IF EXISTS `$table`;";
        if (mysqli_query($this->conn, $query)) {
            echo "Table `$table` dropped successfully.\n";
        } else {
            echo "Error dropping table `$table`: " . mysqli_error($this->conn). "\n";
        }
    }
}
