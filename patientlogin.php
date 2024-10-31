<?php
session_start();

include("include/connection.php");

if (isset($_POST['login']))
{
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if (empty($uname))
    {
        echo "<script>alert('Enter Username')</script>";
    }
    else if (empty($pass)) 
    {
        echo "<script>alert('Enter Password')</script>";
    }
    else {
        $query = "SELECT * FROM `patient` WHERE Username = '$uname' AND Password = '$pass' ";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res) == 1 )
        {
            header("Location: patient/index.php");
            $_SESSION['patient'] = $uname;
        }
        else {
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Patient Login Page </title>
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
                <div class="col-md-6 jumbotron my-5 card p-5" style="background-color: #D8D9DA;">
                    <h5 class="text-center my-3">Patient Login</h5>

                    <form method="POST">
                        <div class="form-group my-3">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="form-group my-3">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>

                        <input type="submit" name="login" class="btn btn-info my-3 text-white" value="Login">

                        <p>I don't have an account. <a href="account.php">Click Here</a> </p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>
</html>