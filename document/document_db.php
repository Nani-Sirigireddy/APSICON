<?php
    class Data{
        // Connection
        private $conn;
        // Table
        private $db_table = "documents";
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
        // READ single
       public function getSingleData(){
          $sqlQuery = "SELECT
                        id, 
                        title, 
                        pdf,
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
            $this->pdf = $dataRow['pdf'];
            $this->status = $dataRow['status'];
        }  
     
    
    }
?>