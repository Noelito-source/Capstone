<?php include('../../database/connection.php');?>
<?php
  //This is the a class to calculate the bill amount of a consumer
  abstract class Charges{
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
  class FirstCharge extends Charges{
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
  class SecondCharge extends Charges{
  	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
   	  } 
   }
   class ThirdCharge extends Charges{
  	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
   	  } 
   }
   class FourthCharge extends Charges{
	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
	    parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
	    $this->calculateAmount();
	  } 
   }
   class FifthCharge extends Charges{
	  function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic){
	    parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
	    $this->calculateAmount();
	  } 
   }
   class SucceedingCharge extends Charges{
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
 $user_id = $_GET['userid'];
 $query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY date DESC";
 $result = mysqli_query($sql_con, $query);
 $bill = mysqli_fetch_assoc($result);
 $latest_bill = mysqli_num_rows($result);

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
 }
?>
<style>
 
	.container_content{
		background: #ffffff;
		border: 1px solid #f2f2f2;
		border-bottom-width: 1px;
		border-bottom-style: dashed;
		border-bottom-color: #121212;
		box-shadow: inset 1px solid #121212, 1px solid #121212;
	}
	.header h3{
		/* font-size: 30pt; */
		font-size: 20pt;
		font-weight: bold;
		color: #4a4a4a;
		border-bottom: 1px solid #8b572a;
		text-align: center;
	}
	.main-head{
		font-weight: bold;
		font-family: Roboto;
		padding: 0px;
		margin: 0px;
	}
	.title{
		margin-top: 10px;
		font-size: 15pt;
	}
	.sub-title{
		font-size: 9pt;
	}
	.bold{
		font-weight: bold;
	}
	.regular-text{
		font-size: 11pt;
	}
</style>
 
    <?php if($latest_bill):?>
       <div class="container_content p-5 shadow" id="container_content">
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
        <div class="py-5" style="height: 350px;">
           <h6 class="small text-secondary text-center py-5">No latest bill</h6>
        </div>
    <?php endif;?>
 


 


