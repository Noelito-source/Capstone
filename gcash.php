
<?php include_once "header.php"; ?>

<body>
<br><br><br><br><br><br><br>
  <div class="wrapper"  id="fm1">
    <section class="form signup"  >
      <header>Gcash Payment</header>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;
<img src="cuer.png" alt="">
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off"  >
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Full Name</label>
            <input type="text" name="fname" placeholder="Full Name" required>
          </div>
          <div class="field input">
            <label>price</label>
            <input type="text" name="lname" placeholder="Price" required>
          </div>
        </div>
        <div class="field input">
          <label>Referrence Number</label>
          <input type="text" name="email" placeholder="Reference" required>
        </div>
    
        <div class="field image">
          <label>Upload Proof</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Pay">
        </div>
      </form>

    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
