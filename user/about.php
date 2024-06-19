<?php 
include('database/connection.php');
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Home</title>
    <link rel="stylesheet" href="../css/about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head> 
<body>
<?php $page = 'about'?>
<?php include('navigation.php')?>

	<section class="about-section">
    	<div class="container">
        	<div class="row clearfix">
            	
                <!--Content Column-->
                <div class="content-column col-md-6 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<div class="sec-title">
                    		<div class="title">About Us</div>
                        	<h2 id="h2w0" > Palangoy Water Billing System <br></h2>
                        </div>
                        <div class="text">This water billing website is created to make paying bills in Palangoy Multi-Purpose Cooperative easier and more convenient.  With a little touch on the screen and you will have an access  to pay your water bills.</div>
                    </div>
                </div>
                
                <!--Image Column-->
                <div class="image-column col-md-6 col-sm-12 col-xs-12">
                	<div class="inner-column " data-wow-delay="0ms" data-wow-duration="1500ms">
                    	<div class="image">
                        	<img src="../images/Logo.png" alt="">
                            <div class="overlay-box">
                            	<div class="year-box"><span class="number">24</span>Years <br> Serving <br> People</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
   
    <div class="container">
  <h2 id="h2tit">Frequently Asked Questions</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">PWBS is open 24 hours?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Yes, it is 24/7 a week</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">When does the billing being added?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>By the end of the month</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Contact Details?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>John Edward - Water Tender <br>

09357264924
<br>
Noelito Rivera - Water Tender<br>
09159124940

​
<br>

​</p>
      </div></div></div>
    </div> 
  </body>
</html>
