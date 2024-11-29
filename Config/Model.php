<?php
namespace Config;

/*
|------------------------------------------------------
| Models
|------------------------------------------------------
|
| Here is where all the simple queries will be executed
|
*/
class Model {
    private static $conn;
    protected $table;
    protected $fillable;
    public static function init() {
        if (self::$conn === null) {
            $dbConnection = new DbConnection();
            self::$conn = $dbConnection(); 
        }
    }

    protected static function getTableName() {
        $className = get_called_class();
        $className = basename(str_replace('\\', '/', $className));
        $table = strtolower($className);
        return $table;
    }

    public static function find($id) {
        self::init();
            $table = self::getTableName();
            $sql = "SELECT * FROM $table WHERE id = ?";
            $stmt = mysqli_prepare(self::$conn, $sql);
            // var_dump($stmt);
            // die();
            if ($stmt === false) {
                die('Error preparing statement: ' . mysqli_error(self::$conn));
            }
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_assoc($result);
    }
    

    public static function findAll() {
        self::init(); 
        $table = self::getTableName();
        $sql = "SELECT * FROM $table";
        $result = mysqli_query(self::$conn, $sql);
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return [];
    }

    public static function insert(array $data) {
        self::init();
        $table = self::getTableName();
        $columns = implode(", ", array_keys($data));
        $values = [];
        foreach ($data as $value) {
            $values[] = "'" . mysqli_real_escape_string(self::$conn, $value) . "'";
        }
        $values = implode(", ", $values);
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return mysqli_query(self::$conn, $sql);
    }

    public static function update($id, $data) {
        self::init();
        $table = self::getTableName();
        $set = [];
        foreach ($data as $column => $value) {
            $set[] = "$column = '" . mysqli_real_escape_string(self::$conn, $value) . "'";
        }
        $setStr = implode(", ", $set);
        $sql = "UPDATE $table SET $setStr WHERE id = $id";
        return mysqli_query(self::$conn, $sql);
    }

    public static function delete($id) {
        self::init();
        $table = self::getTableName();
        $sql = "DELETE FROM $table WHERE id = $id";
        return mysqli_query(self::$conn, $sql);
    }
}
