<?php 

	require 'functionad.php';

	

	$rows = db_query("select * from users");


?>
<?php 

include("connection.php");

$output = "";

if (isset($_POST['register'])) {
	
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$uname = $_POST['uname'];
	$gender = $_POST['gender'];
	$role = $_POST['role'];
	$pass = $_POST['pass'];
	$c_pass = $_POST['c_pass'];

	$error = array();

	if (empty($fname)) {
		$error['error'] = "Firstname is Empty";
	}else if(empty($sname)){
		$error['error'] = "Surname is empty";
	}else if(empty($uname)){
		$error['error'] = "username is empty";
	}else if(empty($gender)){
		$error['error'] = "Select Gender";
	}else if(empty($role)){
		$error['error'] = "Select role";
	}else if(empty($pass)){
		$error['error'] = "Enter Password";
	}else if(empty($c_pass)){
		$error['error'] = "Confirm Password";
	}else if($pass != $c_pass){
		$error['error'] = "Both password do not match";
	}



	if (isset($error['error'])) {
		$output .= $error['error'];
	}else{
		$output .= "";
	}


	if (count($error) < 1) {
		
		$query = "INSERT INTO users(firstname,surname,username,gender,role,password) VALUES('$fname','$sname','$uname','$gender','$role','$pass')";
		$res = mysqli_query($connect,$query);

		if ($res) {
			$output .= "You have successfully registered";
		
		}else{
			$output .= "Failed to register";
		}
	}
}



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Palangoy Multi-Purpose Cooperative</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./css/admin.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- ANIMATION -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"crossorigin="anonymous"></script>
</head>
    <body>
        <!-- NAVBAR START -->
        <div class="sidebar">
            <div class="logo_content">
                <div class="logo">
                    <img src="Logo.png">
                    <div class="logo_name">Palangoy Multi-Purpose <br>Cooperative</div>
                </div>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="dashboard.php">
                          <i class='bx bx-grid-alt'></i>
                          <span class="links_name">Dashboard</span>
                      </a>
                </li>
                <li>
                    <a href="admins.php">
                          <i class='bx bx-user'  id="consa"></i>
                          <span class="links_name" id="consbg">Admins</span>
                      </a>
                </li>
                <li>
                    <a href="advisory.php">
                          <i class='bx bx-error'></i>
                          <span class="links_name">Advisory</span>
                      </a>
                </li>
                <li>
                    <a href="billingsum.php">
                          <i class='bx bx-list-ol'></i>
                          <span class="links_name">Bill Summary</span>
                      </a>
                </li>
                <li>
                    <a href="consumer.php">
                          <i class='bx bxs-user-detail'></i>
                          <span class="links_name" >Consumer List</span>
                      </a>
                </li>
                <li>
                    <a href="inbx.php">
                          <i class='bx bx-history'></i>
                          <span class="links_name">Inbox</span>
                      </a>
                </li>
                <li>
                    <a href="audit_trail.html">
                          <i class='bx bx-history'></i>
                          <span class="links_name">Audit Trail</span>
                      </a>
                </li>
                <li>
                    <a href="#">
                          <i class='bx bx-cog'></i>
                          <span class="links_name">Settings</span>
                      </a>
                </li>
            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <img src="./images/admin.png">
                        <div class="name_job">
                            <div class="name">PMPC</div>
                            <div class="job">Cooperative</div>
                        </div>
                    </div>
                    <a href="logout.php" class="btn"><i class='bx bx-log-out' id="log_out"></i></a>
                </div>
            </div>
        </div>
        <!-- NAVBAR END -->
<br> <br> <br> <br> <br> 
        <!-- Modal ADD START -->
        <section class="admins">
            <button class="add" id="add-show">
                    <span class='shadow_add'></span>
                    <span class='edge_add'></span>
                    <span class='front_add icon'><i class='bx bxs-user-plus'></i></span>
            </button>

            <h1>ADMINS </h1>

            <?php
                if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
            ?>
        
      
            <div id="add-modal-form" >
                <div class="modal-form">
                    <div class="top-form">
                        <div class="close-modal-form">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>
                    <?php include("head.php"); ?>

                    <div class ="add-form" >
                        <h2>Add Account</h2>
                       
	<div class="container">
		<div class="col-md-12">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 shadow-sm" style="margin-top:100px;">
					<form method="post">
						<h3 class="text-center my-3">Register</h3>

						<div class="text-center"><?php echo $output; ?></div>

						<label>Firstname</label>
						<input type="text" name="fname" class="form-control my-2" placeholder="Enter Firstname" autocomplete="off">

						<label>Sername</label>
						<input type="text" name="sname" class="form-control my-2" placeholder="Enter Surname" autocomplete="off">


						<label>Username</label>
						<input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" autocomplete="off">

                        <label>Select Gender</label>
						<select class="form-control my-2" name="gender">
							<option value="">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
                         
                         <label>Select Role</label>
						<select name="role" class="form-control my-2">
							<option value="">Selete Role</option>
							<option value="WaterTender">WaterTender</option>
							<option value="Manager">Manager</option>
							<option value="Admin">Admin</option>
							
						</select>

						<label>Password</label>
						<input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

						<label>Confirm Password</label>
						<input type="password" name="c_pass" class="form-control my-2" placeholder="Enter Confirm Password">

						<input type="submit" name="register" class="btn btn-success" value="Register">
					</form>
				</div>
			</div>
		</div>
	</div>
                     
                    </div>
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
        <!-- MODAL ADD END -->

        <!-- DATA TABLE START -->
      
	<div class="row " style="margin-left: 15rem; " id="pls" >
	<?php if(!empty($rows)):?>
		<?php foreach($rows as $row):?>
       
			<div class="col-2 border rounded  mt-5 p-2 shadow-lg ml-1" style="margin-left: 0; position:flex; width: 200px;" id="pls">
				<a href="index.php?id=<?=$row['id']?>">
					<div class="col-md-12 text-center">
						<img src="./images/no-image.jpg" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
						<div>

						 	<div><?=esc($row['username'])?></div>
						 	<div><?=esc($row['firstname'])?> <?=esc($row['surname'])?>
                             <div><?=esc($row['role'])?></div>
                        </div>
						</div>
					</div>
				</a>
			</div>
           
		<?php endforeach;?>
	<?php else:?>
		<div class="text-center alert alert-danger">That profile was not found</div>
		<a href="index.php">
			<button class="btn btn-primary m-4">Home</button>
		</a>
	<?php endif;?>
	</div>
   
        <!-- DATA TABLE END -->

        <!-- PAGINATION START -->
        
               
        <!-- PAGINATION END -->
        </section>
    </body>     
</html>