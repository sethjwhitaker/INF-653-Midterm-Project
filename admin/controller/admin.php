<?php
    $username = filter_input(INPUT_POST, "username",  FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password",  FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, "confirm_password",  FILTER_SANITIZE_STRING);

    
    switch($action) {
        case "login":
            if(empty($username) && empty($password)) {
                $login_message = "You must login to view this page.";
                require("view/auth/login.php");
            } else if(AdminDB::login_is_valid($username, $password)) {
                unset($login_message);
                $_SESSION["is_valid_admin"] = true;
                header("Location: .?action=view-vehicles");
            } else {
                $login_message = "Invalid Credentials";
                require("view/auth/login.php");
            }
            break;
        case "show-login":
            require("view/auth/login.php");
            break;
        case "register":
            require("util/valid_register.php");
            $errors = ValidRegistration::valid_registration($username,$password,$confirm_password);
            if (AdminDB::username_exists($username)) {
                array_push($errors, "The username you entered is already taken.");
            }
            if(!empty($errors)) {
                require("view/auth/register.php");
            } else {
                AdminDB::create($username, $password);
                $_SESSION["is_valid_admin"] = true;
                header("Location: .?action=view-vehicles");
            }
            break;
        case "show-register":
            require("view/auth/register.php");
            break;
        case "logout":
            unset($_SESSION["is_valid_admin"]);
            session_destroy();
            $login_message = "You must login to view this page.";
            require("view/auth/login.php");
            break;
    }