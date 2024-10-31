<?php
  session_start();
  include("include/connection.php");
  
  if (isset($_POST['login']))
  {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($username))
    {
        $error ['admin'] = "Enter Username";
    }

    else if (empty($password))
    {
        $error ['admin'] = "Enter Password";
    }

    if (count($error)==0)
    {
        $query = "SELECT * FROM `admin` WHERE Username = '$username' AND Password = '$password' ";

        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1)
        {
            echo "<script>alert('You have login as an Admin')</script>";
            $_SESSION ['admin'] = $username;

            header("Location:admin/index.php");
            exit();
        }

        else
        {
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Admin Login Page </title>
</head>
<body style="background-image: url(image/back.jpeg); background-repeat: no-repeat; 
             background-size: cover;">

<?php
  include("include/header.php"); 
?>

<div style="margin-top: 20px;"></div>

   <div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
           
            <div class="col-md-6 jumbotron card p-5" style="background-color: #D8D9DA;">
                <img src="image/admin.jpeg" class="col-md-12" alt="Admin Login">
                <form action="" method="POST" class="my-2">

                  <div>
                   <?php
                    
                    if (isset($error['admin']))
                    {
                        $sh = $error['admin'];

                        $show = "<h4 class='alert alert-danger'>$sh</h4>";
                    }

                    else
                    {
                        $show = "";
                    }
                    echo $show;

                    ?>
                  </div>

                    <div class="form-group my-3">
                        <label>Username</label>
                        <input type="text" name="uname" autocomplete="off" class="form-control" placeholder="Enter Username">
                    </div>

                    <div class="form-group my-3">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control">
                    </div>

                    <input type="submit" name="login" class="btn btn-success" value="Login">
                </form>
            </div>

            <div class="col-md-3"></div>
        </div>
    </div>
   </div>

</body>
</html>