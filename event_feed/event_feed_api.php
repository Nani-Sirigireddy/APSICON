<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'event_feed_db.php';
    include_once 'global_database.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Data($db);
    $stmt = $items->getData();
   
    $itemCount = $stmt->rowCount();

  
    if($itemCount > 0){
        
        $dataArr = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "image" => $image,
                "description" => $description,
                "posted_by" => $posted_by,
                "posted_date" => $posted_date,
                "status" => $status,
                "full_name" => $full_name,
                "designation" =>$designation,
                "organisation"=>$organisation
              
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