<?php
$db_host = "localhost:3307";
$db_user = "root";
$db_password = "";
$db_name = "lms_db";

//create connection
$conn = new mysqli($db_host,$db_user,$db_password,$db_name);

//check connection
if($conn->connect_error){
    die("connection failed");
}
//else{
//    echo "connected";
//}
?>