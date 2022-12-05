<?php
  header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
	header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies
	header("Content-Type: application/json; charset=utf-8");
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
 

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);

// set ID property of user to be edited
$user->email = isset($_REQUEST['email']) ? $_REQUEST['email'] : die();
$user->password = isset($_REQUEST['password']) ? $_REQUEST['password'] : die();

// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "status" => true,
        "id" => $row['id'],
        "full_name" => $row['full_name'],
        "email"=>$row['email'],
        "image"=>$row['image'],
        "designation"=>$row['designation'],
        "organisation"=>$row['organisation'],
        "bio"=>$row['bio'],
        "fb_link"=>$row['fb_link'],
        "linkedin_link"=>$row['linkedin_link'],
        "twitter_link"=>$row['twitter_link'],
      "inv_status"=>$row['p_status']
    );
    http_response_code(200);
    print_r(json_encode($user_arr));
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid email please try agin with valid one!",
    );
    http_response_code(404);
    print_r(json_encode($user_arr));
}

?>