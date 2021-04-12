<?php
    session_start();

    require("../model/database.php");
    require("../model/makes.php");
    require("../model/types.php");
    require("../model/classes.php");
    require("../model/vehicles.php");
    require("../model/admin_db.php");

    $action = filter_input(INPUT_POST, "action",  FILTER_SANITIZE_STRING);
    if(!$action) {
        $action = filter_input(INPUT_GET, "action",  FILTER_SANITIZE_STRING);
        if(!$action) {
            $action = "view-vehicles";
        }
    }
    $make_id = filter_input(INPUT_POST, "make_id", FILTER_VALIDATE_INT);   
    if(!$make_id) {
        $make_id = filter_input(INPUT_GET, "make_id",  FILTER_VALIDATE_INT);   
    }
    $type_id = filter_input(INPUT_POST, "type_id", FILTER_VALIDATE_INT);   
    if(!$type_id) {
        $type_id = filter_input(INPUT_GET, "type_id",  FILTER_VALIDATE_INT);   
    }
    $class_id = filter_input(INPUT_POST, "class_id", FILTER_VALIDATE_INT);   
    if(!$class_id) {
        $class_id = filter_input(INPUT_GET, "class_id",  FILTER_VALIDATE_INT);   
    }

    require("./controller/makes.php");
    require("./controller/types.php");
    require("./controller/vehicles.php");
    require("./controller/classes.php");
    require("./controller/admin.php");