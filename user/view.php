<?php include('database/connection.php'); ?>
<?php
  if (isset($_GET['notification'])) {
     $notif_id = $_GET['notification'];
     $query = "UPDATE `notifications` SET `status` = 'read' WHERE `id` = $notif_id";
     mysqli_query($sql_con, $query);
  }

?>
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

 $payment_id = $_GET['id'];
 $query = "SELECT * FROM payment WHERE id = $payment_id";
 $result = mysqli_query($sql_con, $query);
 $payment = mysqli_fetch_assoc($result);

 $user_id = $payment['user_id'];
 $bill_id = $payment['bill_id'];

 $query = "SELECT * FROM bill WHERE id = $bill_id";
 $result = mysqli_query($sql_con, $query);
 $bill = mysqli_fetch_assoc($result);
 $latest_bill = mysqli_num_rows($result);

 $query = "SELECT * FROM users1 WHERE user_id = $user_id";
 $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
  

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
    $balance = $bill['balance'];
    $total_amount_due = $sub_total + $balance;
	  $paid_amount = $payment['paid_amount'];
 }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Receipt | <?php echo $user['fname'].'_'.$user['lname']?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="../css/view2.css">
  <link href="https://fonts.googleapis.com/css?family=Homemade+Apple|Old+Standard+TT:700|Share+Tech+Mono" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
  <script type="text/javascript">
	$(document).ready(function() 
	{ 
		$(document).on('click', '.btn_print', function(event) 
		{
			event.preventDefault();
			var element = document.getElementById('receipt'); 
			var opt = 
			{
			  margin:       0,
			  filename:     'Receipt_<?php echo $user['fname'].'_'.$user['lname'].'-'.$payment['date']?>.pdf',
			  image:        { type: 'jpeg', quality: 0.98 },
			  html2canvas:  { scale: 1 },
			  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
			};
			html2pdf().set(opt).from(element).save();
		});
	});
	</script>
  <style>
     body{
      background: #aac9d4;
     }
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="d-flex justify-content-center py-2">
	<div class="btn_print text-white bg-danger px-3 py-2 rounded-3" id="rep" style="cursor: pointer;">
      Print
	</div>
