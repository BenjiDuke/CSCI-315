<?php


function login_customer($email) {
    //global $db;
    //$db = new Database();
    $db = Database::getDB();
    $query = 'SELECT * FROM customers
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function get_product($productID) {
    //global $db;
    //$db = new Database();
    $db = Database::getDB();
    $query = 'SELECT * FROM products
              WHERE productID = :productID';
    $statement = $db->prepare($query);
    $statement->bindValue(':productID', $productID);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}


function register_product($customerID, $productCode, $registrationDate) {
    //global $db;
    //$db = new Database();
    $db = Database::getDB();
    $query = 'INSERT INTO registrations
                 (customerID, productCode, registrationDate)
              VALUES
                 (:customerID, :productCode, :registrationDate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':registrationDate', $registrationDate);
    $statement->execute();
    $statement->closeCursor();
}
/*
 * For a date object, go on and make you a 
 * $date = date('Y-m-d');
 */

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