<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'leads_db.php';
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
            $e = array("$p_email"=>array(
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
              
            ));
            
           
           
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