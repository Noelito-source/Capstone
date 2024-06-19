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
</head>
    <body>
        <!-- EDIT FORM START -->
		<section class="admins-list">
			<form method="POST" action="update.php?id=<?php echo $id; ?>">

                <div class="card shadow">
                    <h1>ADMINS/STAFFS</h1>

                    <div class="input-field">
                        <label class="add">First Name</label>
                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" class="input">
                    </div>

                    <div class="input-field">
                        <label class="add">Last Name</label>
                        <input type="text" value="<?php echo $row['surname']; ?>" name="surname"  class="input">
                    </div>

                    <div class="input-field">
                        <label class="add">Username</label>
                        <input type="text" value="<?php echo $row['username']; ?>" name="username"  class="input">
                    </div>

                    <div class="input-field">
                        <label class="add">Password</label>
                        <input type="password" value="<?php echo $row['password']; ?>" name="password"  class="input">
                    </div>

                    <div class="input-field">
                        <label class="add">Select Usertype</label>
                        <select type="text" value="<?php echo $row['role']; ?>" name="role" class="input-select">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                            <option value="Admin">WaterTender</option>
                        </select>
                    </div>

                    <div class="buttons">
                        <button class="save" type="submit" name="submit"> Save </button>

                        <a href="admin.php">
                            <button class="cancel"> Cancel </button>
                        </a>
                    </div>
                </div>
            </form>
        </section>
        
		<!-- EDIT FORM END -->

    </body>
</html>