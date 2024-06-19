<?php include('../../database/connection.php');?>
<table class="table-data table table-sm table-striped" id="table-data" >
   <thead>
     <th class="py-2">Consumer</th>
     <th class="py-2">Bill to pay</th>
     <th class="py-2">Bill amount</th>
     <th class="py-2">Paid amount</th>
     <th class="py-2">Status</th>
     <th class="py-2">Proof of payment</th>
   </thead>
  <tbody>
   <?php 
     $status = $_GET['status'];
     $query = "SELECT * FROM payment WHERE status = '$status' AND payment_for = 'bill'";
     if ($status == 'All') {
        $query = "SELECT * FROM payment";
        $status = "No records of";
     }
	 $result = mysqli_query($sql_con, $query);
   ?>
   <?php while($row = mysqli_fetch_array($result)):?>
     <tr>
       <td>
		 <?php 
		   $query = 'SELECT * FROM users1 WHERE user_id = '.$row['user_id'];
		   $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query)); 
		  ?>
		 <div class=" image-con d-flex justify-content-center py-2">
		   <div class="image-border border-primary">
		      <img id="consumerImage" src="php/images/<?php echo $user['img']?>" alt="">
		    </div>
		 </div>
		 <h6 class=" fw-bold"><?php echo $user['fname'].' '.$user['lname']?></h6>
	   </td>
       <td id="billToPay">
		   <?php
		      $query = "SELECT * FROM bill WHERE id = ".$row['bill_id'];  
			  $bill = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
			  $from =  date('F 29, Y', strtotime('-2 month', strtotime($bill['date'])));
			  $to =  date('F 29, Y', strtotime('-1 month', strtotime($bill['date'])));
		   ?>
		   <div class="d-flex justify-content-evenly">
              <div id="from">
                 <p class=" p-0 m-0">From</p>
				 <p class=" fw-bold"><?php echo $from;?></p>
			  </div>
			  <div id="to">
                 <p class=" p-0 m-0">to</p>
				 <p class=" fw-bold"><?php echo $to;?></p>
			  </div>
		   </div>
	   </td>
       <td id="billAmount">&#8369;<?php echo $bill['price'] + $bill['balance'];?></td>
       <td>&#8369;<?php echo $row['paid_amount']; ?></td>   
       <td>
	      <div class="py-3">
              <?php if($row['status'] == 'Approved'):?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #dcfce7; color: #16a34a">
                <?php echo $row['status']; ?>
              </span>
              <?php elseif($row['status'] == 'Declined'):?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #fee2e2; color: #dc2626">
                <?php echo $row['status']; ?>
              </span>
              <?php else:?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #fef9c3; color: #ca8a04">
                <?php echo $row['status']; ?>
              </span>
              <?php endif;?>
          </div>
	   </td>          
       <td>
		 <button type="button" class="btn-view-payment px-3" status="<?php echo $row['status']?>" user-id="<?php echo $row['user_id']; ?>" payment-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#modalBillPayment">
		    <i class="bi bi-eye text-danger"></i> 
	     </button>
      </td>                          
     </tr>
     <?php endwhile;?>
   </tbody>
  </table>


<script>
	function getBillForm(){
		$('.btn-view-payment').click(function(){
          const status = $(this).attr('status')
	      const userId = $(this).attr('user-id')
		  const paymentId = $(this).attr('payment-id')
	      $.ajax({
		     url: 'ajax/transaction/payment.php',
		     type: 'GET',
             data: {
                 pStatus: status,
				 userid: userId,
				 paymentid: paymentId
			  },
		     success: function(data){
               $('.modal-container-payment').html(data)
		     }
	      })

	  })
	}
</script>

<script>
    getBillForm();
	$('#table-data').on('page.dt', function () {
        console.log('change')
        getBillForm();
    }).DataTable({
      autoWidth: false,
      order: [[0, 'desc']],
	  "language": {
      "emptyTable": "No <?php echo $status?> payments"
      },
      columnDefs: [
                   {
                     targets: ['_all'],
                     className: 'mdc-data-table__cell',
                   },
                  ],
     });
</script>