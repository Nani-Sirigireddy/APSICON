<?php
        class Data{
            // Connection
            private $conn;
            // Table
            private $db_table = "event_feed";
            // Columns
        
        
            
            
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
                
    $image_link = "https://apsicon2022.expoconevents.com/event_feed/uploads/";
	$filename = str_replace("@gmail.com","",$user->$posted_by).'.jpg';
    $path="uploads/";
	$image=file_put_contents($path.$filename, $image);
    $image= $image_link.$filename.'?'.rand(1,10);
                // query to insert record of new user signup
                $query = "INSERT INTO
                            " . $this->db_table . "
                        SET
                    image=:image, description=:description, posted_by=:posted_by, posted_date=:posted_date, status=:status, full_name=:full_name, designation=:designation,organisation=:organisation";
    
    
            
                // prepare query
                $stmt = $this->conn->prepare($query);
            
                // sanitize
                   
                    $this->image=htmlspecialchars(strip_tags($this->image));
                    $this->description=htmlspecialchars(strip_tags($this->description));
                    $this->posted_by=htmlspecialchars(strip_tags($this->posted_by));
                    $this->posted_date=htmlspecialchars(strip_tags($this->posted_date));
                    $this->status=htmlspecialchars(strip_tags($this->status));
                    $this->full_name=htmlspecialchars(strip_tags($this->full_name));
                    $this->designation=htmlspecialchars(strip_tags($this->designation));
                    $this->organisation=htmlspecialchars(strip_tags($this->organisation));
                   
                    
                    
                    
                    
                    // bind values
               
                    $stmt->bindParam(":image", $this->image);
                    $stmt->bindParam(":description", $this->description);
                    $stmt->bindParam(":posted_by", $this->posted_by);
                    $stmt->bindParam(":posted_date", $this->posted_date);
                    $stmt->bindParam(":status", $this->status);
                    $stmt->bindParam(":full_name", $this->full_name);
                    $stmt->bindParam(":designation", $this->designation);
                    $stmt->bindParam(":organisation", $this->organisation);
                  
            
                // execute query
                if($stmt->execute()){
                 
                    return true;
                }
            
                return $stmt;
                
            }
        }