<?php include('../../database/connection.php');?>
<?php
 $user_id = $_GET['userid'];
 $query = "SELECT * FROM bill WHERE owners_id = $user_id AND status = 'Paid' ORDER BY date DESC";
 $result = mysqli_query($sql_con, $query);
?>
<style>
	#memberImage{
	  width: 60px;
	  height: 60px;
	  object-fit: cover;
	  border: 3px solid #f2f2f2;
	  border-radius: 50%;
	}
	.image-border{
	  outline: 3px solid #3a86ff;
	  overflow: hidden;
	  border-radius: 50%;
	}
	.bill-text{
		font-size: 0.8rem;
	}
</style>
<div class="unpaid-main-container" style="height: 350px;">
        <div id="alertCon" class="d-none justify-content-end my-2">
         <div class=" alert shadow m-0 p-0">
	       <div class="border border-primary loader"></div>
             <div class="py-2 px-4">
	           <span class="text-success">Success</span>
	           <span><span id="numberOfPaidBills"></span> bill/s has been paid</span>
	        </div>
          </div>
        </div>
		    <div class="mb-1 btn-paid d-none">
            <div class="row px-3">
               <div class="col-1 d-flex align-items-center justify-content-center">
				         <input type="checkbox" id="selectAll" value="">
               </div>
               <div class=" col-3 d-flex align-items-center">
                  <label for="selectAll">Select All</label>
               </div>
               <div class=" col-8 text-end ">
                 <button type="button" id="btnPaid" class="btn btn-primary bill-text">Paid</button>
               </div>
            </div>
		     </div>
         <div class="paid-bill px-3" style="height: 90%;overflow:auto;">
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
					       <p class="bill-text p-0 m-0 text-center "><?php echo date('m/d/Y h:g A', strtotime('7 day', strtotime($bill['date'])))?></p>
				    </div>
				    <div id="billAmount">
                          <h6 class=" p-0 m-0 bill-text" style="font-weight:bold;">Bill Amount</h6>
				    	  <p class="bill-text p-0 m-0 text-center "><?php echo $bill['price']?></p>
				    </div>
			     </div>
			     <div class="col-1 d-flex align-items-center">
				     <span class="small rounded-pill py-1 px-2" style="font-size: 0.7rem;font-weight:bold;background:#bbf7d0;color:#16a34a;"><?php echo $bill['status']?></span>
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
                <h6 class="small text-secondary text-center py-5">No paid bill</h6>
            </div>
          <?php endif;?>
		 </div> 
	  </div>