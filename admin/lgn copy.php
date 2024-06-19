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

			header("location:adstaff.php");
		}
		else
		{

			$_SESSION['loginMessage']=$message;
      echo "Email or Password is Incorrect!";
			
			header("location:lgn.php");
      
		}


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
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  </head>
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
  #a-container{
    
  }
 }
</style>
  <body>
    <div class="main" id="cn">
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
</div>

    <script src="main.js"></script>
  </body>
</html>
<style>
    


*{

margin: 0;

padding: 0;

box-sizing: border-box;

font-family: sans-serif;

}

body{

display: flex;

justify-content: center;

align-items: center;

min-height: 100vh;

background: #eff0f4;

}

.contain{

position: relative;

left: -80px;

display: flex;

justify-content: center;

align-items: center;

}

.contain .drop{

position: relative;

width: 350px;

height: 350px;

box-shadow: inset 20px 20px 20px rgba(0,0,0,0.05),

25px 35px 20px rgba(0,0,0,0.05),

25px 30px 30px rgba(0,0,0,0.05),

inset -20px -20px 25px rgba(255,255,255,0.9);

border-radius: 52% 48% 33% 67% / 38% 45% 50% 62%;

transition: 0.5s;

display: flex;

justify-content: center;

align-items: center;

}

.contain .drop:hover{

border-radius: 50%;

}

.contain .drop::before{

content: '';

position: absolute;

top: 50px;

left: 85px;

width: 35px;

height: 35px;

background: #fff;

border-radius: 50%;

opacity: 0.9;

}

.contain .drop::after{

content: '';

position: absolute;

top: 90px;

left: 110px;

width: 15px;

height: 15px;

background: #fff;

border-radius: 50%;

opacity: 0.9;

}

.contain .drop .content{

position: relative;

display: flex;

justify-content: center;

align-items: center;

flex-direction: column;

text-align: center;

padding: 40px;

gap: 15px;

}

.contain .drop .content h2{

position: relative;

color: #333;

font-size: 1.5em;

}

.contain .drop .content form{

display: flex;

justify-content: center;

align-items: center;

flex-direction: column;

gap: 20px;

}

.contain .drop .content form .inputBox{

position: relative;

width: 225px;

box-shadow: inset 2px 5px 10px rgba(0,0,0,0.1),

inset -2px -5px 10px rgba(255,255,255,0.1),

15px 15px 10px rgba(0,0,0,0.05),

15px 10px 15px rgba(0,0,0,0.25);

border-radius: 25px;

}

.contain .drop .content form .inputBox::before{

content: '';

position: absolute;

top: 6px;

left: 50%;

transform: translateX(-50%);

width: 65%;

height: 5px;

background: rgba(255,255,255,0.5);

border-radius: 5px;

}

.contain .drop .content form .inputBox input{

border: none;

outline: none;

font-size: 1em;

width: 100%;

background: transparent;

color: #000;

padding: 10px 15px;

}

.contain .drop .content form .inputBox 

input[type="submit"]{

color: #fff;

text-transform: uppercase;

font-size: 1em;

letter-spacing: 0.1em;

font-weight: 500;

cursor: pointer;
}

.contain .drop .content form .inputBox:last-child{

width: 120px;

background: #3669de;

box-shadow: inset 2px 5px 10px rgba(0,0,0,0.1),

15px 15px 10px rgba(0,0,0,0.05),

15px 10px 15px rgba(0,0,0,0.25);

transition: 0.5s;

}

.contain .drop .content form .inputBox:last-child:hover{

width: 150px;

}

.btns{

position: absolute;

right: -120px;

bottom: 0;

width: 120px;

height: 120px;

background: #c61dff;

display: flex;

justify-content: center;

align-items: center;

cursor: pointer;

text-decoration: none;

color: #fff;

text-align: center;

line-height: 1.2em;

letter-spacing: 0.1em;

font-size: 0.8em;

transition: 0.5s;

box-shadow: inset 10px 10px 10px 

rgba(190,1,254,0.05),

15px 25px 10px rgba(190,1,254,0.1),

15px 20px 20px rgba(190,1,254,0.1),

inset -10px -10px 15px rgba(255,255,255,0.5);

border-radius: 44% 56% 65% 35% / 57% 58% 42% 43%;

}

.btns::before{

content: '';

position: absolute;

top: 15px;

left: 30px;

width: 20px;

height: 20px;

background: #fff;

border-radius: 50%;

opacity: 0.45;

}

.btns.signup{

bottom: 150px;

right: -140px;

width: 80px;

height: 80px;

border-radius: 55% 45% 35% 66% / 38% 68% 32% 62%;

background: #01b4ff;

box-shadow: inset 10px 10px 10px 

rgba(1,180,255,0.05),

15px 25px 10px rgba(1,180,255,0.1),

15px 20px 20px rgba(1,180,255,0.1),

inset -10px -10px 15px rgba(255,255,255,0.5);

}

.btns.signup::before{

left: 20px;

width: 15px;

height: 15px;

}

.btns:hover{

border-radius: 50%;

}
@media screen and (max-width: 768px) {
    .contain{
        margin-left: 10rem;
    }
    
}
</style>
<body>
    <div class="contain" id="cont">        <div class="drop">

            <div class="content">

                <img src="Logo.png" alt="" width="50px" height="50px">

                <h2>Log in</h2>

                <form action="login_check.php" method="POST">

                    <div class="inputBox">

                        <input type="text" 

                        placeholder="Username" name= "username">

                    </div>

                    <div class="inputBox">

                        <input type="password" 

                        placeholder="Password" name= "password">

                    </div>

                    <div class="inputBox">

                        <input type="submit" 

                        value="Login" name= "submit">

                    </div>

                </form>

            </div>

        </div>

    
    </div>
<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?>  
<!-- partial -->

  <script  src="./script.js"></script>


</body>
</html>
