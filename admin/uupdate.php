<?php

session_start();

include "db.php";

$id=$_GET['user_id'];
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
    $address=$_POST['address'];
	$email=$_POST['email'];
    $phone=$_POST['phone'];
	$status=$_POST['status'];
	
	mysqli_query($conn,"update `users1` set fname='$fname', lname='$lname', email='$email', address='$address', phone='$phone', status='$status' where user_id='$id'");
	header('location: adconslist.php');
?>