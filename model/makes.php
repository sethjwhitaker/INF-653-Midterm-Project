<?php
    function make_create($name) {
        global $db;

        $count = 0;
        $query = "INSERT INTO makes (name)
                    VALUES (:name)";

        $statement = $db->prepare($query);
        $statement->bindvalue(":name", $name);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

    function make_read() {
        global $db;

        $query = "SELECT * FROM makes ORDER BY name";

        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    function make_update($id, $name) {
        global $db;

        $count = 0;
        $query = "UPDATE makes SET name = :name
                    WHERE make_id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindvalue(":name", $name);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

    function make_delete($id) {
        global $db;

        $count = 0;
        $query = "DELETE FROM makes WHERE make_id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }