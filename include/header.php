<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!--== Bootstrap CDN ==-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
    <!--== jQuery CDN ==-->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
    <!--== Font Awesome CDN ==-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

     <nav class="navbar navbar-expand-lg navbar-info bg-info">
      <a class="navbar-brand text-white ml-5" href="index.php">
      <i class="fa-solid fa-heart-pulse"></i> <b> CARE </b> </a>

     <div class="m-auto"></div>

     <ul class="navbar-nav mr-5">

     <?php
     
        if (isset($_SESSION['admin']))
        {  
            $user = $_SESSION['admin'];

        echo '<li class="nav-item">
            <a href="#" class="nav-link text-white">'.$user.'</a></li>

        <li class="nav-item">
            <a href="logout.php" class="nav-link text-white">Log Out</a></li>';  
        }

        else if (isset($_SESSION['doctor']))
        {
            $user = $_SESSION['doctor'];

        echo '<li class="nav-item">
            <a href="#" class="nav-link text-white">'.$user.'</a></li>

        <li class="nav-item">
            <a href="logout.php" class="nav-link text-white">Log Out</a></li>';
        }

        else if (isset($_SESSION['patient']))
        {
            $user = $_SESSION['patient'];

        echo '<li class="nav-item">
            <a href="#" class="nav-link text-white">'.$user.'</a></li>

        <li class="nav-item">
            <a href="logout.php" class="nav-link text-white">Log Out</a></li>';
        }

        else {
            echo '<li class="nav-item">
            <a href="index.php" class="nav-link text-white">Home</a></li>

        <li class="nav-item">
        <a href="adminlogin.php" class="nav-link text-white">Admin</a></li>

        <li class="nav-item">
            <a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>

        <li class="nav-item">
            <a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';            
        }
     ?>

        


     </ul>
     </nav>

</body>

</html>