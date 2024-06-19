<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once "header.php"; ?>
</head> 
<style>
  #navv{
    display: none;
  }
 @media screen and (max-width: 768px) {
  #nav{
    display: none;
  }
  #navv{
    display: flex;
    width: 27.3rem;

    margin-left: -1rem;
  }
  #move{
    margin-left: 0rem;
    transform: translateY(3rem);
  }
  #llgo{
    margin-left: 10rem;
  }
 }
</style>
<body>
<nav class="navbar navbar-light " id="nav" >
  <a class="navbar-brand" href="./landing.php">
    <img src="../images/Logo.png"  width="60" height="60" class="d-inline-block align-top" alt="" style="margin-left: 28rem; color:white;" >
 
    <span class="navbar-text" style="color: white; font-size:larger;">
Palangoy Multi-Purpose Cooperative
  </span>
   
  </a>
</nav>
<nav class="navbar navbar-light bg-primary" id="navv">
  <a  href="landing.php">
     <img src="../images/Logo.png" width="60px" height="60px" id="llogo" ></a>
</nav>
  <br>  <br>  <br>  <br>  
 
  <div class="wrapper" id="move">

    <section class="form login">
      <header>Palangoy Water Billing System</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit"  style="background-color:#4C6BF1;" value="Login">
        </div>
      </form>

    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
