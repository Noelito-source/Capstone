<?php include('../../database/connection.php');?>

<style>
	#consumerImage{
	  width: 40px;
	  height: 40px;
	  object-fit: cover;
	  border: 1px solid #f2f2f2;
	  border-radius: 50%;
	}
  .select-consumers-modal{
    overflow-x: hidden;
    overflow-y: auto;
  }
	.image-border{
	  outline: 1px solid #3a86ff;
	  overflow: hidden;
	  border-radius: 50%;
	}
    .consumerProfile{
        cursor: pointer;
    }
    .consumerProfile{
        border: 1px solid #dddddd;
    }
    .selected{
        border: 1px solid #3a86ff;
    }
</style>
<div class="modal-content rounded-0">
	 <div class="modal-header border-0">
	   <h5 class="modal-title" id="modalTitleId">Select Consumer</h5>
	   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	 </div>
	 <div class="modal-body select-consumers-modal" style="height:350px">
        <input type="hidden" name="consumerid" id="consumerid">
        <div class="d-flex justify-content-end">
           <div class="class input-con px-2 border d-flex align-items-center">
              <i class="bi bi-search me-2"></i>
              <input type="search" name="search" id="search" class="w-100 py-2 border-0" style="outline:0px" placeholder="Find consumer">
           </div>
        </div>
        <div class=" d-flex justify-content-between">
          <div class="consumer-list mt-1" style="width: 100%;">
            <div class="row consumer-items row-gap-1">
             <?php
               $query = "SELECT * FROM users1 ORDER BY RAND() LIMIT 18";
               $result = mysqli_query($sql_con, $query);
             ?>
             <?php while($consumer = mysqli_fetch_assoc($result)): ?>
              <div class="col-2">
                <div class="consumerProfile rounded-3 pt-2" consumer-id="<?php echo $consumer['user_id']?>"> 
                  <div class=" image-con d-flex justify-content-center mb-2">
		   	            <div class="image-border border-primary p-1">
		                  <img id="consumerImage" src="php/images/<?php echo $consumer['img']?>" alt="">
		                </div>
			             </div>
                   <h6 class="text-center m-0 p-0" style="color: #1D2D44;font-weight:bold;"><?php echo $consumer['unique_id']?></h6>
                   <small class=" d-block text-center"><?php echo $consumer['fname']. ' ' .$consumer['lname']?></small>
                 </div>
              </div>
             <?php endwhile;?>
            </div>
          </div>
        </div>
     </div>
     <div class="modal-footer border-0">
	      <button type="button" class="btn-decline-bill btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	      <button type="button" class="btn-approve-bill btn btn-primary" id="btnSelectConsumer" data-bs-dismiss="modal" disabled>Select</button>
	   </div>
</div>

<script>
  $(document).ready(function(){
    $('#search').on('input', function(){
        let q = $(this).val();
        $.ajax({
	     url: 'ajax/walkin/search.php',
	     type: 'GET',
         data: {search: q},
	     success: function(data){
            $('.consumer-items').html(data)
	     }
	  })
    })
  })
  $('.consumerProfile').click(function(){
     $('#btnSelectConsumer').removeAttr('disabled');
    $('.consumerProfile').removeClass('selected')
     $('#consumerid').val($(this).attr('consumer-id'))
     $(this).addClass('selected')
  })

  $('#btnSelectConsumer').click(function(){
      let consumerId = $('#consumerid').val();
      $.ajax({
	     url: 'ajax/walkin/show_bill.php',
	     type: 'GET',
         data: {consumerid: consumerId},
	     success: function(data){
            $('.bills-list').html(data)
	     }
	  })
  })
</script>