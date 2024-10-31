<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | My Invoice </title>
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
            <?php
            $pat = $_SESSION['patient'];

            $query = "SELECT * FROM patient WHERE Username = '$pat' ";
            $res = mysqli_query($connect, $query);

            $row = mysqli_fetch_array($res);

            $fname = $row ['Firstname'];

            $querys = mysqli_query($connect, "SELECT * FROM income WHERE Patient = '$fname' " );

            $output = "";
            $output .= " <table class='table table-bordered'>
                        <tr>
                        <td>ID</td>
                        <td>Doctor</td>
                        <td>Patient</td>
                        <td>Date Discharge</td>
                        <td>Amount Paid</td>
                        <td>Description</td>
                        <td>Action</td>
                        </tr> ";

            if (mysqli_num_rows($querys) < 1 )
            {
              $output .= " <tr>
                           <td class='text-center' colspan='7'>No Invoice Yet</td>
                           </tr> ";
            }

            while ($row = mysqli_fetch_array($querys))
            {
              $output .= " <tr>
                           <td>".$row['ID']."</td>
                           <td>".$row['Doctor']."</td>
                           <td>".$row['Patient']."</td>
                           <td>".$row['Date_discharge']."</td>
                           <td>".$row['Amount_paid']."</td>
                           <td>".$row['Description']."</td>
                           <td><a href='view.php?id=".$row['ID']."'>
                           <button class='btn btn-info'>View</button>
                           </a></td> ";
            }

            $output .= " </tr>
                         </table> ";

            echo $output;
            ?>
            </div>
        </div>
    </div>
   </div>

</body>
</html>