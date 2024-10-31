<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Total Patient </title>
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
            <h5 class="text-center my-3">Total Patient</h5>
            <?php
            $query = "SELECT * FROM patient";
            $res = mysqli_query($connect, $query);

            $output = "";
            $output .= " <table class='table table-bordered'>
                        <tr>
                        <td>ID</td>
                        <td>Firstname</td>
                        <td>Surname</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Gender</td>
                        <td>Country</td>
                        <td>Date Reg.</td>
                        <td>Action</td>
                        </tr> ";

            if (mysqli_num_rows($res) >1 )
            {
              $output .= " <tr>
                           <td class='text-center' colspan='10'>No Patient Yet</td>
                           </tr> ";
            }

            while ($row = mysqli_fetch_array($res))
            {
              $output .= " <tr>
                           <td>".$row['ID']."</td>
                           <td>".$row['Firstname']."</td>
                           <td>".$row['Surname']."</td>
                           <td>".$row['Username']."</td>
                           <td>".$row['Email']."</td>
                           <td>".$row['Phone']."</td>
                           <td>".$row['Gender']."</td>
                           <td>".$row['Country']."</td>
                           <td>".$row['Date_reg']."</td>
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