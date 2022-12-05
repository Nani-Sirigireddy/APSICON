<?php
  header("Access-Control-Allow-Origin: *"); 
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/user.php';
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);  
 
// set user property values


$user->full_name = $_REQUEST['full_name']; 
$user->email = $_REQUEST['email'];
$user->image ="https://".$_REQUEST['image'];
$user->designation = $_REQUEST['designation'];
$user->organisation = $_REQUEST['organisation'];
$user->bio = $_REQUEST['bio'];
$user->fb_link = $_REQUEST['fb_link'];
$user->linkedin_link =  $_REQUEST['linkedin_link'];
$user->twitter_link= $_REQUEST['twitter_link'];

// create the user
if($user->modify_data()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully update!",
        "full_name" => $user->full_name,
        "email" => $user->email,
        "image" => $user->image."?".rand(0,10),
        "designation" => $user->designation,
        "organisation" => $user->organisation,
        "bio" => $user->bio,
        "fb_link" => $user->fb_link,
        "linkedin_link" => $user->linkedin_link,
        "twitter_link" => $user->twitter_link
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "nothing got updated"
    );
}
print_r(json_encode($user_arr));
?>