<?php include('database/connection.php')?>
<?php
session_start();
include('auth/authentication.php');
if (!Authentication::Aunthenticate()) {
	header("Location: lgn.php");
	exit;
}
if (Authentication::$role == 'Staff') {
	header("Location: dash.php");
	exit;
}
// Deactivate account of user that have 3 unpaid bills
 $consumers_to_deactivate = [];

 $query = "SELECT * FROM users1 WHERE status = 'Active' OR status = 'InActive'";
 $result = mysqli_query($sql_con, $query);
 while ($user = mysqli_fetch_assoc($result)) {
	$user_id = $user['user_id'];
	$query = "SELECT * FROM bill WHERE status = 'Unpaid' AND owners_id = $user_id ORDER BY date DESC";
	$latest_bill = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
    if (isset($latest_bill['date'])) {
		$bill_due = date('m/d/Y', strtotime('7 day', strtotime($latest_bill['date'])));
	    $current_date = date('m/d/Y');
        $is_due_finished = strtotime($current_date) >= strtotime($bill_due);
	    $query = "SELECT * FROM bill WHERE status = 'Unpaid' AND owners_id = $user_id";
        $number_of_unpaid_bills = mysqli_num_rows(mysqli_query($sql_con, $query)); 
  	    if ($number_of_unpaid_bills >= 3 && $is_due_finished) {
	   	  array_push($consumers_to_deactivate, $user_id);
	    }
	}
 }

if (count($consumers_to_deactivate)) {
	foreach ($consumers_to_deactivate as $id) {
		$query = "UPDATE users1 SET status = 'Disconnected' WHERE user_id = $id";
		mysqli_query($sql_con, $query);
	 }
}

//  end
 
 
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
		<?php if(Authentication::$role != 'WaterTender'):?>
		  <ul class="side-menu top">
            <li>
				<a href="dash.php" style="text-decoration: none;">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="adadmins.php" style="text-decoration: none;">
					<i class='bx bxs-group' ></i>
					<span class="text">User Management</span>
				</a>
			</li>
			<li >
				<a href="adannounce.php" style="text-decoration: none;">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
			<li class="active">
				<a href="adbillsum.php" style="text-decoration: none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Management</span>
				</a>
			</li>	
			<li >
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
			<li>
				<a href="adwalkin.php" style="text-decoration: none;">
				    <i class='bx bx-walk'></i>
 					<span class="text">Walk-in</span>
				</a>
			</li>
			<li>
				<a href="adreport.php" style="text-decoration: none;">
                    <i class='bx bxs-report' ></i>
 					<span class="text">Report</span>
				</a>
			</li>
		 </ul>
		<?php else:?>
	     <ul class="side-menu top">
	        <li class="active">
				<a href="adbillsum.php" style="text-decoration: none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Management</span>
				</a>
			</li>
		</ul>
	   <?php endif;?>
	   
		<ul class="side-menu">
			<li>
				<a href="adsetting.php" style="text-decoration: none;">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout" style="text-decoration: none;">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

<!-- Modal Bill Form -->
<div class="modal fade ms-5" id="modalBill">
 <div class="modal-dialog modal-lg modal-container-billform bg-white" role="document">
 </div>
</div>


<!-- Modal Member Bill list -->
<div class="modal fade" id="modalBillList">
  <div class="modal-dialog modal-lg modal-md modal-container-bills bg-white" role="document">
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
 
 <style>
	.warning{
		background: #fee2e2 !important;
	}
 </style>
<div class=" px-3 mb-5">
<h1>Billing Summary</h1>
  <table class="table-data table table-sm" id="table-data" >
   <thead>
     <th class="py-2">Id</th>
     <th class="py-2">Firstname</th>
     <th class="py-2">Lastname</th>
     <th class="py-2">Email</th>
     <th class="py-2">Ca </th>
     <th class="py-2">Operator</th>
   </thead>
  <tbody>
   <?php 
     $query = "SELECT * FROM users1 WHERE status != 'Pending'";
	 $result = mysqli_query($sql_con, $query);
   ?>
   <?php while($row = mysqli_fetch_array($result)):?>
	 <?php
	     $user_id = $row['user_id'];
	     $query = "SELECT * FROM bill WHERE owners_id = $user_id AND status = 'Unpaid'";
		 $number_of_unpaid_bills = mysqli_num_rows(mysqli_query($sql_con, $query)); 
	   ?>
     <tr>
       <td class="<?php echo $number_of_unpaid_bills == 3 ? 'warning':'';?>"><?php echo $row['user_id']; ?></td>
       <td class="<?php echo $number_of_unpaid_bills == 3 ? 'warning':'';?>"><?php echo $row['fname']; ?></td>
       <td class="<?php echo $number_of_unpaid_bills == 3 ? 'warning':'';?>"><?php echo $row['lname']; ?></td>
       <td class="<?php echo $number_of_unpaid_bills == 3 ? 'warning':'';?>"><?php echo $row['email']; ?></td>
       <td class="<?php echo $number_of_unpaid_bills == 3 ? 'warning':'';?>"><?php echo $row['unique_id']; ?></td>             
       <td class="<?php echo $number_of_unpaid_bills == 3 ? 'warning':'';?>">
	     <button class="btn-add-bill" user-id="<?php echo $row['user_id']; ?>" data-bs-toggle="modal" data-bs-target="#modalBill">
		    <i class="bi bi-receipt text-primary"></i> 
	     </button>
		 <button type="button" class="btn-view-bills px-3" user-id="<?php echo $row['user_id']; ?>" data-bs-toggle="modal" data-bs-target="#modalBillList">
		    <i class="bi bi-eye text-danger"></i> 
	     </button>
      </td>                          
     </tr>
    <?php endwhile;?>
  </tbody>
 </table>
</div>
</section>

</div>
 
<script>
	function getBillForm(){
		$('.btn-add-bill').click(function(){
	      const userId = $(this).attr('user-id')
	      $.ajax({
		     url: 'ajax/adbillsum/bill_form.php',
		     type: 'GET',
             data: {userid: userId},
		     success: function(data){
               $('.modal-container-billform').html(data)
		     }
	      })
	  })
	}

	function getBillsList(){
		$('.btn-view-bills').click(function(){
	      const userId = $(this).attr('user-id')
	      $.ajax({
		     url: 'ajax/adbillsum/bills.php',
		     type: 'GET',
             data: {userid: userId},
		     success: function(data){
               $('.modal-container-bills').html(data)
		     }
	      })
	  })
	}

 
</script>
<script>
	getBillForm();
	getBillsList();
	$('#table-data').on('page.dt', function () {
        console.log('change')
        getBillForm();
		getBillsList();
    }).DataTable({
      autoWidth: false,
      order: [[0, 'desc']],
      columnDefs: [
                   {
                     targets: ['_all'],
                     className: 'mdc-data-table__cell',
                   },
                  ],
     });
</script>
<script src="db.js"></script>
</body>
</html>