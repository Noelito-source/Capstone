<?php include('database/connection.php');?>
<?php 
session_start();
include('auth/authentication.php');

if (!Authentication::Aunthenticate()) {
	header("Location: lgn.php");
	exit;
}
if (Authentication::$role == 'WaterTender') {
	header("Location: adbillsum.php");
	exit;
}
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
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/usermanagement.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <!-- ANIMATION -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <!-- JS -->
    <!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
 
	<title>User Management</title>
	<style>
		*{
			font-family: 'Jost', sans-serif;
		}
		#sidebar{
         z-index: 0 !important;
	    }
		a{
			text-decoration: none;
		}
	</style>
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
	 	 <?php if(Authentication::$role == 'Staff' || Authentication::$role == 'Admin'):?>
			<li>
				<a href="dash.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
		   	 </li>
		 <?php endif;?>	
		 <?php if(Authentication::$role == 'Admin'):?>
			<li>
				<a href="adadmins.php">
					<i class='bx bxs-group' ></i>
					<span class="text">User Management</span>
				</a>
			</li>
		 <?php endif;?>	
		 <?php if(Authentication::$role == 'Admin'):?>
			<li>
				<a href="adannounce.php">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
		 <?php endif;?>	
		 <?php if(Authentication::$role == 'Admin' || Authentication::$role == 'WaterTender'):?>
			<li>
				<a href="adbillsum.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Management</span>
				</a>
			</li>
		 <?php endif;?>	
		 <?php if(Authentication::$role == 'Staff' || Authentication::$role == 'Admin'):?>
			<li class="active">
				<a href="adconslist.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Consumer List</span>
				</a>
			</li>
		 <?php endif;?>
		 <?php if(Authentication::$role == 'Admin'):?>
			<li>
				<a href="admtrans.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Transaction</span>
				</a>
			</li>
		 <?php endif;?>
		 <?php if(Authentication::$role == 'Staff' || Authentication::$role == 'Admin'):?>
			<li>
				<a href="adwalkin.php" style="text-decoration: none;">
				    <i class='bx bx-walk'></i>
 					<span class="text">Walk-in</span>
				</a>
			</li>
		 <?php endif;?>
		 <?php if(Authentication::$role == 'Admin'):?>
			<li>
				<a href="adreport.php" style="text-decoration: none;">
                    <i class='bx bxs-report' ></i>
 					<span class="text">Report</span>
				</a>
			</li>
		 <?php endif;?>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="adsetting.php"style="    text-decoration: none;">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout"style="    text-decoration: none;">
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
		<br>
		
		 
 

<!-- Modal add/update staff -->
<div class="modal fade" id="modalAddUser">
 <div class="modal-dialog modal-lg modal-container bg-white" role="document">
 </div>
</div>
<!-- Modal add/update staff end-->


<h1 class="px-3 m-0">Consumer List</h1>
<div class="button-addstaff-con m-3">
     <button type="button" class="btn-modal-addconsumer btn text-white rounded-fill" id="register-show" style="background-color:#3A86FF;" data-bs-toggle="modal" data-bs-target="#modalAddUser">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
        Add New Consumer 
    </button>
</div>

    <!-- Container where the staff accounts will show -->
	<div class="consumers-list-container px-3 mb-5">
	</div>
    
	<script>
		(function(){
			$('.consumers-list-container').html(`
            <div class="loading py-5">
               <div class="d-flex justify-content-center py-5 my-3">
                   <div class="spinner-border spinner-border-sm text-info"></div>
                </div>
             </div>
           `)
			$.ajax({
			  url: 'ajax/adconslist/consumers.php',
			  type: 'GET',
			  success: function(data){
                $('.consumers-list-container').html(data)
			  }
		    })
		})();
		$(document).ready(function(){
			// $('#modalAddUser').modal('show')
			// $.ajax({
			// 		url: 'ajax/adconslist/form.php',
			// 		type: 'GET',
			// 		data: {form_type: 'add'},
			// 		success: function(data){
            //           $('.modal-container').html(data)
			// 		}
			// })

			$('.btn-modal-addconsumer').click(function(){
				$.ajax({
					url: 'ajax/adconslist/form.php',
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