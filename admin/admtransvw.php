

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

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/adconslist.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#"  style="text-decoration:none; margin-right: 60rem;" class="brand">
			<img src="../images/Logo.png " style="height:50px;width:50px;" alt="" id="logo" >
			&nbsp;	&nbsp;	&nbsp;	&nbsp;
			<span class="text">PWBS</span>
		</a>
		<ul class="side-menu top">
        <li >
				<a href="dash.php" style="text-decoration:none;">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="adadmins.php" style="text-decoration:none;">
					<i class='bx bxs-group' ></i>
					<span class="text">User Management</span>
				</a>
			</li>
	
			<li>
				<a href="adannounce.php" style="text-decoration:none;">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
			<li>
				<a href="adbillsum.php" style="text-decoration:none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Summary</span>
				</a>
			</li>
			
			<li>
				<a href="login.php" style="text-decoration:none;">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li >
				<a href="adconslist.php" style="text-decoration:none;">
					<i class='bx bxs-group' ></i>
					<span class="text">Consumer List</span>
				</a>
			</li>
			<li class="active">
				<a href="admtrans.php" style="text-decoration:none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Transaction</span>
				</a>
			</li>
		</ul>
		</ul>
		<ul class="side-menu">
			<li >
				<a href="#" style="text-decoration:none;">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="lgin.php" class="logout" style="text-decoration:none;">
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

		<!-- MAIN -->
		
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	

<h1 class="text-center  text-white bg-dark col-md-12">PENDING LIST</h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
      <th scope="col">ID</th>
	 <th scope="col">NAME</th>
	 <th scope="col">PROOF</th>
	 <th scope="col">PRICE</th>
	 <th scope="col">REFERENCE </th>
	 <th scope="col">TRANSACTION CODE</th>
	 <th scope="col">STATUS</th>
	 <th scope="col">ACTION</th>
    </tr>
  </thead>

<?php 

$query = "SELECT * FROM payment WHERE status = 'pending' ORDER BY id ASC";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))  { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['fname']; ?></td>
	  <td>  <a href="aaaad.php"><img src="../user/pay/upload/<?php echo $row['pp']; ?>" alt="" style="height: 60px; width: 60px; border-radius: 2px 2px"> </a></td>
	  <td><?php echo $row['username']; ?></td>
	  <td><?php echo $row['ref']; ?></td>
	  <td><?php echo $row['password']; ?></td>
      <td><?php echo $row['status']; ?></td>


     <td>
		<form action="approved.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
		<input type="submit" name="approve" value="approve" class="btn btn-success" >  
		 <input type="submit" name="delete"  value="delete"  class="btn btn-danger"> 
		 <a rel='facebox' href="viewp.php?id=<?php echo $row['id']; ?>">
                                       
									   <button class="delete">
										   <span class='front icon'><i class="bi bi-eye"></i></span>
									   </button>
								   </a>
							   
		</form>
   </td>
    </tr>
   
  </tbody>
  <?php } ?>
</table>


<?php 
if(isset($_POST['approve'])){

	$id = $_POST['id'];
	$select = "UPDATE payment SET status = 'approved' WHERE id = '$id' ";
	$resut = mysqli_query($conn,$select);
	header("location:admtrans.php");
}


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "DELETE  FROM payment  WHERE id = '$id' ";
	$resut = mysqli_query($conn,$select);
	header("location:admtrans.php");
}

 ?>






<!-- ================================================================== -->



 



 <h1 class="text-center  text-white bg-success col-md-12
">APPROVED LIST </h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
	<th scope="col">ID</th>
	 <th scope="col">NAME</th>
	 <th scope="col">PROOF</th>
	 <th scope="col">PRICE</th>
	 <th scope="col">REFERENCE </th>
	 <th scope="col">TRANSACTION CODE</th>
	 <th scope="col">STATUS</th>
	 <th scope="col">ACTION</th>
    </tr>
  </thead>

<?php 
$query = "SELECT * FROM  payment";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)) { ?>


  <tbody>
    <tr>



	  <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['fname']; ?></td>
	  <td> <img src="../user/pay/upload/<?php echo $row['pp']; ?>" alt="" style="height: 60px; width: 60px; border-radius: 2px 2px"></td>
	  <td><?php echo $row['username']; ?></td>
	  <td><?php echo $row['ref']; ?></td>
	  <td><?php echo $row['password']; ?></td>
      <td><?php echo $row['status']; ?></td>

    </tr>
  </tbody>

  <?php } ?>

  
</table>
<br><br>

  
</table>
</body>
</html>
		
			
            <section id="content">
		<!-- NAVBAR -->
		
	
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
    $query = "SELECT * FROM `payment` WHERE CONCAT(`id`, `fname`, `username`, `ref, `password` , `price`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `payment`";
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

				
	<script src="db.js"></script>
</body>
</html>