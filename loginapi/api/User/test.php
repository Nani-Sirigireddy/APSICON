<?php

/* An invalid JSON string. */
$json = 
'
{
 "Invalid element (no value)"
}
';
try
{
 $jsonData = json_decode($json, FALSE, 512, JSON_THROW_ON_ERROR);
}
catch (JsonException $je)
{
 echo 'Error decoding JSON.<br>';
 echo 'Error number: ' . $je->getCode() . '<br>';
 echo 'Error message: ' . $je->getMessage();
}
?>