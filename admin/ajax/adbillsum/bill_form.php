<?php
include('../../database/connection.php');

$user_id = $_GET['userid'];
// get user details
$query = "SELECT * FROM users1 WHERE user_id = $user_id";
$user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));

//Change mo lang yung ORDER BY date DESC to ORDER BY id DESC
// get user previous billing
$query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY id DESC";
$result = mysqli_query($sql_con, $query);
$previousReading = 0;
if (mysqli_num_rows($result)) {
   $bill = mysqli_fetch_assoc($result);
   $previousReading = $bill['pres'];
}
 
//get consumer unpaid balance if has
$query = "SELECT SUM(price) as total_balance FROM bill WHERE owners_id = $user_id";
$balance = mysqli_fetch_assoc(mysqli_query($sql_con, $query));

$query = "SELECT SUM(paid_amount) as total_payment FROM payment WHERE user_id = $user_id AND status = 'Approved' AND payment_for = 'bill'";
$payment = mysqli_fetch_assoc(mysqli_query($sql_con, $query));

$total_balance = $balance['total_balance'] - $payment['total_payment'];
 
?>
<style>
	#consumerImage{
	  width: 90px;
	  height: 90px;
	  object-fit: cover;
	  border: 3px solid #f2f2f2;
	  border-radius: 50%;
	}
	.image-border{
	  outline: 3px solid #3a86ff;
	  overflow: hidden;
	  border-radius: 50%;
	}
	.alert-msg{
		border: 1px solid #fee2e2;
		border-left: 2px solid #dc2626;
		background: #fee2e2;
	}
	.bill-text{
		font-size: 0.8rem;
	}
