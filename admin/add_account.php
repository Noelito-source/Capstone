<?php
	include('config.php');
	
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password = md5($_POST['password']);
	$user_type=$_POST['user_type'];
		
	mysqli_query($conn,"insert into `account` (username,email,password,user_type) values ('$username','$email','$password','$user_type')");
	header('location:admin.php');
	
?>