<?php
 
 session_start();
 include "Connection.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $select= "select * from users1 where user_id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "update users1 set fname='$fname',lname='$lname',address='$email' where user_id='$id'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:Dashboard.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location: edit.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location: edit.php');
    }
 }
?>