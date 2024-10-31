<?php 
  include("../include/connection.php");

  $id = $_POST['id'];

  $query = "UPDATE doctors SET Status = 'Rejected' WHERE ID = '$id' ";
  mysqli_query($connect, $query);
  
?>