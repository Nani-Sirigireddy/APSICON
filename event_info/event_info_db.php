<?php
    class Data{
        // Connection
        private $conn;
        // Table
        private $db_table = "event_info";
        // Columns
        public $id;
        public $sl;
        public $title;
        public $details;
        public $image;
        public $status;
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getData(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createData(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        sl = :sl, 
                        title = :title, 
                        details = :details, 
                         image = :image, 
                        status = :status";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->sl=htmlspecialchars(strip_tags($this->sl));
            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->details=htmlspecialchars(strip_tags($this->details));
            $this->image=htmlspecialchars(strip_tags($this->image));
            $this->status=htmlspecialchars(strip_tags($this->status));
        
            // bind data
            $stmt->bindParam(":sl", $this->sl);
            $stmt->bindParam(":title", $this->email);
            $stmt->bindParam(":details", $this->age);
            $stmt->bindParam(":image", $this->designation);
            $stmt->bindParam(":status", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        
        // READ single
       public function getSingleData(){
          $sqlQuery = "SELECT
                        id, 
                        title, 
                        details, 
                        image, 
                        status
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->title = $dataRow['title'];
            $this->details = $dataRow['details'];
            $this->image = $dataRow['image'];
            $this->status = $dataRow['status'];
        }        
        // UPDATE
        public function updateData(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                       sl = :sl, 
                        title = :title, 
                        details = :details, 
                         image = :image, 
                        status = :status
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->designation=htmlspecialchars(strip_tags($this->designation));
            $this->created=htmlspecialchars(strip_tags($this->created));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":sl", $this->sl);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":details", $this->details);
            $stmt->bindParam(":image", $this->image);
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteData(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>