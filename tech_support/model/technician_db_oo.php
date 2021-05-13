<?php

class TechnicianDB {
    static function list_technicians() {
        //global $db;
        //$db = new Database();
        $db = Database::getDB();
        $query = 'SELECT * FROM technicians
                  ORDER BY techID';
        $statement = $db->prepare($query);
        $statement->execute();
        $technicians = $statement->fetchAll();
        $statement->closeCursor();
        $data = array();
        foreach ($technicians as $tech) :         
            $newTech = new technician($tech['techID'], $tech['firstName'],                 
                        $tech['lastName'], $tech['email'], $tech['phone'], 
                        $tech['password']);
        //array_append($data, $newTech);
        $data[] = $newTech;
        endforeach;
         
    return $data;
}


    static function delete_technician($techID) {
        //global $db;
        //$db = new Database();
        $db = Database::getDB();
        $query = 'DELETE FROM technicians
                  WHERE techID = :techID';
        $statement = $db->prepare($query);
        $statement->bindValue(':techID', $techID);
        $statement->execute();
        $statement->closeCursor();
    }

    static function add_technician($firstName, $lastName, $email, $phone, $password) {
        //global $db;
        //$db = new Database();
        $db = Database::getDB();
        $query = 'INSERT INTO technicians
                     (firstName, lastName, email, phone, password)
                  VALUES
                     (:firstName, :lastName, :email, :phone, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>