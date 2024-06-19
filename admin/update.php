<?php

session_start();

include "db.php";

$id=$_GET['id'];
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['surname'];
    $username=$_POST['username'];
	$password = ($_POST['pass']);
	$user_type=$_POST['role'];
	$status=$_POST['status'];
	
	mysqli_query($conn,"update `users` set firstname='$firstname', surname='$lastname', username='$username', password='$password', role='$user_type' , status='$status' where id='$id'");
	header('location: adadmins.php');
?>