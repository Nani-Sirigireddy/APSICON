<?php

/*

    Purpose:- User Class to manage actions: Login and SignUp with user details.
*/

class Data{
 
    // database connection and table name
   // Connection
        private $conn;
        // Table
        private $table_name = "feedback";
       
   public $email;
   public $rating;
   public $feedback;
   public $created_on;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //user signup method
     function feedback(){
       
                    $query = "INSERT INTO " . $this->table_name ."  SET
                        email= :email, rating= :rating,feedback= :feedback,created_on= :created_on";
     
     
                    // prepare query
                    $stmt = $this->conn->prepare($query);
                    
       // sanitize
             $this->email=htmlspecialchars(strip_tags($this->email));
             $this->rating=htmlspecialchars(strip_tags($this->rating));
             $this->feedback=htmlspecialchars(strip_tags($this->feedback));
             $this->created_on=htmlspecialchars(strip_tags($this->created_on));
                
        
            
            // bind values
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":rating", $this->rating);
            $stmt->bindParam(":feedback", $this->feedback);
            $stmt->bindParam(":created_on", $this->created_on);
                    $stmt->execute();
                    
                    return $stmt;
    }
}
    ?>