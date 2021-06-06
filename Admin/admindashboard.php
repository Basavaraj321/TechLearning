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
$sql = "SELECT * FROM courseorder";
$result = $conn->query($sql);
$rows = $result->num_rows; 
if($rows > 0)
{  
?>
            <div class="col-sm-9 mt-5">
            <div class="row mx-5 text-center">
                <div class="col-sm-4 mt-5 mx-auto">
                    <div class="card text-white bg-success mb-5" style="max-width: 18rem;">
                        <div class="card-header">Students</div>
                            <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $rows ?>
                            </h4>
                            <a class="btn text-white" href="#">View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto mt-5 text-center">
                <!--Table-->
                <p class="bg-dark text-white p-2">Enrolled Students</p>
               <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Class </th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Order date and Time</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()){ 
                    echo '<tr>';
                    echo '<th scope="row">'.$row['order_id'].'</th>';
                    echo  '<td>'.$row['stu_class'].'</td>';
                    echo  '<td>'.$row['stu_email'].'</td>';
                     echo   '<td>'.$row['order_date'].'</td>';
                     echo   '<td>'.$row['amount'].'</td>';
                    echo '<td>';
                    echo '<form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["order_id"].'>
                     <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="fas fa-trash"></i></button>
                     </form>';
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
                    $sql = "DELETE FROM courseorder WHERE order_id = '{$_REQUEST['id']}'";
                    if($conn->query($sql) == TRUE){
                        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
                    }else{
                        echo "UNABLE TO DELETE";
                    }
                }
                
                ?>

               
            </div>
        </div>
    </div>
</div>



<?php
include('./admininclude/footer.php');
?>



