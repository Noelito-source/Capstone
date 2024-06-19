<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users1 WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
             if($row['status'] != 'Disconnected' && $row['status'] != 'Pending'){
               if($user_pass === $enc_pass){
                  mysqli_query($conn, "UPDATE users1 SET status = 'Active' WHERE user_id = ".$row['user_id']);
                  $_SESSION['unique_id'] = $row['unique_id'];
                  echo 'success';
                }else{
                   echo "Email or Password is Incorrect!";
                }
             }else{
                if ($row['status'] == 'Pending') {
                    echo "Please complete all the requirements to activate your account";
                }else{
                    echo "Your account is temporarily disconnected due to unpaid bills please pay your bill at the office, Thank you";
                }
             }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>