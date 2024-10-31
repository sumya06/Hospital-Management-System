<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Admin Profile </title>
</head>
<body>

<?php
  include("../include/header.php"); 
?>

   <div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -82px;">
            <?php
                  include("sidenav.php");
                  include("../include/connection.php");
                  
                  $ad = $_SESSION['admin'];
                  $query = "SELECT * FROM admin WHERE Username = '$ad' ";
                  $res = mysqli_query($connect, $query);

                  while ($row = mysqli_fetch_array($res))
                  {
                    $username = $row ['Username'];
                    $profiles = $row ['Profile'];
                  }
                ?>
            </div>

            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><?php echo $username; ?> Profile</h4>

                            <?php
                            
                            if (isset($_POST['update']))
                            {
                                $profile = $_FILES['profile']['name'];

                                if (empty($profile))
                                {}                                
                                else {
                                    $query = "UPDATE admin SET Profile = '$profile' WHERE Username = '$ad' ";
                                    $result = mysqli_query($connect, $query);

                                    if ($result)
                                    {
                                        move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
                                    }
                                }
                            }
                            ?>
                            
                            <form method="POST" enctype="multipart/form-data">
                                <?php
                                 echo "<img src='img/$profiles' class='col-md-12' style='height: 200px;' alt='Admin Profile'>";
                                ?>
                                <br><br>
                                <div class="form-group">
                                    <label>UPDATE PROFILE</label>
                                    <input type="file" name="profile" class="form-control">
                                    <br>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                                </div>
                            </form>

                        </div>
                        <div class="col-md-6">
                            <?php
                            if (isset($_POST['change']))
                            {
                                $uname = $_POST['uname'];

                                if (empty($uname))
                                {}
                                else {
                                    $query = "UPDATE admin SET Username = '$uname' WHERE Username = '$ad' ";
                                    $res = mysqli_query($connect, $query);

                                    if ($res)
                                    {
                                        $_SESSION['admin'] = $uname;
                                    }
                                }
                            }
                            ?>
                        <form method="POST"  class="my-3">
                            <label>Change Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off"><br>
                            <input type="submit" name="change" value="CHANGE" class="btn btn-success">
                        </form>

                        <br>

                        <?php
                        if (isset($_POST['update_pass']))
                        {
                            $old_pass = $_POST['old_pass'];
                            $new_pass = $_POST['new_pass'];
                            $con_pass = $_POST['con_pass'];

                            $error = array();
                            $old = mysqli_query($connect, "SELECT * FROM admin WHERE Username = '$ad' ");
                            
                            $row = mysqli_fetch_array($old);
                            $pass = $row['Password'];

                            if (empty($old_pass))
                            {
                                $error ['p'] = "Enter Old Password";
                            }

                            else if (empty($new_pass))
                            {
                                $error ['p'] = "Enter New Password";
                            }

                            else if (empty($con_pass))
                            {
                                $error ['p'] = "Confirm Password";
                            }

                            else if (empty($old_pass != $pass))
                            {
                                $error ['p'] = "Invalid Old Password";
                            }

                            else if (empty($new_pass != $con_pass))
                            {
                                $error ['p'] = "Both Password Does Not Match";
                            }

                            if (count($error) == 0)
                            {
                                $query = "UPDATE admin SET Password = '$new_pass' WHERE Username = '$ad' ";
                                mysqli_query($connect, $query);
                            }
                        }

                        if (isset($error['p']))
                        {
                            $e = $error['p'];
                            $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                        }
                        else {
                            $show = "" ;
                        }
                        ?>

                        <form method="POST">
                            <h5 class="text-center my-4">Change Password</h5>

                            <div>
                                <?php
                                echo $show;
                                ?>
                            </div>

                            <div class="form-group my-3">
                                <label>Old Password</label>
                                <input type="password" name="old_pass" class="form-control">
                            </div>

                            <div class="form-group my-3">
                                <label>New Password</label>
                                <input type="password" name="new_pass" class="form-control">
                            </div>

                            <div class="form-group my-3">
                                <label>Confirm Password</label>
                                <input type="password" name="con_pass" class="form-control">
                            </div>

                            <br>
                            <input type="submit" name="update_pass" value="Update Password" class="btn btn-info text-white">
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