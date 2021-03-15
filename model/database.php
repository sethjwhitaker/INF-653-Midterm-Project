<?php
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $dsn = "mysql:host=localhost;dbname=zippyusedautos";
    $username = "root";

    try {
        $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    } catch (PDOException $e) {
        $error_message = "Database Error: ";
        $error_message .= $e->getMessage();
        require("view/error.php");
        exit();
    }
    //mysql://s2ilysepthbq9vs3:hj4nsnucuymqulng@pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/fz8vpml43i4puewj