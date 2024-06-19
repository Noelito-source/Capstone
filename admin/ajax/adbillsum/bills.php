<?php include('../../database/connection.php');?>
<?php
$user_id = $_GET['userid'];
$query = "SELECT * FROM users1 WHERE user_id = $user_id";
$user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
?>
<style>
  .nav-active{
    color: #2563eb;
    border-bottom: 2px solid #2563eb;
  }
  #consumerImage{
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
<input type="hidden" id="userid" name="userid" value="">
<div class="modal-content rounded-0">
	 <div class="modal-header px-3 m-0 border-0">
	   <h5 class="modal-title" id="modalTitleId"> Bill history</h5>
	   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	 </div>
	 <div class="modal-body">
     <div class=" image-con d-flex mb-2">
		   <div class="image-border border-primary p-1">
		      <img id="consumerImage" src="php/images/<?php echo $user['img']?>" alt="">
		   </div>
       <div class="px-3 d-flex flex-wrap align-content-center">
         <h6 class=" w-100 m-0 p-0" style="color: #1D2D44;font-weight:bold;"><?php echo $user['fname']. ' ' .$user['lname']?></h6>
         <p class="small m-0 p-0 text-center" style="color: #1D2D44;">Consumer</p>
       </div>
		 </div>
     
      <div class="main-container">
         <div class="nav-rooms d-flex bg-white border-bottom">
           <div id="navLatest" user-id="<?php echo $user_id?>" class="re-nav nav-active py-2 user-select-none border-2 mt-2 px-2" style="font-weight:bold;cursor: pointer;">
              Latest Bill
           </div>
           <div id="navUnpaid" user-id="<?php echo $user_id?>" class="re-nav py-2 user-select-none border-2 mt-2 px-2" style="font-weight:bold;cursor: pointer;">
              Unpaid Bills
           </div>
           <div id="navPaid" user-id="<?php echo $user_id?>" class="re-nav py-2 user-select-none border-2 mt-2 px-2" style="font-weight:bold;cursor: pointer;">
              Paid Bills
           </div>
        </div>
        <div class="bills-list"></div>
      </div>
	</div>
</div>

 
<script>
   $(document).ready(function(){
      (function(){
        let userId = $('#navLatest').attr('user-id')
        $.ajax({
	      url: 'ajax/adbillsum/latest_bill.php',
	      type: 'GET',
          data: {
            userid: userId,
	      },
	      success: function(data){
             $('.bills-list').html(data)
	      }
	    })
      })();
   })
   $('.re-nav').click(function(){
      $('.re-nav').each((key, elem) => {
         elem.classList.remove('nav-active')
      })
      $(this).addClass('nav-active')
   });

   $('#navLatest').click(function(){
    let userId = $(this).attr('user-id')
    $.ajax({
	   url: 'ajax/adbillsum/latest_bill.php',
	   type: 'GET',
       data: {
        userid: userId,
       },
	   success: function(data){
        $('.bills-list').html(data)
	   }
	 })
   })

   $('#navUnpaid').click(function(){
     let userId = $(this).attr('user-id')
     $.ajax({
	   url: 'ajax/adbillsum/unpaid_bills.php',
	   type: 'GET',
       data: {
        userid: userId,
       },
	   success: function(data){
        $('.bills-list').html(data)
	   }
	 })
   })
   
   $('#navPaid').click(function(){
    let userId = $(this).attr('user-id')
    $.ajax({
	   url: 'ajax/adbillsum/paid_bills.php',
	   type: 'GET',
       data: {
        userid: userId,
       },
	   success: function(data){
        $('.bills-list').html(data)
	   }
	 })
   })
   
</script>