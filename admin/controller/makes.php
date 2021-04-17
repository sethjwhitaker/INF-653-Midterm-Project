<?php

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);


    switch($action) {
        case "view-makes":
            $makes = MakesDB::read();

            require("view/vehicles/edit_makes.php");
            break;
        case "delete-make":
            if($make_id) {
                MakesDB::delete($make_id);
                header("Location: .?action=view-makes");
            } else {
                $error_message = "Error removing make. Please try again.";
                require("view/error.php");
            }
            break;
        case "create-make":
            if($name) {
                MakesDB::create($name);
                header("Location: .?action=view-makes");
            } else {
                $error_message = "Error creating make. Please try again.";
                require("view/error.php");
            }

    }