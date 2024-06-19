


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
	<link rel="stylesheet" href="db.css">

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
				<a href="dash.php" style="margin-left: -2rem;">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active" >
				<a href="adadmins.php" style="margin-left: -2rem;">
					<i class='bx bxs-group' ></i>
					<span class="text">User Management</span>
				</a>
			</li>
			<li>
			<a href="adannounce.php" style="margin-left: -2rem;">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
			<li>
				<a href="adbillsum.php" style="margin-left: -2rem;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Summary</span>
				</a>
			</li>
			
			<li >
				<a href="login.php" style="margin-left: -2rem;">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="adconslist.php" style="margin-left: -2rem;">
					<i class='bx bxs-group' ></i>
					<span class="text">Consumer List</span>
				</a>
			</li>
			<li>
				<a href="adbillsum.php" style="margin-left: -2rem;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Transaction</span>
				</a>
			</li>
		</ul>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' style="margin-left: -2rem;"></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="lgn.php"class="logout" style="margin-left: -2rem;">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->

	<!-- CONTENT -->
	
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

	<script src="db.js"></script>
</body>
</html>