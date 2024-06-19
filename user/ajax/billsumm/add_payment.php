<?php include('../../database/connection.php');?>
<?php

// var_dump($_POST['paymentProof']);
// var_dump($_FILES);
date_default_timezone_set('Asia/Manila');
$current_date = date('m/d/Y h:i');
$user_id = $_POST['consumerid'];
$bill_id = $_POST['billid'];
$pay_amount = $_POST['payAmount'];
$ref_number = $_POST['refNumber'];
//   Upload proof of payment first
  $image_tmpname = $_FILES['paymentProof']['tmp_name'];
  $img_name = $_FILES['paymentProof']['name'];
  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
  $image_new_name = uniqid("PAYMENT-IMG", false). '.' .$img_ex;
  $image_upload_path = '../../pay/upload/' .$image_new_name;
  $img_dir = $image_upload_path;
  move_uploaded_file($image_tmpname, $image_upload_path);
  
//   Insert new payment to database
  $query = "INSERT INTO payment(ref_number, user_id, bill_id, proof_of_payment, paid_amount, type, date)
            VALUES('$ref_number', $user_id, $bill_id, '$image_new_name', $pay_amount, 'online', '$current_date')";
  mysqli_query($sql_con, $query);
?>

<div class="modal-body">
    <div class=" d-flex justify-content-end py-2 px-3">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class=" d-flex justify-content-center">
      <i class="bi bi-check-circle text-success" style="font-size: 3.5rem;"></i>
    </div>
    <h3 class="text-center" style="color: #1D2D44;font-weight:bold;">Payment Success!</h3>
    <p class="small text-center " style="color: #1D2D44;">
        Payments made through PWBS  (between 7:00 AM-11:00 PM Philippine time) are received by the system in real-time. Payments made through other payment channels will be reflected within 1-2  hours, Thank You!
    </p>
      <div class=" d-flex justify-content-center py-3">
        <button id="btnOk" class="btn btn-primary py-2 px-3" style="cursor:pointer;" data-bs-dismiss="modal">Ok</button>
      </div>
</div>