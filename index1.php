<?php
    include("functions2.php");

?>
<?php 

require 'functions.php';

if(!is_logged_in())
{
  redirect('login.php');
}

$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

$row = db_query("select * from users where id = :id limit 1",['id'=>$id]);

if($row)
{
  $row = $row[0];
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/default-skin/default-skin.min.css'><link rel="stylesheet" href="./css/nav.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    
</head> 
    

    <title>Home</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
  
    <nav class=" navbar navbar-expand-md   navbar navbar-dark  bg-white shadow-sm p-3 mb-5 fixed-top shadow-sm p-3 mb-5 bg-white rounded ">
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-primary" href="#">
    <img src="./images/Logo.png" width="30" height="30" class="d-inline-block align-top " alt="">
 PWBS
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-dark" href="index1.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Bills & Payment
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">View Bills</a>
          <a class="dropdown-item" href="#">Pay Bills</a>
          <a class="dropdown-item" href="#">History</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-dark" href="gallery.php">Gallery</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Contact Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="about.php">About</a>
          <a class="dropdown-item" href="feedback2.php">Feedback</a>
      
        </div>
      </li>
    </ul>
 
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link text-dark " href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications 
                <?php
                $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-danger"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `notifications` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='comment'){
                    echo "Payment Successful!";
                }else if($i['type']=='like'){
                    echo ucfirst($i['name'])." liked your post.";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>
          </li>
          <div class="action">
        <div class="profile" onclick="menuToggle();">
            <img src="<?=get_image($row['image'])?>" alt="">
        </div>

        <div class="menu">
            <h3>
        
                <div>
                   Member
                </div>
            </h3>
            <ul>
                <li>
                    <span class="material-icons icons-size">person</span>
                    <a href="index.php">My Profile</a>
                </li>
                <li>
                    <span class="material-icons icons-size">mode</span>
                    <a href="profile-edit.php">Edit Account</a>
                </li>
          
                <li>
                    <span class="material-icons icons-size">logout</span>
                    <a href="login.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }
    </script>
        </ul>
          <?php 
          
          if(isset($_POST['submit'])){
              $message = $_POST['message'];
              $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '', 'comment', '$message', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                 
              }
          }
                
          ?>
       
      </div>
    </nav>

   
  <img src="<?=get_image($row['image'])?>" alt="" width="90" height="90" class="rounded-circle" id="image1" ></div>
  <h1 id="name1"> Hi, <?=esc($row['firstname'])?> <?=esc($row['lastname'])?></h1>
  <h3 id="welcome">Welcome to PWBS!</h3>
  <p id="log">Your last log-in was on <?php
date_default_timezone_set('Asia/Manila');
echo "</span>". date('F j, Y g:i:a  ');
?></p>
  <br><br><br><br>
  <hr style="height:2px;border-width:0;color:rgb(26, 29, 212);background-color:rgb(26, 29, 212)">
<br>
<div class="boxed">
  <h5 id="txtyellow"> To engage better with PWBS, please complete your profile information under
  
      <p id="p_circle">
      
          <a href="../Profile/edit.profile">
        My Profile
              <svg viewBox="0 0 70 36">
                  <path d="M6.9739 30.8153H63.0244C65.5269 30.8152 75.5358 -3.68471 35.4998 2.81531C-16.1598 11.2025 0.894099 33.9766 26.9922 34.3153C104.062 35.3153 54.5169 -6.68469 23.489 9.31527" />
              </svg>
          </a>
      
      </p>
  </div>


  <br><br><br><br>
<h4 id="can">CUSTOMER ACCOUNT NUMBER</h4>
<br>
<h1 id="cannum"> <b> 109284093 </b></h1>
<br>
<br>
<h4 id="tad">TOTAL AMOUNT DUE:</h4>
<br>
<h1 id="tadprice"> <b> ₱0.00 </b></h1>
<br>
<h5 id="h5due">DUE DATE: </h5> <h5 id="h5due_num">2022-12-06</h5>
<button type="button" class="btn btn-primary btn-lg" id="btnpp">Pay Now</button>

<div class="card">
  <a href="../History/index.html">
  <img src="./images/history-removebg-preview.png" alt="" height="120px" width="120px" id="img1">
<h3 id="h3_history">HISTORY</h3>
</a>
</div>
<br>
<div class="card ">
  <a href="../Profile/user.html">
  <img src="./images/USERPFP.png" alt="" height="120px" width="120px" id="img1">
  <h3 id="h3_acc">ACCOUNT</h3>
</a>
</div>
<br>
<div class="card1">
  <a href="billingsum.php">
  <img src="./images/Summary.png" alt="" height="120px" width="120px" id="img1">
  <h3 id="h3_sum">BILL SUMMARY</h3>
</a>
</div>
<br>
<div class="card1">
  <a href="./announcement.php">
  <img src="./images/Announcement.png" alt="" height="130px" width="130px" id="img2" >
  <h3 id="h3_ann">ANNOUNCEMENT</h3>
  </a>
</div>
<div class="card2">
  <a href="../Payment/pay.html">
  <img src="./images/pay bills (1).png" alt="" height="120px" width="120px" id="img1">
  <h3 id="h3_paybills">PAY BILLS</h3>
</a>
</div>
<br>
<div class="card2">
  <a href="../notification/notif.html">
  <img src="./images/consu.png" alt="" height="120px" width="120px" id="img1">
  <h3 id="h3_notif">CONSUMPTION</h3>
</a>
</div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
