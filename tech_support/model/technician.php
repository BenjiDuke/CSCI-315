<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of technician
 *
 * @author Benjamin
 */
class technician {
    private $techID;
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $password;
    
    public function __construct($techID, $firstName, $lastName, $email, $phone, $password) {
        $this->techID = $techID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
                
    }
    
    public function getID(){
        return $this->techID;
    }
    
    public function getName(){
        return $this->firstName . " " . $this->lastName;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getPhone(){
        return $this->phone;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    
}
