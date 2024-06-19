<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM pay WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
         <h1>Payment Sent To the Admin</h1>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Home</a>
      </header>
     
  <script src="javascript/users.js"></script>

</body>
</html>
