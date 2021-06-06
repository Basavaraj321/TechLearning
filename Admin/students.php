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
<!-- div row start from header -->
<div class="col-sm-9 mt-5">
<div class="mx-auto mt-5 text-center">
<p class="bg-dark text-white p-2">Students List</p>
<?php
$sql = "SELECT * FROM student"; 
$result =  $conn->query($sql);
if($result->num_rows > 0)
{
?>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Student Class</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row  = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<th scope="row">'.$row['stu_id'].'</th>';
                        echo '<td>'.$row['stu_name'].'</td>';
                        echo '<td>'.$row['stu_email'].'</td>';
                        echo '<td>'.$row['stu_class'].'</td>';
                        echo '<td>';
                        echo '<form action="editstudent.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["stu_id"].'>
                        <button type="submit" class="btn btn-secondary" name="edit" value="Edit"><i class="fas fa-edit"></i></button></form>';
                        echo '<form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["stu_id"].'>
                     <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="fas fa-trash"></i></button></form>';
                        echo '</td>';
                    echo '</tr>';
                    }
                ?>
                </tbody>
                </table>
                <?php }  

                else
                {
                    echo "0 Result";
                }
                
                if(isset($_REQUEST['delete'])){
                    $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
                    if($conn->query($sql) == TRUE){
                        echo '<meta http-equiv="referesh" content="0;URL=?deleted"/>';
                    }else{
                        echo "UNABLE TO DELETE";
                    }
                }
                
                
                
                ?>
                 
</div>
</div>
</div>

<!-- div row close from header -->
<div>
<a class="btn btn-danger box" href="./addstudent.php"><i class="fas fa-plus"></i></a>
</div> 
</div>





<?php
include('./admininclude/footer.php');
?>