<?php
     header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
  
  include_once 'global_database.php';

    $email=$_POST['email'];

    $image = base64_decode($_POST['image']);
	$image_link = "https://app.isntnde.in/api/loginapi/api/profile/uploads/";
	$filename = str_replace("@gmail.com","",$email).'.jpg';

    $path="uploads/";
	$image=file_put_contents($path.$filename, $image);
	$image_1= $image_link.$filename;

$sql = "UPDATE  `users` set `image`=$image_link$filename.'?'.'rand(1,10)' where email=?";
    $qry = mysqli_query($conn,  $sql);
    if($qry) {
                echo "updated";
             }

    $e = array("url" =>$image_1);
        echo json_encode($e);
	?>