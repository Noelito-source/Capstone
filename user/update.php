<?php

session_start();

include "db2.php";

$id=$_GET['unique_id'];
	
	$firstname=$_POST['fname'];
	$lastname=$_POST['lname'];
    $username=$_POST['address'];
	$password = md5($_POST['pass']);
	$user_type=$_POST['role'];
	
	mysqli_query($conn,"update `users1` set fname='$firstname', lname='$lastname', address='$username', password='$password' where user_id='$id'");
	header('location: users.php');
?>