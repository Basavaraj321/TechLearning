<?php
if(!isset ($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include('../dbConnection.php');


if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}
else{
    echo "<script> location.href='http://localhost/TechLearning/index.php'; </script>";
}


$stuEmail = $_SESSION['stuLogEmail'];
if(isset($_REQUEST['stupassupdate'])){
    $stu_pass = $_REQUEST['stu_pass'];
    // check if filed is empty
    if($stu_pass == ""){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All The Fields</div>";
    }
    else{
        $sql = "SELECT * FROM student where stu_email = '$stuEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $stu_pass = $_REQUEST['stu_pass'];
            $sql = "UPDATE student SET stu_pass = '$stu_pass' WHERE stu_email = '$stuEmail'";
            if($conn->query($sql) == TRUE){
               $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'> Updated Successfully</div>";
            } else{
                $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Update</div>";
            }
    }
}
}
?>

<div class="jumbotron col-sm-6 mt-5 mx-3">
<div class="row">
<div class="col-sm-6">
    <form class="mt-5 mx-5">
    <div class="form-group">
    <label for="admin_email"><b>Student  Email</b></label>

        <input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php  echo $stuEmail ?>" readonly>
    </div>
        <div class="form-group">
    <label for="stu_pass"><b>New Password</b></label>

        <input type="text" class="form-control" id="stu_pass" name="stu_pass" placeholder="New Password" >
    </div>
    <div class="text-center" style="margin-top:20px;">
    <button type="submit" class="btn btn-danger" id="stupassupdate" name="stupassupdate" >Update</button>
    <a href="studentProfile.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)) {echo $msg;} ?>
    
    
    </form>

    </div>
</div>
</div>
</div><!--Div row close from header -->
</div><!--Div container-fluid close from header -->

<?php
include('./stuInclude/footer.php');
?>

