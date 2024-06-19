<?php 
session_start();
  include("connection.php");

   
   $output = "";

  if (isset($_POST['login'])) {
  	   
  	   $uname = $_POST['uname'];
  	   $role = $_POST['role'];
  	   $pass = $_POST['pass'];

  	   if (empty($uname)) {
  	   	
  	   }else if(empty($role)){

  	   }else if(empty($pass)){

  	   }else{

         $query = "SELECT * FROM users WHERE username='$uname' AND role='$role' AND password='$pass'";
         $res = mysqli_query($connect,$query);

         if (mysqli_num_rows($res) == 1) {

         	  if ($role == "WaterTender") {

         	  	$_SESSION['WaterTender'] = $uname;
         	  	header("Location: wbs.php");
         	  	
         	  }else if($role == "Manager"){
                
                $_SESSION['Manager'] = $uname;
                header("Location:  dashboard.php");


         	  
			}else if($role == "Admin"){
                
                $_SESSION['Admin'] = $uname;
                header("Location: dashboard.php");
				
			



         	  }
         	 $output .= "you have logged-In";
         }else{
             $output .= "Failed to login";
         }

  	   }
  }




 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Palangoy Water Billing System</title>

</head>
<body>
	<?php include("head.php"); ?>



	<div class="container">
		<div class="col-md-12">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 shadow-sm" style="margin-top:100px;">
					<form method="post">
						<h3 class="text-center my-3">Login</h3>
						<div class="text-center"><?php echo $output; ?></div>
						<label>Username</label>
						<input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" autocomplete="off">
                         
                         <label>Select Role</label>
						<select name="role" class="form-control my-2">
							<option value="">Selete Role</option>
							<option value="WaterTender">WaterTender</option>
							<option value="Manager">Manager</option>
							<option value="Admin">Admin</option>
					
						</select>

						<label>Password</label>
						<input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

						<input type="submit" name="login" class="btn btn-success" value="Login">
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>