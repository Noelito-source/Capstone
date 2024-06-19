<?php include('config.php');?>
<?php  
  date_default_timezone_set('Asia/Manila');
  if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && isset($_POST['id'])) {
	 $payment_id = $_POST['id'];
     $user_id = $_POST['userid'];
	 $current_date = date('Y-m-d h:i:s A');
	 //update paymeny status
	 $query = "UPDATE payment SET status = 'Approved' WHERE id = $payment_id";
	 mysqli_query($conn, $query);

	//  notify user about his/her payment status
	 $query = "INSERT INTO notifications(user_id, type, message, date)
	          VALUES('$user_id', 'payment', 'Your payment has been approved', '$current_date')";
	 mysqli_query($conn, $query);
     header("Location: admtrans.php?action=approved");
	 exit;
  }
?>
<?php
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


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<title>PWBS</title>
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
				<a href="dash.php" style="text-decoration:none; margin-left: -2rem;">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="adadmins.php"style="text-decoration:none; margin-left: -2rem;">
					<i class='bx bxs-group' ></i>
					<span class="text">User Management</span>
				</a>
			</li>
	
			<li>
				<a href="adannounce.php" style="text-decoration:none; margin-left: -2rem;">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
			<li>
				<a href="adbillsum.php" style="text-decoration:none; margin-left: -2rem;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Summary</span>
				</a>
			</li>
			
	
			<li >
				<a href="adconslist.php" style="text-decoration:none; margin-left: -2rem;">
					<i class='bx bxs-group' ></i>
					<span class="text">Consumer List</span>
				</a>
			</li>
			
			<li class="active">
				<a href="admtrans.php" style="text-decoration:none; margin-left: -2rem;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Transaction</span>
				</a>
			</li>
		</ul>
		</ul>
		<ul class="side-menu">
			<li >
				<a href="#" style="text-decoration:none; margin-left: -2rem;">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="lgn.php" class="logout"style="text-decoration:none; margin-left: -2rem;">
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
		
 
<body>
	<style>
		.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
  height: 180%;
  margin-left: 50rem;
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.alert{
	width: 350px;
	border-left: 2px solid green;
}
.loader{
	width: 0%;
	animation-name: notif-loading;
	animation-duration: 3s;
}
@keyframes notif-loading {
	from{width: 100%};
	to{width: 0%}
}
	</style>

<!-- notification -->
<?php if(isset($_GET['action']) && $_GET['action'] == 'approved'):?>
 <div id="alertCon" class=" d-flex justify-content-end my-2 px-5">
   <div class=" alert shadow m-0 p-0">
	 <div class="border border-primary loader"></div>
     <div class="py-3 px-4">
	   <span class="text-success">Success</span>
	   <span>Client payment has been approved</span>
	 </div>
   </div>
 </div>
<?php endif;?>
<?php if(isset($_GET['action']) && $_GET['action'] == 'pending'):?>
 <div id="alertConn" class=" d-flex justify-content-end my-2 px-5">
   <div class=" alert shadow m-0 p-0">
	 <div class="border border-primary loader"></div>
     <div class="py-3 px-4">
	   <span class="text-danger">Declined</span>
	   <span>Client payment has been Denied</span>
	 </div>
   </div>
 </div>
<?php endif;?>

<h1 class="m-0 text-center text-white bg-dark col-md-12">PENDING LIST</h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
      <th scope="col">Consumer</th>
	 <th scope="col">Proof of payment</th>
	 <th scope="col">PROOF</th>
	 <th scope="col">PRICE</th>
	 <th scope="col">REFERENCE </th>
	 <th scope="col">TRANSACTION CODE</th>
	 <th scope="col">STATUS</th>
	 <th scope="col">ACTION</th>
    </tr>
  </thead>

 
 
</table>

 

<script>
	<?php if(isset($_GET['action']) && $_GET['action'] == 'approved'):?>
	  setTimeout(() => {
		document.querySelector('#alertCon').classList.remove('d-flex');
		document.querySelector('#alertCon').style.display = 'none';
	  }, 3000);
	<?php endif;?>
	<?php if(isset($_GET['action']) && $_GET['action'] == 'pending'):?>
	  setTimeout(() => {
		document.querySelector('#alertConn').classList.remove('d-flex');
		document.querySelector('#alertConn').style.display = 'none';
	  }, 3000);
	<?php endif;?>
</script>
</body>
</html>