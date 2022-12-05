<?php 
    class Database {
        private $host = "localhost";
        private $database_name = "drmarket_nde_app_data";
        private $username = "drmarket_nde_app_data";
        private $password = "Assam123#@!";
        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>