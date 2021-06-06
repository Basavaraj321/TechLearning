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

$adminEmail = $_SESSION['admLogEmail'];
if(isset($_REQUEST['adminpassupdate'])){
    $admin_pass = $_REQUEST['admin_pass'];
    // check if filed is empty
    if($admin_pass == ""){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All The Fields</div>";
    }
    else{
        $sql = "SELECT * FROM admin where admin_email = '$adminEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $admin_pass = $_REQUEST['admin_pass'];
            $sql = "UPDATE admin SET admin_pass = '$admin_pass' WHERE admin_email = '$adminEmail'";
            if($conn->query($sql) == TRUE){
               $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'> Updated Successfully</div>";
            } else{
                $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Update</div>";
            }
    }
}
}
?>

<div class="jumbotron col-sm-6 mt-5 mx-3">
<div class="row">
<div class="col-sm-6">
    <form class="mt-5 mx-5">
    <div class="form-group">
    <label for="admin_email"><b>Admin  Email</b></label>

        <input type="text" class="form-control" id="admin_email" name="admin_email" value="<?php  echo $adminEmail ?>" readonly>
    </div>
        <div class="form-group">
    <label for="admin_pass"><b>New Password</b></label>

        <input type="text" class="form-control" id="admin_pass" name="admin_pass" placeholder="New Password" >
    </div>
    <div class="text-center" style="margin-top:20px;">
    <button type="submit" class="btn btn-danger" id="adminpassupdate" name="adminpassupdate" >Update</button>
    <a href="admindashboard.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)) {echo $msg;} ?>
    
    
    </form>

    </div>
</div>
</div>
</div><!--Div row close from header -->
</div><!--Div container-fluid close from header -->

<?php
include('./admininclude/footer.php');
?>

