<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Home Page </title>
</head>
<body>
    
<?php
  include("include/header.php"); 
?>

   <div style="margin-top: 50px;"></div>

   <div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 mx-1 shadow">
                <img src="image/info.png" style="width: 100%; height: 190px;" alt="More Information">
                <h5 class="text-center">Click on the button for more information.</h5>
                <a href="adminlogin.php">
                    <button class="btn btn-success my-3" style="margin-left: 20%;">More Information</button>
                </a>
            </div>

            <div class="col-md-4 mx-1 shadow">
                <img src="image/patient.jpeg" style="width: 100%;" alt="Patient">
                <h5 class="text-center">Create account so that we can take good care of you.</h5>
                <a href="account.php">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">Create Account</button>
                </a>
            </div>

            <div class="col-md-4 mx-1 shadow">
                <img src="image/doctor.jpg" style="width: 100%;" alt="Doctor">
                <h5 class="text-center">We are employing for Doctors.</h5>
                <a href="doctorlogin.php">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">Apply Now</button>
                </a>
            </div>

           
        </div>
    </div>
   </div>
</body>
</html>