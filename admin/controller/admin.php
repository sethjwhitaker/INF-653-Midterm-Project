<?php
    $username = filter_input(INPUT_POST, "username",  FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password",  FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, "confirm_password",  FILTER_SANITIZE_STRING);

    
    switch($action) {
        case "login":
            if(empty($username) && empty($password)) {
                require("view/auth/login.php");
            } else if(admin_login_is_valid($username, $password)) {
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
            $errors = valid_registration($username,$password,$confirm_password);
            if(!empty($errors)) {
                require("view/auth/register.php");
            } else {
                admin_create($username, $password);
                $_SESSION["is_valid_admin"] = true;
                header("Location: .?action=view-vehicles");
            }
            break;
        case "show-register":
            require("view/auth/register.php");
            break;
        case "logout":

            break;
    }