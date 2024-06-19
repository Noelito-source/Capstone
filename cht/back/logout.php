<?php
 session_start();
unset($_SESSION['id']);
 header('Location:log.php');

unset($_SESSION['Admin']);
 header('Location:log.php');
 
?>