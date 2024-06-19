<?php include('../../database/connection.php');?>
<?php
  //This is the a class to calculate the bill amount of a consumer
  abstract class Charge{
	  public $consumption = 0;
	  public $cu_m = 0;
	  public $pricePerCubic = 0;
	  public $mininum_cubic = 0;
	  public $maximum_cubic = 0;
	  public $amount = 0;
	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic)
	  {
		 $this->pricePerCubic = $pricePerCubic;
		 $this->mininum_cubic = $mininum_cubic;
		 $this->maximum_cubic = $maximum_cubic;
		 $this->consumption = $consumption;
	  }
	  protected function calculateAmount(){
		  if ($this->consumption >= $this->mininum_cubic && $this->consumption <= $this->maximum_cubic) {
			$this->cu_m = ($this->consumption - $this->mininum_cubic) + 1;
		  }
		  if($this->consumption > $this->maximum_cubic){
			$this->cu_m = ($this->maximum_cubic - $this->mininum_cubic) + 1;
		  }    
		  if($this->cu_m != 0 || !$this->cu_m){
			$this->amount = $this->pricePerCubic * $this->cu_m;
		  }
	  }
  }
  class FirstCharge extends Charge{
	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
	  	parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
	  } 
	  protected function calculateAmount(){
		if ($this->consumption <= $this->maximum_cubic) {
			$this->cu_m = $this->consumption;
		 }else{
			$this->cu_m = $this->maximum_cubic;
		 }
		 $this->amount = $this->pricePerCubic;
	  }
  }
  class SecondCharge extends Charge{
  	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
   	  } 
   }
   class ThirdCharge extends Charge{
  	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
   	  } 
   }
   class FourthCharge extends Charge{
	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
	    parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
	    $this->calculateAmount();
	  } 
   }
   class FifthCharge extends Charge{
	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
	    parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
	    $this->calculateAmount();
	  } 
   }
   class SucceedingCharge extends Charge{
	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
	    parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
	  } 
	  protected function calculateAmount()
	  {
		  if($this->consumption > $this->mininum_cubic){
			$this->cu_m = $this->consumption - $this->mininum_cubic;
		  }    
		  if($this->cu_m != 0 || !$this->cu_m){
			$this->amount = $this->pricePerCubic * $this->cu_m;
		  }
	  }
   }
?>
<?php
 $query = "SELECT * FROM users1 WHERE user_id = ". $_GET['consumerid'];
 $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
 $user_id = $user['user_id'];

 $query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY date DESC";
 $result = mysqli_query($sql_con, $query);
 $bill = mysqli_fetch_assoc($result);
 $latest_bill = mysqli_num_rows($result);
 
 if ($latest_bill) {
    $query = "SELECT * FROM payment WHERE user_id = $user_id AND bill_id = ". $bill['id'];
    $result = mysqli_query($sql_con, $query);
    $payment = mysqli_fetch_assoc($result);
    $is_bill_has_payment = mysqli_num_rows($result);
 }
 //to show latest bill of user
 

 //check if consumer has latest bill
 if ($latest_bill) {
    $consumption = $bill['pres'] - $bill['prev'];
    $first_charges = new FirstCharge($consumption, 125, 0, 5);
    $second_charges = new SecondCharge($consumption, 27, 6, 10);
    $third_charges = new ThirdCharge($consumption, 29, 11, 20);
    $fourth_charges = new FourthCharge($consumption, 31, 21, 30);
    $fifth_charges = new FifthCharge($consumption, 33, 31, 40);
    $succeeding_charges = new SucceedingCharge($consumption, 35, 40, 0);
    
    $sub_total = $first_charges->amount + $second_charges->amount + $third_charges->amount + $fourth_charges->amount + $fifth_charges->amount + $succeeding_charges->amount;
    $total_amount_due = $sub_total + $bill['balance'];
	//automated reference number
	$reference_number = 'PWBS'.rand(1, 9).''.rand(1, 9).''.rand(1, 9).''.rand(1, 9).''.rand(1, 9).''.rand(1, 9).''.rand(1, 9).''.rand(1, 9).''.rand(1, 9).''.rand(1, 9).''.rand(1, 9);
 }
?>
<style>
    .error{
        border: 1px solid red !important;
    }
    .loader{
	  width: 0%;
	  animation-name: notif-loading;
	  animation-duration: 3s;
    }
    @keyframes notif-loading {
	  from{width: 100%};
	  to{width: 0%}
    }
