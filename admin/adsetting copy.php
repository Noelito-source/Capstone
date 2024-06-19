

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
<?php

include('db.php');

// get page number
if (isset($_GET['page_no']) && $_GET['page_no'] !=="") {
    $page_no = $_GET['page_no'];
}   else{
    $page_no = 1;
}

// total rows of records to display
$total_records_per_page = 10;

// get the page offset for the LIMIT query
$offset = ($page_no - 1) * $total_records_per_page;
// get previous page
$previous_page = $page_no - 1;
// get next page
$next_page = $page_no + 1;

//get the total count of records
$result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM waterbilling.users") or die(mysqli_error($conn));

// total records
$records = mysqli_fetch_array($result_count);

// store total_records to a variable
$total_records = $records['total_records']; 

// get total pages 
$total_no_of_pages = ceil($total_records / $total_records_per_page);

// query string
$sql = "SELECT * FROM waterbilling.users LIMIT $offset , $total_records_per_page";
// result
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/usermanagement.css">

	<title>User Management</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" style="    text-decoration: none;">
			<img src="../images/Logo.png " style="height:55px;width:55px;" alt="" id="logo" >
			&nbsp;	&nbsp;	&nbsp;	&nbsp;
			<span class="text">PWBS</span>
		</a>
		<ul class="side-menu top">
        <li >
				<a href="dash.php" style="    text-decoration: none;">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active" style="    text-decoration: none;">
				<a href="adadmins.php" style="    text-decoration: none;">
					<i class='bx bxs-group' ></i>
					<span class="text">Users Management</span>
				</a>
			</li>
			<li>
				<a href="adannounce.php" style="    text-decoration: none;">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
			<li>
				<a href="adbillsum.php" style="    text-decoration: none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Summary</span>
				</a>
			</li>
			
			<li>
				<a href="adminmess.php" style="    text-decoration: none;">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="adconslist.php"style="    text-decoration: none;">
					<i class='bx bxs-group' ></i>
					<span class="text">Consumer List</span>
				</a>
			</li>
			<li>
				<a href="admtrans.php"style="    text-decoration: none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Transaction</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#"style="    text-decoration: none;">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="lgn.php" class="logout"style="    text-decoration: none;">
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

		<!-- MAIN -->
		<br>
		<h1 id="usertitle">User Management</h1>
		
		<!-- NAVBAR -->

		
	
        <!-- Register Modal Start-->
	<script src="db.js"></script>
</body>
</html>