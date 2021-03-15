<?php
    function type_create($name) {
        global $db;

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

    function type_read() {
        global $db;

        $query = "SELECT * FROM types ORDER BY name";

        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    function type_update($id, $name) {
        global $db;

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

    function type_delete($id) {
        global $db;

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