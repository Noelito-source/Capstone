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
if (Authentication::$role == 'Staff') {
	header("Location: dash.php");
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
			<li >
				<a href="adannounce.php" style="text-decoration: none;">
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
            <li class="active">
				<a href="adreport.php" style="text-decoration: none;">
                    <i class='bx bxs-report' ></i>
 					<span class="text">Report</span>
				</a>
			</li>
            
		</ul>
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
<h1>Report</h1>
<div id="forGeneratingReports" class="py-3">
   <button type="button" class="btn text-white rounded-fill" id="btnGenerateReport" style="background-color:#3A86FF;">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: white"><path d="m20 8-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM9 19H7v-9h2v9zm4 0h-2v-6h2v6zm4 0h-2v-3h2v3zM14 9h-1V4l5 5h-4z"></path></svg>
        Generate report
   </button>
   <div class="filter-report" style="display:none;">
     <div class=" d-flex align-items-end my-2">
        <div class="input-con mx-1">
	   	   <label for="dateMonth">Date</label>
           <input type="month" name="dateMonth" id="dateMonth" class="form-control rounded-0">
	    </div>
	    <div class="input-con mx-1">
		   <label for="dateMonth">Status</label>
           <select name="pStatus" id="pStatus" class=" form-select rounded-0">
		  	 <option value="Approved">Approved</option>
			 <option value="Declined">Decline</option>
			 <option value="Pending">Pending</option>
			 <option value="All">All</option>
		   </select>
	    </div>
	    <div class="input-con btn-print mx-1">
	  	   
	    </div>
      </div>
   </div>
</div>

<style>
	#consumerImage{
	  width: 60px;
	  height: 60px;
	  object-fit: cover;
	  border: 3px solid #f2f2f2;
	  border-radius: 50%;
	}
	.image-border{
	  outline: 3px solid #3a86ff;
	  overflow: hidden;
	  border-radius: 50%;
	}
</style>
<div class="report-table-container">
  <table class="table-data table table-sm table-striped" id="table-data" >
   <thead>
     <th class="py-2">Consumer</th>
     <th class="py-2">Mode of payment</th>
     <th class="py-2">Paid amount</th>
     <th class="py-2">Date</th>
     <th class="py-2">Time</th>
   </thead>
  <tbody>
 
  </tbody>
 </table>
</div>


</div>
</section>

</div>
 
<script>
   function getFilteredTable(dateReport, statusPayment){
    // for table
      $.ajax({
	    url: 'ajax/report/filtered_report.php',
	    type: 'GET',
        data: {
			 date: dateReport,
			 status: statusPayment
		},
		success: function(data){
           $('.report-table-container').html(data)
		}
	  })
   }
</script>
<script>
	$(document).ready(function(){
       $('#btnGenerateReport').click(function(){
		   $('.filter-report').slideToggle();
	   })
	   $('#dateMonth').change(function(){
		   const dateReport = $(this).val()
		   const statusPayment = $('#pStatus').val()
           // for button
		   $.ajax({
		     url: 'ajax/report/show_button_report.php',
		     type: 'GET',
             data: {
				 date: dateReport,
				 status: statusPayment
			  },
		     success: function(data){
               $('.btn-print').html(data)
		     }
	      })

          getFilteredTable(dateReport, statusPayment)
	   })
	   $('#pStatus').change(function(){
		   const dateReport = $('#dateMonth').val()
		   const statusPayment = $(this).val()
		   if (dateReport != '') {
			 $.ajax({
		       url: 'ajax/report/show_button_report.php',
		       type: 'GET',
               data: {
				  date: dateReport,
			  	  status: statusPayment
			   },
		       success: function(data){
                 $('.btn-print').html(data)
		       }
	         })
		   }
           getFilteredTable(dateReport, statusPayment)
	   })
	})
 
	$('#table-data').DataTable({
      autoWidth: false,
      order: [[0, 'desc']],
	  "language": {
      "emptyTable": "No selected date of report"
      },
      columnDefs: [
                   {
                     targets: ['_all'],
                     className: 'mdc-data-table__cell',
                   },
                  ],
     });
</script>
 
</body>
</html>