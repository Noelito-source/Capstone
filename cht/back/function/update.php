<?php

session_start();

include "../db.php";

$id=$_GET['id'];
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['surname'];
    $username=$_POST['username'];
	$password = md5($_POST['password']);
	$user_type=$_POST['role'];
	
	mysqli_query($conn,"update `users` set firstname='$firstname', surname='$lastname', username='$username', password='$password', role='$user_type' where id='$id'");
	header('location: ./adadmins.php');
?>