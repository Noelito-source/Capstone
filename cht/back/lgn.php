<?php 

error_reporting(0);
session_start();


$host="localhost";

$user="root";

$password="";

$db="waterbilling";


$data=mysqli_connect($host,$user,$password,$db);


if($data===false)
{
	die("connection error");
}

		
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$name = $_POST['username'];

		$pass = $_POST['password'];


		$sql="select * from users where username='".$name."' AND password='".$pass."'  ";

		$result=mysqli_query($data,$sql);

		$row=mysqli_fetch_array($result);



		if($row["role"]=="Admin")
		{

			$_SESSION['username']=$name;

			$_SESSION['role']="Admin";

			header("location: dash.php");
		}

		elseif($row["role"]=="WaterTender")
		{	
			$_SESSION['username']=$name;

			$_SESSION['role']="WaterTender";

			header("location:watbillsum.php");
		}
    elseif($row["role"]=="Staff")
		{	
			$_SESSION['username']=$name;

			$_SESSION['role']="Staff";

			header("location:watbillsum.php");
		}


		else
		{
			


      echo '<script type="text/javascript">';
      echo ' alert("username or password do not match")';  
      echo '</script>';
			$_SESSION['loginMessage']=$message;

			header("location:login.php");
      
		}


	}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="./css/sign.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="main">
      <div class="container a-container" id="a-container">
        
        <form class="form" id="a-form" action="login_check.php" method="POST" class="login_form">       <img src="../images/logo.png" style="height: 100px; width: 100px;" alt="">  <h2 class="form_title title">Sign In</h2>
        
         
          <input class="form__input" type="text"  name= "username" placeholder="Username">
          <input class="form__input" type="password" name= "password" placeholder="Password">
          <button class="form__button button submit" name="submit">LOGIN </button>
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
    <script src="main.js"></script>
  </body>
</html>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
