<?php
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

    switch ($action) {
        case "home":
            $makes = make_read();
            $types = type_read();
            $classes = class_read();
            $vehicles = vehicles_read($make_id, $type_id, $class_id, $sort_by);
            require("./view/home.php");
            break;
    }