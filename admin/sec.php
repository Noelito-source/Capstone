<?php
session_start();
include('dblog.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: dblog.php");
}

if(!$_SESSION['username'])
{
    header('Location: lgn.php');
}
?>