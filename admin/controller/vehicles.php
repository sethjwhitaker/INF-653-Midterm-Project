<?php
    
    $sort_by = filter_input(INPUT_GET, "sort_by", FILTER_SANITIZE_STRING);

    $vehicle_id = filter_input(INPUT_POST, "vehicle_id", FILTER_VALIDATE_INT);

    $model = filter_input(INPUT_POST, "model", FILTER_SANITIZE_STRING);
    $year = filter_input(INPUT_POST, "year", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT);


    switch($action) {
        case "view-vehicles":
            $makes = MakesDB::read();
            $types = TypesDB::read();
            $classes = ClassesDB::read();
            $vehicles = VehiclesDB::read($make_id, $type_id, $class_id, $sort_by);
            require("view/admin/admin.php");
            break;
        case "delete-vehicle":
            if($vehicle_id) {
                VehiclesDB::delete($vehicle_id);
                header("Location: .?action=view-vehicles");
            } else {
                $error_message = "Error removing vehicle. Please try again.";
                require("view/error.php");
            }
            break;
        case "create-vehicle":
            if(!VehiclesDB::create($make_id, $type_id, $class_id, $model, $year, $price)) {
                $error_message = "Error creating vehicle. Please try again.";
                require("view/error.php");
            } else {
                header("Location: .?add-vehicle-page");
            }
            break;
        case "add-vehicle-page":
            $makes = MakesDB::read();
            $types = TypesDB::read();
            $classes = ClassesDB::read();
            require("view/vehicles/add_vehicle.php");
            break;
        }
