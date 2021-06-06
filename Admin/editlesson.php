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

$subject_id = $subject_name = $lesson_id = $lesson_name = $lesson_desc = "";
if(isset($_REQUEST['requpdate'])){
    $lesson_id = $_REQUEST['lesson_id'];
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
    if($subject_id == "" || $subject_name == "" || $lesson_id == "" || $lesson_name == "" || $lesson_desc == ""){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All The Fields</div>";
    }
    else{
        $sql = "UPDATE lessons SET lesson_id = '$lesson_id', lesson_name = '$lesson_name' , lesson_desc = '$lesson_desc', subject_name = '$subject_name', subject_id='$subject_id' , lesson_link = '$link_folder' WHERE lesson_id = '$lesson_id'";

            if($conn->query($sql) == TRUE){
               $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'> Subject Updated Successfully</div>";
            } else{
                $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Update Subject</div>";
            }
    }
}
?>

<div class="jumbotron col-sm-6 mt-5 mx-3">
<h3 class="text-center">Update Lesson Details</h3>
<?php
if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM lessons WHERE lesson_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="subject_id"><b>Lesson ID</b></label>

<input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id']))
{
    echo $row['lesson_id'];
}?>" readonly>
</div>

<div class="form-group">
<label for="subject_id"><b>Lesson Name</b></label>

<input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name']))
{
    echo $row['lesson_name'];
}?>">
</div>

<div class="form-group">
<label for="subject_desc"><b>Lesson Description</b></label>

<textarea class="form-control" id="lesson_desc" name="lesson_desc" ><?php if(isset($row['lesson_desc']))
{
    echo $row['lesson_desc'];
}?></textarea>
</div>

<div class="form-group">
<label for="subject_name"><b>Subject ID</b></label>

<input type="text" class="form-control" id="subject_id" name="subject_id" value="<?php if(isset($row['subject_id']))
{
    echo $row['subject_id'];
}?>" readonly>
</div>

<div class="form-group">
<label for="subject_name"><b>Subject Name</b></label>

<input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php if(isset($row['subject_name']))
{
    echo $row['subject_name'];
}?>" readonly>
</div>

<div class="form-group">
<label for="subject_name"><b>Lesson Vid/Img</b></label>

<input type="file" class="form-control" id="lesson_link" name="lesson_link" value="<?php if(isset($row['lesson_link']))
{
    echo $row['lesson_link'];
}?>">
</div>
<div class="text-center" style="margin-top:20px;">
    <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate" >Update</button>
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

