<?php include('database/connection.php')?>
<?php session_start()?>
<?php
if (!isset($_SESSION['unique_id'])) {
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="../css/ppppay.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>

<style>
   *{ 
    font-family: 'Poppins', sans-serif;
  }
  #butt{
    transform: translateY(23rem);
  }
  #myTable{
    margin-left: 6rem;
    width: 80%;
  }
  #search{
    transform: translateY(23rem);
    margin-left: 40rem;
    border: none;
background-color: transparent;
font-size: larger;
  }
#cus{
  transform: translateY(15rem);
  margin-left: 33rem;
}
  #navv{
    display: none;
  }
         .wrapper {
    position: relative;
}
.boxedd{
  display:none ;
}
input {
    padding-left: 48px;
}

.wrapper span {
    position: absolute;
    left: 2px;
}
         @media screen and (max-width: 768px) {
    .table{
      width: 20%;
      margin-left: -0.5rem;
      display: flex;
    }
     #navv{
    display: flex;
  }
     
    #myTable{
      width: 10%;
      display: flex;
    }
 
    #box{
        width: 20rem; 
        margin-left: 4rem; 
display: none;
  
    }
    #txtyellow{
      margin-left: -2rem;
    }
    #ntn{
      margin-left: 10rem;
    }
    .wrapper {
    position: relative;
}

input {
    padding-left: 48px;
}

.wrapper span {
    position: absolute;
    left: 2px;
}
    #butt{
  transform: translateY(25rem);
  margin-left: -15rem;
    }
    #search{
      margin-left: 7.1rem;
border: none;
background-color: transparent;
font-size: larger;
transform: translateY(1rem);


    }
  }

</style>
<body>
<?php $page = 'history'?>
<?php include('navigation.php')?>

<div class="main-con container-md py-5 my-5">
  <h1 class="fw-bold text-primary">Payment History</h1>
  <style>
    .nav-active{
     color: #2563eb;
     border-bottom: 2px solid #2563eb;
    }
    .payment-text{
      font-size: 0.9rem;
    }
    .payment-item:hover{
      background: #e6e6e6;
    }
  </style>
  <div class="main-container border rounded-3 mt-2" style="background:#f2f2f2">
      <div class="bills-list py-3 mx-4">
      <?php
         $query = "SELECT * FROM users1 WHERE unique_id = ". $_SESSION['unique_id'];
         $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
         $user_id = $user['user_id'];
         $query = "SELECT * FROM payment WHERE user_id = $user_id AND payment_for = 'bill' AND status = 'Approved' ORDER BY date DESC";
         $result = mysqli_query($sql_con, $query);
      ?>
         <?php if(mysqli_num_rows($result)):?>
           <?php while($payment = mysqli_fetch_assoc($result)):?>
         <a class=" nav-link" href="../user/view.php?id=<?php echo $payment['id']?>" target="_blank">
           <div class="row payment-item border-bottom my-1 py-3">
           <?php
		          $query = "SELECT * FROM bill WHERE id = ".$payment['bill_id'];  
			        $bill = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
			        $from =  date('m/29/Y', strtotime('-2 month', strtotime($bill['date'])));
			        $to =  date('m/29/Y', strtotime('-1 month', strtotime($bill['date'])));
		        ?>
            <div class="col-md-2 py-2">
			     	    <div id="reference">
                  <h6 class=" p-0 m-0 payment-text text-center">Reference #</h6>
					        <p class="payment-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $payment['ref_number']?></p>
				        </div>
             </div>
			      <div class="col-md-2 py-2">
				        <div id="billPaid">
                 <h6 class=" p-0 m-0 payment-text text-center">Bill Paid</h6>
				         <div class="d-flex justify-content-evenly">
                   <div id="from">
			            	  <p class="payment-text fw-bold"><?php echo $from;?></p>
			             </div>
                   <div id="dash">
                     -
                   </div>
			             <div id="to">
				              <p class="payment-text fw-bold"><?php echo $to;?></p>
			             </div>
		             </div>
				        </div>
             </div>
             <div class="col-md-2 py-2">
				       <div id="consumption">
                 <h6 class=" p-0 m-0 payment-text text-center">Bill Amount</h6>
					       <p class="payment-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['balance'] + $bill['price']?></p>
				       </div>
             </div>
             <div class="col-md-2 py-2">
				       <div id="consumption">
                 <h6 class=" p-0 m-0 payment-text text-center">Paid Amount</h6>
					       <p class="payment-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $payment['paid_amount']?></p>
				       </div>
             </div>
              <div class="col-md-2 py-2">
				        <div id="modeOfPayment">
                  <h6 class=" p-0 m-0 payment-text text-center">Mode of payment</h6>
					        <p class="payment-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo ucfirst($payment['type'])?></p>
				        </div>
              </div>
              <div class="col-md-2 py-2">
				        <div id="date">
                  <h6 class=" p-0 m-0 payment-text text-center">Date</h6>
					        <p class="payment-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $payment['date']?></p>
				        </div>
              </div>
			        <!-- <div class="col-md-1 d-flex align-items-center justify-content-center">
				         <a class=" nav-link" href="../user/view.php?id=<?php echo $payment['id']?>" target="_blank">
				           <i class="bi bi-eye text-danger" style="font-size: 1.2rem;"></i>
                 </a>
			        </div> -->
		       </div> 
         </a>
           <?php endwhile;?>
           <?php else:?>
             <div class="py-5">
                <h6 class="small text-secondary text-center py-5">No records of payment</h6>
            </div>
          <?php endif;?>
      </div>
  </div>

</div>

 	
	

 
  
</body>
</html>
 