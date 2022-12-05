<?php
        class Data{
            // Connection
            private $conn;
            // Table
            private $db_table = "leads";
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
            public $p_email;
        
            
            
            // Db connection
            public function __construct($db){
                $this->conn = $db;
            }
                 public function getData(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
    
     
    
            function insert(){
    
                // query to insert record of new user signup
                $query = "INSERT INTO
                            " . $this->db_table . "
                        SET
                    full_name=:full_name, email=:email, image=:image, designation=:designation, organisation=:organisation, bio=:bio, fb_link=:fb_link, linkedin_link=:linkedin_link,twitter_link=:twitter_link,p_email=:p_email";
    
    
            
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
                    $this->p_email=htmlspecialchars(strip_tags($this->p_email));
                    
                    
                    
                    
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
                    $stmt->bindParam(":p_email", $this->p_email);
            
                // execute query
                if($stmt->execute()){
                 
                    return true;
                }
            
                return $stmt;
                
            }
        }