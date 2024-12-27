<?php

// using singleton pattern
class DatabaseConnection{
    protected static $connection = false;
    private function __construct()
    {
        echo 'instance created';
    }

    public static function connect(){
        if(!self::$connection){
            $conn = new PDO ("mysql:host=localhost;dbname=orm_fut_champions","root","");
            self::$connection = $conn;
        }
        return self::$connection;
    }


}

// var_dump(DatabaseConnection::connect());



?>