<?php 

	require 'functionsf.php';
	

	$rows = db_query("select * from poll");


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Palangoy Multi-Purpose Cooperative</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./css/feedback.css">

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
                    <a href="home.html">
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
                          <i class='bx bx-list-ol'></i>
                          <span class="links_name">Bill Summary</span>
                      </a>
                </li>
                <li>
                    <a href="consumer.php">
                          <i class='bx bxs-user-detail' ></i>
                          <span class="links_name" >Consumer List</span>
                      </a>
                </li>
                <li>
                    <a href="feedback.php">
                          <i class='bx bx-history' id="consa"></i>
                          <span class="links_name" id="consbg">Feedback</span>
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

        <!-- Modal ADD START -->
        <section class="admins">
           

           

           
      
            
          
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
        <br><br><br>
        <h1>FEEDBACK</h1>
	<div class="row " style="margin-left: 15rem; " id="pls" >
	<?php if(!empty($rows)):?>
		<?php foreach($rows as $row):?>
       
			<div class="col-2 border rounded  mt-5 p-2 shadow-lg ml-1" style="margin-left: 0; position:flex; width: 400px;" id="pls">
				<a href="index.php?id=<?=$row['id']?>">
					<div class="col-md-12 text-center">
						<img src="./images/no-image.jpg" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
                      <br>     <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<?=esc($row['name'])?>
                 
                        <div>
                        
						 	<div > <p id="nm">Name:</p> </div> 
                             <div > <p id="nm">Rating:</p>  </div>
                             <div > <p id="ns">Suggestions</p> </div>
						 	<div id="fb"><?=esc($row['feedback'])?>  </div>
                             <div id="sug"> <?=esc($row['suggestions'])?> </div>
                         

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