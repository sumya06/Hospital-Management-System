<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Edit Doctor </title>
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

                <?php
                  include("sidenav.php"); 
                ?>

            </div>
                <div class="col-md-10">
                <h5 class="text-center my-3">Edit Doctor</h5>

                <?php
                if (isset($_GET['id']))
                {
                  $id = $_GET['id'];
                  $query = "SELECT * FROM doctors WHERE ID = '$id' ";
                  $res = mysqli_query($connect, $query);

                  $row = mysqli_fetch_array($res);
                }
                ?>

                <div class="row">
                  <div class="col-md-8">
                  <h5 class="text-center">Doctor Details</h5>
                    <h5 class="my-3">ID : <?php echo $row['ID']; ?></h5>
                    <h5 class="my-3">Firstname : <?php echo $row['Firstname']; ?></h5>
                    <h5 class="my-3">Surname : <?php echo $row['Surname']; ?></h5>
                    <h5 class="my-3">Username : <?php echo $row['Username']; ?></h5>
                    <h5 class="my-3">Email : <?php echo $row['Email']; ?></h5>
                    <h5 class="my-3">Phone : <?php echo $row['Phone']; ?></h5>
                    <h5 class="my-3">Gender : <?php echo $row['Gender']; ?></h5>
                    <h5 class="my-3">Country : <?php echo $row['Country']; ?></h5>
                    <h5 class="my-3">Date Registered : <?php echo $row['Date_reg']; ?></h5>
                    <h5 class="my-3">Salary : $<?php echo $row['Salary']; ?></h5>
                  </div>
                  <div class="col-md-4">
                  <h5 class="text-center">Update Salary</h5>

                  <?php
                  if (isset($_POST['update']))
                  {
                    $salary = $_POST['salary'];
                    $q = "UPDATE doctors SET Salary = '$salary' WHERE ID = '$id' ";
                    mysqli_query($connect, $q);
                  }
                  ?>

                  <form method="POST">
                    <label>Enter Doctor's Salary</label>
                    <input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctor's Salary"
                    value="<?php echo $row['Salary']; ?>">
                    <input type="submit" name="update" class="btn btn-info my-3" value="Update Salary">
                  </form>
                  </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>