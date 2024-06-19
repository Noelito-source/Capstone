<?php include('../../database/connection.php');?>
<?php
session_start();
extract($_POST);
$errors = [];
$user_id = $_SESSION['unique_id'];

$query = "SELECT * FROM users1 WHERE unique_id = $user_id";
$user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, 'email');
}
if ($oldpass != '' || !empty($oldpass)) {
    $old_password = md5($oldpass);
    if ($old_password != $user['password']) {
        array_push($errors, 'oldpassword');
    } 
    if ($newpass == '') {
        array_push($errors, 'newpassword');
    } 
    $newpass = md5($newpass);
    $query = "UPDATE users1 SET email = '$email', password = '$newpass' WHERE unique_id = $user_id";
}else{
  $query = "UPDATE users1 SET email = '$email' WHERE unique_id = $user_id";
}
if (count($errors) == 0) {
    mysqli_query($sql_con, $query);
}
 
echo json_encode($errors);
?>