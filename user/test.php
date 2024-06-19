<?php
 include('database/connection.php');

 $query = "SELECT * FROM users1";
 $result = mysqli_query($sql_con,$query);
 

 while ($user = mysqli_fetch_assoc($result)) {
    $id = $user['unique_id'];
    $query = "INSERT INTO user_log(user_id) VALUES($id)";
    mysqli_query($sql_con, $query);
 }
?>