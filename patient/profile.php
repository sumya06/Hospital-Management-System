<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Patient Profile </title>
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

            <?php
                include("sidenav.php"); 

                $patient = $_SESSION['patient'];
                $query = "SELECT * FROM patient WHERE Username = '$patient' ";
                $res = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($res);
            ?>

            </div>
            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if (isset($_POST['upload']))
                            {
                                $img = $_FILES['img']['name'];

                                if (empty($img))
                                {}
                                else {
                                    $query = "UPDATE patient SET Profile = '$img' WHERE Username = '$patient' ";
                                    $res = mysqli_query($connect, $query);
                                    if ($res)
                                    {
                                        move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                    }
                                }
                            }
                            ?>
                            <h5>My Profile</h5>
                            <form method="POST" enctype="multipart/form-data">
                                <?php
                                 echo "<img src='img/".$row['Profile']."' alt='My Profile' class='col-md-12' style='height: 250px;'>";
                                ?>

                                <input type="file" name="img" class="form-control my-2">
                                <input type="submit" name="upload" class="btn btn-info text-white" value="Update Profile">
                                
                            </form>

                            <table class="table table-bordered my-3">
                                <tr>
                                    <th colspan="2" class="text-center">My Details</th>
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
                                    <td>Username</td>
                                    <td><?php echo $row['Username']; ?></td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $row['Email']; ?></td>
                                </tr>

                                <tr>
                                    <td>Phone Number</td>
                                    <td><?php echo $row['Phone']; ?></td>
                                </tr>

                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $row['Gender']; ?></td>
                                </tr>

                                <tr>
                                    <td>Country</td>
                                    <td><?php echo $row['Country']; ?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h5 class="text-center">Change Username</h5>
                            <?php
                            if (isset($_POST['update']))
                            {
                                $uname = $_POST['uname'];

                                if (empty($uname))
                                {}
                                else {
                                    $query = "UPDATE patient SET Username = '$uname' WHERE Username = '$patient' ";
                                    $res = mysqli_query($connect, $query);

                                    if ($res)
                                    {
                                        $_SESSION['patient'] = $uname;
                                    }
                                }
                            } 
                            ?>
                            <form method="post">
                                <label>Enter Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                <input type="submit" name="update" class="btn btn-info text-white my-2" value="Update Username">
                            </form>

                            <?php
                            if (isset($_POST['change']))
                            {
                                $old = $_POST['old_pass'];
                                $new = $_POST['new_pass'];
                                $con = $_POST['con_pass'];

                                $q = "SELECT * FROM patient WHERE Username = '$patient' ";
                                $re = mysqli_query($connect, $q);
                                $row = mysqli_fetch_array($re);

                                if (empty($old))
                                { echo "<script>alert('Enter Old Password')</script>"; }
                                else if (empty($new))
                                { echo "<script>alert('Enter New Password')</script>"; }
                                else if ($con != $new)
                                { echo "<script>alert('Both Password do not match')</script>"; }
                                else if ($old != $row['Password'])
                                { echo "<script>alert('Check the Password')</script>"; }
                                else {
                                    $query = "UPDATE patient SET Password = '$new' WHERE Username = '$patient' ";
                                    mysqli_query($connect, $query);
                                }
                            }
                            ?>
                            <h5 class="my-4 text-center">Change Password</h5>
                            <form method="post">
                                <div class="form-group my-3">
                                    <label>Old Password</label>
                                    <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                </div>

                                <div class="form-group my-3">
                                    <label>New Password</label>
                                    <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
                                </div>

                                <div class="form-group my-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
                                    <input type="submit" name="change" class="btn btn-info text-white my-2" value="Change Password">
                                </div>
                                
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