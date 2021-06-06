// Ajax Call for Admin Login Verification
function checkAdminLogin(){
    console.log("Button clicked");
    var admLogEmail = $("#adminLogemail").val();
    var admLogPass = $("#adminLogpass").val();
    $.ajax({ 
        url:'Admin/admin.php',
        method: "POST",
        data:{
            checkLogemail: "checklogmail",
            admLogEmail:admLogEmail,
            admLogPass:admLogPass,
        },
        success:function(data){
            if (data == 0){
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
            }else if(data == 1){
              $("#statusAdminLogMsg").html('<small class="alert alert-success">Success Loading...</small>');
              setTimeout(()=>{
                  window.location.href = "Admin/admindashboard.php";
              },1000);
              clearLogForm();
            }
        },
    });

    }