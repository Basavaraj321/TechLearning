<?php
define('TITLE', 'Payment Status');
  define('PAGE', 'paymentstatus');
  include('../dbConnection.php');
  include('./adminInclude/header.php'); 
  $ORDER_ID = "";
	
	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {
		$ORDER_ID = $_POST["ORDER_ID"];
	}
?>
<!--Start Main Content-->

<div class="jumbotron  col-sm-6 mt-5 mx-3">
<h3 class="text-center">Payment Status</h3>
<form action="" method="post">
<div class="form-group">
    <label>Order ID: </label>
</div>
<div class="form-group now">
    <input type="text" class="form-control" style="width:30%;" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
  </div>
  <div class="form-group now">
    <button type="submit" class="btn btn-primary mb-4">View</button>
  </div>
</form>
</div>
<!-- End Main Content-->
<div class="container">
    <?php
      if (isset($_POST['ORDER_ID']))
      { 
        $sql = "SELECT * FROM courseorder";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
          if($_POST["ORDER_ID"] == $row["order_id"]){ ?>
            <div class="row justify-content-center">
              <div class="col-auto">
                <h2 class="text-center">Payment Receipt</h2>
                <table class="table table-bordered">
                  <tbody>
                      <tr >
                        <td><label>Order ID</label></td>
                        <td><?php if (isset($row["order_id"])) echo $row["order_id"] ?></td>
                      </tr>
                      <tr >
                        <td><label>Status</label></td>
                        <td><?php echo $row["status"]?></td>
                      </tr>
                      <tr >
                        <td><label>Student Email</label></td>
                        <td><?php echo $row["stu_email"]?></td>
                      </tr>
                      <tr >
                        <td><label>Student Class</label></td>
                        <td><?php echo $row["stu_class"]?></td>
                      </tr>
                      <tr >
                        <td><label>Amount</label></td>
                        <td><?php echo $row["amount"]?></td>
                      </tr>
                      <tr >
                        <td><label>Order Date and Time</label></td>
                        <td><?php echo $row["order_date"]?></td>
                      </tr>
                      <tr>
                        <td></td>
                          <td><button class="btn btn-primary" onclick="javascript:window.print();">Print Receipt</button></td>
                      </tr>
                    </tbody>
                  </table>      
                </div>
              </div>
      <?php
      }
       } } ?>
      
      </div>
      </div>

    </div> 
    </div>  <!-- div Row close from header -->
</div>  <!-- div Conatiner-fluid close from header -->
<?php
include('./admininclude/footer.php');
?>