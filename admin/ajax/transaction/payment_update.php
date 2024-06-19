<?php include('../../database/connection.php');?>
<?php
date_default_timezone_set('Asia/Manila');
$current_date = date('m/d/Y h:i');
$payment_id = $_POST['paymentid'];
$user_id = $_POST['userid'];
$status = $_POST['status'];

if ($status == 'Approved') {
    $query = "UPDATE payment SET status = 'Approved'
              WHERE id = $payment_id";
    mysqli_query($sql_con, $query);

    $query = "UPDATE bill SET status = 'Paid'
              WHERE owners_id = $user_id";
    mysqli_query($sql_con, $query);
   
}
if ($status == 'Declined') {
    $query = "UPDATE payment SET status = 'Declined'
                WHERE id = $payment_id";
    mysqli_query($sql_con, $query);
}
$query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY date DESC";
$bill = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
$bill_id = $bill['id'];

$query = "INSERT INTO notifications(user_id, source_id, type, message, date)
	          VALUES($user_id, $payment_id, 'payment', 'Your payment has been $status', '$current_date')";
mysqli_query($sql_con, $query);

$query = "INSERT INTO notifications(user_id, source_id, type, message, date)
	      VALUES($user_id, $bill_id, 'bill', 'Your bill has been paid', '$current_date')";
mysqli_query($sql_con, $query);

?>
<div class="modal-content rounded-0">
  <div class="modal-body">
    <div class=" d-flex justify-content-end py-2 px-3">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class=" d-flex justify-content-center">
      <i class="bi bi-check-circle text-success" style="font-size: 3.5rem;"></i>
    </div>
    <h3 class="text-center" style="color: #1D2D44;font-weight:bold;">Success!</h3>
    <p class="small text-center " style="color: #1D2D44;">
       Payment is successfully <?php echo $status?> </span>
    </p>
      <div class=" d-flex justify-content-center py-3">
        <button id="btnOk" class="btn btn-primary py-2 px-3" style="cursor:pointer;" data-bs-dismiss="modal">Ok</button>
      </div>
  </div>
</div>

<script>
  (function(){
     $.ajax({
	 	       url: 'ajax/transaction/filtered_payments.php',
		       type: 'GET',
           data: {
			  	   status: 'Pending'
			     },
		       success: function(data){
              $('.table-payments-container').html(data)
		       }
	      })
   })()

</script>