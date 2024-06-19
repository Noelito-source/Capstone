<?php include('../../database/connection.php');?>
<?php
date_default_timezone_set('Asia/Manila');
session_start();
extract($_POST);
$current_date = date('m/d/y h:i:s');
$prepared_by = $_SESSION['fname']. ' ' .$_SESSION['lname'];
$query = "INSERT INTO bill(owners_id, prev, pres, price, balance, prepared_by, date)
          VALUE($owners_id, $prev, $pres, $price, $balance, '$prepared_by', '$current_date')";
mysqli_query($sql_con, $query);

$query = "INSERT INTO notifications(user_id, type, message, date)
	          VALUES($owners_id, 'bill', 'New bill has been issued', '$current_date')";
mysqli_query($sql_con, $query);
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
       Bill is successfully made for <span style="font-weight:bold;"><?php echo $username?></span>
    </p>
      <div class=" d-flex justify-content-center py-3">
        <button id="btnOk" class="btn btn-primary py-2 px-3" style="cursor:pointer;" data-bs-dismiss="modal">Ok</button>
      </div>
  </div>
</div>