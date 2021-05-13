<?php
require('../model/database_oo.php');
require('../model/customer_db.php');

$db = new Database();

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL ){
    $action = filter_input(INPUT_GET, 'action');
         if ($action === NULL) {
        $action = 'list_customers';
         }
}

         
switch ($action){
            
    case 'list_customers':
        include('customer_list.php');
        break;
        
        
    case 'customer_search' :
        $lastName = filter_input(INPUT_POST, 'lastName');    
         if ($lastName == NULL) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
         } else { 
        $customers = search_customers($lastName);
        include('customer_list.php');
        }
        break;
        
    case 'select_customer':
        $customerID = filter_input(INPUT_POST, 'customerID');

    if ( $customerID == NULL ) {
        $error = "Missing or incorrect customer ID.";
        include('../errors/error.php');
    } else { 
        $customer = select_customer($customerID);
        $countries = list_countries();
        include('customer_select.php');
        }
        break;
    
    case 'update_customer' :
        $customerID = filter_input(INPUT_POST, 'customerID');
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $postalCode = filter_input(INPUT_POST, 'postalCode');
        $countryCode = filter_input(INPUT_POST, 'countryCode');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if (    $customerID == NULL || $firstName == NULL ||  $lastName == NULL || 
            $address == NULL || $city == NULL ||
            $state == NULL || $postalCode == NULL ||
            $countryCode == NULL || $phone == NULL ||
            $email == NULL || $password == NULL) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        update_customer($customerID, $firstName, $lastName, $address, $city, $state,
                $postalCode, $countryCode, $phone, $email, $password);
        header("Location: .");
    }
        break;

    default:
        $action = 'under_construction';
        include('../under_construction.php');
        break;
    
        
}
    
/*        

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_customers';
    }
}

if ($action == 'list_customers') {
    
    
    //$customers = list_customers();
    include('customer_list.php');
}

else if ($action == 'customer_search') {
    $lastName = filter_input(INPUT_POST, 'lastName');    
    if ($lastName == NULL) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        $customers = search_customers($lastName);
        include('customer_list.php');
                
    }
}    

else if ($action == 'select_customer') {
    $customerID = filter_input(INPUT_POST, 'customerID');

    if ( $customerID == NULL ) {
        $error = "Missing or incorrect customer ID.";
        include('../errors/error.php');
    } else { 
        $customer = select_customer($customerID);
        $countries = list_countries();
        include('customer_select.php');
        
    }
}

else if ($action == 'update_customer') {
    $customerID = filter_input(INPUT_POST, 'customerID');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postalCode = filter_input(INPUT_POST, 'postalCode');
    $countryCode = filter_input(INPUT_POST, 'countryCode');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if (    $customerID == NULL || $firstName == NULL ||  $lastName == NULL || 
            $address == NULL || $city == NULL ||
            $state == NULL || $postalCode == NULL ||
            $countryCode == NULL || $phone == NULL ||
            $email == NULL || $password == NULL) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        update_customer($customerID, $firstName, $lastName, $address, $city, $state,
                $postalCode, $countryCode, $phone, $email, $password);
        header("Location: .");
    }
}    


else {
    $action = 'under_construction';
    include('../under_construction.php');
}
    
*/

?>