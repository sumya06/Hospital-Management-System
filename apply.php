<?php
include("include/connection.php");

if (isset($_POST['apply']))
{
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if (empty($firstname))
    { $error['apply'] = 'Enter First Name' ;}

    else if (empty($surname))
    { $error['apply'] = 'Enter Surname' ;}

    else if (empty($username))
    { $error['apply'] = 'Enter Username' ;}

    else if (empty($email))
    { $error['apply'] = 'Enter Email' ;}

    else if (empty($gender == ""))
    { $error['apply'] = 'Select Your Gender' ;}

    else if (empty($phone))
    { $error['apply'] = 'Enter Phone Number' ;}

    else if (empty($country == ""))
    { $error['apply'] = 'Select Country' ;}

    else if (empty($password))
    { $error['apply'] = 'Enter Password' ;}

    else if (empty($confirm_password != $password))
    { $error['apply'] = 'Both password do not match' ;}

    if (count($error) == 0)
    {
        $query = "INSERT INTO doctors(Firstname, Surname, Username, Email, Gender, Phone, Country, Password, Salary, Date_reg, Status, Profile)
        VALUES ('$firstname', '$surname', '$username', '$email', '$gender', '$phone', '$country', '$password', '0', NOW(), 'Pending', 'doctor.jpg' )";

        $result = mysqli_query($connect, $query);

        if ($result)
        {
            echo "<script>alert('You have Successfully Applied')</script>";
            header("Location: doctorlogin.php");
        }

        else {
            echo "<script>alert('Failed')</script>";
        }
    }

} 

if (isset($error))
{
    $s = $error['apply'];
    $show = "<h5 class= 'text-center alert alert-danger'>$s</h5>";
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
    <title> CARE | Apply Now </title>
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
                    <h5 class="text-center my-2">Apply Now</h5>

                    <div> <?php echo $show; ?> </div>   

                    <form method="POST">
                        <div class="form-group my-3">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" 
                            value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
                        </div>

                        <div class="form-group my-3">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname"
                            value="<?php if (isset($_POST['sname'])) echo $_POST['sname']; ?>">
                        </div>

                        <div class="form-group my-3">
                            <label>Userrname</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"
                            value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">
                        </div>

                        <div class="form-group my-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address"
                            value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>

                        <div class="form-group my-2">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                               <option value="">Select Your Gender</option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group my-2">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number"
                            value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        </div>

                        <div class="form-group my-2">
                            <label>Country</label>
                            <select name="country" class="form-control">
                              <option value="">Select Your Country</option>
                              <option value="Russia">Russia</option>
                              <option value="Pakistan">Pakistan</option>
                              <option value="Ghana">Ghana</option>
                            </select>
                        </div>

                        <div class="form-group my-2">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>

                        <div class="form-group my-2">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                        </div>

                        <input type="submit" name="apply" class="btn btn-success my-3" value="Apply Now">
                        <p>I already have an account <a href="doctorlogin.php"> Click here </p>
                        
                    </form>
                </div>

                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>
</html>