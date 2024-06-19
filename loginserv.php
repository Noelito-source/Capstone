<?php
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
 if(empty($_POST['can']) || empty($_POST['lastname'])){
 $error = "Username or Password is Invalid";
 }
 else
 {
 //Define $user and $pass
 $user=$_POST['can'];
 $pass=$_POST['lastname'];
 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
 $conn = mysqli_connect("localhost", "root", "");
 //Selecting Database
 $db = mysqli_select_db($conn, "profile_db");
 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM users WHERE lastname='$pass' AND can='$user'");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){
 header("Location: index1.php"); // Redirecting to other page
 }
 else
 {
 $error = "Username of Password is Invalid";
 }
 mysqli_close($conn); // Closing connection
 }
}
 
?>