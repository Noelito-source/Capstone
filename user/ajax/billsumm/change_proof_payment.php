<?php include('../../database/connection.php');?>
<?php 
$payment_id = $_POST['paymentid'];

$image_tmpname = $_FILES['newPaymentProof']['tmp_name'];
$img_name = $_FILES['newPaymentProof']['name'];
$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
$image_new_name = uniqid("PAYMENT-IMG", false). '.' .$img_ex;
$image_upload_path = '../../pay/upload/' .$image_new_name;
$img_dir = $image_upload_path;
move_uploaded_file($image_tmpname, $image_upload_path);

$query = "UPDATE payment SET proof_of_payment = '$image_new_name' WHERE id = $payment_id";
mysqli_query($sql_con, $query)
?>

<img id="paymentImage" src="pay/upload/<?php echo $image_new_name?>" alt="paymentProof">