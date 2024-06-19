<?php include('../../database/connection.php');?>
<?php
 $user_id = $_GET['userid'];
 $query = "SELECT * FROM bill WHERE owners_id = $user_id AND status = 'Unpaid' ORDER BY date DESC";
 $result = mysqli_query($sql_con, $query);
?>
<style>

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
     <div class="paid-main-container" style="height: 350px;">
        <div id="alertCon" class="d-none justify-content-end my-2">
         <div class=" alert shadow m-0 p-0">
	       <div class="border border-primary loader"></div>
             <div class="py-2 px-4">
	           <span class="text-success">Success</span>
	           <span><span id="numberOfPaidBills"></span> bill/s has been paid</span>
	        </div>
          </div>
        </div>
		    <div class="my-1 btn-paid d-none">
   
		     </div>
         <div class="unpaid-bill px-3" style="height: 90%;overflow:auto;">
         <?php if(mysqli_num_rows($result)):?>
           <?php while($bill = mysqli_fetch_assoc($result)):?>
           <div class="row border my-1 py-1 shadow-sm">
			       <div class="col-10 d-flex justify-content-between align-items-center">
				       <div id="previous">
                 <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Previous Reading</h6>
				         <p class=" p-0 m-0 bill-text text-center "><?php echo $bill['prev']?></p>
				      </div>
			     	  <div id="present">
                 <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Present Reading</h6>
					       <p class="bill-text p-0 m-0 text-center "><?php echo $bill['pres']?></p>
				      </div>
				      <div id="consumption">
                 <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Consumption</h6>
					       <p class="bill-text p-0 m-0 text-center "><?php echo $bill['pres'] - $bill['prev']?></p>
				     </div>
				     <div id="price">
                 <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Price</h6>
				      	 <p class="bill-text p-0 m-0 text-center "><?php echo $bill['price']?></p>
				     </div>
				     <div id="date">
                 <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Due Date</h6>
					       <p class="bill-text p-0 m-0 text-center "><?php echo date('m/d/Y', strtotime('7 day', strtotime($bill['date'])))?></p>
				    </div>
				    <div id="billAmount">
                <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Bill Amount</h6>
				    	  <p class="bill-text p-0 m-0 text-center "><?php echo $bill['price']?></p>
				    </div>
			     </div>
			     <div class="col-1 d-flex align-items-center">
				     <span class="small rounded-pill py-1 px-2" style="font-size: 0.7rem;font-weight:bold;background:#fecaca;color:#dc2626;">Unpaid</span>
			     </div>
			     <div class="col-1 d-flex align-items-center justify-content-center">
				     <a class=" nav-link" href="viewpayment.php?id=<?php echo $bill['id']?>" target="_blank">
				       <i class="bi bi-eye text-danger" style="font-size: 1.2rem;"></i>
            </a>
			     </div>
		    </div> 
           <?php endwhile;?>
           <?php else:?>
             <div class="py-5">
                <h6 class="small text-secondary text-center py-5">No unpaid bill</h6>
            </div>
          <?php endif;?>
		 </div> 
	  </div>
 

<script>
    function showAlert(numberOfPaidBills){
        $('#alertCon').removeClass('d-none')
        $('#alertCon').addClass('d-flex')
        $('#numberOfPaidBills').text(numberOfPaidBills)
        setTimeout(() => {
            $('#alertCon').removeClass('d-flex')
            $('#alertCon').addClass('d-none')
        }, 3000);
    }
</script>
 <script>
     $('.checkbox-unpaid').click(function(){
        $('.btn-paid').addClass('d-none')
        $('.checkbox-unpaid').each(function(key, elem){
          if (elem.checked) {
            $('.btn-paid').removeClass('d-none')
          }
        })
     })
     $('#selectAll').click(function(){
        if (document.querySelector('#selectAll').checked) {
            $('.checkbox-unpaid').each(function(key, elem){
              elem.checked = true;
            })
        }else{
           $('.checkbox-unpaid').each(function(key, elem){
              elem.checked = false;
           })
           $('.btn-paid').addClass('d-none')
        }
     })
     
     $('#btnPaid').click(function(){
        let listOfBillsId = []
        $('.checkbox-unpaid').each(function(key, elem){
              if (elem.checked) {
                listOfBillsId.push(elem.value)
                document.querySelector('.unpaid-bill').removeChild(elem.parentElement.parentElement)
              }
        })
        if (!document.querySelector('.unpaid-bill').children.length) {
            $('.unpaid-bill').html(`
              <div class="py-5">
                <h6 class="small text-secondary text-center py-5">No unpaid bill</h6>
              </div>
            `)
            $('.btn-paid').addClass('d-none')
        }
        $.ajax({
	        url: 'ajax/adbillsum/update_bills.php',
	        type: 'POST',
          data: {
            billIds: listOfBillsId.toString(),
          },
	        success: function(){
            showAlert(listOfBillsId.length)
            $('.btn-paid').addClass('d-none')
	        }
	      })
     
     })
 </script>



