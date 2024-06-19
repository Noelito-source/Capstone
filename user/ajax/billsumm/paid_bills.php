<?php include('../../database/connection.php'); ?>
<?php
$query = "SELECT * FROM users1 WHERE unique_id = " . $_GET['userid'];
$user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
$user_id = $user['user_id'];
$query = "SELECT * FROM bill WHERE owners_id = $user_id AND status = 'Paid' ORDER BY date DESC";
$result = mysqli_query($sql_con, $query);
?>
<?php if (mysqli_num_rows($result)) : ?>
  <?php while ($bill = mysqli_fetch_assoc($result)) : ?>
    <div class="row border-bottom my-1 py-3">
      <div class="col-md-2 py-2">
        <div id="previous">
          <h6 class=" p-0 m-0 bill-text text-center">Previous Reading</h6>
          <p class=" p-0 m-0 bill-text text-center " style="font-weight:bold;"><?php echo $bill['prev'] ?></p>
        </div>
      </div>
      <div class="col-md-2 py-2">
        <div id="present">
          <h6 class=" p-0 m-0 bill-text text-center">Present Reading</h6>
          <p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['pres'] ?></p>
        </div>
      </div>
      <div class="col-md-2 py-2">
        <div id="consumption">
          <h6 class=" p-0 m-0 bill-text text-center">Consumption</h6>
          <p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['pres'] - $bill['prev'] ?></p>
        </div>
      </div>
      <div class="col-md-2 py-2">
        <div id="date">
          <h6 class=" p-0 m-0 bill-text text-center">Date Issued</h6>
          <p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['date'] ?></p>
        </div>
      </div>
      <div class="col-md-2 py-2">
        <div id="price">
          <h6 class=" p-0 m-0 bill-text text-center">Sub Total</h6>
          <p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['price'] ?></p>
        </div>
      </div>
      <div class="col-md-2 py-1">
        <h6 class=" p-0 m-0 bill-text text-center my-1">Status</h6>
        <div class=" d-flex justify-content-center align-items-center">
          <span class="small rounded-pill py-1 px-2" style="font-size: 0.7rem;font-weight:bold;background:#bbf7d0;color:#16a34a;"><?php echo $bill['status'] ?></span>
        </div>
      </div>

    </div>
  <?php endwhile; ?>
<?php else : ?>
  <div class="py-5">
    <h6 class="small text-secondary text-center py-5">No paid bill</h6>
  </div>
<?php endif; ?>