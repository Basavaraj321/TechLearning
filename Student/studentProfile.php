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
    $stuName =  $row['stu_name'];
    $stuClass =  $row['stu_class'];
    $stuDob =  $row['stu_dob'];
    $stuAge =  $row['stu_age'];
    $stuImg =  $row['stu_img'];
}

if(isset($_REQUEST['updateStuNameBtn'])){
    if(($_REQUEST['stu_name'] == "")){
        // msg required if field is missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields </div>';
    } else{
        $stuName = $_REQUEST["stu_name"];
        $stuClass = $_REQUEST["stu_class"];
        $stuDob = $_REQUEST["stu_dob"];
        $stuAge = $_REQUEST["stu_age"];
        $stu_image = $_FILES['stuImg']['name'];
        $stu_image_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../image/stu/'.$stu_image;
        move_uploaded_file($stu_image_temp,$img_folder);
        $sql = "UPDATE student SET stu_name = '$stuName', stu_class = '$stuClass', stu_dob = '$stuDob',stu_age = '$stuAge', stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
        if($conn->query($sql)== TRUE){
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
        }else{
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
}

?>

<div class="jumbotron col-sm-4 mt-5 mx-5">
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label for="stu_Id"><b>Student ID</b></label>
<input type="text" class="form-control" id="stu_Id" name="stu_Id" value="<?php if(isset($stuId)) {echo $stuId;}?>" readonly>
</div></br>


<div class="form-group">
<label for="stu_email"><b>Email</b></label>
<input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php echo $stuEmail ?>" readonly>
</div></br>

<div class="form-group">
<label for="stu_class"><b>Student Class</b></label>
<input type="text" class="form-control" id="stu_class" name="stu_class" value="<?php if(isset($stuClass)) {echo $stuClass;}?>" readonly>
</div></br>

<div class="form-group">
<label for="stu_name"><b>Name</b></label>
<input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($stuName)) {echo $stuName;}?>">
</div></br>

<div class="form-group">
<label for="stu_dob"><b>Date Of Birth [YYYY-MM-DD]</b></label>
<input type="text" class="form-control" id="stu_dob" name="stu_dob" value="<?php if(isset($stuDob)) {echo $stuDob;}?>">
</div></br>

<div class="form-group">
<label for="stu_age"><b>Age</b></label>
<input type="text" class="form-control" id="stu_age" name="stu_age" value="<?php if(isset($stuAge)) {echo $stuAge;}?>">
</div></br>

<div class="form-group">
<label for="stuImg"><b>Upload Image</b></label>
<input type="file" class="form-control-file" id="stuImg" name="stuImg">
</div></br>

<div class="text-center" style="margin-top:20px;">
    <button type="submit" class="btn btn-danger" id="updateStuNameBtn" name="updateStuNameBtn" >Update</button>
    
</div>

<?php if(isset($passmsg)) {echo $passmsg;} ?>
</form>
</div>

</div><!--Div row close from header -->
</div><!--Div container-fluid close from header -->

<?php
include('./stuInclude/footer.php');
?>