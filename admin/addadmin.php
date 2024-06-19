

<?php session_start();
if(!isset($_SESSION['id'])){

	
	}
?>
<?php

include('config.php');

?>

<?php
include('security.php');
?><?php
include('dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/adadmin.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="../images/Logo.png " style="height:50px;width:50px;" alt="" id="logo" >
			&nbsp;	&nbsp;	&nbsp;	&nbsp;
			<span class="text">PWBS</span>
		</a>
		<ul class="side-menu top">
        <li >
				<a href="dash.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="adadmins.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Users Management</span>
				</a>
			</li>
			<li>
				<a href="adadvisory.php">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Advisory</span>
				</a>
			</li>
			<li>
				<a href="adbillsum.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Summary</span>
				</a>
			</li>
			
			<li>
				<a href="adminmess.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="adconslist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Consumer List</span>
				</a>
			</li>
			<li>
				<a href="../oph/admin">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Transaction</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="login.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Admin</a>
			<form action="#">
				<div class="form-input">
				</div>
			</form>
		
			</a>
			<a href="#" class="profile">
				<img src="./img/adddd.png">
			</a>
		</nav>
		<!-- NAVBAR -->
<?php include('aaaad.php');?>
		<!-- MAIN -->
	<script src="db.js"></script>
</body>
</html>