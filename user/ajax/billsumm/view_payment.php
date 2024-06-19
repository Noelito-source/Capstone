<?php include('../../database/connection.php');?>
<?php
$query = "SELECT * FROM payment WHERE bill_id = ".$_GET['billid'];
$payment = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
?>
<style>
    #paymentImage{
	  width: 90%;
	  height: 90%;
	  object-fit: contain;
	  border: 3px solid #f2f2f2;
	}
</style>
<div class="payment-proof-con w-100 d-flex justify-content-center py-2">
   <img id="paymentImage" src="pay/upload/<?php echo $payment['proof_of_payment']?>" alt="">
</div>
<div id="changeProofPaymentCon">
  <form id="editProofForm">
     <input type="hidden" name="paymentid" value="<?php echo $payment['id']?>">
     <label class=" p-0 m-0">Change proof of payment</label>
     <input type="file" name="newPaymentProof" id="newPaymentProof" class="form-control rounded-0" accept="image/*">
  </form>
</div>
<div class=" d-flex justify-content-between pt-3 border-bottom border-top">
  <p class="label">Payment Amount</p>
  <p><?php echo '₱'.$payment['paid_amount'].'.00'?></p>
</div>
<div class=" d-flex justify-content-between pt-3">
  <p class="label" style="font-size: 0.9rem;">Reference No. <span class=" fw-bold"><?php echo $payment['ref_number']?></span></p>
  <p style="font-size: 0.9rem;"><?php echo date('M d, Y h:i:s A', strtotime($payment['date']))?></p>
</div>
<div class="modal-footer border-0">
   <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
</div>
 
<script>
    $('#newPaymentProof').change(function(e){
      let form = document.querySelector('#editProofForm')
      let formData = new FormData(form)
      $('.payment-proof-con').html(`
          <div class="loading py-5">
             <div class="d-flex justify-content-center py-5 my-3">
               <div class="spinner-border spinner-border-sm text-info"></div>
              </div>
          </div>
      `)
      $.ajax({
	      url: 'ajax/billsumm/change_proof_payment.php',
        method: 'POST',
	      type: 'POST',
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType: false,
	      success: function(data){
            $('.payment-proof-con').html(data)
	      }
	  })
    
  })
</script>

 