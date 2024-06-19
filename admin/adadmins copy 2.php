<?php include('database/connection.php');?>
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/usermanagement.css">


	    <!-- CSS -->
 <link rel="stylesheet" type="text/css" href="./css/useradd.css">

<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

<!-- FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- ICONS -->
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

<!-- ANIMATION -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- SWIPER -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<!-- JS -->
<script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
 
	<title>User Management</title>
</head>
<body>
<style>
	
</style>

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
		<?php

?>
 

<!-- Modal add/update staff -->
<div class="modal fade" id="modalAddUser">
 <div class="modal-dialog modal-container bg-white" role="document">
 
 </div>
</div>
<!-- Modal add/update staff end-->
  
		<button class="cssbuttons-io-button btn-modal-adduser" id="register-show" style="background-color:#3A86FF; width: 120px;" data-bs-toggle="modal" data-bs-target="#modalAddUser">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
            <span>Add </span>
        </button>
		
		<form action="" method="post" id="movebitch">
				<div class="form-input" >
					<input  id ="down" type="search" name="valueToSearch"  placeholder="Search User...">
					<button type="submit" name="search" value="Filter"><i class='bx bx-search' ></i></button>
				</div>
	   </form>
			<div id="btnnn">
	</div>
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
 <script>
	function editStaff(paginate = false){
		$('.edit-staff').click(function(){
 
        const staffId = $(this).attr('staff-id');
        if (!paginate) {
		  $.ajax({
		    url: 'ajax/user_management/form.php',
		    type: 'GET',
		    data: {
                staffid: staffId,
                form_type: 'update'
               },
		    success: function(data){
              $('.modal-container').html(data)
		    }
	      })
		}else{
			$.ajax({
		    url: 'ajax/user_management/form.php',
		    type: 'GET',
		    data: {
				staffid: staffId,
				form_type: 'update',
                record_start: paginate[0],
                record_end: paginate[1]
               },
		    success: function(data){
              $('.modal-container').html(data)
		    }
	      })
		}

      })
	}
 </script>
    <!-- Container where the staffs account will show -->
	<div class="staffs-list-container">
	</div>
    
	<script>
		(function(){
			$.ajax({
			  url: 'ajax/user_management/staffs.php',
			  type: 'GET',
			  success: function(data){
                $('.staffs-list-container').html(data)
			  }
		    })
		})();
		$(document).ready(function(){
			// $('#modalAddUser').modal('show')
			$('.btn-modal-adduser').click(function(){
				$.ajax({
					url: 'ajax/user_management/form.php',
					type: 'GET',
					data: {form_type: 'add'},
					success: function(data){
                      $('.modal-container').html(data)
					}
				})
			})
		})
	</script>
</body>
</html>