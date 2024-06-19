<?php include('database/connection.php')?>
 
<?php 
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("Location: login.php");
  }
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
    $number_of_bill = 0;
    $total_consumption = 0;
    $average_consumption = 0;

    $query = "SELECT * FROM users1 WHERE unique_id = ".$_SESSION['unique_id'];
    $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
    $user_id = $user['user_id'];
    $query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY date DESC";
    $result = mysqli_query($sql_con, $query);
    $latest_bill = $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result)) {
      $query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY date ASC";
      $old_bill = $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));

      $latest = new DateTime($latest_bill['date']);
      $old = new DateTime($old_bill['date']);
      $diff = $latest->diff($old);
      $number_of_months = (($diff->format('%y') * 12) + $diff->format('%m'));
  
      $query = "SELECT * FROM bill WHERE owners_id = $user_id";
      $result = mysqli_query($sql_con, $query);
      if (mysqli_num_rows($result)) {
        while ($bill = mysqli_fetch_assoc($result)) {
          $total_consumption+=($bill['pres'] - $bill['prev']);
          $number_of_bill++;
       }
      }
   
      if ($total_consumption) {
        $average_consumption = round($total_consumption / $number_of_bill);
      }
    }
      $first_charges = new FirstCharge($average_consumption, 125, 0, 5);
      $second_charges = new SecondCharge($average_consumption, 27, 6, 10);
      $third_charges = new ThirdCharge($average_consumption, 29, 11, 20);
      $fourth_charges = new FourthCharge($average_consumption, 31, 21, 30);
      $fifth_charges = new FifthCharge($average_consumption, 33, 31, 40);
      $succeeding_charges = new SucceedingCharge($average_consumption, 35, 40, 0);
  
      $sub_total = $first_charges->amount + $second_charges->amount + $third_charges->amount + $fourth_charges->amount + $fifth_charges->amount + $succeeding_charges->amount;

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">	
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <title>Consumpt</title>
</head>
<body>
 <style>
   *{
    font-family: Poppins;
   }

  .nav-active{
     color: #2563eb;
     border-bottom: 2px solid #2563eb;
    }
    .computation{
        width: 75%;
      }
      @media screen and (max-width: 768px) {
        .computation{
          width: 100%;
          padding: 10px;
        }
        .row{
        font-size: 0.6rem;
      }
        h4{
          font-size: 0.9rem;
        }
        h5{
          font-size: 0.8rem;
        }
        h6{
          font-size: 0.7rem;
        }
      }


    
    .main-con{
      margin-bottom: 70px;
    }
 </style>

<?php $page = 'home'?>
<?php include('navigation.php')?>

 
<div class="main-con container-md my-5 py-5">
  <h1 class="fw-bold text-primary">Consumption Report</h1>
  <div class="main-container border rounded-3 py-3 shadow mt-2">
    <div class="header d-flex justify-content-center">
       <div class="header-text">
         <h6 class=" text-center ">CONSUMPTION REPORT AS OF</h6>
         <h4 class=" fw-bold text-center"><?php echo date('F Y')?></h4>
         <h5 class="text-center">AVERAGE USAGE FOR <?php echo $number_of_months ?? 0?> MONTHS</h5>
         <h4 class=" text-center text-danger text-primary"> <?php echo $average_consumption?> </h4>
       </div>
    </div>

    <div class="computation-container d-flex justify-content-center">
        <div class=" computation mt-4">
          <h4 class=" fw-bold text-center">Computation</h4>
          <div class="row fw-bold">
            <div class="col-1">
              1st
            </div>
            <div class="col-4">
              5 cu.m (min)
            </div>
            <div class="col-2">
               125.00 
            </div>
            <div class="col-1">
            
            </div>
            <div class="col-1">
              <?php echo $first_charges->cu_m?>
            </div>
            <div class="col-1">
              =
            </div>
            <div class="col-2">
            &#8369;<?php echo $first_charges->amount?>
            </div>
          </div>

          <div class="row fw-bold">
            <div class="col-1">
              2nd
            </div>
            <div class="col-4">
              10 cu.m (6-10)
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
            <div class="col-1">
              =
            </div>
            <div class="col-2">
            &#8369;<?php echo $second_charges->amount?>
            </div>
          </div>

          <div class="row fw-bold">
            <div class="col-1">
              3rd
            </div>
            <div class="col-4">
              10 cu.m (11-20)
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
            <div class="col-1">
              =
            </div>
            <div class="col-2">
            &#8369;<?php echo $third_charges->amount?>
            </div>
          </div>

          <div class="row fw-bold">
            <div class="col-1">
              4th
            </div>
            <div class="col-4">
              10 cu.m (21-30)
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
            <div class="col-1">
              =
            </div>
            <div class="col-2">
            &#8369;<?php echo $fourth_charges->amount?>
            </div>
          </div>

          <div class="row fw-bold">
            <div class="col-1">
              5th
            </div>
            <div class="col-4">
              10 cu.m (31-40)
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
            <div class="col-1">
              =
            </div>
            <div class="col-2">
            &#8369;<?php echo $fourth_charges->amount?>
            </div>
          </div>

          <div class="row fw-bold">
            <div class="col-5">
              Succeeding cu.m
            </div>
            <div class="col-2">
              36.00 
            </div>
            <div class="col-1">
              x
            </div>
            <div class="col-1">
              <?php echo $succeeding_charges->cu_m?>
            </div>
            <div class="col-1">
              =
            </div>
            <div class="col-2">
            &#8369;<?php echo $succeeding_charges->amount?>
            </div>
          </div>

          <div class="row fw-bold mt-4">
        
            <div class="col-10">
              <h5 class=" me-5 text-end">Total:</h5>
            </div>
            <div class="col-2">
              <h5><?php echo $sub_total?></h5>
            </div>
          </div>
          
        </div>
     </div>
  </div>

</div>
  
 

 
 

  
</body>


</html>