<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
     include_once 'leads_db.php';
     include_once 'global_database.php';
    
 $database = new Database();
    $db = $database->getConnection();
    $item = new Data($db);
    
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    
    if($item->getSingleData()){
        // create array
        $emp_arr = array(
                "id" => $item->id,
                "image" =>$item->image,
                "full_name" =>$item->full_name,
                "email" =>$item->email,
                "designation" => $item->designation,
                "organisation" => $item->organisation,
                "bio" =>$item->bio,
                "fb_link" =>$item->fb_link,
                "linkedin_link"=>$item->linkedin_link,
                "twitter_link" =>$item->twitter_link,
                "p_email" => $item->p_email
        );
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      else{
        http_response_code(404);
        echo json_encode("data not found.");
    }
?>
     