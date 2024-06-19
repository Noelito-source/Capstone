<?php
include('database/connection.php');
session_start();
if (isset($_SESSION['id'])) {
  mysqli_query($sql_con, "UPDATE users SET status = 'InActive' WHERE id = ".$_SESSION['id']);
  session_destroy();
  header("Location: lgn.php");
}

 
?>