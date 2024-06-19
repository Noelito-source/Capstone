<?php
 include('database/connection.php');
 session_start();
 $unique_id = $_SESSION['unique_id'];
 mysqli_query($sql_con, "UPDATE users1 SET status = 'InActive' WHERE unique_id = $unique_id");
 session_destroy();
 header("Location:login.php");
?>