</style>
   <input type="hidden" name="consumer" id="consumer" value="<?php echo $user['fname']. ' ' .$user['lname']?>">
   <!-- Modal for payment -->
   <div class="modal fade" id="modalToPay" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content modal-payment-container rounded-0">
                       <div class="modal-header border-0">
                          <h5 class="modal-title" id="exampleModalLabel">Paybill now</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
					   <form id="payNowBillForm" class=" mw-100">
                        <div class="modal-body">
						   <input type="hidden" name="consumerid" id="consumerid" value="<?php echo $user_id?>">
						   <input type="hidden" name="billid" id="billid" value="<?php echo $bill['id']?>">
						   <div class="input-con px-3 d-flex align-items-center">
                              <label class=" p-0 m-0">Reference no. &nbsp;</label>
                              <input type="text" name="refNumber" id="refNumber" class="m-0 p-0 fw-bold bg-white border-0" style="outline:none;" value="<?php echo $reference_number?>" readonly >
                           </div>
						   <?php
	                          $query = "SELECT * FROM bill WHERE owners_id = $user_id AND status = 'Unpaid'";
		                      $number_of_unpaid_bills = mysqli_num_rows(mysqli_query($sql_con, $query)); 
	                        ?>
							<?php if($number_of_unpaid_bills == 3):?>
						     <div class="input-con px-3">
                               <label class=" p-0 m-0">Disconnection fee</label>
                               <input type="text" id="disFee" name="disFee" class="form-control rounded-0 bg-white" value="₱ 30.00" readonly>
                            </div>
							<div class="input-con px-3">
                              <label class=" p-0 m-0">Total Amount Due</label>
                              <input type="text" id="amountDue" class="form-control rounded-0 bg-white" amount-due="<?php echo $total_amount_due?>" value="<?php echo "₱ $total_amount_due.00"?>" readonly >
                           </div>
                           <div class="input-con px-3">
                              <label class=" p-0 m-0">Amount to pay</label>
                              <input type="number" name="payAmount" id="payAmount" class="form-control rounded-0 bg-white" value="<?php echo $total_amount_due + 30?>" readonly>
                              <small id="errorAmount" class="text-danger "></small>
                           </div>
						   <?php else:?>
							<div class="input-con px-3">
                              <label class=" p-0 m-0">Total Amount Due</label>
                              <input type="text" id="amountDue" class="form-control rounded-0 bg-white" amount-due="<?php echo $total_amount_due?>" value="<?php echo "₱ $total_amount_due.00"?>" readonly >
                           </div>
                           <div class="input-con px-3">
                              <label class=" p-0 m-0">Amount to pay</label>
                              <input type="number" name="payAmount" id="payAmount" class="form-control rounded-0 bg-white" required>
                              <small id="errorAmount" class="text-danger "></small>
                           </div>
						   <?php endif;?>
                          <div class="modal-footer border-0">
                            <button type="submit" id="btnSubmitPay" class="btn btn-primary rounded-0" data-bs-dismiss="modal" <?php echo $number_of_unpaid_bills != 3 ? 'disabled': '';?>>Pay</button>
                          </div>
                        </div>
						</form>
                    </div>
                </div>
         </div>
