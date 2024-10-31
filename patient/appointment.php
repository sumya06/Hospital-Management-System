<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Book Appointment </title>
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
            <h5 class="text-center my-2">Book Appointment</h5>

            <?php
            $pat = $_SESSION['patient'];
            $sel = mysqli_query($connect, "SELECT * FROM patient WHERE Username = '$pat' ");

            $row = mysqli_fetch_array($sel);

            $firstname = $row['Firstname'];
            $surname = $row['Surname'];
            $gender = $row['Gender'];
            $phone = $row['Phone'];

            if (isset($_POST['book']))
            {
                $date = $_POST['date'];
                $sym = $_POST['sym'];

                if (empty($sym))
                {}
                else {
                    $query = "INSERT INTO appointment(Firstname, Surname, Gender, Phone, Appointment_date, Symptoms, Status, Date_booked)
                    VALUES('$firstname', '$surname', '$gender', '$phone', '$date', '$sym', 'Pending', NOW() )";

                    $res = mysqli_query($connect, $query);

                    if ($res) {
                        echo "<script>alert('You have booked an appointment.')</script>";
                    }
                }
            }
            ?>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 jumbotron card p-5" style="background-color: #D8D9DA;">
                        <form method="POST">
                            <label>Appointment Date</label>
                            <input type="date" name="date" class="form-control">

                            <label>Symptoms</label>
                            <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">

                            <input type="submit" name="book" class="btn btn-info text-white my-2" value="Book Appointment">
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</body>
</html>