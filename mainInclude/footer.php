<!-- Start Footer Section -->
<footer class="container-fluid bg-dark text-center p-2">
<small class="text-white">Copyright &copy; 2020 || Designed By
     Tech-Learning || <a href="#login" data-bs-toggle="modal" data-bs-target="#adminLoginModal">Admin Login</a></small>
</footer>
<!-- End Footer Section -->


<!--Start Student Registration Modal -->

    <!-- Modal -->
    <div class="modal fade" id="StuRegModal" tabindex="-1" aria-labelledby="StuRegModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="StuRegModalLabel"><i class="fas fa-school"></i> Student Registration</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "clearRegForm1()"></button>
        </div>
        <div class="modal-body">
        <!--Start Including Student Registration Form -->
        <?php include('studentRegistration.php'); ?>
         <!--End Including Student Registration Form -->
        </div>
        <div class="modal-footer">
            <span id = "successMsg" class="successMsg"></span>
            <button id = "signup" type="button" class="btn btn-primary" onclick="addStu()">Sign Up</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick = "clearRegForm1()">Close</button>
        </div>
        </div>
    </div>
    </div>

<!--End Student Registration Modal -->



<!--Start Student Login Modal -->

    <!-- Modal -->
    <div class="modal fade" id="StuLoginModal" tabindex="-1" aria-labelledby="StuLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="StuLoginModalLabel"><i class="fas fa-graduation-cap"></i> Student Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "clearLogForm()"></button>
        </div>
        <div class="modal-body">
        <!--Start Student Login Form -->
        <form id="stuLoginForm">
            <div class="mb-3">
                <label for="stuLogemail" class="form-label"><i class="fas fa-envelope"></i>  <b>Email</b></label>
                <input type="email" class="form-control" id="stuLogemail" name="stuLogemail" placeholder="Email ID">
            </div>
            <div class="mb-3">
                <label for="stuLogpass" class="form-label"><i class="fas fa-key"></i>  <b>Password</b></label>
                <input type="password" class="form-control" id="stuLogpass" name="stuLogpass" placeholder="Password">
            </div>
        </form>
         <!--End Student Login Form -->
        </div>
        <div class="modal-footer">
        <small id ="statusLogMsg"></small>
            <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick = "checkStuLogin()">Login</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick = "clearLogForm()">Cancel</button>
            
        </div>
        </div>
    </div>
    </div>

<!--End Student Login Modal -->


<!--Start Admin Login Modal -->

    <!-- Modal -->
    <div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="adminLoginModalLabel"><i class="fas fa-graduation-cap"></i> Admin Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!--Start Admin Login Form -->
        <form id=adminLoginForm>
            <div class="mb-3">
                <label for="adminLogemail" class="form-label"><i class="fas fa-envelope"></i>  <b>Email</b></label>
                <input type="email" class="form-control" id="adminLogemail" name="adminLogemail" placeholder="Email ID">
            </div>
            <div class="mb-3">
                <label for="adminLogpass" class="form-label"><i class="fas fa-key"></i>  <b>Password</b></label>
                <input type="password" class="form-control" id="adminLogpass" name="adminLogpass" placeholder="Password">
            </div>
        </form>
         <!--End Admin Login Form -->
        </div>
        <div class="modal-footer">
            <small id="statusAdminLogMsg"></small>
            <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick = "checkAdminLogin()">Login</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>    
        </div>
        </div>
    </div>
    </div>

<!--End Admin Login Modal -->






<!-- Jquery and Bootstrap javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Fontawesome Javascript -->
<script src="js/all.min.js"></script>
<!-- Student ajax call javascript -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>
<script src= 
    "https://smtpjs.com/v3/smtp.js"> 
  </script> 
<script type="text/javascript" src="js/adminajaxrequest.js"></script>
</body>
</html>