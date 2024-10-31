<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Total Appointment </title>
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
        $query = "SELECT * FROM appointment WHERE Status = 'Pending' ";
        $res = mysqli_query($connect, $query);

        $output = "";

        $output .= " <table class='table table-bordered'>
                        <tr>
                        <td>ID</td>
                        <td>Firstname</td>
                        <td>Surname</td>
                        <td>Gender</td>
                        <td>Phone</td>
                        <td>Appointment Date</td>
                        <td>Symtoms</td>
                        <td>Date Booked</td>
                        <td>Action</td>
                        </tr> ";

        if (mysqli_num_rows($res) < 1 )
            {
              $output .= " <tr>
                           <td class='text-center' colspan='9'>No Appointment Yet</td>
                           </tr> ";
            }

        while ($row = mysqli_fetch_array($res))
            {
              $output .= " <tr>
                           <td>".$row['ID']."</td>
                           <td>".$row['Firstname']."</td>
                           <td>".$row['Surname']."</td>
                           <td>".$row['Gender']."</td>
                           <td>".$row['Phone']."</td>
                           <td>".$row['Appointment_date']."</td>
                           <td>".$row['Symptoms']."</td>
                           <td>".$row['Date_booked']."</td>
                           <td><a href='discharge.php?id=".$row['ID']."'>
                           <button class='btn btn-info text-white'>Check</button>
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