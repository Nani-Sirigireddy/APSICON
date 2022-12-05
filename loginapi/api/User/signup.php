<?php

// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/user.php';
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// set user property values


$user->full_name = $_REQUEST['full_name']; 
$user->password=$_REQUEST['password'];
$user->email = $_REQUEST['email'];
$user->image = $_REQUEST['image'];
$user->designation = $_REQUEST['designation'];
$user->organisation = $_REQUEST['organisation'];
$user->bio = $_REQUEST['bio'];
$user->fb_link = $_REQUEST['fb_link'];
$user->linkedin_link =  $_REQUEST['linkedin_link'];
$user->twitter_link= $_REQUEST['twitter_link'];

// create the user
if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully signup!",
        "full_name" => $user->full_name,
        "email" => $user->email,
        "password" => $user->password,
        "designation" => $user->designation,
        "organisation" => $user->organisation,
    
    );
     http_response_code(200);
    print_r(json_encode($user_arr));
}

else{
    $user_arr=array(
        "status" => false,
        "message" => "email already exists"
    );
     http_response_code(404);
    print_r(json_encode($user_arr));
}

?>