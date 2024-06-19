<?php 
session_start();
include('database/connection.php');

     $username = $_POST['username'];
     $password = $_POST['password'];

     $query = "SELECT * FROM users WHERE username = '$username'";
     $result = mysqli_query($sql_con, $query);
     $account = mysqli_fetch_assoc($result);
     $is_user_exist = mysqli_num_rows($result);

     if ($is_user_exist) {
        if ($account['password'] == md5($password)) {
           $_SESSION['id'] = $account['id'];
           $_SESSION['role'] = $account['role']; 
           $_SESSION['fname'] = $account['firstname']; 
           $_SESSION['lname'] = $account['surname']; 
           $_SESSION['username'] = $account['username']; 
           mysqli_query($sql_con, "UPDATE users SET status = 'Active' WHERE id = ".$account['id']);
           if ($_SESSION['role'] == 'Admin') {
			     header("Location: dash.php");
			     exit;
		     }
		     if($_SESSION['role'] == 'WaterTender' || $_SESSION['role'] == 'Staff'){
			     header("Location: adbillsum.php");
			     exit;
		     }
        }else{
          $error = "Please check you email or address";
        }
     }else{
       $error = "Please check you email or address";
     }
	 header("Location: lgn.php?error");
	 exit;
 
	
	 
?>