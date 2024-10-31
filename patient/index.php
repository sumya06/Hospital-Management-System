<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Patient Dashboard </title>
</head>
<body>
    
<?php
  include("../include/header.php"); 
  include("../include/connection.php");
?>

   <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -12px">
            <?php include("sidenav.php"); ?>
            </div>
            <div class="col-md-10">
            <h5 class="my-3">Patient Dashboard</h5>

            <div class="col-md-12">
                <div class="row">
                        <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                <h5 class="text-white my-4">My Profile</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="profile.php">
                                        <i class="fa fa-user-circle fa-3x my-4 text-white"></i>

                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                <h5 class="text-white my-4">Book Appointment</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="appointment.php">
                                        <i class="fa fa-calendar fa-3x my-4 text-white"></i>

                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                <h5 class="text-white my-4">My Invoice</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="invoice.php">
                                        <i class="fas fa-file-invoice-dollar fa-3x my-4 text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>

            <?php
            if (isset($_POST['send']))
            {
                $title = $_POST['send'];
                $message = $_POST['message'];

                if (empty($title))
                {}
                else if (empty($title)) 
                {}
                else {
                    $user = $_SESSION['patient'];
                    $query = "INSERT INTO report(Title, Message, Username, Date_send) 
                    VALUES ('$title', '$message', '$user', NOW() )";
                    $res = mysqli_query($connect, $query);

                    if ($res)
                    {
                        echo "<script>alert('You have sent your report')</script>";
                    }
                }
            }
            ?>

            <div class="col-md-12">
                <div class="row">
                    
                    <div class="col-md-5 jumbotron bg-info my-3 p-5 mx-2">
                        <h5 class="text-center my-2">Send A Report</h5>

                        <form method="POST">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter Title">

                            <label>Message</label>
                            <input type="text" name="message" class="form-control" autocomplete="off" placeholder="Enter Message">

                            <input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
                        </form>
                    </div>
            
                    <div class="col-md-1"></div>
                    
                    <div class="col-md-5 bg-secondary my-3 p-5">
                    <h5 class="text-center my-2">Search Doctors Area Wise</h5>
                    <br>
                    <form method="post" action="">
                    <input type="text" name="search" class="form-control" placeholder="Search for items">
                    <br>
                    <input type="submit" class="btn btn-success" value="Search">
                    </form>
            <?php

    // Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "care";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];
    
    // Query to search for items
    $sql = "SELECT * FROM doctors WHERE Country  LIKE '%$search%'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        
        while ($row = $result->fetch_assoc()) {
            echo "<b>" . $row["Firstname"] ."</b> From  <b> ". $row["Country"]. "</b>";
        }
        
      
    } else {
        echo "No results found.";
    }
}

// Close connection
$conn->close();

        ?>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
   </div>

</body>
</html>