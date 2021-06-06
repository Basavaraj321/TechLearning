<!-- Including Header section --->
<?php
include('./mainInclude/header.php')
?>
<!-- End Including Header --->


<!-- Start Video background -->
<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="video/banvideo.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content">Welcome to TechSchool</h1>
        <small class="my-content2">Learn and Implement</small><br>
        <?php
            if(isset($_SESSION['is_login']))
            {
                echo '<a href="Student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>';
            }
            else{
                echo '<a href="#" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#StuRegModal">Get Started</a><br>';
            }
        ?>
        
    </div>
</div>
<!-- End Video Background -->

<!-- Start COntact Us -->
<?php
include('./contact.php')
?>
<!-- End COntact Us -->


<!-- Start Social Follow -->
<div class="container-fluid bg-danger mt-4">
<div class="row text-white text-center p-1">
    <div class="col-sm">
        <a class="text-white social-hover" href="#"><i class="fab fa-facebook"></i> FaceBook</a>
    </div>
    <div class="col-sm">
        <a class="text-white social-hover" href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
    </div>
    <div class="col-sm">
        <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
    </div>
    <div class="col-sm">
        <a class="text-white social-hover" href="#"><i class="fab fa-instagram"></i> Instagram</a>
    </div>
</div>
</div>
<!-- End Social Follow -->


<!-- Start About Section -->
<div class="container-fluid p-4" style="background-color:#E9ECEF">
<div class="container" style="background-color:#E9ECEF">
<div class="row text-center">
    <div class="col-sm">
        <h5>About Us</h5>
        <p>
            TechSchool provides universal access to the world's education,
            partnered with almost all states.
        </p>
    </div>
    <div class="col-sm">
        <h5>Contact</h5>
        <p>
        TechSchool,
        Near Police Station,
        Bangalore - 560096
        Phone  - 222-333-4444
        www.TechSchool.com</p>
    </div>
</div>
</div>
</div>
<!-- End About Section -->

<!-- Including footer section ---!>
<?php
include('./mainInclude/footer.php')
?>
<!-- End Including Footer ---!>
