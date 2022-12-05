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
 
$user = new Data($db);
 
// set user property values


$user->full_name = $_REQUEST['full_name']; 
$user->email = $_REQUEST['email'];
$user->designation = $_REQUEST['designation'];
$user->organisation = $_REQUEST['organisation'];
$user->bio = $_REQUEST['bio'];
$user->fb_link = $_REQUEST['fb_link'];
$user->linkedin_link =  $_REQUEST['linkedin_link'];
$user->twitter_link= $_REQUEST['twitter_link'];
$user->p_email= $_REQUEST['p_email'];

    
    if($user->insert()){
        print_r(json_encode($user));
    } else{
        print_r(json_encode($item));
    }
?>