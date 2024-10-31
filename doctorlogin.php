<?php
session_start();
include("include/connection.php");

if (isset($_POST['login']))
{
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    $q = "SELECT * FROM doctors WHERE Username = '$uname' AND Password = '$password' ";
    $qq = mysqli_query($connect, $q);
    $row = mysqli_fetch_array($qq);

    if (empty($uname))
    { $error ['login'] = "Enter Username" ;}

    else if (empty($password))
    { $error ['login'] = "Enter Password" ;}

    else if ($row['Status'] == 'Pending')
    { $error ['login'] = "Please wait for the admin to confirm" ;}

    else if ($row['Status'] == 'Rejected')
    { $error ['login'] = "Try again later" ;}

    if (count($error) == 0)
    {
        $query = "SELECT * FROM doctors WHERE Username = '$uname' AND Password = '$password' ";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res))
        {
            echo "<script>alert('Done')</script>";
            $_SESSION['doctor'] = $uname;
            header("Location:  doctor/index.php");
        }

        else 
        {
            echo "<script>alert('Invalid Account')</script>";
            $_SESSION['doctor'] = $uname;
        }
    }
}

if (isset($error['login']))
{
    $l = $error['login'];
    $show = "<h5 class= 'text-center alert alert-danger'>$l</h5>";
}
else {
    $show = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Doctor Login Page </title>
</head>
<body style="background-image: url(image/back.jpeg); background-repeat: no-repeat; 
             background-size: cover;">
    
<?php
  include("include/header.php"); 
?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron my-3 card p-5" style="background-color: #D8D9DA;">
                    <h5 class="text-center my-2">Doctors Login</h5>

                    <div> <?php echo $show; ?> </div>

                    <form method="POST">
                        <div class="form-group my-3">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="form-group my-3">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off">
                        </div>

                        <input type="submit" name="login" class="btn btn-success my-3" value="Login">

                        <p>I don't have an account. <a href="apply.php">Apply Now</a> </p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