</div>
<div class="background">
  <div class="check border m-auto my-5" id="receipt">
    <h1>PWBS™</h1>
    <div class="name px-4">
       <small class=" d-block d-flex" style="font-size: 0.7rem"><span>Payment from:</span> <div class="w-75 px-2 text-decoration-underline"><?php echo $user['fname']. ' ' .$user['lname']?></div></small>
    </div>
    <div class="meta">
      <div class="meta-item">
        <h2 class="meta-item-label">Date </h2>
        <small style="font-size: 0.7rem"><i><?php echo date('m/j/Y h:i A', strtotime($payment['date'])) ?></i></small>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label" 2>Previous</h2>
        <P  id="etona"><?php echo $bill['prev']?></P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">Present</h2>
        <P id="etona"> <?php echo $bill['pres']?></P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">CAN</h2>
        <P id="etona1"> <?php echo $user['unique_id']?></P>
      </div>
      <div class="meta-item d-flex  align-items-center justify-content-center">
        <h6 class="check-number" style="font-size: 0.7rem !important;"><?php echo $payment['ref_number']?></h6>
      </div>
    </div>
    <h3 class="item-types">
        #55 B Kasibulan St. Brgy, Palangoy, Binangonan, Rizal CDA Reg. No. 9520-0446714 * CIN 010904001 Reg. TIN: 219-810-073-000- Exempt
    </h3>
    <h3 class="item-types"> OFFICIAL RECEIPT </h3>
 
 
    <div class="order-list-container">
   
    <div class=" position-relative">
      <style>
         #calculation > *{
          font-size: 0.8rem;
         }
      </style>
      <div id="calculation" class="mt-1 position-absolute top-0 w-100">
        <h3 class="ordered-item c">Computation</h3>
          <div class="row">
            <div class=" fw-bold col-4">
               Current charges
            </div>
            <div class=" fw-bold col-6">
              Per cubic meter
            </div>
            <div class=" fw-bold col-2">
              Amount
            </div>
          </div>
         <div class=" row">
            <div class="col-4">
              <span class=" fw-bold ">1st</span> 5cu.m(min)
            </div>
            <div class="col-2">
              125.00
            </div>
            <div class="col-1">
             </div>
             <div class="col-1">
               <?php echo $first_charges->cu_m?>
             </div>
            <div class="col-2">
              = &nbsp; &#8369;
            </div>
            <div class="col-2">
               <?php echo $first_charges->amount?>
              </div>
         </div>
         <div class=" row">
            <div class="col-4">
              <span class=" fw-bold ">2nd</span> 5cu.m(6-10)
            </div>
            <div class="col-2">
              27.00
            </div>
            <div class="col-1">
              x
            </div>
            <div class="col-1">
               <?php echo $second_charges->cu_m?>
             </div>
            <div class="col-2">
               = &nbsp; &#8369;
            </div>
            <div class="col-2">
                <?php echo $second_charges->amount?>
              </div>
         </div>
         <div class=" row">
            <div class="col-4">
              <span class=" fw-bold ">3rd</span> 10 cu.m(11-20)
            </div>
            <div class="col-2">
              29.00
            </div>
            <div class="col-1">
              x
            </div>
            <div class="col-1">
               <?php echo $third_charges->cu_m?>
             </div>
            <div class="col-2">
               = &nbsp; &#8369;
            </div>
            <div class="col-2">
               <?php echo $third_charges->amount?>
              </div>
         </div>
         <div class=" row">
            <div class="col-4">
             <span class=" fw-bold ">4rth</span>10 cu.m(21-30)
            </div>
            <div class="col-2">
              31.00
            </div>
            <div class="col-1">
              x
            </div>
            <div class="col-1">
               <?php echo $fourth_charges->cu_m?>
             </div>
            <div class="col-2">
               = &nbsp; &#8369;
            </div>
            <div class="col-2">
               <?php echo $fourth_charges->amount?>
              </div>
         </div>
         <div class=" row">
            <div class="col-4">
              <span class=" fw-bold ">5th</span> 10 cu.m(31-40)
            </div>
            <div class="col-2">
              33.00
            </div>
            <div class="col-1">
              x
            </div>
            <div class="col-1">
               <?php echo $fifth_charges->cu_m?>
             </div>
            <div class="col-2">
               = &nbsp; &#8369;
            </div>
            <div class="col-2">
               <?php echo $fifth_charges->amount?>
              </div>
         </div>
         <div class=" row">
            <div class="col-4">
            Succeeding cu.m
            </div>
            <div class="col-2">
              35.00
            </div>
            <div class="col-1">
              x
            </div>
            <div class="col-1">
               <?php echo $succeeding_charges->cu_m?>
             </div>
            <div class="col-2">
               = &nbsp; &#8369;
            </div>
            <div class="col-2">
               <?php echo $succeeding_charges->amount?>
              </div>
         </div>
         <h3 class="ordered-item tax-writing text-center "  >&nbsp; <?php echo $payment['status']?></h3>
         <h2 class="ordered-item total-writing text-center " id="totalnadis" > &nbsp; <?php echo $payment['status']?></h2>
      </div>                                                  
      <div class="order-list grid-lines">
        <!-- row 1-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>                                                                 
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 2-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 3-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 4-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 5-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 6-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 7-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"> </div>
        <!-- row 8-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 9-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 10-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 11-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 12-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 13-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <!-- row 14-->
        <div class="grid-item"></div>
        <div class="grid-item text-end"><h3 class="tax">Sub Total </h3></div>
        <div class="grid-item"><?php echo $sub_total?></div>
        <div class="grid-item"></div>
        <!-- row 15-->
        <div class="grid-item"></div>
        <div class="grid-item"><h3 class="tax">Balance</h3></div>
        <div class="grid-item"><?php echo $balance?></div>
        <div class="grid-item"></div>
        <!-- row 16-->
        <div class="grid-item"></div>
        <div class="grid-item"><h3 class="tax">Total amount due</h3></div>
        <div class="grid-item"><?php echo $total_amount_due?></div>
        <div class="grid-item"></div>
        <!-- row 17-->
        <div class="grid-item"></div>
        <div class="grid-item"><h3 class="tax">Paid amount</h3></div>
        <div class="grid-item"><?php echo $paid_amount?></div>
        <div class="grid-item"></div>
        <!-- row 18-->
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
      </div>
     </div>


  </div>
    <div class="company-info d-flex">
      <small class=" fw-bold">525</small>
      <small class=" fw-bold">PWBSRECEIPT™</small>
      <small class=" fw-bold">Pwbs@gmail.com</small>
      <small class=" fw-bold">made in PALANGOY</small>
    </div>
     
  </div>
</div>
<!-- partial -->

</div>
 
</body>
</html>
