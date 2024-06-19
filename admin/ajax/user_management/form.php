<?php
include('../../database/connection.php');
$form_type = $_GET['form_type'];

if ($form_type == 'update') {
    $staff_id = $_GET['staffid'];
    $query = "SELECT * FROM users WHERE id = $staff_id";
    $staff_details = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
    $fname = $staff_details['firstname'];
    $lname = $staff_details['surname'];
    $uname = $staff_details['username'];
    $gender = $staff_details['gender'];
    $role = $staff_details['role'];
    $status = $staff_details['status'];
}
 
?>
<div class="modal-content rounded-0">
	 <div class="modal-header border-0">
	   <h5 class="modal-title" id="modalTitleId"><?php echo $form_type == 'add' ? 'Add New' : 'Update';?> Staff</h5>
	   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	 </div>
	 <div class="modal-body">
	 <form id="<?php echo $form_type == 'add' ? 'addStaffForm' : 'updateStaffForm';?>" class="p-0 m-0" style="max-width:100% !important;">
	    <div class="container-fluid">
        <input type="hidden" name="staffid" value="<?php echo $staff_id ?? ''?>">
        <input type="hidden" name="form_type" value="<?php echo $form_type?>">
		   <div class="row">
			 <div class="col-6">
			   <div class="input-con">
			    <label for="fname">Firstname</label>
				<input type="text" name="fname" id="fname" class=" form-control rounded-0" placeholder="Enter Firstname" value="<?php echo $fname ?? ''?>">
                <small id="errorFname" class="text-danger"></small>
		       </div>
			 </div>
			 <div class="col-6">
			   <div class="input-con">
			    <label for="lname">Lastname</label>
				<input type="text" name="lname" id="lname" class=" form-control rounded-0" placeholder="Enter Lastname" value="<?php echo $lname ?? ''?>">
                <small id="errorLname" class="text-danger"></small> 
              </div>
			 </div>
		   </div>
		   <div class="input-con">
			  <label for="uname">Username</label>
			  <input type="text" name="uname" id="uname" class=" form-control rounded-0" placeholder="Enter Username" value="<?php echo $uname ?? ''?>">
              <small id="errorUname" class="text-danger"></small>
		   </div>
		   <div class="row">
			 <div class="col-6">
			   <div class="input-con">
			    <label for="gender">Select Gender</label>
				<select name="gender" id="gender" class=" form-select rounded-0">
                    <?php if($form_type == 'update'):?>
                    <option value="<?php echo $gender?>"><?php echo $gender?></option>
                    <?php endif;?>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
		       </div>
			 </div>
			 <div class="col-6">
			   <div class="input-con">
			    <label for="role">Select Role</label>
				<select name="role" id="role" class=" form-select rounded-0">
                    <?php if($form_type == 'update'):?>
                      <option value="<?php echo $role?>"><?php echo $role?></option>
                    <?php endif;?>
					<option value="Admin">Admin</option>
					<option value="WaterTender">WaterTender</option>
               <option value="Staff">Staff</option>
				</select>
		       </div>
			 </div>
		   </div>
           <?php if($form_type == 'add'):?>
             <div class="input-con">
			    <label for="password">Password</label>
			    <input type="password" name="password" id="password" class=" form-control rounded-0" placeholder="Enter Password">
                <small id="errorPass" class="text-danger"></small>
		    </div>
		    <div class="input-con">
			   <label for="conpassword">Confirm Password</label>
			   <input type="password" name="conpassword" id="conpassword" class=" form-control rounded-0" placeholder="Enter Password">
               <small id="errorCpass" class="text-danger"></small>
		    </div>
           <?php else:?>
              <p class="m-0 p-0 small text-info">Leave it blank if you dont want to change the password</p>
              <div class="input-con">
			     <label for="newpassword">New password</label>
			     <input type="password" name="newpassword" id="newpassword" class=" form-control rounded-0" placeholder="Enter New Password">
		     </div>
           <?php endif;?>
		   
	    </div>
	    <div class="modal-footer border-0">
	      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	      <button type="submit" class="btn btn-primary" id="btnSubmitStuff"><?php echo $form_type == 'add' ? 'Add Staff' : 'Update Staff';?></button>
	   </div>
	   </form>
     </div>
	 
</div>

<script>
    // for validation of form
    function validateForm(password = false){
       let error = false
       if($('#fname').val() == ''){
          $('#fname').addClass('border-danger')
          $('#errorFname').text('Firstname is required')
          error = true
       }else{
          $('#fname').removeClass('border-danger')
          $('#errorFname').text('')
       }  
       if($('#lname').val() == ''){
          $('#lname').addClass('border-danger')
          $('#errorLname').text('Lastname is required')
          error = true
       }else{
          $('#lname').removeClass('border-danger')
          $('#errorLname').text('')
       } 
       if($('#uname').val() == ''){
          $('#uname').addClass('border-danger')
          $('#errorUname').text('Username is required')
          error = true
       }else{
          $('#uname').removeClass('border-danger')
          $('#errorUname').text('')
       } 
    //    For password
       if (password) {
        if($('#password').val() == ''){
          $('#password').addClass('border-danger')
          $('#errorPass').text('Please input password')
          error = true
       }else{
          $('#password').removeClass('border-danger')
          $('#errorPass').text('')
       } 
       
       if($('#conpassword').val() !== $('#password').val()){
          $('#conpassword').addClass('border-danger')
          $('#errorCpass').text('Wrong password')
          error = true
       }else{
          $('#conpassword').removeClass('border-danger')
          $('#errorCpass').text('')
       } 
       }
       return error
    }

</script>

<script>
    $('#addStaffForm').submit(function(e){
        e.preventDefault()
        const formData = $(this).serialize()
        if (!validateForm(true)) {  
           $.ajax({
			 url: 'ajax/user_management/submit_form_staff.php',
			 type: 'POST',
			 data: formData,
			 success: function(data){
               $('.modal-container').html(data)
			 }
		   })
    
        }
    })

    $('#updateStaffForm').submit(function(e){
        e.preventDefault()
        const formData = $(this).serialize()
        if (!validateForm()) {  
           $.ajax({
			   url: 'ajax/user_management/submit_form_staff.php',
			   type: 'POST',
		  	   data: formData,
			   success: function(data){
               $('.modal-container').html(data)
			   }
		   })
        }
    })
</script>