<?php
  session_start(); 
  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Doctor's Profile </title>
</head>
<body>
    
<?php
  include("../include/header.php"); 
?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -12px;">
                <?php
                 include("sidenav.php");
                 include("../include/connection.php");
                ?>
                </div>

                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                $doc = $_SESSION['doctor'];
                                $query = "SELECT * FROM doctors WHERE Username = '$doc' ";
                                $res = mysqli_query($connect, $query);
                                $row = mysqli_fetch_array($res);

                                if (isset($_POST['upload']))
                                {
                                    $img = $_FILES['img']['name'];
                                    if (empty($img))
                                    {}
                                    else {
                                        $query = "UPDATE doctors SET Profile = '$img' WHERE Username = '$doc' ";
                                        $res = mysqli_query($connect, $query);
                                        if ($res)
                                        {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                        }
                                    }
                                }
                                ?>
                                <form method="post" enctype="multipart/form-data">
                                <?php
                                 echo "<img src='img/".$row['Profile']."' style='height: 250px;' class='col-md-12 my-3'>";
                                ?>
                                <input type="file" name="img" class="form-control my-1">
                                <input type="submit" name="upload" class="btn btn-success">
                                </form>

                                <div class="my-3">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2" class="text-center">Datails</th>
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
                                            <td>Phone No.</td>
                                            <td><?php echo $row['Phone']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo $row['Gender']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Salary</td>
                                            <td>$<?php echo $row['Salary']; ?></td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-center">Change Username</h5>
                                <?php
                                if (isset($_POST['change_uname']))
                                {
                                    $uname = $_POST['uname'];
                                    if (empty($uname))
                                    {}
                                    else {
                                        $query = "UPDATE doctors SET Username = '$uname' WHERE Username = '$doc' ";
                                        $res = mysqli_query($connect, $query);

                                        if ($res)
                                        {
                                            $_SESSION['doctor'] = $uname;
                                        }
                                    }
                                }
                                ?>
                                <form method="post">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                    <br>
                                    <input type="submit" name="change_name" class="btn btn-success" value="Change Username">
                                </form>
                                <br><br>
                                <h5 class="text-center my-2">Change Password</h5>
                                <?php
                        if (isset($_POST['change_pass']))
                        {
                            $old = $_POST['old_pass'];
                            $new = $_POST['new_pass'];
                            $con = $_POST['con_pass'];

                            $ol = "SELECT * FROM doctors WHERE Username = '$doc' ";
                            $ols = mysqli_query($connect, $ol);
                            $row = mysqli_fetch_array($ols);

                            if ($old != $row['Password'])
                            {}

                            else if (empty ($new))
                            {}

                            else if ($con != $new)
                            {}

                            else { 
                                $query = "UPDATE doctors SET Password = '$new' WHERE Username = '$doc' ";
                                mysqli_query($connect, $query);
                            }
                        }
                        ?>
                                <form method="POST">
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
                                        <input type="submit" name="change_name" class="btn btn-info text-white my-3" value="Change Password">
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