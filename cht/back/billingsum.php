<?php session_start();
if(!isset($_SESSION['id'])){

	
	}
?>
<?php

include('config.php');

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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="./css/facebox.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
<link href="./css/facebo.css" media="screen" rel="stylesheet" type="text/css" />
<script src="./lib/jquery.js" type="text/javascript"></script>
<script src="./js/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : './images/loading.gif',
		closeImage   : './images/closelabel.png'
	  })
	})
  </script>
<script src="./js/application.js" type="text/javascript" charset="utf-8"></script>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing System</title>
<style type="text/css">
#wrapper{
	height:500px; width:900px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba<br />
(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:2%;
}
#header { width:900px; height:100px;}
#content table{ margin:0 auto; }
#header ul li{
	list-style:none;
	float:left; margin-top:30px; margin-left:10px;}
</style>

</head>

<body>
<br />



</ul>
</div>
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
                          <i class='bx bx-user'></i>
                          <span class="links_name">Admins</span>
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
                          <i class='bx bx-list-ol'id="consa"></i>
                          <span class="links_name"id="consbg">Bill Summary</span>
                      </a>
                </li>
                <li>
                    <a href="consumer.php">
                          <i class='bx bxs-user-detail' ></i>
                          <span class="links_name" >Consumer List</span>
                      </a>
                </li>
                <li>
                    <a href="inbx.php">
                          <i class='bx bxs-user-detail' ></i>
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
                        <img src="kengkot2.jpeg">
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

        <!-- Modal ADD START -->
        <section class="admins">
            <button class="add" id="add-show">
                    <span class='shadow_add'></span>
                    <span class='edge_add'></span>
                    <span class='front_add icon'><i class='bx bxs-user-plus'></i></span>
            </button>

            <h1>Billing Summary</h1>

            <?php
                if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
            ?>

            <div id="add-modal-form">
                <div class="modal-form">
                    <div class="top-form">
                        <div class="close-modal-form">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>

                    <div class ="add-form">
                        <h2>Add new account</h2>

                        <form class="form" method="POST" action="add_account.php">
                        <input required placeholder="Enter username" name="unique_id" value="PWBS" disabled>
                            <input required placeholder="Enter username" type="text" name="username" class="input">
                            <input required placeholder="Enter email" type="email" name="email" class="input">
                        
                            <input required placeholder="Enter password" type="password" name="password" class="input">
                            <select required type="text" name="user_type" class="input input--2" value="<?php echo $row['user_type']; ?>">
								<option value="user">User</option>
								<option value="admin">Admin</option>
                            </select>

                            <button type ="submit" name="add" class ="submit-btn">Submit</button>
                        </form>
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
            div class="dataTable">
          <?php
          

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users1` WHERE CONCAT(`user_id`, `fname`, `lname`, `unique_id`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users1`";
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

       &nbsp; <form action="" method="post">
       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <input type="submit" name="search" value="Filter">

                <table class="content-table" id="table-data">
                    <thead>
                        <th>Id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Ca </th>
                        <th>Operator</th>
                    </thead>

                    <tbody>
                        <?php
                            include('db.php');
                            $query=mysqli_query($conn,"select * from `users1`");
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                  <?php while($row = mysqli_fetch_array($search_result)):?>
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['unique_id']; ?></td>
                                    
                                    
                                    <td>
                                        
                                    <a rel='facebox' href="paybill.php?id=<?php echo $row['user_id']; ?>">
                                            <button class="edit">
                                                <span class='front icon'><i class="bi bi-receipt"></i></span>
                                            </button>
                                        </a>
                                        <a rel='facebox' href="viewbill.php?id=<?php echo $row['user_id']; ?>">
                                       
                                            <button class="delete">
                                                <span class='front icon'><i class="bi bi-eye"></i></span>
                                            </button>
                                        </a>
                                    </td>
                                    
                                </tr>
                                <?php endwhile;?>
                                <?php } 
                        mysqli_close($conn)
                        ?>
                    </tbody>
                    
                </table>
         
            </div>
            <br>     <br>     <br>     <br>     <br>     <br>     <br>     <br>     <br>     <br>
<div id="content">
<?php

?>


</div>
</div>



</body>
</html>
 <script src="./js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
 