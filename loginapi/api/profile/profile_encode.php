<?php
// Define local path or URL of our image
$img_file = $_POST['image'];

// Load file contents into variable
$bin = file_get_contents($img_file);

// Encode contents to Base64
$b64 = base64_encode($bin);
