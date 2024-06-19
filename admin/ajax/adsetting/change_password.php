<?php include('../../database/connection.php');?>
<?php
session_start();
$user_id = $_SESSION['id'];
$password = $_POST['pass'];
$password_hash = hash('md5', $password);
$query = "UPDATE users SET password = '$password_hash' WHERE id = $user_id";
mysqli_query($sql_con, $query);

?>