<?php 
  session_start();
if(isset($_POST['fname']) && 
   isset($_POST['uname']) &&  
   isset($_POST['pass'])){

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $ref = $_POST['ref'];
    $stat = $_POST['stat'];
    $type = $_POST['type'];
    $message = $_POST['message'];
    
    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "All fields are required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "All fields are required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "All fields are required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
      }else if(empty($ref)){
         $em = "All fields are required";
         header("Location: ../index.php?error=$em&$data");
         exit;
    }else {
      // hashing the password
      $pass = password_hash($pass, PASSWORD_DEFAULT);

      if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
         $img_name = $_FILES['pp']['name'];
         $tmp_name = $_FILES['pp']['tmp_name'];
         $error = $_FILES['pp']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../upload/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               // Insert into Database
               $user_id = $_SESSION['unique_id'];
               $sql = "INSERT INTO payment(user_id,fname, username, ref, password, pp,status,stat,type,message) 
                 VALUES($user_id,?,?,?,?,?,'pending','unread','comment','New Payment Received')";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fname, $uname, $ref, $pass, $new_img_name,]);

               header("Location: ../success.php?success=Your account has been created successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../index.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../index.php?error=$em&$data");
            exit;
         }

        
      }else {
       

       	header("Location: ../index.php?success=Payment Has been Sent ");
   	    exit;
      }
    }


}else {
	header("Location: ../index.php?error=error");
	exit;
}
