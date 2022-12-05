<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once 'speaker_db.php';
    include_once 'global_database.php';
    
 $database = new Database();
    $db = $database->getConnection();
    $item = new Data($db);
    
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
  $url="https://app.isntnde.in/";
    $folder="speaker/uploads/";
  
    $item->getSingleData();
    if($item->full_name != null){
        // create array
        
        $data_arr = array(
            "id" => $item->id,
            "full_name" => $item->full_name,
            "image"   => $url.$folder.$item->image,
            "designation"=>$item->designation,
            "organisation" => $item->organisation,
            "bio"=>$item->bio
        );   
      
        http_response_code(200);
        echo json_encode($data_arr);
    }
      else{
        http_response_code(404);
        echo json_encode("data not found.");
    }

?>