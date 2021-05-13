<?php
function list_technicians() {
    //global $db;
    $db = new Database();
    $query = 'SELECT * FROM technicians
              ORDER BY techID';
    $statement = $db->prepare($query);
    $statement->execute();
    $technicians = $statement->fetchAll();
    $statement->closeCursor();
    return $technicians;
}


function delete_technician($techID) {
    //global $db;
    $db = new Database();
    $query = 'DELETE FROM technicians
              WHERE techID = :techID';
    $statement = $db->prepare($query);
    $statement->bindValue(':techID', $techID);
    $statement->execute();
    $statement->closeCursor();
}

function add_technician($firstName, $lastName, $email, $phone, $password) {
    //global $db;
    $db = new Database();
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
?>