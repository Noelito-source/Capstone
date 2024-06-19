<?php include('../../database/connection.php');?>
<?php
$payment_id = $_GET['paymentid'];
$query = "SELECT * FROM payment WHERE id = $payment_id";
$payment = mysqli_fetch_assoc(mysqli_query($sql_con, $query));

$query = "SELECT * FROM users1 WHERE user_id = ".$payment['user_id'];
$user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
?>
<style>
	#paymentImage{
	  width: 90%;
	  height: 500px;
	  object-fit: contain;
	  border: 3px solid #f2f2f2;
	}
 
</style>
<div class="modal-content rounded-0">
      <input type="hidden" name="paymentid" id="paymentid" value="<?php echo $payment['id']?>">
      <input type="hidden" name="userid" id="userid" value="<?php echo $payment['user_id']?>">
	 <div class="modal-header border-0">
	   <h5 class="modal-title" id="modalTitleId">Proof of payment from <span class="fw-bold"><?php echo $user['fname']. ' ' .$user['lname']?></span></h5>
	   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	 </div>
	 <div class="modal-body">
        <div class="w-100 d-flex justify-content-center py-2">
		   <img id="paymentImage" src="../user/pay/upload/<?php echo $payment['proof_of_payment']?>" alt="">
		 </div>
	    <div class="modal-footer border-0">
        <?php if($_GET['pStatus'] == 'Pending'):?>
	       <button type="button" class="btn-decline-bill btn btn-danger">Decline</button>
	       <button type="button" class="btn-approve-bill btn btn-primary" id="btnSubmitBill">Approve</button>
        <?php else:?>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <?php endif;?>
	    </div>
	   </form>
     </div>
</div>

<script>
    $('.btn-approve-bill').click(function(){
        const paymentId = $('#paymentid').val()
        const userId = $('#userid').val()
        const action = 'Approved';
        $.ajax({
	        url: 'ajax/transaction/payment_update.php',
	        type: 'POST',
            data: {
              paymentid: paymentId,  
              userid: userId,
              status: action
            },
	        success: function(data){
              $('.modal-container-payment').html(data)
	        }
	     }) 

    })

    $('.btn-decline-bill').click(function(){
        const paymentId = $('#paymentid').val()
        const userId = $('#userid').val()
        const action = 'Declined';
        $.ajax({
	        url: 'ajax/transaction/payment_update.php',
	        type: 'POST',
            data: {
              paymentid: paymentId,  
              userid: userId,
              status: action
            },
	        success: function(data){
              $('.modal-container-payment').html(data)
	        }
	     }) 
    })
    
</script>