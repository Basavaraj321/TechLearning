// Check if email already exists
$(document).ready(function(){
    $('#stuemail').on("keypress blur",function(){
        var stuemail = $("#stuemail").val();
        $.ajax({
            url:'Student/addstudent.php',
            method: 'POST',
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success:function(data){
                if(data != 0){
                $("#statusMsg2").html("<small style='color:red';> <i>Hey Dude, Email already exists!!!</i></small>");
                $("#signup").attr("disabled",true);
                }
                else if(data == 0 && validateEmail(stuemail)){
                    $("#statusMsg2").html("<small style='color:green';> <i>There you Goo!!!</i></small>");
                    $("#signup").attr("disabled",false);
                } else if (!validateEmail(stuemail)){
                    $("#statusMsg2").html("<small style='color:red';> <i>Please enter valid email</i></small>");
                    $("#signup").attr("disabled",true);
                }
               },
            });
    });

});
   

// Capturing Data from Browser

function addStu(){
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stuclass = $("#stuclass").val();
    var stupass = "";
    var str = stuname.trim().replace(/\s+/g, '') + "123456789";
    for (i = 1; i <= 12; i++) { 
        var char = Math.floor(Math.random() 
                    * str.length + 1); 
          
        stupass += str.charAt(char);
    }

    //Check whether all values are filled
    if($.trim(stuname) == "" || $.trim(stuname).length < 5 ){
        $("#statusMsg1").html("<small style='color:red';> Please Enter Your Full Name!!!</small>");
        $("#stuname").focus();
        return false;
    }
    else if($.trim(stuemail) == ""){
        $("#statusMsg2").html("<small style='color:red';> Please Enter Your Email!!!</small>");
        $("#stuemail").focus();
        return false;
    }
    else if(!validateEmail(stuemail)){
        $("#statusMsg2").html("<small style='color:red';> Please Enter Valid Email!!!</small>");
        $("#stuemail").focus();
        return false;
    }
    else if($.trim(stuclass) == ""){
        $("#statusMsg3").html("<small style='color:red';> Please Enter Your Class!!!</small>");
        $("#stuclass").focus();
        return false;
    }
   // else if($.trim(stupass) == "" || $.trim(stupass).length < 12){
     //   $("#statusMsg4").html("<small style='color:red';> Password should be more than 12 chracters</small>");
     //   $("#stupass").focus();
     //   return false;
   // }
    else{
        // Sending POST REQUEST by assigning captured values to variables
        $.ajax({
            url:'Student/addstudent.php',
            method: 'POST',
            dataType: 'json',
            data:{
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stuclass: stuclass,
                stupass: stupass,
            },
            success:function(data) {
                console.log(data);
                if ($.trim(data) == "OK") 
                {
                    sendEmail(stupass);
                    $("#successMsg").html("<span class='alert alert-success' >Registration successful!!! </span>");
                    clearRegForm();
                }
                
                else if ($.trim(data) == "Failed") 
                {
                    $("#successMsg").html("<span class='alert alert-danger'>Unable to register...</span>");
                }
            },
        });

    } 
}
function clearRegForm(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
    //$("#statusMsg4").html(" ");
}

function sendEmail(stupass) { 
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    Email.send({ 
      Host: "smtp.gmail.com", 
      Username: "basava.c.kori@gmail.com", 
      Password: "slmnnivciqqoyril", 
      To: stuemail,
      From: "basava.c.kori@gmail.com", 
      Subject: "Greetings From TechSchool", 
      Body: 'Hi ' + stuname + "," + "<br/><br/><p style='font-size:30px;' color:'green;'><b>Welcome To Tech School</b></p>"+ "<br/><br/><p style='font-size:25px;' color:'blue;'><b>Kindly use " + stupass + " as your password</b><p>", 
    }) 
      .then(function (message) { 
        alert("Registered and Password has been sent to your Email") 
      }); 
  } 

function clearRegForm1(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
    //$("#statusMsg4").html(" ");
    $("#successMsg").html(" ");
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  function clearLogForm(){
    $("#stuLoginForm").trigger("reset");
    $("#statusLogMsg").html(" ");
}

  // Ajax call for Student Login Verification
  function checkStuLogin(){
      var stuLogEmail = $("#stuLogemail").val();
      var stuLogPass = $("#stuLogpass").val();
      $.ajax({ 
          url:'Student/addstudent.php',
          method: "POST",
          data:{
              checkLogemail: "checklogmail",
              stuLogEmail:stuLogEmail,
              stuLogPass:stuLogPass,
          },
          success:function(data){
              if (data == 0){
                  $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
              }else if(data == 1){
                $("#statusLogMsg").html('<div class="spinner-border text-success" role = "status"></div>');
                setTimeout(()=>{
                    window.location.href = "index.php";
                },1000);
                clearLogForm();
              }
          },
      });

      }
