<?php
      header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $link = mysqli_connect("localhost", "drmarket_nde_app_data", "Assam123#@!", "drmarket_nde_app_data");
    include_once 'global_database.php';
    include_once 'feedback_db.php';
    date_default_timezone_set("Asia/Calcutta");
    $database = new Database();
    $db = $database->getConnection();
    $item = new Data($db);
   
    $email=$_REQUEST['email'];
     $rating=$_REQUEST['rating'];
    $feedback=$_REQUEST['feedback'];
    $created_on= date('H:i:s A');
  
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO `feedback` (`id`,`email`,`feedback`,`rating`,`created_on`) VALUES ('','$email','$feedback','$rating','$created_on')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>