 
<?php 
include('database/connection.php');
if (isset($_SESSION['id'])) {
  header('Location: dash.php');
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./css/sign.css">

</head>

<body>
 
  <style>
    #cont{
      display: none;
    }
 @media screen and (max-width: 768px) {
  .main{
width: 900px;


  }
  #cn{
    display: none;
  }
  #cont{
      display: flex;
    }
  .form{
    width: 1900px;
height: auto;
  }
  .alert-msg{
     padding: 10px;
     background: #fee2e2 !important;
  } 
  .note{
    color: red !important;
  }
 }
</style>
  <body>
    <div class="main" id="cn">
      <div class="container a-container" id="a-container">
          
        <form class="form" id="a-form" action="login_check.php" method="POST" class="login_form">       <img src="../images/logo.png" style="height: 100px; width: 100px;" alt="">  
          <h2 class="form_title title">Sign In</h2>
          <?php if(isset($_GET['error'])):?>
            <div class="alert-msg">
 		         <h4 class="note m-0 p-0">Please check you email or address</h4>
	          </div>
          <?php endif;?>
          <input class="form__input" type="text"  name= "username" placeholder="Username">
          <input class="form__input" type="password" name= "password" placeholder="Password">
          <button class="form__button button submit" name="submit">LOGIN</button>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Welcome </h2>
          <p class="switch__description description"> PWBS is created to lessen the hussle when it comes to billing</p>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title">Hello Friend !</h2>
          <p class="switch__description description">Enter your personal details and start journey with us</p>
          <button class="switch__button button switch-btn">SIGN UP</button>
        </div>
      </div>
    </div>
</div>
 
  </body>
 
</html>
