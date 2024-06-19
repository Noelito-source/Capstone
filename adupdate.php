<?php
session_start();
$con = mysqli_connect("localhost","root","","waterbilling");

if(isset($_POST['update_stud_data']))
{
    $id = $_POST['stud_id'];

    $fname = $_POST['firstname'];
    $lname = $_POST['surname'];
    $uname = $_POST['username'];
   
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $password = $_POST['password'];


    $query = "UPDATE users SET firstname='$fname', surname='$lname', username='$uname', gender='$role',  password='$password'   WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: account.php");
    }
    else
    {
        $_SESSION['status'] = "Not Updated";
        header("Location: account.php");
    }
}

?>