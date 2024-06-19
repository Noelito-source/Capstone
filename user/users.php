<?php
include('database/connection.php');
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: login.php");
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <style>
      body{
        overflow-x: hidden;
      }
       .overview-container{
        padding-bottom: 50px;
       }
       .card-box{
        padding: 20px;
       }
       .box-content{
        border: 2px solid #dddddd;
       }
       .img-con img{
        width: 100%;
        height: 150px;
       }
       @media screen and (max-width: 768px) {
        .card-box{
          padding: 5px;
        }
        .img-con img{
          height: 80px;
        }
        .card-name{
          font-size: 0.7rem;
         }
         .overview-container{
          padding-bottom: 100px;
         }
       }

       .box-content:hover{
         border: 2px solid #2563eb;
       }
 
    </style>

    
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

<?php
  $query = "SELECT * FROM users1 WHERE unique_id = ".$row['unique_id'];
  $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
  $user_id = $user['user_id'];
  $query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY date DESC";
  $result = mysqli_query($sql_con, $query);
  $latest_bill = mysqli_fetch_assoc($result);
?>
 <div class="overview-container">
  <div class=" row">
    <div class=" col-md-6 d-flex flex-wrap align-content-around">
         <div class="account-number w-100">
           <h3 class=" text-center">CUSTOMER ACCOUNT NUMBER</h3>
           <h2 class=" text-center fw-bold text-primary"><?php echo $row['unique_id']?></h2>
         </div>
         <?php if(mysqli_num_rows($result) && $latest_bill['status'] == 'Unpaid'):?>
          <div class="due-amount w-100">
            <h4 class=" text-center">TOTAL AMOUNT DUE</h3>
            <h3 class=" text-center fw-bold text-primary">₱<?php echo $latest_bill['price'] + $latest_bill['balance']?>.00</h2>
            <h5 class=" text-center text-secondary">DUE DATE: <?php echo date('F d, Y', strtotime('7 day', strtotime($latest_bill['date'])))?></h5>
           </div>
         <?php endif;?>
    </div>

    <div class="col-md-6">
       <div class="row">
          <div class="col-4 card-box">
            <a href="viewbb.php" class=" text-decoration-none">
              <div class="box-content h-100">
                <div class="img-con px-4 py-2">
                  <img src="../images/Summary.png" alt="summary" class=" object-fit-contain">
                </div>
                <span class=" d-block text-center card-name py-2">BILL SUMMARY</span>
              </div>
            </a>
          </div>
          <div class="col-4 card-box">
            <a href="billsumm.php" class=" text-decoration-none">
              <div class="box-content h-100">
                <div class="img-con px-4 py-2">
                  <img src="../images/pay bills (1).png" alt="summary" class=" object-fit-contain">
                </div>
                <span class=" d-block text-center card-name py-2">PAY BILL</span>
              </div>
            </a>
          </div>
          <div class="col-4 card-box">
            <a href="history.php" class=" text-decoration-none">
              <div class="box-content h-100">
                <div class="img-con px-4 py-2">
                  <img src="../images/history-removebg-preview.png" alt="summary" class=" object-fit-contain">
                </div>
                <span class=" d-block text-center card-name py-2">HISTORY</span>
              </div>
            </a>
          </div>
       </div>

       <div class="row mt-2">
          <div class="col-4 card-box">
            <a href="announcement.php" class=" text-decoration-none">
              <div class="box-content h-100">
                <div class="img-con px-4 py-2">
                  <img src="../images/Announcement.png" alt="summary" class=" object-fit-contain">
                </div>
                <span class=" d-block text-center card-name py-2">ANNOUNCEMENT</span>
              </div>
            </a>
          </div>
          <div class="col-4 card-box">
            <a href="account.php" class=" text-decoration-none">
              <div class="box-content h-100">
                <div class="img-con px-4 py-2">
                  <img src="../images/USERPFP.png" alt="summary" class=" object-fit-contain">
                </div>
                <span class=" d-block text-center card-name py-2">ACCOUNT</span>
              </div>
            </a>
          </div>
          <div class="col-4 card-box">
            <a href="consump.php" class=" text-decoration-none">
              <div class="box-content h-100">
                <div class="img-con px-4 py-2">
                  <img src="../images/consu.png" alt="summary" class=" object-fit-contain">
                </div>
                <span class=" d-block text-center card-name py-2">CONSUMPTION</span>
              </div>
            </a>
          </div>
       </div>
    </div>
  </div>
</div>
 
 
 

</body> 
</html>