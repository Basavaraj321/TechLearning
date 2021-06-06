<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('dbConnection.php');

if(!isset($_SESSION['is_login'])){
    echo "<script> location.href='http://localhost/TechLearning/index.php'; </script>";
    
}
else{
    $stuEmail = $_SESSION['stuLogEmail'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    if(isset($_POST['ORDER_ID']) && isset($_POST['TXN_AMOUNT'])){
     $order_id = $_POST['ORDER_ID'];
     $stu_email = $_SESSION['stuLogEmail'];
     $stu_class = $_POST['class'];
     $status = "Success";
     $respmsg = "Done";
     $fee = "Paid";
     $amount = $_POST['TXN_AMOUNT'];
     $date = $date;
     $sql1 = "UPDATE student SET stu_fee_status = '$fee' WHERE stu_email = '$stu_email'";
     $sql2 = "INSERT INTO courseorder(order_id, stu_email, stu_class, status, respmsg, amount, order_date) VALUES ('$order_id', '$stu_email', '$stu_class', '$status', '$respmsg', '$amount', '$date')";
     if($conn->query($sql1) == TRUE && $conn->query($sql2) == TRUE){
        echo "Redirecting to My Profile....";
        echo "<script> setTimeout(() => {
        window.location.href = './Student/learn.php';
        }, 2000); </script>";
        };
        } else {
        echo "<b>Transaction status is failure</b>" . "<br/>";
        }
        }
?>

