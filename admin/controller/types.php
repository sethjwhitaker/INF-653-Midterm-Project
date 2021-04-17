<?php

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);


    switch($action) {
        case "view-types":
            $types = TypesDB::read();

            require("view/vehicles/edit_types.php");
            break;
        case "delete-type":
            if($type_id) {
                TypesDB::delete($type_id);
                header("Location: .?action=view-types");
            } else {
                $error_message = "Error removing type. Please try again.";
                require("view/error.php");
            }
            break;
        case "create-type":
            if($name) {
                TypesDB::create($name);
                header("Location: .?action=view-types");
            } else {
                $error_message = "Error creating type. Please try again.";
                require("view/error.php");
            }

    }