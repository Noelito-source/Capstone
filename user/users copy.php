<?php
include('database/connection.php');
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="../css/user.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/default-skin/default-skin.min.css'><link rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<title>Home</title>
    
</head>
<body>
<?php 
     $sql = mysqli_query($sql_con, "SELECT * FROM users1 WHERE unique_id = {$_SESSION['unique_id']}");
      if(mysqli_num_rows($sql) > 0){
          $row = mysqli_fetch_assoc($sql);
       }
?>
<?php $page = 'home'?>
<?php include('navigation.php')?>

<img src="../admin/php/images/<?php echo $row['img']; ?>" alt="" width="90" height="90" class="rounded-circle" id="image1"> 
<h1 id="name1"> Hi,  <?php echo $row['fname']. " " . $row['lname'] ?></h1>
  <h3 id="w">Welcome to PWBS!</h3>
  <p id="log">Your last log-in was on  Jan 26, 2023, 11:03:00 AM</p>
  <hr style="height:2px;border-width:0;color:rgb(26, 29, 212);background-color:rgb(26, 29, 212)">
  <br><br><br><br>
 
<br>
<div class="boxed">
  <h5 id="txtyellow"> To engage better with PWBS, please check your profile information under
      <p id="p_circle">
          </a>
      </p>
  </div>
  
<div class="row">
<div class="col-md-6">
<h4 id="can">CUSTOMER ACCOUNT NUMBER</h4>
<br>
<h1 id="cannum"> <b> <?php echo $row['unique_id']?></b></h1>
<br>
<br>
<?php
  $query = "SELECT * FROM users1 WHERE unique_id = ".$row['unique_id'];
  $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
  $user_id = $user['user_id'];
  $query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY date DESC";
  $result = mysqli_query($sql_con, $query);
  $latest_bill = mysqli_fetch_assoc($result);
?>
<?php if(mysqli_num_rows($result) && $latest_bill['status'] == 'Unpaid'):?>
<h4 id="tad">TOTAL AMOUNT DUE</h4>
<br>
<h1 id="tadprice"> <b> ₱<?php echo $latest_bill['price'] + $latest_bill['balance']?>.00</b></h1>
<br>
<h5 id="h5due">DUE DATE: </h5> <h5 id="h5due_num"><?php echo date('F d, Y', strtotime('7 day', strtotime($latest_bill['date'])))?></h5>

<?php endif;?>
</div>    
    <div class="col-md-6" id="cardgone">
    <div class="row"> 
  <div class="col-md-4">
  <div class="card" id="crd">  
  <a rel='facebox' href="viewbb.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
  <img src="../images/Summary.png" alt="" height="120px" width="120px" id="img1">
<h5 id="h3_history">BILL SUMMARY</h5>
</a>
</div>
  </div>
  <div class="col-md-4"> 
  <div class="card "id="crd2">
  <a rel='facebox' href="billsumm.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
  <img src="../images/pay bills (1).png" alt="" height="120px" width="120px" id="img1">
  <h5 id="h3_acc">PAY BILLS</h5>
</a>
</div>
  </div>
  <div class="col-md-4"> 
  <div class="card" id="crd3">
  <a rel='facebox' href="history.php" style="text-decoration: none;">
  <img src="../images/history-removebg-preview.png" alt="" height="120px" width="120px" id="img3" >
  <h5 id="pacc">HISTORY</h5>
</a>
</div>
 </div>

 <div class="col-md-4 mt-3"> 
 <div class="card" id="crd4">
  <a href="announcement.php" style="text-decoration: none;">
  <img src="../images/Announcement.png" alt="" height="130px" width="130px" id="img2" >
  <h6 id="h3_ann">ANNOUNCEMENT</H6>
  </a>
</div>
 </div>
 <div class="col-md-4 mt-3"> 
 <div class="card" id="crd5">
  <a href="account.php" style="text-decoration: none;">
  <img src="../images/USERPFP.png" alt="" height="120px" width="120px" id="img1">
  <h5 id="h3_paybills">ACCOUNT</h5>
</a>
</div>
  </div>
  <div class="col-md-4 mt-3"> 
  <div class="card" id="crd6">
  <a href="consump.php" style="text-decoration: none;">
  <img src="../images/consu.png" alt="" height="120px" width="120px" id="img1">
  <h5 id="h3_notif">CONSUMPTION</h5>
</a>
</div>
  </div>
</div>
</div>
</div>

    <div class="pcard" id="pcard">  
  <a rel='facebox' href="viewbb.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
  <img src="../images/Summary.png" alt="" height="60px" width="60px" id="pimg1">
<h5 id="phis">BILL SUMMARY</h5>
</a>
</div>
<div class="pcard" id="pcard2">  
  <a rel='facebox' href="billsumm.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
  <img src="../images/pay bills (1).png" alt="" height="60px" width="60px" id="pimg1">
<h5 id="psum">PAY BILLS</h5>
</a>
</div>
<div class="pcard" id="pcard3">  
  <a rel='facebox' href="history.php" style="text-decoration: none;">
  <img src="../images/history-removebg-preview.png" alt="" height="60px" width="60px" id="pimg1">
<h5 id="phiss">HISTORY</h5>
</a>
</div>
<div class="pcard" id="pcard4">  
  <a rel='facebox' href="history.php" style="text-decoration: none;">
  <img src="../images/Summary.png" alt="" height="60px" width="60px" id="pimg1">
<h5 id="phis">HISTORY</h5>
</a>
</div>
<div class="ttt">
<div class="pcard" id="pcard">  
  <a rel='facebox' href="announcement.php" style="text-decoration: none;">
  <img src="../images/Announcement.png" alt="" height="60px" width="60px" id="pimg1">
<h5 id="ann">ANNOUNCEMENT</h5>
</a>
</div>

<div class="pcard" id="pcard2">  
  <a rel='facebox' href="account.php" style="text-decoration: none;">
  <img src="../images/USERPFP.png" alt="" height="60px" width="60px" id="pimg1">
<h5 id="psumm">ACCOUNT</h5>
</a>
</div>
<div class="pcard" id="pcard3">  
  <a rel='facebox' href="consump.php" style="text-decoration: none;">
  <img src="../images/consu.png" alt="" height="60px" width="60px" id="pimg1">
<h5 id="phis">CONSUMPTION</h5>
</a>
</div>
<div class="pcard" id="pcard4">  
  <a rel='facebox' href="history.php" style="text-decoration: none;">
  <img src="../images/Summary.png" alt="" height="60px" width="60px" id="pimg1">
<h5 id="phis">HISTORY</h5>
</a>
</div>
</div>
 
<br><br>
 

</body> 
</html>