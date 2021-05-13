<?php


function get_customer($email) {
    //global $db;
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


function customer_products($customerID) {
    //global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM registrations, products
              WHERE customerID = :customerID AND registrations.productCode = products.productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $products = $statement->fetch();
    $statement->closeCursor();
    return $products;
}



function create_incident($customerID, $productCode, $dateOpened, $title, $description) {
    //global $db;
    $db = Database::getDB();
    $query = 'INSERT INTO incidents
                 (customerID, productCode, dateOpened, title, description)
              VALUES
                 (:customerID, :productCode, :dateOpened, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':dateOpened', $dateOpened);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
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