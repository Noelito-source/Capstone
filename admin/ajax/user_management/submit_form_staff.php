<?php
include('../../database/connection.php');
extract($_POST);
if ($form_type == 'add') {
  $password = hash('md5', $password);
  $query = "INSERT INTO users(firstname,surname,username,gender,role,status,password) 
            VALUES('$fname','$lname','$uname','$gender','$role','InActive','$password')";
  mysqli_query($sql_con, $query);
}
if ($form_type == 'update') {
 
  if($newpassword == ''){
    $query = "UPDATE users
            SET firstname = '$fname', surname = '$lname', username = '$uname', gender = '$gender', role = '$role', status = 'InActive'
            WHERE id = $staffid";
  }else{
    $newpassword = hash('md5', $newpassword);
    $query = "UPDATE users
              SET firstname = '$fname', surname = '$lname', username = '$uname', gender = '$gender', role = '$role', status = 'InActive', password = '$newpassword'
              WHERE id = $staffid";
  }
  mysqli_query($sql_con, $query);
}

?>
<div class="modal-content rounded-0">
  <div class="modal-body">
    <div class=" d-flex justify-content-end py-2 px-3">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class=" d-flex justify-content-center">
      <i class="bi bi-check-circle text-success" style="font-size: 3.5rem;"></i>
    </div>
    <h3 class="text-center" style="color: #1D2D44;font-weight:bold;">Success!</h3>
    <p class="small text-center " style="color: #1D2D44;">
       <?php
       if ($form_type == 'add') {
         echo 'New Staff Account was successfully added!';
       }else{
         echo 'Staff Account was successfully updated!';
       }
       ?>
    </p>
    <?php if($form_type == 'add'):?>
      <div class=" d-flex justify-content-center py-3">
        <button id="addAgain" class="btn btn-primary py-2 px-3" style="cursor:pointer;" form-type="<?php echo $form_type?>">Add Another One</button>
      </div>
    <?php endif;?>
  </div>
</div>
<script>
  (function(){
			$.ajax({
			  url: 'ajax/user_management/staffs.php',
			  type: 'GET',
			  success: function(data){
           $('.staffs-list-container').html(data)
			  }
		    })
   })();
  $('#addAgain').click(function(){
     $.ajax({
			 url: 'ajax/user_management/form.php',
			 type: 'GET',
       data: {form_type: $('#addAgain').attr('form-type')},
			 success: function(data){
           $('.modal-container').html(data)
			 }
		 })
  })
</script>