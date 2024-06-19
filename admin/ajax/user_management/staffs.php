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
</style>

<div class="table-container">
<table class="table-data table table-striped" id="table-data">
   <thead>
     <tr>
       <th class="py-2">Id</th>
       <th class="py-2">Lastname</th>
       <th class="py-2">Firstname</th>
       <th class="py-2">Username</th>
       <th class="py-2">Gender</th>
	     <th class="py-2">Role</th>
	     <th class="py-2">Status</th>
	     <th class="py-2">Actions</th>
     </tr>
  </thead>
  <tbody>
    <?php 
      $query = "SELECT * FROM users ORDER BY id DESC";
      $result = mysqli_query($sql_con, $query);
    ?>
    <?php while($row = mysqli_fetch_array($result)):?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['surname']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['username']; ?></td>
      	<td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['role']; ?></td>
		    <td>
          <div class="py-3">
              <?php if($row['status'] == 'Active'):?>
               <span class=" fw-bold rounded-pill py-1 px-3" style="background: #dcfce7; color: #16a34a">
                 <?php echo $row['status']; ?>
              </span>
              <?php elseif($row['status'] == 'InActive'):?>
              <span class=" fw-bold rounded-pill py-1 px-3" style="background: #d1d5db; color: #4b5563">
                <?php echo $row['status']; ?>
              </span>
              <?php endif;?>
          </div>
        </td>
	    	<td>
            <button class="edit edit-staff" type="button" id="update-show" staff-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#modalAddUser">
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
        console.log('got click')
        const staffId = $(this).attr('staff-id');
        $('.modal-container').html(`
          <div class="loading py-5">
               <div class="d-flex justify-content-center py-5 my-3">
                   <div class="spinner-border spinner-border-sm text-info"></div>
                </div>
          </div>
       `)
        $.ajax({
		       url: 'ajax/user_management/form.php',
		       type: 'GET',
		       data: {
                staffid: staffId,
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
        // eventFired('Page');
        console.log('change')
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
 