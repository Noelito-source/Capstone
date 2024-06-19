<?php

// Add Account Start
session_start();

include "../config/config.php";

    $firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
    $username=$_POST['username'];
	$password = md5($_POST['password']);
	$user_type=$_POST['user_type'];
		
	mysqli_query($conn,"insert into `account` (firstname,lastname,username,password,user_type) values ('$firstname','$lastname','$username','$password','$user_type')");
    header('location: ../view/account.php');
// Add Account End


// Add Account Start
session_start();

include "../config/config.php";

    $can=$_POST['can'];
	$lastname=$_POST['lastname'];
    $firstname=$_POST['firstname'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$status=$_POST['status'];
		
	mysqli_query($conn,"insert into `consumer_list` (can,lastname,firstname,email,address,status) values ('$can','$lastname','$firstname','$email','$address','$status')");
    header('location: ../view/consumer_list.php');
// Add Account End
