<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Total Income </title>
</head>
<body>
            
<?php
  include("../include/header.php"); 
  include("../include/connection.php");
?>

  <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-2" style="margin-left: -12px;">
          <?php include("sidenav.php"); ?>
        </div>
            <div class="col-md-10">
                <h5 class="text-center my-2">Total Income</h5>
                <?php
                $query = "SELECT * FROM income ";
                $res = mysqli_query($connect, $query);

                $output = "";
            $output .= "<table class='table table-bordered'>
                        <tr>
                        <td>ID</td>
                        <td>Doctor</td>
                        <td>Patient</td>
                        <td>Date Discharge</td>
                        <td>Amount Paid</td>
                        </tr> ";

                if (mysqli_num_rows($res) < 1 )
            {
              $output .= " <tr>
                           <td class='text-center' colspan='5'>No Patient Discharge Yet.</td>
                           </tr> ";
            }        

            while ($row = mysqli_fetch_array($res))
            {
              $output .= " <tr>
                           <td>".$row['ID']."</td>
                           <td>".$row['Doctor']."</td>
                           <td>".$row['Patient']."</td>
                           <td>".$row['Date_discharge']."</td>
                           <td>".$row['Amount_paid']."</td>";
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