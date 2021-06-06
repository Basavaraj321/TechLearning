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

$subject_desc = $subject_name = $class = "";
if(isset($_REQUEST['subjectSubmitBtn'])){
    $subject_name = $_REQUEST['subject_name'];
    $subject_desc = $_REQUEST['subject_desc'];
    $class = $_REQUEST['class'];
    // check if filed is empty
    if($subject_desc == "" || $subject_name == "" || $class == ""){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All The Fields</div>";
    }
    else{
        $sql = "INSERT INTO subject (subject_name,subject_desc,class) values ('$subject_name','$subject_desc','$class')";

            if($conn->query($sql) == TRUE){
               $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'> Subject Added Successfully</div>";
            } else{
                $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Subject</div>";
            }
    }
}
?>


<div class="jumbotron col-sm-6 mt-5 mx-3">
<h3 class="text-center">Add new Subject</h3>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="subject_name"><b>Subject Name</b></label>

<input type="text" class="form-control" id="subject_name" name="subject_name">
</div>
<div class="form-group">
<label for="subject_desc"><b>Subject Description</b></label>

<textarea class="form-control" id="subject_desc" name="subject_desc"></textarea>
</div>
<div class="form-group">
<label for="subject_class"><b>Class</b></label>

<input type="text" class="form-control" id="class" name="class">
</div>
<div class="text-center" style="margin-top:20px;">
    <button type="submit" class="btn btn-danger" id="subjectSubmitBtn" name="subjectSubmitBtn" >Submit</button>
    <a href="subjects.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)) {echo $msg;} ?>
</form>
</div>
</div><!--Div row close from header -->
</div><!--Div container-fluid close from header -->
<?php
include('./admininclude/footer.php');
?>