</style>
<div class="modal-content rounded-0">
	 <div class="modal-header border-0">
	   <h5 class="modal-title" id="modalTitleId">Consumer bill</h5>
	   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	 </div>
	 <div class="modal-body">
		<input type="hidden" name="userid" id="userid" value="<?php echo $user_id?>">
		<input type="hidden" name="consumerName" id="consumerName" value="<?php echo $user['fname']. ' ' .$user['lname']?>">
	   <?php if($user['status'] == 'Disconnected'):?>
		<div class="alert-msg my-2 d-flex align-items-center py-2">
		   <i class="bi bi-exclamation-circle-fill px-3 text-danger" style="font-size: 1.3rem;"></i>
		   <h6 class="note m-0 p-0 text-danger ">This consumer have 3 unpaid bills</h6>
	    </div>
		<div class="paid-main-container" style="height: 350px;">
         <div class="unpaid-bill px-3" style="height: 90%;overflow:auto;">
		   <?php
	         $query = "SELECT * FROM bill WHERE owners_id = $user_id AND status = 'Unpaid'";
		     $result = mysqli_query($sql_con, $query);
	       ?>
           <?php while($unpaid_bill = mysqli_fetch_assoc($result)):?>
           <div class="row border my-1 py-1 shadow-sm">
			       <div class="col-10 d-flex justify-content-between align-items-center">
				       <div id="previous">
                          <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Previous Reading</h6>
				         <p class=" p-0 m-0 bill-text text-center "><?php echo $unpaid_bill['prev']?></p>
				      </div>
			     	  <div id="present">
                          <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Present Reading</h6>
					       <p class="bill-text p-0 m-0 text-center "><?php echo $unpaid_bill['pres']?></p>
				      </div>
				      <div id="consumption">
                          <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Consumption</h6>
					       <p class="bill-text p-0 m-0 text-center "><?php echo $unpaid_bill['pres'] - $unpaid_bill['prev']?></p>
				     </div>
				     <div id="price">
                          <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Price</h6>
				      	 <p class="bill-text p-0 m-0 text-center "><?php echo $unpaid_bill['price']?></p>
				     </div>
				     <div id="date">
                         <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Due Date</h6>
					     <p class="bill-text p-0 m-0 text-center "><?php echo date('m/d/Y h:g A', strtotime('7 day', strtotime($unpaid_bill['date'])))?></p>
				    </div>
				    <div id="billAmount">
                         <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Bill Amount</h6>
				    	  <p class="bill-text p-0 m-0 text-center "><?php echo $unpaid_bill['price']?></p>
				    </div>
			     </div>
			     <div class="col-1 d-flex align-items-center">
				     <span class="small rounded-pill py-1 px-2" style="font-size: 0.7rem;font-weight:bold;background:#fecaca;color:#dc2626;">Unpaid</span>
			     </div>
			     <div class="col-1 d-flex align-items-center justify-content-center">
				     <a class=" nav-link" href="viewpayment.php?id=<?php echo $unpaid_bill['id']?>" target="_blank">
				       <i class="bi bi-eye text-danger" style="font-size: 1.2rem;"></i>
                     </a>
			     </div>
		    </div> 
           <?php endwhile;?>
		 </div> 
	  </div>
	   <?php else:?>
	   <div class="row"> 
 	      <div class="col-4">
		     <!-- <h6 class="date small"><?php echo $bill['date']?></h6> -->
               <div class=" image-con d-flex justify-content-center mb-2">
		   	     <div class="image-border border-primary p-1">
		           <img id="consumerImage" src="php/images/<?php echo $user['img']?>" alt="">
		         </div>
			   </div>
			   <h6 class="text-center m-0 p-0" style="color: #1D2D44;font-weight:bold;"><?php echo $user['fname']. ' ' .$user['lname']?></h6>
               <p class="small text-center " style="color: #1D2D44;">Consumer</p>
			   <div class="reading-container">
			     <div class="input-con previousReading-container">
                     <label for="prevReading">Previous Billing</label>
					 <div class="input-prev d-flex align-items-center border">
					   <input type="text" name="previousReading" id="previousReading" class="w-50 text-end py-2" style="border: none; outline: none;" value="<?php echo $previousReading?>" readonly>
					 </div>
				  </div>
			     <div class="presentReading-container">
			         <label for="presentReading">Present Billing</label>
			         <div class="input-con d-flex align-items-center border">
                      <input type="text" name="presentReading" id="presentReading" class="w-50 text-end py-2" style="border:none; outline:none;" value="0">
			        </div>
			     </div>
				 <div class="input-con consumtion-container">
                     <label for="consumption">Consumption</label>
					 <div class="input-prev d-flex align-items-center border">
					   <input type="text" name="consumption" id="consumption" class="w-50 text-end py-2" style="border: none; outline: none;" value="50" readonly>
					   <span class=" d-block w-50">cu.m</span>
					 </div>
				  </div>
			   </div>
            </div>
			<div class=" col-8">
		       <div class="price-details-container mt-2 pe-3">
			     <h6 class=" fw-bold">Calculation for billing</h6>
				  <div class="calculation-con">
                     <div id="1st" class="charges-info row">
                       <div class="col-4">1st 5cu.m(min)</div>
					   <div class="col-2">125.00</div>
					   <div class="col-1">
					 
					   </div>
					   <div class="col-2">
						 <div class=" input-con cm d-flex justify-content-between">
						   <input type="text" name="first" id="first" class=" text-end" style="width:20px; border:none; outline:none;" readonly>
						   <span> = &nbsp; &#8369;</span>
						 </div>
					   </div>
					   <div class="col-2">
					     <div class="d-flex">
						   <input type="text" class=" text-end" name="firstAmount" id="firstAmount" style="width:50px; border:none; outline:none;" readonly>
						   <span>.00</span>
						 </div>
					   </div>
					 </div>
					 <div id="2nd" class="charges-info row">
                       <div class="col-4">2nd 5cu.m(6-10)</div>
					   <div class="col-2">27.00</div>
					   <div class="col-1">
						x
					   </div>
					   <div class="col-2">
						 <div class=" input-con cm d-flex justify-content-between">
						   <input type="text" class=" text-end" name="second" id="second" style="width:20px; border:none; outline:none;" readonly>
						   <span> = &nbsp; &#8369;</span>
						 </div>
					   </div>
					   <div class="col-2">
					     <div class="d-flex">
						   <input type="text" class=" text-end" name="secondAmount" id="secondAmount" style="width:50px; border:none; outline:none;" readonly>
						   <span>.00</span>
						 </div>
					   </div>
					 </div>
					 <div id="3rd" class="charges-info row">
                       <div class="col-4">3rd 10 cu.m(11-20)</div>
					   <div class="col-2">29.00</div>
					   <div class="col-1">
						x
					   </div>
					   <div class="col-2">
						 <div class=" input-con cm d-flex justify-content-between">
						   <input type="text" class=" text-end" name="third" id="third" style="width:20px; border:none; outline:none;" readonly>
						   <span> = &nbsp; &#8369;</span>
						 </div>
					   </div>
					   <div class="col-2">
					     <div class="d-flex">
						   <input type="text" class=" text-end" name="thirdAmount" id="thirdAmount" style="width:50px; border:none; outline:none;" readonly>
						   <span>.00</span>
						 </div>
					   </div>
					 </div>
					 
					 <div id="4th" class="charges-info row">
                       <div class="col-4">4th 10 cu.m(21-30)</div>
					   <div class="col-2">31.00</div>
					   <div class="col-1">
						x
					   </div>
					   <div class="col-2">
						 <div class=" input-con cm d-flex justify-content-between">
						   <input type="text" class=" text-end" name="fourth" id="fourth" style="width:20px; border:none; outline:none;" readonly>
						   <span> = &nbsp; &#8369;</span>
						 </div>
					   </div>
					   <div class="col-2">
					     <div class="d-flex">
						   <input type="text" class=" text-end" name="fourthAmount" id="fourthAmount" style="width:50px; border:none; outline:none;" readonly>
						   <span>.00</span>
						 </div>
					   </div>
					 </div>

					 <div id="5th" class="charges-info row">
                       <div class="col-4">5th 10 cu.m(31-40)</div>
					   <div class="col-2">33.00</div>
					   <div class="col-1">
						x
					   </div>
					   <div class="col-2">
						 <div class=" input-con cm d-flex justify-content-between">
						   <input type="text" class=" text-end" name="fifth" id="fifth" style="width:20px; border:none; outline:none;" readonly>
						   <span> = &nbsp; &#8369;</span>
						 </div>
					   </div>
					   <div class="col-2">
					     <div class="d-flex">
						   <input type="text" class=" text-end" name="fifthAmount" id="fifthAmount" style="width:50px; border:none; outline:none;" readonly>
						   <span>.00</span>
						 </div>
					   </div>
					 </div>

					 <div id="maxCon" class="charges-info row">
                       <div class="col-4">Succeeding cu.m</div>
					   <div class="col-2">35.00</div>
					   <div class="col-1">
						x
					   </div>
					   <div class="col-2">
						 <div class=" input-con cm d-flex justify-content-between">
						   <input type="text" class=" text-end" name="max" id="max" style="width:20px; border:none; outline:none;" readonly>
						   <span> = &nbsp; &#8369;</span>
						 </div>
					   </div>
					   <div class="col-2">
					     <div class="d-flex">
						   <input type="text" class=" text-end" name="maxAmount" id="maxAmount" style="width:50px; border:none; outline:none;" readonly>
						   <span>.00</span>
						 </div>
					   </div>
					 </div>

					 <div class="total-info-container mt-4">
					   <div class="charges-info row m-0 p-0">
                         <div class="col-6">
							<h6 class="text-end">SUB-TOTAL</h6>
							<h6 class="text-end">UNPAID BALANCE</h6>
							<h6 class="text-end fw-bold">TOTAL AMOUNT DUE:</h6>
						 </div> 
					     <div class="col-3">
						   <p class=" text-end p-0 m-0">&#8369;</p>
						   <p class=" text-end p-0 m-0">&#8369;</p>
						   <p class=" text-end p-0 m-0">&#8369;</p>
					     </div>
					     <div class="col-2">
					       <div class="d-flex align-items-center">
						     <input type="text" class=" text-end text-danger" name="subTotal" id="subTotal" style="width:50px; border:none; outline:none;" readonly>
						     <span class="text-danger">.00</span>
						   </div>
						   <div class="d-flex align-items-center">
						     <input type="text" class=" text-end" name="balance" id="balance" style="width:50px; border:none; outline:none;" value="<?php echo $total_balance ?? 0?>" readonly>
						     <span>.00</span>
						   </div>
						   <div class="d-flex align-items-center">
						     <input type="text" class="fw-bold text-end" name="totalAmount" id="totalAmount" style="width:50px; border:none; outline:none;" value="0" readonly>
						     <span class=" fw-bold">.00</span>
						   </div>
					     </div>
					    </div>
					 
					 </div>

				  </div>
		       </div>
	     	</div>
		</div>
		<?php endif;?>
	     <div class="modal-footer border-0">
			<?php if($user['status'] != 'Disconnected'):?>
		     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>		
	         <button type="submit" class="btn-submit-bill btn btn-primary" id="btnSubmitBill">Issued Bill</button>
			<?php else:?>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<?php endif;?>
	      </div>
     </div>
	
