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
include "db.php";

    $can=$_POST['can'];
	$lastname=$_POST['lname'];
    $firstname=$_POST['fname'];
	$email=$_POST['email'];
	$address=$_POST['address'];
    $img=$_POST['img'];
	$status=$_POST['status'];
  
		
	mysqli_query($conn,"insert into `suers` (can,fname,lname,email,address,img,status) values ('$can','$firstname','$lastname','$email','$address','$img''$status')");
 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Palangoy Multi-Purpose Cooperative</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/consumer_list.css">

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
                    <img src="../images/Logo.png">
                    <div class="logo_name">Palangoy Multi-Purpose <br>Cooperative</div>
                </div>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="home.html">
                          <i class='bx bx-grid-alt'></i>
                          <span class="links_name">Dashboard</span>
                      </a>
                </li>
                <li>
                    <a href="../view/account.php">
                          <i class='bx bx-user'></i>
                          <span class="links_name">Admins</span>
                      </a>
                </li>
                <li>
                    <a href="../advisory.php">
                          <i class='bx bx-error'></i>
                          <span class="links_name">Advisory</span>
                      </a>
                </li>
                <li>
                    <a href="../view/bill_summary.php">
                          <i class='bx bx-list-ol'></i>
                          <span class="links_name">Bill Summary</span>
                      </a>
                </li>
                <li>
                    <a href="./consumer_list.php">
                          <i class='bx bxs-user-detail'></i>
                          <span class="links_name">Consumer List</span>
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
                        <img src="../images/Logo.png">
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

        <h1 class="consumer_h1">Consumer List</h1>

        <button class="cssbuttons-io-button" id="register-show">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
            <span>Add</span>
        </button>

        <!-- DATA TABLE START -->
        <div class="dataTable">
                <table class="content-table" id="table-data">
                    <thead>
                        <th>Id</th>
                        <th>Consumer Acc No.</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Operator</th>
                    </thead>

                    <tbody>
                        <?php
                            include('../config/config.php');
                            $query=mysqli_query($conn,"select * from `consumer_list`");
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['can']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <button class="edit"  id="view-show">
                                            <span class='front icon'><i class='bx bxs-user-detail'></i></span>
                                        </button>
                                   
                                        <button class="add" id="add-show">
                                            <span class='front icon'><i class='bx bxs-file-plus'></i></i></span>
                                        </button>
                                    </td>
                                </tr>
                                <?php } 
                        mysqli_close($conn)
                        ?>
                    </tbody>
                </table>
            </div>
        <!-- DATA TABLE END -->

        <!-- PAGINATION START -->
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
        <div id="register-modal-form">
                <div class="modal-form">
                    <div class="top-form">
                        <div class="close-modal-form">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>

                    <div class ="register-form">
                        <h2>Add new account</h2>

                        <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                        ?>

                        <form method="post">
                            <input type="hidden" value="<?php echo "PWBS"; echo rand(000000, 900000); ?>" name="can" class="input">
                            <input placeholder="Enter Last Name" type="text" name="lastname" class="input">
                            <input placeholder="Enter First Name" type="text" name="firstname" class="input">
                            <input placeholder="Enter Email" type="text" name="email" class="input">
                            <input placeholder="Enter Address" type="text" name="address" class="input">
                            <select placeholder="Enter User_type" type="text" name="status" class="input-2">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>

                            <button type="submit" name="register" class ="submit-btn-1">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Register Modal End--> 

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