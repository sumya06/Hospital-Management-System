<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | View Invoice </title>
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
            <h5 class="text-center my-2">My Invoice</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <?php
            if (isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "SELECT * FROM income WHERE ID = '$id' ";
                $res = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($res);
            }
            ?>
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" colspan="2">Invoice Details</th>
                            </tr>

                            <tr>
                                <td>Doctor</td>
                                <td><?php echo $row['Doctor']; ?></td>
                            </tr>

                            <tr>
                                <td>Patient</td>
                                <td><?php echo $row['Patient']; ?></td>
                            </tr>

                            <tr>
                                <td>Date Discharge</td>
                                <td><?php echo $row['Date_discharge']; ?></td>
                            </tr>

                            <tr>
                                <td>Amount Paid</td>
                                <td><?php echo $row['Amount_paid']; ?></td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td><?php echo $row['Description']; ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
   </div>
</body>
</html>