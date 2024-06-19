<?php include('../../database/connection.php');?>
<?php
   
   $date = $_GET['date'];
   $status = $_GET['status'];
   
   $filtered_payment_ids = [];
   $query = "SELECT * FROM payment WHERE status = '$status'";
   if ($status == 'All') {
      $query = "SELECT * FROM payment";
   }
   $result = mysqli_query($sql_con, $query);
   if (mysqli_num_rows($result)) {
     while ($payment = mysqli_fetch_assoc($result)) { 
        if ($date == date('Y-m', strtotime($payment['date']))) {
           array_push($filtered_payment_ids, $payment['id']);
        }
     }
   }
   
   

?>
<?php if(count($filtered_payment_ids)):?>
   <a href="report/print.php?date=<?php echo $date?>&status=<?php echo $status?>" class=" btn btn-primary py-2 px-3" target="_blank">
     Print
  </a>
<?php endif;?>