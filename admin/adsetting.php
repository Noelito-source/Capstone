<?php include('database/connection.php')?>
<?php
session_start();
include('auth/authentication.php');

if (!Authentication::Aunthenticate()) {
	header("Location: lgn.php");
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
			<li class="active">
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
<div class="modal fade ms-5" id="modalBillPayment">
 <div class="modal-dialog modal-lg modal-container-payment bg-white" role="document">
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
<h1>Settings</h1>
<style>
	.alert-msg{
		border: 1px solid #dcfce7;
		border-left: 2px solid #16a34a;
		background: #dcfce7;
	}
</style>
 <?php
   $user_id = Authentication::$id;
   $query = "SELECT * FROM users WHERE id = $user_id";
   $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
 ?>
<div class=" main-container border-top w-50">
     <div class="setting-container mt-1">
	    <div class="alert-con d-none">
	  	  <div class="alert-msg my-2 d-flex align-items-center py-2">
		    <i class="bi bi-exclamation-circle-fill px-3" style="font-size: 1.3rem;color: #16a34a;"></i>
		    <h6 class="note m-0 p-0 " style="color: #16a34a;">Password successfully changed</h6>
	      </div>
		</div>
		<div class="row">
			<div class="col-6">
			  <div class="input-con">
 	            <label for="uname" class=" fw-bold"  style="font-size: 1.1rem;">Username</label>
		        <input type="text" name="uname" id="uname" class="d-block text-muted border-0 rounded-0" style="outline: 0px" value="<?php echo $user['username']?>">
	          </div>
			</div>
			<div class="col-6">
			 
			</div>
		</div>
		
		<div class="row">
			<div class="col-6">
			  <div class="input-con">
 	            <label for="fname" class=" fw-bold"  style="font-size: 1.1rem;">Firstname</label>
		        <input type="text" name="fname" id="fname" class="d-block text-muted border-0 rounded-0" style="outline: 0px" value="<?php echo $user['firstname']?>">
	          </div>
			</div>
			<div class="col-6">
		  	  <div class="input-con">
 	            <label for="lname" class=" fw-bold"  style="font-size: 1.1rem;">Lastname</label>
		        <input type="text" name="lname" id="lname" class="d-block text-muted border-0 rounded-0" style="outline: 0px" value="<?php echo $user['surname']?>">
	          </div>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
			  <div class="input-con">
 	            <label for="gender" class=" fw-bold"  style="font-size: 1.1rem;">Gender</label>
		        <input type="text" name="gender" id="gender" class="d-block text-muted border-0 rounded-0" style="outline: 0px" value="<?php echo $user['gender']?>">
	          </div>
			</div>
			<div class="col-6">
		  	  <div class="input-con">
 	            <label for="role" class=" fw-bold"  style="font-size: 1.1rem;">Role</label>
		        <input type="text" name="role" id="role" class="d-block text-muted border-0 rounded-0" style="outline: 0px" value="<?php echo $user['role']?>">
	          </div>
			</div>
		</div>
		

		 <div class="input-con mt-3">
			<small class=" text-info d-block">Leave it blank if you dont want to change your password</small>
 	       <label for="password" class=" fw-bold"  style="font-size: 1.1rem;">New password</label>
		   <input type="password" name="password" id="password" class="form-control rounded-0 text-muted " placeholder="Enter new password">
	     </div>
		 <div class=" d-flex justify-content-end mt-1">
		    <button type="button" id="btnSave" class=" btn btn-primary">Save</button>
		 </div>
	 </div>
 </div>
</div>
</section>

</div>
<script>
	function showAlert(){
		$('.alert-con').removeClass('d-none');
		setTimeout(() => {
			$('.alert-con').addClass('d-none');
		}, 2500);
	}
</script>
<script>
	$(document).ready(function(){
	   $('#btnSave').click(function(){
		   const password = $('#password').val()
		   if (password != '' || password != null) {
			 $.ajax({
		       url: 'ajax/adsetting/change_password.php',
		       type: 'POST',
               data: {
			  	  pass: password
			   },
		       success: function(data){
				  $('#password').val('')
                  showAlert();
		       }
	         })
		   }
	 
	   })
	})
 
</script>
 
</body>
</html>