<?php
if(!isset($_SESSION)){
    session_start();
}

include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
}
//else{
  //  echo "<script> location.href='http://localhost/TechLearning/index.php'; </script>";
//}
if(isset($stuLogEmail)){
$sql = "SELECT stu_img,stu_name FROM student WHERE stu_email = '$stuLogEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $stu_img =  $row['stu_img'];
    $stu_name = $row['stu_name'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Dashborad</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/TechLearning/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="http://localhost/TechLearning/css/all.min.css">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="Stylesheet" href="http://localhost/TechLearning/css/stustyle.css">
    
</head>
<body>
<!-- Top Nav Bar -->
<nav class="navbar navbar-dark fixed-top p-3 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-5 col-md-3 mr-0" href="studentProfile.php"> Welcome <small class="text-white" style="font-size:20px"><?php echo $stu_name ?> </small></a>
</nav>

<div class="container-fluid mb-5" style="margin-top:60px;">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                    <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentProfile.php"><i class="fas fa-user"></i> Profile <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="learn.php"><i class="fab fa-accessible-icon"></i> My Subjects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stuassignment.php"><i class="fab fa-accessible-icon"></i> Assignments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stuChangePassword.php"><i class="fas fa-key"></i> Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout Button</a>
                    </li>
                </ul>
            </div>
            </nav>