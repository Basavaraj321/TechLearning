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


$lesson_desc = $lesson_name = $lesson_temp_link = $lesson_link = "" ;
if(isset($_REQUEST['lessonSubmitBtn'])){
    $lesson_name = $_REQUEST['lesson_name'];
    $lesson_des = $_REQUEST['lesson_desc'];
    $lesson_desc = str_replace(" ","_",$lesson_des);
    $subject_name = $_REQUEST['subject_name'];
    $subject_id = $_REQUEST['subject_id'];
    $lesson_link = $_FILES['lesson_link']['name'];
    $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
    $link_folder = '../lessonvid/'.$lesson_link;
    move_uploaded_file($lesson_link_temp,$link_folder);
    
    // check if filed is empty
    if($subject_id == "" || $subject_name == "" ||  $lesson_name == "" || $lesson_desc == ""){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All The Fields</div>";
    }
    else{
        $sql = "INSERT INTO lessons (lesson_name,lesson_desc,lesson_link,subject_id,subject_name) values ('$lesson_name','$lesson_desc','$link_folder','$subject_id','$subject_name')";

            if($conn->query($sql) == TRUE){
               $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'> Subject Added Successfully</div>";
            } else{
                $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Subject</div>";
            }
    }
}
?>


<div class="jumbotron col-sm-6 mt-5 mx-3">
<h3 class="text-center">Add new Lesson</h3>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="subject_name"><b>Subject ID</b></label>
<input type="text" class="form-control" id="subject_id" name="subject_id" value= "<?php if(isset($_SESSION['subject_id'])){echo $_SESSION['subject_id'];} ?>" readonly>
</div>
<div class="form-group">
<label for="subject_name"><b>Subject Name</b></label>
<input type="text" class="form-control" id="subject_name" name="subject_name" value= "<?php if(isset($_SESSION['subject_name'])){echo $_SESSION['subject_name'];} ?>" readonly>
</div>

<div class="form-group">
<label for="subject_name"><b>Lesson Name</b></label>
<input type="text" class="form-control" id="lesson_name" name="lesson_name">
</div>

<div class="form-group">
<label for="subject_name"><b>Lesson Description</b></label>
<textarea type="text" class="form-control" id="lesson_desc" name="lesson_desc" row=2></textarea>
</div>

<div class="form-group">
<label for="subject_name"><b>Lesson Video/Image Link</b></label>
<input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
</div>

<div class="text-center" style="margin-top:20px;">
    <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn" >Submit</button>
    <a href="lesson.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)) {echo $msg;} ?>
</form>
</div>
</div><!--Div row close from header -->
</div><!--Div container-fluid close from header -->
<?php
include('./admininclude/footer.php');
?>
