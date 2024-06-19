<?php include('database/connection.php'); ?>
<?php 
  session_start();
  include_once "./php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
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
        <a class="dropdown-item" href="viewbb.php">Bill Summary</a>
       
          <div class="dropdown-divider"></div>
          &nbsp;      &nbsp;      &nbsp;<a rel='facebox' href="billsumm.php"  style="color: black;"> Pay Bills </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="history.php">History</a>
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
      
      <style>
         .notification-dropdown{
           width: 300px;
           height: 400px;
           overflow-x: hidden;
           overflow-y: auto;
         }
      </style>
      <div class="notification-container d-flex align-items-center">
         <?php
            $query = "SELECT * FROM users1 WHERE unique_id = ".$_SESSION['unique_id'];
            $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
            $user_id = $user['user_id'];
          ?>
          <div class="dropdown dropstart">
             <a type="button" id="btnViewNotification" data-bs-toggle="dropdown">
                  Notification
                  <?php
                     $query = "SELECT * FROM `notifications` WHERE user_id = $user_id AND `status` = 'unread' ORDER BY `date` DESC";
                     $result = mysqli_query($sql_con, $query);
                     $new_notifications = mysqli_num_rows($result);
                  ?>
                  <?php if($new_notifications):?>
                    <span class="badge badge-danger"><?php echo $new_notifications; ?></span>
                  <?php endif;?>
             </a>
            <div class="dropdown-menu notification-dropdown">
              <?php 
               $query = "SELECT * FROM `notifications` WHERE user_id = $user_id ORDER BY `date` DESC";
               $result = mysqli_query($sql_con, $query);
              ?>
              <h5 class=" dropdown-header">Notifications</h5>
              <?php if(mysqli_num_rows($result)):?>
                <?php while($notification = mysqli_fetch_assoc($result)):?>
                 <?php
                    $href = 'billsumm.php?notification='.$notification['id'];
                    if ($notification['type'] == 'payment') {
                        $id = $notification['source_id'];
                        $query = "SELECT * FROM payment WHERE id = $id";
                        $payment = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
                        $href = "view.php?id=".$payment['id'].'&notification='.$notification['id'];
                    }
                 ?>
                 <a class="dropdown-item" href="<?php echo $href?>" target="_blank">
                   <div id="title" class=" d-flex align-items-center justify-content-between">
                     <small class=" fw-bold">
                        <?php echo ucfirst($notification['type'])?>
                     </small>
                     <div class=" d-flex">
                       <small>
                          <?php echo date('m/d/Y h:i A', strtotime($notification['date'])) ?>
                       </small>
                       <?php if($notification['status'] == 'unread'):?>
                          <div class="ms-1 bg-primary rounded-circle" style="width:10px; height: 10px"></div>
                        <?php endif;?>
                     </div>
                   </div>
                   <small id="message" class="py-2">
                     <?php echo ucfirst($notification['message'])?>
                   </small>
                   <div class=" dropdown-divider"></div>
                 </a>
               <?php endwhile;?>
              <?php else:?>
                 <div class="con h-75 d-flex justify-content-center align-items-center">
                     <div class=" m-auto">
                       <h5 class=" display-1 text-center"><i class="bi bi-bell"></i></h5>
                       <small class=" d-block text-center">No Notifications</small>
                     </div>
                 </div>
              <?php endif;?>
            </div>
          </div>
      </div>
  </div>
 
  <?php 
      $sql = mysqli_query($conn, "SELECT * FROM users1 WHERE unique_id = {$_SESSION['unique_id']}");
      if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
      }
  ?>
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

 
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>