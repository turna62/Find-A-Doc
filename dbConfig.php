<?php  
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "";  
$dbPassword = "";  
$dbName     = "";  
  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}