</div>


<script>
	console.log(location.hostname+'/api/price_charges.php')
// async function getCubicCharges(){
//      fetch()
// }
function calculateBill(cosumption){
	let currentCharges = {
		first: ['', 0],
		second: ['', 0],
		third: ['', 0],
		fourth: ['', 0],
		fifth: ['', 0],
		max: ['', 0]
	}
    if (cosumption > 40) {
		currentCharges.max[0] = cosumption - 40
		currentCharges.max[1] = currentCharges.max[0] * 35
		cosumption = 40
	}
	if(cosumption >= 31 && cosumption <= 40){
		currentCharges.fifth[0] = cosumption - 30
        currentCharges.fifth[1] = currentCharges.fifth[0] * 33
		cosumption = 30
	}
	if(cosumption >= 21 && cosumption <= 30){
		currentCharges.fourth[0] = cosumption - 20
        currentCharges.fourth[1] = currentCharges.fourth[0] * 31
		cosumption = 20
	}
	if(cosumption >= 11 && cosumption <= 20){
		currentCharges.third[0] = cosumption - 10
        currentCharges.third[1] = currentCharges.third[0] * 29
		cosumption = 10
	}
	if(cosumption >= 6 && cosumption <= 10){
		currentCharges.second[0] = cosumption - 5
        currentCharges.second[1] = currentCharges.second[0] * 27
		cosumption = 5
	}
	if(cosumption < 6){
		currentCharges.first[0] = cosumption
        currentCharges.first[1] = 125
	}
	
	return currentCharges
}
function showCharges(chargesSummary){
   $('#first').val(chargesSummary.first[0])
   $('#firstAmount').val(chargesSummary.first[1])

   $('#second').val(chargesSummary.second[0])
   $('#secondAmount').val(chargesSummary.second[1])

   $('#third').val(chargesSummary.third[0])
   $('#thirdAmount').val(chargesSummary.third[1])

   $('#fourth').val(chargesSummary.fourth[0])
   $('#fourthAmount').val(chargesSummary.fourth[1])

   $('#fifth').val(chargesSummary.fifth[0])
   $('#fifthAmount').val(chargesSummary.fifth[1])

   $('#max').val(chargesSummary.max[0])
   $('#maxAmount').val(chargesSummary.max[1])

   let subTotal = 0;
   for (const key in chargesSummary) {
	  subTotal+=chargesSummary[key][1]
   }
   $('#subTotal').val(subTotal)
   $('#totalAmount').val(subTotal + parseInt($('#balance').val()));
}  
function addPresentReading(){
	$('#presentReading').val(parseInt($('#presentReading').val()) + 1)
	 $('#consumption').val(parseInt($('#presentReading').val()) - parseInt($('#previousReading').val()))
	 
	 showCharges(calculateBill(parseInt($('#consumption').val())))
}
function decreasePresentReading(){
	const prevReading = parseInt($('#previousReading').val()) + 1
	  if ($('#presentReading').val() != prevReading) {
		$('#presentReading').val(parseInt($('#presentReading').val()) - 1)
	  } 
	//   if (parseInt($('#presentReading').val()) <= parseInt($('#previousReading').val())) {
	// 	$('#presentReading').val(parseInt($('#previousReading').val()) + 1)
	//   }
	  $('#consumption').val(parseInt($('#presentReading').val()) - parseInt($('#previousReading').val()))
      
      showCharges(calculateBill(parseInt($('#consumption').val())))
}
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
		$('#presentReading').val(parseInt($('#previousReading').val()) + 1)
		$('#consumption').val(parseInt($('#presentReading').val()) - parseInt($('#previousReading').val()))
		showCharges(calculateBill(parseInt($('#consumption').val())))
	})

   $('#btnDecBill').click(function(){
	  decreasePresentReading()
   })

   $('#btnAddBill').click(function(e){
	  addPresentReading()
   })

