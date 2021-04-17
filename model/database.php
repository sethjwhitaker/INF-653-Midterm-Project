<?php

class Database {
    private static $db;

    public static function getDB() {
        if(!isset(self::$db)) {
            try {
                $url = getenv('JAWSDB_URL');
                if(!empty($url)) {
                    $dbparts = parse_url($url);
        
                    $hostname = $dbparts['host'];
                    $username = $dbparts['user'];
                    $password = $dbparts['pass'];
                    $database = ltrim($dbparts['path'],'/');
                    self::$db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
                } else {
                    $dsn = "mysql:host=localhost;dbname=zippyusedautos";
                    $username = "root";
                    self::$db = new PDO($dsn, $username);
                }
                
            } catch (PDOException $e) {
                $error_message = "Database Error: ";
                $error_message .= $e->getMessage();
                require("view/error.php");
                exit();
            }
        } 

        return self::$db;
    }
}
    


    
  