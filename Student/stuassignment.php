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
if($result->num_rows==1){
    $row = $result->fetch_assoc();
    $stu_id = $row["stu_id"];
}

if(isset($_REQUEST['submitAssignmentBtn'])){
    if(empty($_FILES["stuAssignment"]["name"]) || $_REQUEST['a_name'] == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }
    else{
        $a_name = $_REQUEST['a_name'];
        $a_content = $_FILES['stuAssignment']['name'];
        $stu_assign_temp = $_FILES['stuAssignment']['tmp_name'];
        $assignment_folder = '../assignment/'.$a_content;
        move_uploaded_file($stu_assign_temp,$assignment_folder);
        $sql = "INSERT INTO assignment (a_name,a_content,stu_id) VALUES ('$a_name','$assignment_folder','$stu_id')";
        if($conn->query($sql)== TRUE){
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">File Uploaded Successfully</div>';
        }else{
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable to Upload File</div>';
        }
    }
}
?>
<div class="jumbotron col-sm-6 mt-5 mx-3">
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="stu_id"><b>Student ID</b></label>

<input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($stu_id))
{
    echo $stu_id;
}?>" readonly></br>
</div>

<div>
<label for="a_name"><b>Assignment Name</b></label>
<input type="text" class="form-control" id="a_name" name="a_name" placeholder="Ex: YourName-LessonName"></br>
</div>



<div class="form-group">
<label for="a_content"><b>Upload Assignments Here</b></label>
<input type="file" class="form-control" id="stuAssignment" name="stuAssignment">
</div>

<div class="text-center" style="margin-top:20px;">
    <button type="submit" class="btn btn-danger" id="submitAssignmentBtn" name="submitAssignmentBtn" >Submit</button>
    <a href="studentProfile.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($passmsg)) {echo $passmsg;} ?>
</form>
</div>
</div><!--Div row close from header -->
</div><!--Div container-fluid close from header -->

<?php
include('./stuInclude/footer.php');
?>