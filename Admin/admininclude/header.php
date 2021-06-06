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
    <link rel="Stylesheet" href="http://localhost/TechLearning/css/adminstyle.css">
</head>
<body>
<!-- Top Nav Bar -->
<nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-3 mr-0" href="admindashboard.php">Tech-Learning<small class="text-white" style="font-size:20px"> Admin Area</small></a>
</nav>
<!-- Side Bar -->
<div class="container-fluid mb-5" style="margin-top:60px;">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="admindashboard.php"> <i class="fas fa-tachometer-alt"></i> 
                        Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="subjects.php"><i class="fab fa-accessible-icon"></i> Subjects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lesson.php"><i class="fab fa-accessible-icon"></i> Add Lessons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="students.php"><i class="fas fa-users"></i> Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="changepassword.php"><i class="fas fa-key"></i> Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paymentstatus.php"><i class="fas fa-receipt"></i> Payment Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chkassignment.php"><i class="fas fa-receipt"></i> Submissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout Button</a>
                    </li>
                </ul>
            </div>
            </nav>