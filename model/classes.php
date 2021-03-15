<?php
    function class_create($name) {
        global $db;

        $count = 0;
        $query = "INSERT INTO classes (name)
                    VALUES (:name)";

        $statement = $db->prepare($query);
        $statement->bindvalue(":name", $name);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

    function class_read() {
        global $db;

        $query = "SELECT * FROM classes ORDER BY name";

        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    function class_update($id, $name) {
        global $db;

        $count = 0;
        $query = "UPDATE classes SET name = :name
                    WHERE class_id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindvalue(":name", $name);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

    function class_delete($id) {
        global $db;

        $count = 0;
        $query = "DELETE FROM classes WHERE class_id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }