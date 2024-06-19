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