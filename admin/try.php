<?php

include('db.php');

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$password = substr( str_shuffle( $chars ), 0, 5 );

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
$result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM capstone.consumer") or die(mysqli_error($conn));

// total records
$records = mysqli_fetch_array($result_count);

// store total_records to a variable
$total_records = $records['total_records']; 

// get total pages 
$total_no_of_pages = ceil($total_records / $total_records_per_page);

// query string
$sql = "SELECT * FROM capstone.consumer LIMIT $offset , $total_records_per_page";
// result
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palangoy Multi-Purpose Cooperative</title>
    <link rel="stylesheet" href="./css/consumer_list.css">
    <?php include "./shared/link.php"?>
</head>
    <body class="body">
        <!-- Main Header -->

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

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/usermanagement.css">

	<title>User Management</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" style="    text-decoration: none;">
			<img src="../images/Logo.png " style="height:55px;width:55px;" alt="" id="logo" >
			&nbsp;	&nbsp;	&nbsp;	&nbsp;
			<span class="text">PWBS</span>
		</a>
		<ul class="side-menu top">
   
	
			<li>
				<a href="adbillsum.php" style="    text-decoration: none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Summary</span>
				</a>
			</li>
			
		
		
			<li class="active" style="    text-decoration: none;">
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
			<a href="#" class="nav-link">Water Tender</a>
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
		<h1 id="usertitle">Setting</h1>
		
		<!-- NAVBAR -->

		
	
        <!-- Register Modal Start-->
	<script src="db.js"></script>
</body>
</html>
        <?php include "./shared/navbar.php"?>




       
        <!-- PAGINATION END -->

        <!-- Register Modal Start-->
        
                     
                        </div>
                    </div>
<br><br>
                    <div class ="register-form" style="margin-left: 20rem;">
                        <h2>Add new Role</h2>

                        <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                        ?>

                        <form action="../function/add.php" method="post">
                            <input type="text" name="position" class="input">

                            <input type="hidden" value="1" name="status" class="input">
                            <input type="hidden" value="<?php echo "Consumer"; ?>" name="user_type" class="input">

                            <button type="submit" style="background-color:#4092FE;" name="register_posistion" class ="submit-btn-1" onClick="alert('Saved successfully!');">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <br>   
            <div class ="register-form" style="margin-left: 20rem;">
                        <h2>About Us</h2>

                        <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                        ?>

                        <form action="../function/add.php" method="post">
                            <input type="text" name="position" class="input" style="height:160px; width:600px;" >

                            <input type="hidden" value="1" name="status" class="input" >
                            <input type="hidden" value="<?php echo "Consumer"; ?>" name="user_type" class="input">

                            <button type="submit" style="background-color:#4092FE;" name="register_posistion" class ="submit-btn-1" onClick="alert('Saved successfully!');">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Register Modal End--> 

        <?php include "./shared/script.php"?>

        <script type="text/javascript">
            $(function() {

            $('#register-show').click(function() {
                $('#register-modal-form').fadeIn().css("display", "flex");
            });

            $('.close-modal-form').click(function() {
                $('#register-modal-form').fadeOut();
            });
            });
        </script>
    </body>
</html>