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
<div class="col-sm-9 mt-5">
<!-- Table -->
<p class="bg-dark text-white p-2">List Assignments</p>
<?php
$sql ="SELECT * FROM assignment";
$result = $conn->query($sql);
if($result->num_rows > 0){
    echo '<table class="table">
        <thead>
            <tr>
            <th scope="col">Assigment ID</th>
            <th scope="col">Assignment Name</th>
            <th scope="col">Student ID</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo '<th scope="row">'.$row['a_id'].'</th>';
            echo '<td>'.$row['a_name'].'</td>';
            echo '<td>'.$row['stu_id'].'</td>';
            echo '<td>';
            echo '<a href='.$row['a_content'].'><i class="fas fa-book-open"></i> Open File</a>';
            echo '</td>';
       echo '</tr>';
        }
        echo '</tbody>
        </table>';
    }
    
    else{
        echo "0 result";
    }
    


?>

</div>

<?php
include('./admininclude/footer.php');
?>