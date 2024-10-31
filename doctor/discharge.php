<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Check Patient Appointment </title>
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
        <h5 class="text-center my-2">Total Appointment</h5>

        <?php
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
            $query = "SELECT * FROM appointment WHERE ID = '$id' ";
            $res = mysqli_query($connect, $query);

            $row = mysqli_fetch_array($res);
        }
        ?>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center" colspan="2">Appointment Details</th>
                        </tr>

                        <tr>
                            <td>Firstname</td>
                            <td><?php echo $row['Firstname']; ?></td>
                        </tr>

                        <tr>
                            <td>Surname</td>
                            <td><?php echo $row['Surname']; ?></td>
                        </tr>

                        <tr>
                            <td>Gender</td>
                            <td><?php echo $row['Gender']; ?></td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td><?php echo $row['Phone']; ?></td>
                        </tr>

                        <tr>
                            <td>Appointment Date</td>
                            <td><?php echo $row['Appointment_date']; ?></td>
                        </tr>

                        <tr>
                            <td>Symptoms</td>
                            <td><?php echo $row['Symptoms']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                <h5 class="text-center my-1">Invoice</h5>

                <?php
                if (isset($_POST['send']))
                {
                    $fee = $_POST['fee'];
                    $des = $_POST['des'];

                    if (empty($fee))
                    {}
                    else if (empty($des))
                    {}
                    else {
                        $doc = $_SESSION['doctor'];

                        $fname = $row['Firstname'];

                        $query = "INSERT INTO income(Doctor, Patient, Date_discharge, Amount_paid, Description)
                        VALUES('$doc', '$fname', NOW(), '$fee', '$des' )";

                        $res = mysqli_query($connect, $query);

                        if ($res) {
                            echo "<script>alert('You have Sent Invoice.')</script>";

                        mysqli_query($connect, "UPDATE appointment SET Status = 'Discharge' WHERE ID = '$id' ");
                        }
                    }
                }
                ?>

                <form method="post">
                    <div class="form-group my-2">
                    <label>Fee</label>
                    <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fee">
                    </div>

                    <div class="form-group my-2">
                    <label>Description</label>
                    <input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Decription">
                    </div>

                    <input type="submit" name="send" class="btn btn-info my-2" value="Send">
                </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
  </div>
</body>
</html>