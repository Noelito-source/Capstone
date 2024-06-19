

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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./css/adconslist.css">

	<title>AdminHub</title>
</head>
<body>

		
                <?php
	include('db.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `users` where id='$id'");
	$row=mysqli_fetch_array($query);

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Palangoy Multi-Purpose Cooperative</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="edit_account.css">

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
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
    <body>
        <!-- EDIT FORM START -->
		


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<style>
    .bg{
        background-color: #fff;
    }
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

		
                <div class="card mt-5" style="width : 800px; height:800px;">
                    <div class="card-header">
                        <h4>Update Account</h4>
                    </div>
                    <div class="card-body" style="width : 800px;">

                        <form  method="POST" action="update.php?id=<?php echo $id; ?>" style="width : 700px;">

                            <div class="form-group mb-3">
                                <label for=""> ID</label>
                                <input type="text" name="id"  value="<?php echo $row['id']; ?>"  class="form-control"  >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Firstname</label>
                                <input type="text" name="firstname" value="<?php echo $row['firstname']?>" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Lastname</label>
                                <input type="text"   value="<?php echo $row['surname']?>" name="surname" class="form-control"  >
                            </div>
							<div class="form-group mb-3">
                                <label for="">Username</label>
                                <input type="text"   value="<?php echo $row['username']?>" name="username" class="form-control" s>
                            </div>
						
      <!-- Username -->
      <label class="control-label"   for="username">Username</label>
      <div class="controls">
        <input type="text" id="username"  value="<?php echo $row['username']; ?>" name="username" placeholder="" class="input-xlarge">

      </div>
    

						&nbsp;	<select name="role"  value="<?php echo $row['role']; ?>"  class="form-control my-2" style="margin-left:1rem; width:40rem;">
							<option value="" >Selete Role</option>
							<option value="WaterTender">WaterTender</option>
							<option value="Staff">Staff</option>
							<option value="Admin">Admin</option>
							
						</select>
                        <label style="margin-left:1rem;"> Status</label>
						&nbsp;	<select name="status"  value="<?php echo $row['role']; ?>"  class="form-control my-2" style="margin-left:1rem; width:40rem;">
							<option value="" >Selete Status</option>
	
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
							
						</select>
                            <div class="form-group mb-3">
                                <label for="" style="margin-left:1rem;"> Password</label>
                                <br>
                                <input type="password"   value="<?php echo $row['password']?>" name="pass" class="form-control" style="margin-left:1rem; width:40rem;" >
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php  include('adminmess3.php');
?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
		
    <!-- DATA TABLE START -->
        
        <!-- PAGINATION END -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
	<script src="db.js"></script>
</body>
</html>