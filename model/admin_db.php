<?php
class AdminDB {
    public static function create($username, $password) {
        $db = Database::getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO administrators (username, password)
                    VALUES (:username, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":password", $hash);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function login_is_valid($username, $password) {
        $db = Database::getDB();
        $query = "SELECT password FROM administrators
                    WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->execute();
        $data = $statement->fetch();
        $statement->closeCursor();
        if (!empty($data)) {
            $hash = $data["password"];
            return password_verify($password, $hash);
        } else {
            return false;
        }
    }

    public static function username_exists($username) {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) as num FROM administrators 
                    WHERE username LIKE :username";
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->execute();
        $data = $statement->fetch();
        $statement->closeCursor();

        if($data["num"]) {
            return true;
        } else {
            return false;
        }
    }
        
}       

