<?php

class Database {
    private static $dsn = 'mysql:host=localhost;dbname=tech_support'; 
    private static $username = 'ts_user'; 
    private static $password = 'pa55word'; 
    private static $db;
    
    public function __construct() {
        
    }
       
    public function prepare($query){
        return $this->db->prepare($query);
    }
    
    public static function getDB() { 
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                    self::$username, 
                                    self::$password);
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('../errors/database_error.php'); 
                    exit();
                }
        } 
        return self::$db;
        } 
}
?>