<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Gcash Payment</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Fullname</label>
            <input type="text" name="fname" placeholder="Fullname" required>
          </div>
          <div class="field input">
            <label>Price</label>
            <input type="text" name="lname" placeholder="Price" required>
          </div>
        </div>
        <div class="field input">
          <label>Reference Number</label>
          <input type="text" name="email" placeholder="Reference" required>
        </div>
        
        <div class="field image">
          <label>Upload Proof</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>

    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
