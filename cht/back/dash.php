
<?php 

	require 'functionsf.php';
	

	$rows = db_query("select * from poll");


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
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="adadmins.php">
					<i class='bx bxs-group' ></i>
					<span class="text">User Management</span>
				</a>
			</li>
			<li>
				<a href="adadvisory.php">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Announcement</span>
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
				<a href="lgn.php" class="logout">
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
		
			<label ></label>
		
			</a>
			<a href="#" class="profile">
				<img src="./img/adddd.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
		
			</div>

			<ul class="box-info">
				<li>
				<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>   <?php
                
                $query = "SELECT user_id FROM users1 ORDER BY user_id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo $row.'</h4>';
            ?></h3>
						<p>Consumers</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-file-blank' ></i>
					<span class="text">
						<h3>  <?php
                
                $query = "SELECT id FROM bill ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo  $row.'</h4>';
            ?></h3>
						<p>Total Bills</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-message-minus' ></i>
					<span class="text">
						<h3>
              <?php
                
                $query = "SELECT id FROM poll ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo $row.'</h4>';
            ?></h3>
						<p>Total Feedback</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Feedbacks</h3>
						
					</div>
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Suggestions</th>
								<th>Rate</th>
							</tr>
						</thead>
						<tbody>
						<?php if(!empty($rows)):?>
		<?php foreach($rows as $row):?>
							<tr>
								<td>
									<img src="./images/fcons.png">
									<p><?=esc($row['name'])?></p>
								</td>
								<td> <?=esc($row['suggestions'])?>  </td>
								<td><span class="status completed"><?=esc($row['feedback'])?>  </span></td>
							</tr>
							<?php endforeach;?>
	<?php else:?>
		
	<?php endif;?>
							
						</tbody>
					</table>
				</div>
			
				
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="db.js"></script>
</body>
</html>