<?php include('database/connection.php')?>
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/acc.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
	<title>AdminHub</title>
	<style>
	  *{
		font-family: 'Jost', sans-serif;
	  }
      table thead tr th {
        border: none;
        text-align: center !important;
        color: white !important;
        background: #3a86ff !important;
      }
      td{
	   vertical-align: middle;
	   padding-top: 0px !important;
	   padding-bottom: 0px !important;
       text-align: center !important;
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
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" style="text-decoration: none;">
			<img src="../images/Logo.png " style="height:50px;width:50px;" alt="" id="logo" >
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
			<li>
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
			<li class="active">
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
				<a href="adsetting.php" style="text-decoration: none;">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php"class="logout" style="text-decoration: none;">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

<!-- Modal Bill payment -->
<div class="modal fade ms-5" id="modalSelectConsumer">
 <div class="modal-dialog modal-lg modal-container-consumer bg-white" role="document">
 </div>
</div>

 
 

<!-- CONTENT -->
<section id="content" class=" overflow-hidden">
 <!-- NAVBAR -->
 <nav class=" d-flex justify-content-between">
   <div class=" d-flex align-items-center">
     <i class='bx bx-menu' ></i>
     <a href="#" class="nav-link ms-1"><?php echo Authentication::$role?></a>
   </div>
   <div>
     <a href="#" class="profile">
	   <img src="./img/adddd.png">
     </a>
   </div>
 </nav>
 
<div class=" px-3 mb-5">
<h1>Walk-In Transaction</h1>
  <div class="input-con w-25 d-flex align-items-center border p-2 my-3">
       <i class="bi bi-search mx-1"></i>
       <input type="text" class="w-100 px-3 border-0 " id="btnOpenModalSelect" style="outline:0px" placeholder="Select Consumer" readonly data-bs-toggle="modal" data-bs-target="#modalSelectConsumer">
  </div>
  <div class="main-container border rounded-3 mt-2" style="background:#f2f2f2">
     <div class="nav-rooms d-flex border-bottom">
        <div id="navLatest" class="re-nav nav-active py-2 px-4 user-select-none border-2 mt-2" style="font-weight:bold;cursor: pointer;">
           Latest Bill
        </div>
     </div>
     <div class="bills-list py-3 mx-4">
	    <div class="col-12 py-5">
            <small class="d-block py-5 text-center text-secondary">Latest bill of selected user will show here</small>
         </div>
       </div>
  </div>
 
</div>
</section>

</div>
 
<script>
  	$('#btnOpenModalSelect').click(function(){
	      $.ajax({
		     url: 'ajax/walkin/select_consumer.php',
		     type: 'GET',
		     success: function(data){
               $('.modal-container-consumer').html(data)
		     }
	      })
	  })
</script>
 
<script>
	// $(document).ready(function(){
	// 	$('#modalBillPaymentList').modal('show')
	// })
</script>
</body>
</html>