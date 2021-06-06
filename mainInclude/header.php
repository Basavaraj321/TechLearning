<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <title>TechSchool</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link rel="Stylesheet" href="css/style.css">
</head>
<body>


<!-- Start Navigation Bar -->
<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">TechSchool</a>
    <span class="navbar-text">Learn and Implement</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav custom-nav">
        <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item custom-nav-item"><a href="fees.php" class="nav-link">Class Fees</a></li>
        <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment status</a></li>
        <?php 
        session_start();
        if(isset($_SESSION['is_login'])){
          echo '
          <li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
        <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
          ';
        }
        else{
          echo '<li class="nav-item custom-nav-item" data-bs-toggle="modal" data-bs-target="#StuLoginModal"><a href="#" class="nav-link">Login</a></li>
        <li class="nav-item custom-nav-item" data-bs-toggle="modal" data-bs-target="#StuRegModal"><a href="#" class="nav-link">Sign-up</a></li>';
        }
        ?>
        
        
        <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
        <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navigation Bar -->