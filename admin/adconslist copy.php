

<?php session_start();
if(!isset($_SESSION['id'])){

	
	}
?>
<?php

include('config.php');

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
$result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM waterbilling.users1") or die(mysqli_error($conn));

// total records
$records = mysqli_fetch_array($result_count);

// store total_records to a variable
$total_records = $records['total_records']; 

// get total pages 
$total_no_of_pages = ceil($total_records / $total_records_per_page);

// query string
$sql = "SELECT * FROM waterbilling.users1 LIMIT $offset , $total_records_per_page";
// result
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

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
	<link rel="stylesheet" href="./css/acc.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" style="text-decoration: none;">
			<img src="../images/Logo.png " style="height:50px;width:50px;" alt="" id="logo" >
			&nbsp;	&nbsp;	&nbsp;	&nbsp;
			<span class="text">PWBS</span>
		</a>
		<ul class="side-menu top">
        <li >
				<a href="dash.php" style="text-decoration: none;">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="adadmins.php" style="text-decoration: none;">
					<i class='bx bxs-group' ></i>
					<span class="text">User Management</span>
				</a>
			</li>
			<li>
				<a href="adadvisory.php" style="text-decoration: none;">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
			<li>
				<a href="adbillsum.php" style="text-decoration: none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Management</span>
				</a>
			</li>
			
		
			<li class="active">
				<a href="adconslist.php" style="text-decoration: none;">
					<i class='bx bxs-group' ></i>
					<span class="text">Consumer List</span>
				</a>
			</li>
			<li>
				<a href="admtrans.php" style="text-decoration: none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Transaction</span>
				</a>
			</li>
		</ul>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" style="text-decoration: none;">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="lgn.php"class="logout" style="text-decoration: none;">
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
			<a href="#" class="nav-link">Categories</a>
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

<br> <br>
		
		<?php
include('adam.php');
?>
		<form action="" method="post" id="movebitch">
				<div class="form-input" >
					<input type="search" name="valueToSearch" placeholder="Search...">
					<button type="submit" name="search"  value="Filter"><i class='bx bx-search' ></i></button>
				</div>
				
			</form>
		

<?php
            if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users1` WHERE CONCAT(`user_id`, `fname`, `lname`, `email`, `status` , `unique_id`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users1`";
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
<div id="tbmove">
	<!-- CONTENT -->
    <table class="content-table" id="table-data" style="width: 1200px;">
		
                    <thead>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
						<th>Address</th>
                        <th>Email</th>
                        <th>Account Number</th>
						<th>Status</th>
						<th>Action</th>
						
                    
                    </thead>

                    <tbody>
                        <?php
                            include('db.php');
                            $query=mysqli_query($conn,"select * from `users1`");
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                  <?php while($row = mysqli_fetch_array($search_result)):?>
                                <tr>
                                <td><?php echo $row['user_id']; ?></td>
                                    <td>  <img src="php/images/<?php echo $row['img']; ?>" alt="" style="height: 60px; width: 60px; border-radius: 2px 2px"></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
									<td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
									<td><?php echo $row['unique_id']; ?></td>
									<td><?php echo $row['status']; ?></td>
							    
								   
									<td>
									<a href=" admedit.php?id=<?php echo $row['user_id']; ?>">
                                            <button class="edit"  id="update-show">
                                                <span class='front icon'><i class='bx bxs-edit-alt'></i></span>
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
                </div>
	<script src="db.js"></script>
</body>
</html>