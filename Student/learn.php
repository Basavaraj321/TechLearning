<?php
if(!isset($_SESSION)){
    session_start();
}

include('./stuInclude/header.php');
include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}
else{
    echo "<script> location.href='http://localhost/TechLearning/index.php'; </script>";
}

$sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $stuId =  $row['stu_id'];
    $stu_fee_status = $row['stu_fee_status'];
    $stuClass =  $row['stu_class'];
}

if($stu_fee_status == "Paid"){
echo '<div class="container col-sm-8 mt-5 ml-4">
<div class="row">
<div class="jumbotron">
<h4 class="text-center">My Subjects</h4>';
$sql = "SELECT * FROM subject WHERE class = '$stuClass'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){      
?>

<div class="bg-light mt-2 mb-3">
<h5 class="card-header"><?php echo $row['subject_name']; ?></h5>
<div class="row">
<div class="col-sm-6 mb-3">
<div class="card-body">
<p style="font-size:30px;" class="card-title"><b><?php echo $row['subject_desc']; ?> </b></p>
<a href="watchcourse.php?subject_id=<?php echo $row['subject_id']; ?>" class="btn btn-primary mt-5 float-right">Watch Course</a>
</div>
</div>
</div>

<?php
    }
}
echo '</div>
</div>
</div>';
}
else{
    $sql = "SELECT * FROM fees WHERE class='$stuClass'";
    $result = $conn->query($sql);
        if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $fee = $row['fee'];
        }
    echo '<div class="jumbotron container-fluid col-sm-5 mt-5">
    <div class="jumbotron bg-light mt-5 mb-2">
    <h5 class="card-header">Fees Not Paid <i class="far fa-frown-open"></i></h5>
    <div class="row">
    <div class="col-sm-5 mb-3">
    <div class="card-body">
    <form action="http://localhost/TechLearning/checkout.php" method="POST">
    <p class="card-title">Kindly pay Rs '.$fee.'  to get access to your subjects</p>
    <input type="hidden" name="id" value="'.$fee.'">
    <input type="hidden" name="class" value="'.$stuClass.'">
    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="pay">Pay Now</button>
    </form>
    </div>
    </div>
    </div>
    </div>';
}
?>
</div>

<?php
include('./stuInclude/footer.php');
?>










