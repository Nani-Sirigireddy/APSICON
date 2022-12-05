<?php
    class Data{
        // Connection
        private $conn;
        // Table
        private $db_table = "exhibitors";
        // Columns
        public $id;
        public $full_name;
        public $image;
        public $stall;
        public $bio;
        
        
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
        // READ single
       public function getSingleData(){
          $sqlQuery = "SELECT
                        id, 
                       full_name,
                       image,
                       stall,
                       bio
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->full_name = $dataRow['full_name'];
            $this->image = $dataRow['image'];
            $this->stall = $dataRow['stall'];
            $this->bio=$dataRow['bio'];

        }  
     
    
    }
?>