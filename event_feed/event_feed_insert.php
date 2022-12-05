<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    date_default_timezone_set("Asia/Kolkata");
include_once 'event_feed_db.php';
include_once 'global_database.php';

$database = new Database();
$db = $database->getConnection();
 
$user = new Data($db);
 
// set user property values


$user->id = $_REQUEST['id']; 
$user->image = $_REQUEST['image']; 
// $e_i=base64_decode($_REQUEST['image']);
// $image_link = "https://apsicon2022.expoconevents.com/event_feed/uploads/";
//             	$filename = "IMG_APISCON".rand(1,10000).'.jpg';
//                 $path="uploads/";
//             	$image=file_put_contents($path.$filename, $e_i);
                
// $user->image =  $image_link.$filename.'?'.rand(1,10);


$user->description = $_REQUEST['description'];
$user->posted_by = $_REQUEST['posted_by'];
$user->posted_date =  date('d-m-Y H:i:s');
$user->status = $_REQUEST['status'];
$user->full_name =  $_REQUEST['full_name'];
$user->designation= $_REQUEST['designation'];
$user->organisation= $_REQUEST['organisation'];

    
    if($user->insert()){
        print_r(json_encode($user));
    } else{
        print_r(json_encode($user));
    }
?>