<!-- Modal for payment end -->
<div id="alertCon" class="d-none bg-white">
     <div class=" alert shadow m-0 p-0">
	    <div class="border border-primary loader"></div>
        <div class="py-2 px-4">
	       <span class="text-success">Success</span>
	       <span><span id="numberOfPaidBills"></span> bill has been paid</span>
	   </div>
     </div>
 </div>
   <?php if($latest_bill):?>
		<?php if(!$is_bill_has_payment || $payment['status'] == 'Declined'):?>
		  <div class="my-1 btn-paid text-end border-bottom py-3">
             <button type="button" id="btnPaid" class="btn btn-primary bill-text" data-bs-toggle="modal" data-bs-target="#modalToPay"> <i class="bi bi-credit-card-fill"></i> Paybill now</button>
	      </div>
		<?php else:?>
			<?php if($payment['status'] == 'Pending'):?>
		       <h6>The payment on this bill has been received, you can check in transaction</h6>
		    <?php elseif($payment['status'] == 'Approved' && ($payment['type'] == 'walkin' || $payment['type'] == 'online')):?>
		       <div class="my-1 btn-paid text-end border-bottom py-3">
                  <button type="button" id="btnViewPayment" class="btn btn-success bill-text" > <i class="bi bi-check-circle-fill"></i> Bill was paid</button>
	           </div>
		    <?php endif;?>
		<?php endif;?>
       <div class="container_content bg-white p-5 shadow" id="container_content">
          <div class="">
             <p class="p-0 m-0 regular-text">Status: <span class="<?php  echo $bill['status'] == 'Unpaid' ? 'text-danger':'text-success';?>"><?php echo $bill['status']?></span></p>
		  </div>
		  <?php
		    $from =  date('F 29, Y', strtotime('-2 month', strtotime($bill['date'])));
			$to =  date('F 29, Y', strtotime('-1 month', strtotime($bill['date'])));
		  ?>
		  <div class="row">
			<div class="col-2">
			</div>
			<div class="col-2 regular-text">from</div>
			<div class="col-3 regular-text">
				<?php echo $from?>
			</div>
			<div class="col-2 regular-text">to</div>
			<div class="col-3 regular-text">
				<?php echo $to?>
			</div>
		  </div>
		  <?php
		    $query = "SELECT * FROM users1 WHERE user_id = ".$bill['owners_id']; 
			$user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
		  ?>
        
		  <div class="row">
             <div class="col-3">
			    <div class="row">
                  <div class="col-6">
				     <p class="p-0 m-0 regular-text">Present</p>
				     <p class="p-0 m-0 regular-text">Previous</p>
					 <p class="p-0 m-0 regular-text">Consumption</p>
			      </div>
			      <div class="col-6">
				     <p class="p-0 m-0 regular-text text-center "><?php echo $bill['pres']?></p>
				     <p class="p-0 m-0 regular-text text-center text-decoration-underline"><?php echo $bill['prev']?></p>
					 <p class="p-0 m-0 regular-text text-center "><?php echo $bill['pres'] - $bill['prev']?></p>
			      </div>
		        </div>
			 </div>
			 <div class="col-9">
			    <div class="row">
                  <div class="col-4">
				     <p class="p-0 m-0 regular-text">1st 5cu.m(min)</p>
				     <p class="p-0 m-0 regular-text">2nd 5cu.m(6-10)</p>
					 <p class="p-0 m-0 regular-text">3rd 10 cu.m(11-20)</p>
					 <p class="p-0 m-0 regular-text">4th 10 cu.m(21-30)</p>
					 <p class="p-0 m-0 regular-text">5th 10 cu.m(31-40)</p>
					 <p class="p-0 m-0 regular-text">Succeeding cu.m</p>
			      </div>
			      <div class="col-1">
				     <p class="p-0 m-0 regular-text">125.00</p>
				     <p class="p-0 m-0 regular-text">27.00</p>
					 <p class="p-0 m-0 regular-text">29.00</p>
					 <p class="p-0 m-0 regular-text">31.00</p>
					 <p class="p-0 m-0 regular-text">33.00</p>
					 <p class="p-0 m-0 regular-text">35.00</p>
			      </div>
				  <div class="col-2">
				     <p class="p-0 m-0 regular-text text-center">&nbsp;</p>
				     <p class="p-0 m-0 regular-text text-center">x</p>
					 <p class="p-0 m-0 regular-text text-center">x</p>
					 <p class="p-0 m-0 regular-text text-center">x</p>
					 <p class="p-0 m-0 regular-text text-center">x</p>
					 <p class="p-0 m-0 regular-text text-center">x</p>
			      </div>
				  <div class="col-1">
				     <p class="p-0 m-0 regular-text"><?php echo $first_charges->cu_m?></p>
				     <p class="p-0 m-0 regular-text"><?php echo $second_charges->cu_m?></p>
					 <p class="p-0 m-0 regular-text"><?php echo $third_charges->cu_m?></p>
					 <p class="p-0 m-0 regular-text"><?php echo $fourth_charges->cu_m?></p>
					 <p class="p-0 m-0 regular-text"><?php echo $fifth_charges->cu_m?></p>
					 <p class="p-0 m-0 regular-text"><?php echo $succeeding_charges->cu_m?></p>
			      </div>
				  <div class="col-2">
				     <p class="p-0 m-0 regular-text">=  &#8369;</p>
				     <p class="p-0 m-0 regular-text">=  &#8369;</p>
					 <p class="p-0 m-0 regular-text">=  &#8369;</p>
					 <p class="p-0 m-0 regular-text">=  &#8369;</p>
					 <p class="p-0 m-0 regular-text">=  &#8369;</p>
					 <p class="p-0 m-0 regular-text">=  &#8369;</p>
			      </div>
				  <div class="col-2">
				     <p class="p-0 m-0 regular-text text-end "><?php echo $first_charges->amount?></p>
				     <p class="p-0 m-0 regular-text text-end "><?php echo $second_charges->amount?></p>
					 <p class="p-0 m-0 regular-text text-end "><?php echo $third_charges->amount?></p>
					 <p class="p-0 m-0 regular-text text-end "><?php echo $fourth_charges->amount?></p>
					 <p class="p-0 m-0 regular-text text-end "><?php echo $fifth_charges->amount?></p>
					 <p class="p-0 m-0 regular-text text-end "><?php echo $succeeding_charges->amount?></p>
			      </div>
		        </div>
			 </div>
		  </div>

		  <div class="row my-2">
			 <div class="col-6">
				<div class="row">
			       <div class="col-4">
				     <p class="p-0 m-0 regular-text">DUE DATE:</p>
			         <p class="p-0 m-0 regular-text">Prepared by:</p>
				     <p class="p-0 m-0 regular-text">Date Issued: </p>
			       </div>
				   <?php
				     $date_issued = date('F d, Y', strtotime($bill['date']));
				     $due_date = date('F d, Y', strtotime('7 day', strtotime($bill['date'])));  
				   ?>
			       <div class="col-8">
				     <p class="p-0 m-0 regular-text"><?php echo $due_date?></p>
			         <p class="p-0 m-0 regular-text bold text-decoration-underline"><?php echo $bill['prepared_by']?></p>
				     <p class="p-0 m-0 regular-text"><?php echo $date_issued?></p>
			      </div>
		        </div>
			 </div>
			 <div class="col-6">
			     <div class="row">
			       <div class="col-7">
				     <p class="p-0 m-0 regular-text">SUB-TOTAL:</p>
			         <p class="p-0 m-0 regular-text">UNPAID BALANCE:</p>
				     <p class="p-0 m-0 regular-text">CBU/OTHERS: </p>
					 <p class="p-0 m-0 regular-text fw-bold">TOTAL AMOUNT DUE: </p>
			       </div>
			       <div class="col-5">
				     <p class="p-0 m-0 regular-text text-end text-danger border-bottom border-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub_total?></p>
			         <p class="p-0 m-0 regular-text text-end border-bottom border-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $bill['balance']?></p>
					 <p class="p-0 m-0 regular-text text-end border-bottom border-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-</p>
					 <p class="p-0 m-0 bold regular-text text-end border-bottom border-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $total_amount_due?></p>
			      </div>
		        </div>
			 </div>
		  </div>
	    </div>
    <?php else:?>
        <div class="py-5">
           <h6 class="small text-secondary text-center py-5">No latest bill</h6>
        </div>
    <?php endif;?>

<script>
    function validateAmount(){
        let error = false;
        if (parseInt($('#payAmount').val()) > parseInt($('#amountDue').attr('amount-due'))) {
            $('#payAmount').addClass('error')
            $('#errorAmount').text('Amount to pay should not exceed to amount due')
            $('#btnSubmitPay').attr('disabled', '')
            error = true
        }else{
            $('#payAmount').removeClass('error')
            $('#errorAmount').text('')
            $('#btnSubmitPay').removeAttr('disabled')
            error = false
        }
        return error;
    }
</script>
<script>
  $(document).ready(function(){
     (function(){
        $('#btnOpenModalSelect').val($('#consumer').val())
     })()
  })
  $('#payAmount').on('input', function(){
      if (!validateAmount()) {
         
      }
  })
  $('#payNowBillForm').submit(function(e){
      e.preventDefault();
      const formData = $(this).serialize()
      $.ajax({
	     url: 'ajax/walkin/add_payment.php',
	     type: 'POST',
         data: formData,
	     success: function(data){
            $('.modal-payment-container').html(data)
	     }
	  })
    
  })

</script>