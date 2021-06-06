<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}
else{
    echo "<script> location.href='http://localhost/TechLearning/index.php'; </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <title>TechSchool</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link rel="Stylesheet" href="css/style.css">
    <link rel="Stylesheet" href="http://localhost/TechLearning/css/adminstyle.css">
    <title>Checkout</title>
</head>
<body>
<div class="container mt-5">
<div class="row">
<div class="col-sm-6 offset-sm-3 jumbotron">
<h3 class="mb-5">Welcome to TechSchool Payment Page</h3>
<form method="post" action="./paymentdone.php" id="myform">
<input type="hidden" id="class" name="class" value="<?php if(isset($_POST['class'])) {echo $_POST['class'];} ?>">
<div class="form-group row">
<label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
<div class="col-sm-8">
<input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly> 
</div>
</div>

<div class="form-group row">
<label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
<div class="col-sm-8">
<input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" 
value="<?php if(isset($stuEmail)) {echo $stuEmail;} ?>" readonly>
</div>
</div>


<div class="form-group row">
<label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Student Email</label>
<div class="col-sm-8">
<input id="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT"
value="<?php if(isset($_POST['id'])) {echo $_POST['id'];} ?>" readonly>
</div>
</div>

<div class="form-group row">
<div class="col-sm-8">
<input type="hidden" id="INDUSTRY_TYPE_ID"  class="form-control" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
</div>
</div>

<div class="form-group row">
<div class="col-sm-8">
<input type="hidden" id="CHANNEL_ID"  class="form-control" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
</div>
</div>

<div class="text-center">
<div id="paypal-button-container"></div>
<a href="http://localhost/TechLearning/Student/studentProfile.php" class="btn btn-secondary">Cancel</a>
</div>
</form>
<small class="form-text text-muted">Note: Complete Payment by Clicking Checkout Button</small>
</div>
</div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AZPxpLy_vzjhVxCzAfONdGliU1T6l0MrZRMT6VASeLC1lfCJTxqFma139iNVEGdC8QA-t68SaIEhXzlI&currency=USD"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php if(isset($_POST['id'])){echo $_POST['id']; }?>'
                    }
                }]
            });
        },
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                document.getElementById("myform").submit()
            });
        }
    }).render('#paypal-button-container');

</script>


</body>
</html>

