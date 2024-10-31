<?php 
  include("../include/connection.php");

  $query = "SELECT * FROM doctors WHERE Status = 'Pending' ORDER BY Date_reg ASC ";
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
                   <td>".$row['Date_reg']."</td>
                   <td>
                   <div class='col-md-12'>
                   <div class='row'>
                   <div class='col-md-6'>
                   <button id= '".$row['ID']."' class='btn btn-success approve'>Approve</button>
                   </div>
                   <div class='col-md-6'>
                   <button id= '".$row['ID']."' class='btn btn-danger reject'>Reject</button>
                   </div>
                   </div>
                   </div>
                   </td>";
  }

  $output .= "</tr>
              </table>";

  echo $output;
?>