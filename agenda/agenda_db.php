<?php

/*

    Purpose:- User Class to manage actions: Login and SignUp with user details.
*/

class User{
 
    // database connection and table name
   // Connection
        private $conn;
        // Table
        private $table_name = "agenda";

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



         public function getData(){
            $sqlQuery = "SELECT * FROM " . $this->table_name . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
}

?>