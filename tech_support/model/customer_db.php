<?php
function list_customers() {
    //global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM customers
              ORDER BY customerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

function search_customers($lastName) {
    //global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM customers
              WHERE lastName = :lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

function select_customer($customerID) {
    //global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM customers
              WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function update_customer($customerID, $firstName, $lastName, $address, $city, $state,
                $postalCode, $countryCode, $phone, $email, $password) {
    //global $db;
    $db = Database::getDB();
    $query = 'UPDATE customers
              SET firstName = :firstName, lastName = :lastName, address = :address,
              city = :city, state = :state, postalCode = :postalCode, countryCode = :countryCode,
              phone = :phone, email = :email, password = :password                 
              WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postalCode', $postalCode);
    $statement->bindValue(':countryCode', $countryCode);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();}
    
function list_countries() {
    //global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM countries';
    $statement = $db->prepare($query);
    $statement->execute();
    $countries = $statement->fetchAll();
    $statement->closeCursor();
    return $countries;
}    

/*
function search_customer($lastName) {
    global $db;
    $query = 'SELECT FROM customers
              WHERE lastName = :lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}
 * 
 */

?>