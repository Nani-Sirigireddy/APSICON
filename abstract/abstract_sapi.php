<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
     include_once 'abstract_db.php';
     include_once 'global_database.php';
    
    $database = new Database();
    $db = $database->getConnection();
    $item = new Data($db);
      $url="https://app.isntnde.in/";
    $folder="abstract/uploads/";
    
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
 
    $item->getSingleData();

    if($item->title != null){
        // create array
        $emp_arr = array(
            "id" =>  $item->id,
            "title" =>$item->title,
            "pdf" =>  $url.$folder.$item->pdf,
            "status" => $item->status
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      else{
        http_response_code(404);
        echo json_encode("data not found.");
    }
     
?>