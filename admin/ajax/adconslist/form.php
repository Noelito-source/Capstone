<?php
include('../../database/connection.php');
$form_type = $_GET['form_type'];
$address_details = [];
if ($form_type == 'update') {
    $consumer_id = $_GET['consumerid'];
    $query = "SELECT * FROM users1 WHERE user_id = $consumer_id";
    $consumer_details = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
    $fname = $consumer_details['fname'];
    $lname = $consumer_details['lname'];
    $address_details = explode('-', $consumer_details['address']);
    $email = $consumer_details['email'];
    $phone = $consumer_details['phone'];
    $requirements = $consumer_details['requirements'];
}
 
?>

<style>
    .requirement-item{
      border: 1px solid #8c8c8c;
    }
    .selected{
      border: 1px solid #1d4ed8;
      background: #dbeafe;
    }
    .selected > *{
      color: #1d4ed8;
      font-weight: bold;
    }
</style>
<div class="modal-content rounded-0">
	 <div class="modal-header border-0">
	   <h5 class="modal-title" id="modalTitleId"><?php echo $form_type == 'add' ? 'Add New' : 'Update';?> Consumer</h5>
	   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	 </div>
	 <div class="modal-body">
	 <form id="<?php echo $form_type == 'add' ? 'addConsumerForm' : 'updateConsumerForm';?>" class="p-0 m-0" style="max-width:100% !important;">
	  <div class="container-fluid">
       <!-- name -->
       <div class="row"> 
         <div class="col-7 form-col">
         <input type="hidden" name="consumerid" value="<?php echo $consumer_id ?? ''?>">
         <input type="hidden" name="requirements" id="requirements" value="<?php echo $requirements ?? ''?>">
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
         <!-- //username - phone -->
         <div class="row">
			 <div class="col-6">
            <div class="input-con">
			      <label for="email">Email</label>
			       <input type="text" name="email" id="email" class=" form-control rounded-0" placeholder="Enter Email" value="<?php echo $email ?? ''?>">
                <small id="errorEmail" class="text-danger"></small>
		       </div>
			 </div>
			 <div class="col-6">
             <div class="input-con">
			       <label for="phone">Phone</label>
			       <input type="number" name="phone" id="phone" class=" form-control rounded-0" placeholder="Enter Phone" value="<?php echo $phone ?? ''?>">
                <small id="errorPhone" class="text-danger"></small>
		       </div>
			 </div>
		   </div>
		   <!-- //Address -->
         <div class="row">
          <div class="col-12">
             <label for="uname" class=" fw-bold">Address</label>
          </div>
			 <div class="col-12">
             <div class="input-con">
			      <label for="type">Type</label>
				    <select name="type" id="type" class=" form-select rounded-0">
                    <?php if($form_type == 'update'):?>
                    <option value="<?php echo $address_details[0]?>"><?php echo $address_details[0]?></option>
                    <?php endif;?>
					   <option value="Household">Household</option>
					   <option value="Apartment">Apartment</option>
				    </select>
		       </div>
			 </div>
          <div class="col-12 submeter-con <?php echo $address_details[0] != 'Apartment' ? 'd-none' : ''?>">
             <div class="input-con">
			      <label for="subMeter">Submeter</label>
				    <select name="subMeter" id="subMeter" class=" form-select rounded-0">
                    <?php if($form_type == 'update' && count($address_details) == 3):?>
                     <option value="<?php echo $address_details[1]?>"><?php echo $address_details[1]?></option>
                    <?php endif;?>
					   <option value="A">A</option>
					   <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
				    </select>
		       </div>
			 </div>
			 <div class="col-12">
             <div class="input-con">
			       <label for="address">Address</label>
			       <textarea name="address" id="address" class=" form-control rounded-0" placeholder="Strt, Building, House No., Barangay, Municipal"><?php echo $address_details[(count($address_details) - 1)] ?? ''?></textarea>
                <small id="errorAddress" class="text-danger"></small>
		       </div>
			 </div>
		   </div>
         <div class="input-con">
			   <label for="image">Upload Image</label>
			   <input type="file" name="image" id="image" class=" form-control rounded-0" placeholder="Upload Image">
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
           <div class="col-5 requirement-col">
               <div class="requirement-container">
                  <h6 class=" fw-bold">Requirements for membership</h6>
                  <div class="requirements-items">
                     <div id="selectAllCon">
                       <div class="row">
                          <div class="col-1">
                            <input type="checkbox" class=" form-check" name="selectAll" id="selectAll">
                          </div>
                          <div class="col-11">
                             Complete All
                          </div>
                       </div>
                     </div>
                     <div class="requirement-item my-1 row py-2" style="cursor:pointer;" requirement="TinNumber">
                        <div class="col-1">
                           <i class="bi bi-card-checklist"></i>
                        </div>
                        <div class="col-11">Tin Number</div>
                     </div>
                     <div class="requirement-item my-1 row py-2" style="cursor:pointer;" requirement="ApplicationForm">
                        <div class="col-1">
                           <i class="bi bi-card-checklist"></i>
                        </div>
                        <div class="col-11">Application Form</div>
                     </div>
                     <div class="requirement-item my-1 row py-2" style="cursor:pointer;" requirement="BinangonanResident">
                        <div class="col-1">
                           <i class="bi bi-card-checklist"></i>
                        </div>
                        <div class="col-11">Binangonan Resident</div>
                     </div>
                     <div class="requirement-item my-1 row py-2" style="cursor:pointer;" requirement="ShareCapital">
                        <div class="col-1">
                           <i class="bi bi-card-checklist"></i>
                        </div>
                        <div class="col-11">Share Capital</div>
                     </div>
                     <div class="requirement-item my-1 row py-2" style="cursor:pointer;" requirement="MembershipFee">
                        <div class="col-1">
                           <i class="bi bi-card-checklist"></i>
                        </div>
                        <div class="col-11">Membership Fee</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
	    </div>
	    <div class="modal-footer border-0">
	      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	      <button type="submit" class="btn btn-primary" id="btnSubmitStuff"><?php echo $form_type == 'add' ? 'Add Consumer' : 'Update Consumer';?></button>
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
       if($('#email').val() == ''){
          $('#email').addClass('border-danger')
          $('#errorEmail').text('Email is required')
          error = true
       }else{
          $('#email').removeClass('border-danger')
          $('#errorEmail').text('')
       } 
       if($('#phone').val() == ''){
          $('#phone').addClass('border-danger')
          $('#errorPhone').text('Phone Number is required')
          error = true
       }else{
          $('#phone').removeClass('border-danger')
          $('#errorPhone').text('')
       }
       if($('#address').val() == ''){
          $('#address').addClass('border-danger')
          $('#errorAddress').text('Please input your address')
          error = true
       }else{
          $('#address').removeClass('border-danger')
          $('#errorAddress').text('')
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
    function getAllSelectedRequirements(){
      let reqCompleted = [];
      $('.requirement-item').each((key, elem) => {
         if (elem.classList.contains('selected') && !elem.classList.contains('d-none')) {
            reqCompleted.push(elem.getAttribute('requirement'))
         }
      })
      return reqCompleted.toString();
    } 
    function removeCompletedRequirements(){
      let requirements = $('#requirements').val();
      let reqCompleted = requirements.split(',');
      $('.requirement-item').each((key, elem) => {
         if (reqCompleted.includes(elem.getAttribute('requirement'))) {
             elem.classList.add('d-none');
         }
      })
      if (reqCompleted.length == 5) {
         $('.requirement-col').addClass('d-none')
         $('.form-col').removeClass('col-7').addClass('col-12')
      }
      console.log(requirements ) 
    } 
</script>

<script>
    $(document).ready(function(){
       removeCompletedRequirements();
    })
    $('#type').change(function(){
       if ($(this).val() == 'Apartment') {
         $('.submeter-con').removeClass('d-none')
       }else{
         $('.submeter-con').addClass('d-none')
       }
    })
    $('#selectAll').click(function(){
       if (document.querySelector('#selectAll').checked) {
             $('.requirement-item').addClass('selected')
                .children('.col-1')
                .children('.bi').removeClass('bi-card-checklist')
                .addClass('bi-check-square-fill')
        }else{
             $('.requirement-item').removeClass('selected')
                .children('.col-1')
                .children('.bi').removeClass('bi-check-square-fill')
                .addClass('bi-card-checklist')
        }
    })
    $('.requirement-item').click(function(){
       if ($(this).hasClass('selected')) {
         $(this).removeClass('selected')
                .children('.col-1')
                .children('.bi').removeClass('bi-check-square-fill')
                .addClass('bi-card-checklist')
       }else{
         $(this).addClass('selected')
                .children('.col-1')
                .children('.bi').removeClass('bi-card-checklist')
                .addClass('bi-check-square-fill')
       }
    })
    $('#addConsumerForm').submit(function(e){
        e.preventDefault()
        $('#requirements').val(getAllSelectedRequirements())
        const formData = new FormData(this)
        if (!validateForm(true)) {  
           $.ajax({
			  url: 'ajax/adconslist/submit_form_consumer.php',
			  method: 'POST',
	        type: 'POST',
           enctype: 'multipart/form-data',
			  data: formData,
           processData: false,
           contentType: false,
			  success: function(data){
               $('.modal-container').html(data)
			  }
		   })
    
        }
    })

    $('#updateConsumerForm').submit(function(e){
        e.preventDefault()
        $('#requirements').val(getAllSelectedRequirements())
        const formData = new FormData(this)
        if (!validateForm(true)) {  
           $.ajax({
			  url: 'ajax/adconslist/submit_form_consumer.php',
			  method: 'POST',
	        type: 'POST',
           enctype: 'multipart/form-data',
			  data: formData,
           processData: false,
           contentType: false,
			  success: function(data){
               $('.modal-container').html(data)
			  }
		   })
    
        }
    })
</script>