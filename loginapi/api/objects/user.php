<?php

/*

    Purpose:- User Class to manage actions: Login and SignUp with user details.
*/

class User{
 
    // database connection and table name
   // Connection
        private $conn;
        // Table
        private $table_name = "users";
        // Columns
        public $full_name;
        public $email;
        public $image;
        public $organisation;
        public $designation;
        public $bio;
        public $fb_link;
        public $linkedin_link;
        public $twitter_link;
  
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



    //user signup method
    function signup(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record of new user signup
        $query = "INSERT INTO
                    " . $this->table_name . "
               SET
                    full_name=:full_name, password=:password,email=:email, image=:image, designation=:designation, organisation=:organisation, bio=:bio, fb_link=:fb_link, linkedin_link=:linkedin_link,twitter_link=:twitter_link";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->full_name=htmlspecialchars(strip_tags($this->full_name));
         $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->designation=htmlspecialchars(strip_tags($this->designation));
        $this->organisation=htmlspecialchars(strip_tags($this->organisation));
        $this->bio=htmlspecialchars(strip_tags($this->bio));
        $this->fb_link=htmlspecialchars(strip_tags($this->fb_link));
        $this->linkedin_link=htmlspecialchars(strip_tags($this->linkedin_link));
        $this->twitter_link=htmlspecialchars(strip_tags($this->twitter_link));
      

    
        // bind values
        $stmt->bindParam(":full_name", $this->full_name);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":designation", $this->designation);
        $stmt->bindParam(":organisation", $this->organisation);
        $stmt->bindParam(":bio", $this->bio);
        $stmt->bindParam(":fb_link", $this->fb_link);
        $stmt->bindParam(":linkedin_link", $this->linkedin_link);
        $stmt->bindParam(":twitter_link", $this->twitter_link);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }
         public function getData(){
            $sqlQuery = "SELECT * FROM " . $this->table_name . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        
           public function viewData(){
            $sqlQuery = "SELECT * FROM " . $this->db_name . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        
        
         

    function modify_data(){
       
                    $query = "UPDATE " . $this->table_name ."  SET
                        full_name=:full_name,image=:image , email=:email, designation=:designation, organisation=:organisation, bio=:bio, fb_link=:fb_link, linkedin_link=:linkedin_link,twitter_link=:twitter_link WHERE email=:email";
     
                    // prepare query
                    $stmt = $this->conn->prepare($query);

                    // sanitize
                    $this->full_name=htmlspecialchars(strip_tags($this->full_name));
                    $this->email=htmlspecialchars(strip_tags($this->email));
                    $this->image=htmlspecialchars(strip_tags($this->image));
                    $this->designation=htmlspecialchars(strip_tags($this->designation));
                    $this->organisation=htmlspecialchars(strip_tags($this->organisation));
                    $this->bio=htmlspecialchars(strip_tags($this->bio));
                    $this->fb_link=htmlspecialchars(strip_tags($this->fb_link));
                    $this->linkedin_link=htmlspecialchars(strip_tags($this->linkedin_link));
                    $this->twitter_link=htmlspecialchars(strip_tags($this->twitter_link));



                    // bind values
                    $stmt->bindParam(":full_name", $this->full_name);
                    $stmt->bindParam(":email", $this->email);
                    $stmt->bindParam(":image", $this->image);
                    $stmt->bindParam(":designation", $this->designation);
                    $stmt->bindParam(":organisation", $this->organisation);
                    $stmt->bindParam(":bio", $this->bio);
                    $stmt->bindParam(":fb_link", $this->fb_link);
                    $stmt->bindParam(":linkedin_link", $this->linkedin_link);
                    $stmt->bindParam(":twitter_link", $this->twitter_link);
                    $stmt->execute();
                    
                    return $stmt;
    }

    // login user method
    function login(){
        // select all query with user inputed username and password
        $query = "SELECT
                    `id`,`full_name`,`email`,`image`,`designation`,`organisation`,`bio`,`fb_link`,`linkedin_link`,`twitter_link`,`p_status`
                FROM
                    " . $this->table_name . " 
                WHERE
                    email='".$this->email."' and  password='".$this->password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    //Notify if User with given username Already exists during SignUp
    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                email='".$this->email."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}