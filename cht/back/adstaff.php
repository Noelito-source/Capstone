

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
	<link rel="stylesheet" href="./css/adconslist.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar" style="background-color:powderblue;">
		<a href="#" class="brand">
			<img src="../images/Logo.png " style="height:50px;width:50px;" alt="" id="logo" >
			&nbsp;	&nbsp;	&nbsp;	&nbsp;
			<span class="text">PWBS</span>
		</a>
		<ul class="side-menu top">
    
			<li class="active">
				<a href="adstaff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Admins</span>
				</a>
			</li>
			<li>
				<a href="advstaff.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Advisory</span>
				</a>
			</li>
			<li>
				<a href="adbstaff.php">
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
				<a href="adstaffc.php">
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
			<a href="#" class="nav-link">Staff</a>
			<form action="#">
				<div class="form-input">
			
				</div>
			</form>

		
			
			<a href="#" class="profile">
				<img src="./img/zss.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Admins</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Admins</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Table</a>
						</li>
					</ul>
				</div>
			
			</div>
            <section id="content">
		<!-- NAVBAR -->
		<?php
include('adadmin.php');
?>
	
		<form action="" method="post">
				<div class="form-input">
					<input type="search" name="valueToSearch"  placeholder="Search...">
					<button type="submit" name="search" value="Filter"><i class='bx bx-search' ></i></button>
				</div>
			</form>
		
		
<?php
            if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `firstname`, `surname`,  `username` , `gender`, `role`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "waterbilling");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
	<!-- CONTENT -->
    <table class="content-table" id="table-data">
                    <thead>
                        <th>Id</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Username</th>
                        <th>Gender</th>
						<th>Role</th>
						<th>Actions</th>
                    
                    </thead>

                    <tbody>
                        <?php
                            include('db.php');
                            $query=mysqli_query($conn,"select * from `users`");
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                  <?php while($row = mysqli_fetch_array($search_result)):?>
                                <tr>
                                <td><?php echo $row['id']; ?></td>
                            
                                    <td><?php echo $row['surname']; ?></td>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
									<td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['role']; ?></td>
                                    
									<td>
                                        <a href=" adedit.php?id=<?php echo $row['id']; ?>">
                                            <button class="edit"  id="update-show">
                                                <span class='front icon'><i class='bx bxs-edit-alt'></i></span>
                                            </button>
                                        </a>
                                   
                                        <a href="../function/delete.php?id=<?php echo $row['id']; ?>">
                                            <button class="delete">
                                                <span class='front icon'><i class='bx bxs-trash'></i></span>
                                            </button>
                                        </a>
                                    </td>
                                  
                                        </a>
                                    </td>
                                    
                                </tr>
                                <?php endwhile;?>
                                <?php } 
                        mysqli_close($conn)
                        ?>
                    </tbody>
                    
                </table>
	<script src="db.js"></script>
</body>
</html>