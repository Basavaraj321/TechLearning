<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}
else{
    echo "<script> location.href='http://localhost/TechLearning/index.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Watch Course</title>
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
    <nav class="navbar navbar-dark fixed-top p-3 shadow" style="background-color: #53c4ed;">
    <div class="container-fluid">
        <a class="navbar-brand">My Lessons</a>
            <form class="d-flex">
            <a href="learn.php" class="btn btn-danger" type="submit">My Courses</a>
            </form>
    </div>
    </nav>
    <div class="container-fluid mb-5" style="margin-top:80px;">
    <div class="row">
    <div class="col-sm-3 border-right">
    <h4 class="text-center">My Lessons</h4>
    <ol id="playlist" class="nav-flex-column">
    <?php
    if(isset($_GET['subject_id'])){
        $subject_id = $_GET['subject_id'];
        $sql = "SELECT * FROM lessons WHERE subject_id = '$subject_id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $s = $row['lesson_desc'];
                echo '<br>';
                echo '
                <li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' desc='.$s.' style="cursor: pointer;">'. $row['lesson_name'] .'</li>';
            }
        }
    }
    ?>
    </ol>
    </div>
    <div class="col-sm-8">
            <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
            <br>
            <br>
            <p>Assignment: </p><textarea name="" id="desc" cols="100" rows="3" readonly></textarea>
            <br>
            <br>
            <p>Query Section: </p><textarea name="" id="" cols="130" rows="3" placeholder="Clear your Queries here" ></textarea></br>
            <button type="submit" class="btn btn-danger" id="send" name="send" >Send</button>
    </div>
    

    </div>
    </div> 
    <script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- Fontawesome Javascript -->
<script src="../js/all.min.js"></script>
<!--Admin ajax Call javascript -->
<script src="../js/adminajaxrequest.js"></script>
<!-- Custom javascript -->
<script src="../js/custom.js"></script>
</body>
</html>