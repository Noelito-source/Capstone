

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="./css/bg.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="    background-color:    #11101d;">
<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = {$_SESSION['id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
               
    <div class="container" id="bgbg">
        <div class="row justify-content-center">
            <div class="col-md-8">

		
                <div class="card mt-5" style="width : 800px;">
                    <div class="card-header">
                        <h4>Update</h4>
                    </div>
                    <div class="card-body" style="width : 800px;">

                        <form action="codes.php" method="POST" style="width : 700px;">
                        <div class="form-group mb-3">
                                <label for="">ID</label>
                                <input type="text" name="id" value="<?php echo $row['id']?>" class="form-control"  >
                            </div>
                          
                            <div class="form-group mb-3">
                                <label for="">Firstname</label>
                                <input type="text" name="fname" value="<?php echo $row['fname']?>" class="form-control"  >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Lastname</label>
                                <input type="text"   name="lname" value="<?php echo $row['surname']?>"  class="form-control"  >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Username</label>
                                <input type="text"   name="uname" value="<?php echo $row['username']?>"  class="form-control"  >
</div>
<label for="">Select Gender </label>
<select class="form-control my-2" name="gender">
<option value="Male" value="<?php echo $row['gender']?>" ></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
                         <br>
                         <label for="">Select Role</label>
						<select name="role" class="form-control my-2">
                        <option value="<?php echo $row['role']?>"></option>
							<option value="WaterTender">WaterTender</option>
							<option value="Staff">Staff</option>
							<option value="Admin">Admin</option>
							
						</select>
							<div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text"  value="<?php echo $row['password']?>"  name="pass" class="form-control"  >
                            </div>
                       
                            <div class="form-group mb-3">
                                <button type="submit" name="register" class="btn btn-primary">Update </button>
                            </div>
                          
                        </form>
                        <div class="form-group mb-3">
                        <a href="adadmins.php">
                                <button type="submit"  name="update_stud_data" class="btn btn-light">Back </button>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

	<script src="db.js"></script>
</body>
</html>