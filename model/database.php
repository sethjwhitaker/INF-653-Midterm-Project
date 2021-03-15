<?php
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    try {
        $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    } catch (PDOException $e) {
        $error_message = "Database Error: ";
        $error_message .= $e->getMessage();
        require("view/error.php");
        exit();
    }
  