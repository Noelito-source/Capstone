<?php
include('../../database/connection.php');
?>
<style>
  table thead tr th {
    border: none;
    text-align: center !important;
    color: white !important;
    background: #3a86ff !important;
 
  }
  td{
    text-align: center !important;
  }
  #consumerImage{
	  width: 40px;
	  height: 40px;
	  object-fit: cover;
	  border: 2px solid #f2f2f2;
	  border-radius: 50%;
  }
	.image-border{
	  outline: 1px solid #3a86ff;
	  overflow: hidden;
	  border-radius: 50%;
  }
</style>

<div class="table-container">
<table class="table-data table table-striped" id="table-data">
   <thead>
     <tr>
       <th class="py-2">Account Number</th>
       <th class="py-2">Consumer</th>
       <th class="py-2">Email</th>
       <th class="py-2">Address</th>
	     <th class="py-2">Status</th>
	     <th class="py-2">Actions</th>
     </tr>
  </thead>
  <tbody>
    <?php 
      $query = "SELECT * FROM users1 ORDER BY user_id ASC";
      $result = mysqli_query($sql_con, $query);
    ?>
    <?php while($consumer = mysqli_fetch_assoc($result)):?>
      <tr>
        <td id="accountNumber">
          <div class="py-3">
            <?php echo $consumer['unique_id']; ?>
          </div>
        </td>
        <td id="consumerName">
           <div class=" image-con d-flex justify-content-center py-2">
		      <div class="image-border border-primary">
		        <img id="consumerImage" src="php/images/<?php echo $consumer['img']?>" alt="">
		      </div>
		   </div>
		   <!-- <h6 class=" fw-bold"><?php echo $consumer['fname'].' '.$consumer['lname']?></h6> -->
        </td>
        <td id="email">
          <div class="py-3">
            <?php echo $consumer['email']; ?></td>
          </div>  
      	<td id="address">
           <div class="py-3">
             <?php echo $consumer['address']; ?></td>
          </div>  
        <td>
           <div class="py-3">
              <?php if($consumer['status'] == 'Active'):?>
               <span class=" fw-bold rounded-pill py-1 px-3" style="background: #dcfce7; color: #16a34a">
                 <?php echo $consumer['status']; ?>
              </span>
              <?php elseif($consumer['status'] == 'InActive'):?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #f3f4f6; color: #4b5563">
                <?php echo $consumer['status']; ?>
              </span>
              <?php elseif($consumer['status'] == 'Disconnected'):?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #fee2e2; color: #dc2626">
                <?php echo $consumer['status']; ?>
              </span>
              <?php elseif($consumer['status'] == 'Pending'):?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #fef9c3; color: #ca8a04">
                <?php echo $consumer['status']; ?>
              </span>
              <?php endif;?>
          </div>
         </td>
	    <td id="action">
            <button class="edit edit-staff" type="button" id="update-show" consumer-id="<?php echo $consumer['user_id']; ?>" data-bs-toggle="modal" data-bs-target="#modalAddUser">
              <span class='front icon'><i class='bx bxs-edit-alt'></i></span>
            </button>
        </td>
      </tr>
   <?php endwhile;?>
  </tbody>           
</table>
</div>
 
<script>
   function editStaff(){
      $('.edit-staff').click(function(){
        const consumerId = $(this).attr('consumer-id');
        $('.modal-container').html(`
          <div class="loading py-5">
               <div class="d-flex justify-content-center py-5 my-3">
                   <div class="spinner-border spinner-border-sm text-info"></div>
                </div>
          </div>
       `)
        $.ajax({
		       url: 'ajax/adconslist/form.php',
		       type: 'GET',
		       data: {
                consumerid: consumerId,
                form_type: 'update'
               },
		       success: function(data){
            $('.modal-container').html(data)
		       }
	      })
      })
   }
 </script>
<script>
  editStaff();
	$('#table-data').on('page.dt', function () {
        editStaff();
    }).DataTable({
      autoWidth: false,
      order: [[0, 'desc']],
      columnDefs: [
                   {
                     targets: ['_all'],
                     className: 'mdc-data-table__cell',
                   },
                  ],
     });
 
</script>
 