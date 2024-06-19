
<?php 
 
  if(isset($_SESSION['unique_id'])){
    header("location: home.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <br>  <br>  <br>  <br>
  <div class="wrapper" id="right">
    <section class="form login">
      <header>Chat With Consumer</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>

    </section>
  </div>
	 <?php
    include('adminmess2.php');
   ?>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
