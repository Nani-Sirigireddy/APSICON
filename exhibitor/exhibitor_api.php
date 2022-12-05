<?php
   
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'exhibitor_db.php';
    include_once 'global_database.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Data($db);
    $stmt = $items->getData();
    $itemCount = $stmt->rowCount();
 
    $image=image;

  
    if($itemCount > 0){
        
        $dataArr = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "full_name" => $full_name,
                "image"   => $image,
                "stall"=>$stall,
                "bio"=>$bio
            );
            array_push($dataArr, $e);
        }
        echo json_encode($dataArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "data not found.")
        );
    }
?>