//    $('#presentReading').on('input', function(e){
// 	   let presReading = document.querySelector('#presentReading');
// 	   let presReadingVal = $(this).val();
// 	   console.log(e)
// 	   if (!Number.isInteger($(this).val())) {
// 		$(this).val(presReadingVal.slice(presReadingVal.indexOf(e.key), 1))
// 	   }
//    })
    document.querySelector('#presentReading').addEventListener('input', function(e){
		let preValue = document.querySelector('#previousReading').value;
        let inputData = e.data;
		let currentValue = this.value;
		console.log()
		if (!parseInt(inputData) && parseInt(inputData) != 0) {
		    this.value = currentValue.replace(inputData, '')
	    }
		if (currentValue <= preValue) {
			this.value = parseInt(preValue) + 1
		}
		$('#consumption').val(parseInt($('#presentReading').val()) - parseInt($('#previousReading').val()))
		showCharges(calculateBill(parseInt($('#consumption').val())))
	})
   $('#btnSubmitBill').click(function(){
	     const userId = $('#userid').val()
		 const userName = $('#consumerName').val()
		 const previousReading = $('#previousReading').val()
		 const presentReading = $('#presentReading').val()
		 const subTotal = $('#subTotal').val()
		 const totalBalance = $('#balance').val()
	     $.ajax({
		     url: 'ajax/adbillsum/add_bill.php',
		     type: 'POST',
             data: {
				owners_id: userId,
				username: userName,
				prev: previousReading,
				pres: presentReading,
				price: subTotal,
				balance: totalBalance
			  },
		     success: function(data){
               $('.modal-container-billform').html(data)
		     }
	      })
   })
</script>