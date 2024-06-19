<?php
session_start();
include ("db.php");


?>

 

<?php
if (isset($_POST["update_consumer_list"])) {
    
    $user_id = $_GET['user_id'];
    $fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$password = md5($_POST['password']);
	
		
	$sql = ("update users1 set fname='$fname', lname='$lname', password='$password',  where user_id='$user_id'");

    $query = mysqli_query($conn, $sql);

    if ($query) {

        

        header("location: account");

    }else {

        echo "failed reserved";

    }
}
// Add Account End

?>