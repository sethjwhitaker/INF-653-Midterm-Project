<?php

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);


    switch($action) {
        case "view-types":
            $types = type_read();

            require("view/vehicles/edit_types.php");
            break;
        case "delete-type":
            if($type_id) {
                type_delete($type_id);
                header("Location: .?action=view-types");
            } else {
                $error_message = "Error removing type. Please try again.";
                require("view/error.php");
            }
            break;
        case "create-type":
            if($name) {
                type_create($name);
                header("Location: .?action=view-types");
            } else {
                $error_message = "Error creating type. Please try again.";
                require("view/error.php");
            }

    }