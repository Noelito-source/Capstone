
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
	<link rel="stylesheet" href="db.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="../images/Logo.png " style="height:50px;width:50px;" alt="" id="logo" >
			&nbsp;	&nbsp;	&nbsp;	&nbsp;
			<span class="text">PWBS</span>
		</a>
		<ul class="side-menu top">
		<li >
				<a href="dash.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="adadmins.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Admins</span>
				</a>
			</li>
			<li>
				<a href="adadvisory.php">
					<i class='bx bx bxs-calendar-check' ></i>
					<span class="text">Advisory</span>
				</a>
			</li>
			<li class="active">
				<a href="adbillsum.php">
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
				<a href="adconslist.php">
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
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
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
			<a href="#" class="nav-link">Search Consumer</a>
			<form action="" method="post">
				<div class="form-input">
			
				</div>
			</form>
			
			</a>
			<a href="#" class="profile">
				<img src="./img/adddd.png">
			</a>
		</nav>
		<!-- NAVBAR -->

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

				</a>
			</div>
            <section id="content">
				<br> <br>

		<!-- MAIN -->
		
<script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"crossorigin="anonymous"></script>
<link href="./css/facebo.css" media="screen" rel="stylesheet" type="text/css" />
<script src="./lib/jquery.js" type="text/javascript"></script>
<script src="./js/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : './images/loading.gif',
		closeImage   : './images/closelabel.png'
	  })
	})
  </script>
<script src="./js/application.js" type="text/javascript" charset="utf-8"></script>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing System</title>
<style type="text/css">
#wrapper{
	height:500px; width:900px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba<br />
(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:2%;
}
#header { width:900px; height:100px;}
#content table{ margin:0 auto; }
#header ul li{
	list-style:none;
	float:left; margin-top:30px; margin-left:10px;}
</style>

</head>

<body>
<br />



</ul>
</div>
  <!-- NAVBAR START -->
  
  <div class="head-title">
				<div class="left">
				
				
			</div>  
            <?php
                if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
            ?>
<br><br><br><br>

            <div id="add-modal-form">
                <div class="modal-form">
                    <div class="top-form">
                        <div class="close-modal-form">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>

                    <div class ="add-form">
                        <h2>Add new account</h2>

                        <form class="form" method="POST" action="add_account.php">
                        <input required placeholder="Enter username" name="unique_id" value="PWBS" disabled>
                            <input required placeholder="Enter username" type="text" name="username" class="input">
                            <input required placeholder="Enter email" type="email" name="email" class="input">
                        
                            <input required placeholder="Enter password" type="password" name="password" class="input">
                            <select required type="text" name="user_type" class="input input--2" value="<?php echo $row['user_type']; ?>">
								<option value="user">User</option>
								<option value="admin">Admin</option>
                            </select>

                            <button type ="submit" name="add" class ="submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(function() {

                $('#add-show').click(function() {
                    $('#add-modal-form').fadeIn().css("display", "flex");
                });

                $('.close-modal-form').click(function() {
                    $('#add-modal-form').fadeOut();
                });
                });
            </script>
			<link rel="stylesheet" href="db.css">
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
    $query = "SELECT * FROM `users1` WHERE CONCAT(`user_id`, `fname`, `lname`, `unique_id`) LIKE '%".$valueToSearch."%'";
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
	  <br><br>
                <table class="content-table" id="table-data">
                    <thead>
                        <th>Id</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Can </th>
						<th>Status</th>
                        <th>Operator</th>
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
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
									<td><?php echo $row['unique_id']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    
                                    
                                    <td>
                                     
                                    <a rel='facebox' href="paybill.php?id=<?php echo $row['user_id']; ?>">
                                            <button class="edit">
                                                <span class='front icon' ><i class="bi bi-receipt"></i></span>
                                            </button>
                                        </a>
                                        <a rel='facebox' href="viewbill.php?id=<?php echo $row['user_id']; ?>">
                                       
                                            <button class="delete">
                                                <span class='front icon'><i class="bi bi-eye"></i></span>
                                            </button>
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
            <br>     <br>     <br>     <br>     <br>     <br>     <br>     <br>     <br>     <br>
<div id="content">
<?php

?>


</div>
</div>



</body>
</html>
 <script src="./js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
	<!-- CONTENT -->
	

	<script src="db.js"></script>
</body>
</html>