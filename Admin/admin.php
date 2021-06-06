<?php
if(!isset($_SESSION)){
    session_start();
}

// COnnect to database
include_once('../dbConnection.php');

//Verify Admin login 
if(!isset($_SESSION['is_login'])){
if(isset($_POST['checkLogemail']) && isset($_POST['admLogEmail']) && isset($_POST['admLogPass'])){
    $admLogEmail = $_POST['admLogEmail'];
    $admLogPass = $_POST['admLogPass'];

    $sql = "SELECT admin_email, admin_pass FROM admin WHERE admin_email = '".$admLogEmail."' AND admin_pass = '".$admLogPass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;

    if($row === 1){
        $_SESSION['is_admin_login'] = true;
        $_SESSION['admLogEmail'] = $admLogEmail;
        echo json_encode($row);
    }else if($row === 0){
        echo json_encode($row);
    }
}
}
?>