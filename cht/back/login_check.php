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

			header("location:dash.php");
		}

		elseif($row["role"]=="WaterTender")
		{	
			$_SESSION['username']=$name;

			$_SESSION['usertype']="WaterTender";

			header("location:watbillsum.php");
		}
        elseif($row["role"]=="Staff")
		{	
			$_SESSION['username']=$name;

			$_SESSION['usertype']="Staff";

			header("location:adstaff.php");
		}

		else
		{
			

			$message= "username or password do not match";

			$_SESSION['loginMessage']=$message;

			header("location:lgn.php");
		}


	}


?>