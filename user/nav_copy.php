<?php 
  session_start();
  include_once "./php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
 <?php
    include("functions2.php");

?>

<?php
                            
                    
                            
                            
                                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/nv.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/default-skin/default-skin.min.css'><link rel="stylesheet" >

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    
    <title>Home</title>
    
</head>
<style>
  

@media screen and (max-width: 768px) {

#move{
display: flex;
}

  }
</style>
<body>

<nav class="navbar sticky-top navbar-light bg-white  ">
 

<nav class="navbar navbar-light bg-white">
  <a class="navbar-brand" href="#">
    <img src="../images/Logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
    <a class="navbar-brand text-primary" href="#" id="ttl"> PWBS 
  </a>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-white" id="topp">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" id ="move">
    <ul class="navbar-nav mr-auto" id="nvbb">
      <li class="nav-item active">
        <a class="nav-link" href="users.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Billing & Payment
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="gumanaka">
        <a class="dropdown-item" href="#">Bill Summary</a>
       
          <div class="dropdown-divider"></div>
          &nbsp;      &nbsp;      &nbsp;<a rel='facebox' href="viewb.php?id=<?php echo $row['user_id'];?>"  style="color: black;"> Pay Bills </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="history.php?id=<?php echo $row['user_id']; ?>">History</a>
        </div>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="gallery.php">Gallery</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Contact Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="about.php">About Us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="feedback2.php">Feedback</a>
          
          

        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="message.php">Messages</a>
          
          
        </div>
      </li>
      
 
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
                $user_id = $_SESSION['unique_id'];
                $query = "SELECT * from `notifications` WHERE user_id = $user_id order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
               ?>
              <a  class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <small class="d-flex justify-content-between">
                  <i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i>
                  <?php if($i['status'] == 'unread'):?>
                    <div class=" bg-primary rounded-circle" style="width:10px; height: 10px"></div>
                  <?php endif;?>
                </small><br/>
                  <?php if($i['type']=='payment'):?>
                    <span><?php echo $i['message']?></span>
                  <?php endif;?>
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
    </ul>

    </form>
  </div>
  </div>
 
  <div class="action" id="ac">
        <div class="profile" onclick="menuToggle();">
        <img src="../admin/php/images/<?php echo $row['img']; ?>" alt="">
        </div>

        <div class="menu">
            <h3>
            <?php echo $row['fname']. " " . $row['lname'] ?>
                <div>
                   Member
                </div>
            </h3>
            <ul>
                <li>
                    <span class="material-icons icons-size">person</span>
                    <a href="account.php">My Profile</a>
                </li>
                <li>
                    <span class="material-icons icons-size">mode</span>
                    <a href="edit.php">Edit Account</a>
                </li>
          
                <li>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout" style="color: red;"> Logout</a>
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
</nav>






 <!---
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
  <h3 id="h3_ann"ANNOUNCEMENT</h3>
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
 -->
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>