<?php

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);


    switch($action) {
        case "view-classes":
            $classes = class_read();

            require("view/vehicles/edit_classes.php");
            break;
        case "delete-class":
            if($class_id) {
                class_delete($class_id);
                header("Location: .?action=view-classes");
            } else {
                $error_message = "Error removing class. Please try again.";
                require("view/error.php");
            }
            break;
        case "create-class":
            if($name) {
                class_create($name);
                header("Location: .?action=view-classes");
            } else {
                $error_message = "Error creating class. Please try again.";
                require("view/error.php");
            }

    }