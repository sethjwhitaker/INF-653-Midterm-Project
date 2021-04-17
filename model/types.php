<?php

class TypesDB {
    public static function create($name) {
        $db = Database::getDB();

        $count = 0;
        $query = "INSERT INTO types (name)
                    VALUES (:name)";

        $statement = $db->prepare($query);
        $statement->bindvalue(":name", $name);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

    public static function read() {
        $db = Database::getDB();

        $query = "SELECT * FROM types ORDER BY name";

        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    public static function update($id, $name) {
        $db = Database::getDB();

        $count = 0;
        $query = "UPDATE types SET name = :name
                    WHERE type_id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindvalue(":name", $name);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

    public static function delete($id) {
        $db = Database::getDB();

        $count = 0;
        $query = "DELETE FROM types WHERE type_id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }
}