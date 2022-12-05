<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
  
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/user.php';
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
                "image" => $image,
                "full_name" => $full_name,
                "email" => $email,
                "designation" => $designation,
                "organisation" => $organisation,
                "bio" => $bio,
                "fb_link" =>$fb_link,
                "linkedin_link"=>$linkedin_link,
                "twitter_link" => $twitter_link,
                "inv_status"=>$p_status
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