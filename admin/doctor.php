<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Total Doctors </title>
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
            <h5 class="text-center my-3">Total Doctors</h5>
                <?php
                $query = "SELECT * FROM doctors WHERE Status = 'Approved' ORDER BY Date_reg ASC ";
                $res = mysqli_query($connect, $query);

                $output = "";

  $output .= "<table class='table table-bordered'>
                <tr>
                   <th>ID</th>
                   <th>Firstname</th>
                   <th>Surname</th>
                   <th>Username</th>
                   <th>Email</th>
                   <th>Gender</th>
                   <th>Phone</th>
                   <th>Country</th>
                   <th>Salary</th>
                   <th>Date Registered</th>
                   <th>Action</th>
                </tr>";

  if (mysqli_num_rows($res) < 1 )
  {
  $output .= "<tr>
                   <td colspan = '10' class= 'text-center'>No Job Request Yet.</td>
                </tr>";
  }            

  while ($row = mysqli_fetch_array($res))
  {
    $output .= "<tr>
                   <td>".$row['ID']."</td>
                   <td>".$row['Firstname']."</td>
                   <td>".$row['Surname']."</td>
                   <td>".$row['Username']."</td>
                   <td>".$row['Email']."</td>
                   <td>".$row['Gender']."</td>
                   <td>".$row['Phone']."</td>
                   <td>".$row['Country']."</td>
                   <td>".$row['Salary']."</td>
                   <td>".$row['Date_reg']."</td>
                   <td>
                   <a href='edit.php?id=".$row['ID']."'>
                   <button class='btn btn-info'>Edit</button>
                   </a>
                   </td>";
  }

  $output .= "</tr>
              </table>";

  echo $output;
                ?>

            </div>
        </div>
      </div>
   </div>
</body>
</html>