<?php
require('../model/database_oo.php');
require('../model/incident_db.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'get_customer';
    }
}

if ($action == 'get_customer') {
        
    //$customers = list_customers();
    include('get_customer.php');
}

else if ($action == 'select_customer') {
    $email = filter_input(INPUT_POST, 'email');  
    
    if ($email == NULL) {
        $error = "Invalid email address. Check the field and try again.";
        include('../errors/error.php');
    } else { 
        $customer = get_customer($email);
        
        // This function used to get customer produce, customer_products,
        // is not working with the for loop in create_incident.php
        // Gives error for illegal string offset. SQL query works on db.
        // $products = customer_products($customer['customerID']);
        
        $products = list_products();
        
        include('create_incident.php');
                        
    }
}    
else if ($action =='create_incident') {
    $customerID = filter_input(INPUT_POST, 'customerID');
    $productCode = filter_input(INPUT_POST, 'productCode');
    $dateOpened = date('Y-m-d H:i:s');
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    
    create_incident($customerID, $productCode, $dateOpened, $title, $description);    
    
    include('incident_success.php');
}



else {
    $action = 'under_construction';
    include('../under_construction.php');
}
    


?>