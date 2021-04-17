<?php

    $lifetime = 60 * 60 * 24 * 14;
    session_set_cookie_params($lifetime, "/");
    session_start();

    require("model/database.php");
    require("model/makes.php");
    require("model/types.php");
    require("model/classes.php");
    require("model/vehicles.php");

    $action = filter_input(INPUT_POST, "action",  FILTER_SANITIZE_STRING);
    if(!$action) {
        $action = filter_input(INPUT_GET, "action",  FILTER_SANITIZE_STRING);
        if(!$action) {
            $action = "home";
        }
    }

    $make_id = filter_input(INPUT_GET, "make_id", FILTER_SANITIZE_STRING);
    $type_id = filter_input(INPUT_GET, "type_id", FILTER_SANITIZE_STRING);
    $class_id = filter_input(INPUT_GET, "class_id", FILTER_SANITIZE_STRING);
    $sort_by = filter_input(INPUT_GET, "sort_by", FILTER_SANITIZE_STRING);

    $first_name = filter_input(INPUT_GET,"first_name", FILTER_SANITIZE_STRING);
    if(!empty($first_name)) {
        $_SESSION["user_id"] = $first_name;
    }

    switch ($action) {
        case "home":
            $makes = MakesDB::read();
            $types = TypesDB::read();
            $classes = ClassesDB::read();
            $vehicles = VehiclesDB::read($make_id, $type_id, $class_id, $sort_by);
            require("./view/home.php");
            break;
        case "register":
            require("./view/register.php");
            break;
        case "logout":
            require("./view/logout.php");
            break;
    }