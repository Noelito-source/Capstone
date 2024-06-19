

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
        
			<li class="active" style="    text-decoration: none;">
				<a href="sdash.php" style="    text-decoration: none;">
					<i class='bx bxs-group' ></i>
					<span class="text">Users Management</span>
				</a>
			</li>
			<li>
				<a href="sadann.php" style="    text-decoration: none;">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
			<li>
				<a href="sadbillsum.php" style="    text-decoration: none;">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Billing Summary</span>
				</a>
			</li>
			
			<li>
				<a href="adminmess.php" style="    text-decoration: none;">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="sadconslist.php"style="    text-decoration: none;">
					<i class='bx bxs-group' ></i>
					<span class="text">Consumer List</span>
				</a>
			</li>
			<li>
				<a href="sadmtrans.php"style="    text-decoration: none;">
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
			<a href="#" class="nav-link">Staff</a>
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
include('sadadmin.php');
?>
		<!-- NAVBAR -->

		
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
	<!-- CONTENT -->
    <table class="content-table" id="table-data">
                    <thead>
                        <th>Id</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Username</th>
                        <th>Gender</th>
						<th>Role</th>
						<th>Actions</th>
                    
                    </thead>

                    <tbody>
                        <?php
                            include('db.php');
                            $query=mysqli_query($conn,"select * from `users`");
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                  <?php while($row = mysqli_fetch_array($search_result)):?>
                                <tr>
                                <td><?php echo $row['id']; ?></td>
                            
                                    <td><?php echo $row['surname']; ?></td>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
									<td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['role']; ?></td>
                                    
									<td>
                                        <a href=" adedit.php?id=<?php echo $row['id']; ?>">
                                            <button class="edit"  id="update-show">
                                                <span class='front icon'><i class='bx bxs-edit-alt'></i></span>
                                            </button>
                                        </a>
                                   
                                    </td>
                                  
                                        </a>
                                    </td>
                                    
                                </tr>
                                <?php endwhile;?>
                                <?php } 
                        mysqli_close($conn)
                        ?>
                    </tbody>
                    
                </table>
				<nav aria-label="...">
                    <ul class="pagination">

                        <li class="page-item"><a class="page-link <?= ($page_no <= 1) ?
                        'disabled' : ''; ?> " <?= ($page_no > 1) ? 'href=?page_no=' .
                        $previous_page : ''; ?>>Previous</a></li>


                            <?php for($counter = 1; $counter <= $total_no_of_pages; $counter++) { ?>

                                <?php if ($page_no !== $counter){?>
                                <li class="page-item"><a class="page-link" href="?page_no=<?=$counter; ?>"><?=$counter; ?></a></li>
                                <?php } else { ?>
                                    <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                                <?php } ?>
                            <?php } ?>
                                
                        <li class="page-item"><a class="page-link <?= 
                        ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" <?= ($page_no < $total_no_of_pages) ? 'href=?page_no=' . $next_page : ''; ?> >Next</a></li>
                    </ul>
                </nav>
                <div class="p-10">
                    <strong>Page <?= $page_no; ?> of <?= $total_no_of_pages; ?></strong> 
                </div>
        <!-- PAGINATION END -->

        <!-- Register Modal Start-->
	<script src="db.js"></script>
</body>
</html>