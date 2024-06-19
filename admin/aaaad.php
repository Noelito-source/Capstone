
<?php 

include("connection.php");

$output = "";

if (isset($_POST['register'])) {

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$uname = $_POST['uname'];
$gender = $_POST['gender'];
$role = $_POST['role'];
$status = $_POST['status'];
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
    
    $query = "INSERT INTO users(firstname,surname,username,gender,role,status,password) VALUES('$fname','$sname','$uname','$gender','$role','$status','$pass')";
    $res = mysqli_query($connect,$query);

    if ($res) {
        $output .= "You have successfully registered";
    	header("location:adadmins.php");
    }else{
        $output .= "Failed to register";
    }
}
}



?>


<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="    background-color:    #11101d;">

    <div class="container" id="bgbg">
        <div class="row justify-content-center">
            <div class="col-md-8">

		
                <div class="card mt-5" style="width : 800px;">
                    <div class="card-header">
                        <h4>Add Staff</h4>
                    </div>
                    <div class="card-body" style="width : 800px;">

                        <form method="post" style="width : 700px;">

                          
                            <div class="form-group mb-3">
                                <label for="">Firstname</label>
                                <input type="text" name="fname"  class="form-control"  >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Lastname</label>
                                <input type="text"   name="sname" class="form-control"  >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Username</label>
                                <input type="text"   name="uname" class="form-control"  >
</div>
<label for="">Select Gender </label>
<select class="form-control my-2" name="gender">
					
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select >
                         <br>
                         <label for="">Select Role</label>
                         <?php
    include 'config2.php';
    $position=mysqli_query($conn,"select * from settings");
    ?>

<!-- Ayan code para sa select role lalagay mo yan dun sa form -->
<select class="form-control my-2" name="role" >
    <?php
        while ($settings = mysqli_fetch_array($position))
        {
        ?>
            <option><?php echo $settings['position']; ?></option>
        <?php
        }
    ?>
</select><br>
                        <label for="">Status </label>
<select class="form-control my-2" name="status">
					
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
							<div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text"    name="pass" class="form-control"  >
                            </div>
                            <div class="form-group mb-3">
                                <label for=""> Confirm Password</label>
                                <input type="password"   name="c_pass" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="register" class="btn btn-primary">Add </button>
                            </div>
                          
                        </form>
                        <div class="form-group mb-3">
                        <a href="adadmins.php">
                                <button type="submit"  class="btn btn-light">Back </button>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("adminmess1.php");?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

	<script src="db.js"></script>
</body>
</html>