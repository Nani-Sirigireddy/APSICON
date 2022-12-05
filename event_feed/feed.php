<?php
     header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
  
  include_once 'global_database.php';

    $posted_by=$_POST['posted_by'];

   $e_i=base64_decode($_REQUEST['image']);
$image_link = "https://apsicon2022.expoconevents.com/event_feed/uploads/";
            	$filename = "IMG_APISCON".rand(1,10000).'.jpg';
                $path="uploads/";
            	$image=file_put_contents($path.$filename, $e_i);
                
$image =  $image_link.$filename.'?'.rand(1,10);

$sql = "UPDATE  `event_feed` set `image`=$image where `posted_by`=?";
    $qry = mysqli_query($conn,  $sql);
    if($qry) {
                echo "updated";
             }

    $e = array("url" =>$image);
        echo json_encode($e);
	?>