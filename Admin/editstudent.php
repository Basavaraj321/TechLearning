<?php
if(!isset ($_SESSION)){
    session_start();
}
include('./admininclude/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['admLogEmail'];
}
else{
    echo "<script> location.href='http://localhost/TechLearning/index.php'; </script>";
}

$stu_id = $stu_name = $stu_email = $stu_class = $stu_dob = $stu_age = $stu_pass= "";
if(isset($_REQUEST['requpdate'])){
    $stu_id = $_REQUEST['stu_id'];
    $stu_name = $_REQUEST['stu_name'];
    $stu_email = $_REQUEST['stu_email'];
    $stu_pass = $_REQUEST['stu_pass'];
    $stu_class = $_REQUEST['stu_class'];
    $stu_dob = $_REQUEST['stu_dob'];
    $stu_age = $_REQUEST['stu_age'];
    // check if filed is empty
    if($stu_id == "" || $stu_name == "" || $stu_email == "" || $stu_class == "" || $stu_dob == "" || $stu_age == ""){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All The Fields</div>";
    }
    else{
        $sql = "UPDATE student SET stu_id = '$stu_id', stu_name = '$stu_name',stu_email='$stu_email' , stu_pass = '$stu_pass',stu_class = '$stu_class',stu_dob = '$stu_dob',stu_age = '$stu_age' WHERE stu_id = '$stu_id'";

            if($conn->query($sql) == TRUE){
               $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'> Student Record Updated Successfully</div>";
            } else{
                $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Update Student Record</div>";
            }
    }
}
?>

<div class="jumbotron col-sm-6 mt-5 mx-3">
<h3 class="text-center">Update Student Details</h3>
<?php
if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM student where stu_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label for="stu_id"><b>Student ID</b></label>
<input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($row['stu_id']))
{
    echo $row['stu_id'];
}?>" readonly>
</div>

<div class="form-group">
<label for="stu_name"><b>Student Name</b></label>

<input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($row['stu_name']))
{
    echo $row['stu_name'];
}?>">
</div>

<div class="form-group">
<label for="stu_email"><b>Student Email</b></label>

<input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($row['stu_email']))
{
    echo $row['stu_email'];
}?>">
</div>

<div class="form-group">
<label for="stu_pass"><b>Student Password</b></label>

<input type="text" class="form-control" id="stu_pass" name="stu_pass" value="<?php if(isset($row['stu_pass']))
{
    echo $row['stu_pass'];
}?>">
</div>

<div class="form-group">
<label for="stu_class"><b>Student Class</b></label>

<input type="text" class="form-control" id="stu_class" name="stu_class" value="<?php if(isset($row['stu_class']))
{
    echo $row['stu_class'];
}?>">
</div>

<div class="form-group">
<label for="stu_dob"><b>Student DOB</b></label>

<input type="text" class="form-control" id="stu_dob" name="stu_dob" value="<?php if(isset($row['stu_dob']))
{
    echo $row['stu_dob'];
}?>">
</div>

<div class="form-group">
<label for="stu_age"><b>Student AGE</b></label>

<input type="text" class="form-control" id="stu_age" name="stu_age" value="<?php if(isset($row['stu_age']))
{
    echo $row['stu_age'];
}?>">
</div>









<div class="text-center" style="margin-top:20px;">
    <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate" >Update</button>
    <a href="students.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)) {echo $msg;} ?>
</form>
</div>
</div><!--Div row close from header -->
</div><!--Div container-fluid close from header -->

<?php
include('./admininclude/footer.php');
?>

