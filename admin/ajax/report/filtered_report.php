<?php include('../../database/connection.php');?>
<?php
   $date = $_GET['date'];
   $status = $_GET['status'];
   
   $filtered_payment_ids = [];
   $total_sale = 0;
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
<table class="table-data table table-sm table-striped" id="table-data" >
   <thead>
     <th class="py-2">Consumer</th>
     <th class="py-2">Mode of payment</th>
     <th class="py-2">Paid amount</th>
     <th class="py-2">Status</th>
     <th class="py-2">Date</th>
     <th class="py-2">Time</th>
   </thead>
  <tbody>
  <?php foreach($filtered_payment_ids as $id):?>
     <?php
       $query = "SELECT * FROM payment WHERE id = $id";
       $payment = mysqli_fetch_assoc(mysqli_query($sql_con, $query));  
                 
       $query = "SELECT * FROM users1 WHERE user_id = ".$payment['user_id'];
       $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query)); 
      ?>
     <tr>
       <td>
		 <?php 
		   $query = 'SELECT * FROM users1 WHERE user_id = '.$payment['user_id'];
		   $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query)); 
		  ?>
		 <div class=" image-con d-flex justify-content-center py-2">
		   <div class="image-border border-primary">
		      <img id="consumerImage" src="php/images/<?php echo $user['img']?>" alt="">
		    </div>
		 </div>
		 <h6 class=" fw-bold"><?php echo $user['fname'].' '.$user['lname']?></h6>
	   </td>
       <td id="ModeOfPayment">
         <?php echo ucfirst($payment['type'])?>
	   </td>
       <td id="paidAmount"><?php echo $payment['paid_amount']; ?></td>
       <td>
          <div class="py-3">
              <?php if($payment['status'] == 'Approved'):?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #dcfce7; color: #16a34a">
                <?php echo $payment['status']; ?>
              </span>
              <?php elseif($payment['status'] == 'Declined'):?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #fee2e2; color: #dc2626">
                <?php echo $payment['status']; ?>
              </span>
              <?php else:?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #fef9c3; color: #ca8a04">
                <?php echo $payment['status']; ?>
              </span>
              <?php endif;?>
          </div>
       </td>
       <td id="date"><?php echo date('F d, Y', strtotime($payment['date']))?></td>            
       <td id="time"><?php echo date('g:i A', strtotime($payment['date']))?></td>                          
     </tr>
    <?php endforeach;?>
  </tbody>
 </table>

 <script>
    $('#table-data').DataTable({
      autoWidth: false,
      order: [[0, 'desc']],
	  "language": {
      "emptyTable": "No report in the selected date"
      },
      columnDefs: [
                   {
                     targets: ['_all'],
                     className: 'mdc-data-table__cell',
                   },
                  ],
     });
 </script>