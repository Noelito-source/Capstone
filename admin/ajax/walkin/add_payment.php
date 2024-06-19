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
//   Insert new payment to database
if (isset($_POST['disFee'])) {
    $disconnection_fee = 30;
    $pay_amount = (int)$pay_amount - $disconnection_fee;
    $query = "INSERT INTO payment(ref_number, user_id, bill_id, paid_amount, status, type, date)
    VALUES('$ref_number', $user_id, $bill_id,  $pay_amount, 'Approved', 'walkin', '$current_date')";
    mysqli_query($sql_con, $query);
    
    $query = "INSERT INTO payment(ref_number, user_id, bill_id, paid_amount, status, type, payment_for, date)
    VALUES('$ref_number', $user_id, $bill_id,  $disconnection_fee, 'Approved', 'walkin', 'disconnection', '$current_date')";
    mysqli_query($sql_con, $query);

    $query = "UPDATE users1 SET status = 'InActive' WHERE user_id = $user_id";
    mysqli_query($sql_con, $query);
}else{
    $query = "INSERT INTO payment(ref_number, user_id, bill_id, paid_amount, status, type, date)
    VALUES('$ref_number', $user_id, $bill_id,  $pay_amount, 'Approved', 'walkin', '$current_date')";
    mysqli_query($sql_con, $query);
}

$query = "UPDATE bill SET status = 'Paid' WHERE owners_id = $user_id";
mysqli_query($sql_con, $query);

$query = "INSERT INTO notifications(user_id, source_id, type, message, date)
	      VALUES($user_id, $bill_id, 'bill', 'Your bill has been paid', '$current_date')";
mysqli_query($sql_con, $query);
?>
<input type="hidden" id="consumerID" value="<?php echo $user_id?>">
 
<script>
    function showAlert(numberOfPaidBills){
        $('#alertCon').removeClass('d-none')
        $('#numberOfPaidBills').text(numberOfPaidBills)
        setTimeout(() => {
            $('#alertCon').removeClass('d-flex')
            $('#alertCon').addClass('d-none')
        }, 3000);
    }
</script>
<script>
    $(document).ready(function(){
        (function(){
          let consumerId = $('#consumerID').val();
           $.ajax({
	         url: 'ajax/walkin/show_bill.php',
	         type: 'GET',
             data: {consumerid: consumerId},
	         success: function(data){
                $('.bills-list').html(data)
                showAlert();
	          }
           })
         })()
    })
</script>