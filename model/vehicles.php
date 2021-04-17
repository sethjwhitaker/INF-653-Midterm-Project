<?php

class VehiclesDB {

    public static function create($make_id, $type_id, $class_id, $model, $year, $price) {
        $db = Database::getDB();
        
        $count = 0;
        $query = "INSERT INTO vehicles (make_id, type_id, class_id, model, year, price)
                    VALUES (:make_id, :type_id, :class_id, :model, :year, :price)";

        $statement = $db->prepare($query);
        $statement->bindvalue(":make_id", $make_id);
        $statement->bindvalue(":type_id", $type_id);
        $statement->bindvalue(":class_id", $class_id);
        $statement->bindvalue(":model", $model);
        $statement->bindvalue(":year", $year);
        $statement->bindvalue(":price", $price);

        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

    public static function read($make_id, $type_id, $class_id, $sortby) {
        $db = Database::getDB();
        
        $query = "SELECT vehicle_id, m.name make, t.name type, c.name class, model, year, concat('$', format(price, 2)) price
                    FROM vehicles v 
                    JOIN makes m ON v.make_id = m.make_id
                    JOIN types t ON v.type_id = t.type_id
                    JOIN classes c ON v.class_id = c.class_id";

        $sortby_str = " ORDER BY v.price DESC";
        if($sortby === "year") {
            $sortby_str = " ORDER BY year DESC";
        }

        $statement;

        if(!empty($make_id)) {
            $query .= " WHERE v.make_id = :make_id" . $sortby_str;
            $statement = $db->prepare($query);
            $statement->bindvalue(":make_id", $make_id);
        } else if(!empty($type_id)) {
            $query .= " WHERE v.type_id = :type_id" . $sortby_str;
            $statement = $db->prepare($query);
            $statement->bindvalue(":type_id", $type_id);
        } else if(!empty($class_id)) {
            $query .= " WHERE v.class_id = :class_id" . $sortby_str;
            $statement = $db->prepare($query);
            $statement->bindvalue(":class_id", $class_id);
        } else {
            $query .= $sortby_str;
            $statement = $db->prepare($query);
        }
        
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    public static function delete($id) {
        $db = Database::getDB();
        
        $count = 0;
        $query = "DELETE FROM vehicles WHERE vehicle_id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

}