<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
  
// get database connection
include_once 'global_database.php';
 
// instantiate user object
include_once 'agenda_db.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new User($db);
    $stmt = $items->getData();
   
//   echo json_encode($stmt);
//   die();
    $itemCount = $stmt->rowCount();
  
    if($itemCount > 0){
        
        $dataArr = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "day" => $day,
                "title" => $title,
                "time" => $time,
                "venue" => $venue,
            );
           
            array_push($dataArr, $e);
        } 
        http_response_code(200);
        echo json_encode($dataArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>