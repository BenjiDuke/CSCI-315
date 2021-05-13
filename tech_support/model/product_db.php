<?php
declare(strict_types=1);
function list_products() {
    //$db = new Database();
    $db = Database::getDB();
    $query = 'SELECT * FROM products
              ORDER BY productCode';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}


function delete_product($productCode) {
    //$db = new Database();
    $db = Database::getDB();
    $query = 'DELETE FROM products
              WHERE productCode = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

function add_product(string $productCode, string $name, float $version, string $releaseDate) {
    //$db = new Database();
    $db = Database::getDB();
    $query = 'INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 (:productCode, :name, :version, :releaseDate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':releaseDate', $releaseDate);
    $statement->execute();
    $statement->closeCursor();
}
?>