<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CARE | Admin </title>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">All Admin</h5>
                                <?php                                
                                $ad = $_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE Username != '$ad' ";
                                $res = mysqli_query($connect, $query);

                                $output = "<table class='table table-bordered'>
                                            <tr>
                                              <th>ID</th>
                                              <th>Username</th>
                                              <th style='width: 10%;'>Action</th>
                                            </tr>";

                                if (mysqli_num_rows($res) < 1)
                                {
                                    $output .= "<tr><td colspan='3' class='text-center'>No New Admin</td></tr>";
                                }

                                while ($row = mysqli_fetch_array($res))
                                {
                                    $id = $row ['ID'];
                                    $username = $row ['Username'];

                                    $output .= "<tr>
                                                  <td>$id</td>
                                                  <td>$username</td>
                                                  <td>
                                                  <a href='admin.php?id=$id'>
                                                  <button id='$id' class='btn btn-danger remove'>Remove</button>
                                                  </a>
                                                  </td>";
                                }

                                $output .= "</tr>
                                        </table>";

                                        echo $output;

                                        if (isset($_GET['id']))
                                        {
                                            $id = $_GET['id'];
                                            $query = "DELETE FROM admin WHERE ID = '$id' ";
                                            mysqli_query($connect, $query);
                                        }
                                ?>   
                            </div>

                            <div class="col-md-6">
                            <?php
                              if (isset($_POST['add']))
                              {
                                $uname = $_POST['uname'];
                                $pass = $_POST['pass'];
                                $image = $_FILES['img']['name'];

                                $error = array();

                                if (empty($uname))
                                {
                                    $error['u'] = "Enter Admin Username";
                                }

                                else if (empty($pass))
                                {
                                    $error['u'] = "Enter Admin Password";
                                }

                                else if (empty($image))
                                {
                                    $error['u'] = "Add Admin Picture";
                                }

                                if (count($error) ==0)
                                {
                                    $q = "INSERT INTO admin (Username, Password, Profile) VALUES ('$uname', '$pass', '$image')";
                                    $result = mysqli_query($connect, $q);

                                    if ($result) 
                                    {
                                        move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
                                    }

                                    else {

                                    }
                                }
                              }
                              
                            if (isset($error['u']))
                              {
                                $er = $error['u'];
                                $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                            }

                            else {
                                $show = "";
                            }
                            
                            ?>
                                <h5 class="text-center">Add Admin</h5>
                                <form method="POST" enctype="multipart/form-data">

                                <div>
                                    <?php echo $show; ?>
                                </div>

                                    <div class="form-group my-2">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Add Admin Picture</label>
                                        <input type="file" name="img" accept="image/*" class="form-control">
                                    </div>
                                    <input type="submit" name="add" value="Add New Admin" class="btn btn-success my-2">
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