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
?>
<div class="col-sm-9 mt-5 mx-3">
<h3 class="text-center">Add Lessons</h3>
<form action="" method="POST" class= "mt-3 form-inline d-print-none">
<div class="form-group">
    <label>Subject ID: </label>
    
</div>
<div class="form-group">
    <input type="text" class="form-control" id ="checkid" name="checkid" style="width:30%;">
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary mb-4">Submit</button>
</div>
  

</form>

<?php
$sql = "SELECT subject_id from subject";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['subject_id']){
        $sql = "SELECT * FROM subject WHERE subject_id = {$_REQUEST['checkid']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(($row['subject_id']) == $_REQUEST['checkid']){
        $_SESSION['subject_id'] = $row['subject_id'];
        $_SESSION['subject_name'] = $row['subject_name'];
        ?>
        <h3 class="mt-5 bg-dark text-white p-2">Subject ID : <?php if(isset($row['subject_id'])) {echo  $row['subject_id'];}?>   Subject Name : <?php if(isset($row['subject_name'])) {echo $row['subject_name'];} ?></h3>

        <?php
        $sql = "SELECT * from lessons WHERE subject_id = {$_REQUEST['checkid']}";
        $result = $conn->query($sql);
        
        echo '<table class="table">
        <thead>
            <tr>
            <th scope="col">Lesson ID</th>
            <th scope="col">Lesson Name</th>
            <th scope="col">Lesson Link</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
        while($row  = $result->fetch_assoc()){
            echo '<tr>';
            echo '<th scope="row">'.$row['lesson_id'].'</th>';
            echo '<td>'.$row['lesson_name'].'</td>';
            echo '<td>'.$row['lesson_link'].'</td>';
            echo '<td>';
            echo '<form action="editlesson.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["lesson_id"].'>
            <button type="submit" class="btn btn-secondary" name="edit" value="Edit"><i class="fas fa-edit"></i></button></form>';
            echo '<form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["lesson_id"].'>
         <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="fas fa-trash"></i></button>
         </form>
            </td>
       </tr>';
        }
        echo '</tbody>
        </table>';
    }
    
    else{
        echo '<div class="alert alert-dark mt-4" role="alert"> Course Not Found ! .. </div>';
    }
}
}
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM lessons WHERE lesson_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    }else{
        echo "UNABLE TO DELETE";
    }
}


?>


</div>

<?php
if(isset($_SESSION['subject_id'])){
    echo '<div>
    <a class="btn btn-danger box" href="./addlessons.php"><i class="fas fa-plus"></i></a>
    </div> 
    </div>';
}

?>



<?php
include('./admininclude/footer.php');
?>