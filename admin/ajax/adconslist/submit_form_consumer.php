<?php
include('../../database/connection.php');
extract($_POST);
$unique_id = rand(11111111, 99999999);
if ($form_type == 'add') {
  $password = hash('md5', $password);
  $status = 'Pending';
  if (count(explode(',', $requirements)) == 5) {
     $status = 'InActive';
  }
  $updated_address = $type.'-'.$address;
  if ($type == 'Apartment') {
    $updated_address = $type.'-'.$subMeter.'-'.$address;
  }
  $image_new_name = 'default_profile.png';
  if (!empty($_FILES['image']['name'])) {
    //   Insert new consumer to database
    $image_tmpname = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $image_new_name = uniqid("CONSUMER-IMG", false). '.' .$img_ex;
    $image_upload_path = '../../php/images/' .$image_new_name;
    $img_dir = $image_upload_path;
    move_uploaded_file($image_tmpname, $image_upload_path);
  }
  $query = "INSERT INTO users1(unique_id,fname,lname,address,email,phone,requirements,img,status, password) 
  VALUES($unique_id,'$fname','$lname','$updated_address','$email',$phone,'$requirements','$image_new_name','$status', '$password')";
  mysqli_query($sql_con, $query);

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
}
if ($form_type == 'update') {
  $updated_address = $type.'-'.$address;
  if ($type == 'Apartment') {
    $updated_address = $type.'-'.$subMeter.'-'.$address;
  }
  $status = 'Pending';
  if ($requirements != '') {
    $query = "SELECT * FROM users1 WHERE user_id = $consumerid";
    $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
    $requirements = trim($user['requirements'].','.$requirements, ',');
    if (count(explode(',', $requirements)) == 5) {
        $status = 'InActive';
    }
    $query = "UPDATE users1 SET requirements = '$requirements', status = '$status' WHERE user_id = $consumerid";
    mysqli_query($sql_con, $query);
  }

  if($newpassword == ''){
    if (!empty($_FILES['image']['name'])) {
        $image_tmpname = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $image_new_name = uniqid("CONSUMER-IMG", false). '.' .$img_ex;
        $image_upload_path = '../../php/images/' .$image_new_name;
        $img_dir = $image_upload_path;
        move_uploaded_file($image_tmpname, $image_upload_path);

        $query = "UPDATE users1
        SET fname = '$fname', lname = '$lname', address = '$updated_address', email = '$email', phone = '$phone', img = '$image_new_name'
        WHERE user_id = $consumerid";
    }else {
        $query = "UPDATE users1
        SET fname = '$fname', lname = '$lname', address = '$updated_address', email = '$email', phone = '$phone'
        WHERE user_id = $consumerid";
    }
    
  }else{
    $newpassword = hash('md5', $newpassword);
    if (!empty($_FILES['image']['name'])) {
        $image_tmpname = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $image_new_name = uniqid("CONSUMER-IMG", false). '.' .$img_ex;
        $image_upload_path = '../../php/images/' .$image_new_name;
        $img_dir = $image_upload_path;
        move_uploaded_file($image_tmpname, $image_upload_path);

        $query = "UPDATE users1
        SET fname = '$fname', lname = '$lname', address = '$updated_address', email = '$email', phone = '$phone', img = '$image_new_name', password = '$newpassword'
        WHERE user_id = $consumerid";
    }else {
        $query = "UPDATE users1
        SET fname = '$fname', lname = '$lname', address = '$updated_address', email = '$email', phone = '$phone', password = '$newpassword'
        WHERE user_id = $consumerid";
    }
  }
  mysqli_query($sql_con, $query);

//   echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
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
         echo 'Consumer Account was successfully created!';
       }else{
         echo 'Consumer Account was successfully updated!';
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
			  url: 'ajax/adconslist/consumers.php',
			  type: 'GET',
			  success: function(data){
              $('.consumers-list-container').html(data)
			  }
		    })
   })();
  $('#addAgain').click(function(){
     $.ajax({
	    url: 'ajax/adconslist/form.php',
		type: 'GET',
        data: {form_type: $('#addAgain').attr('form-type')},
		success: function(data){
           $('.modal-container').html(data)
	     }
	   })
  })
</script>