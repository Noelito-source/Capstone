
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/stylee.css">
</head>
<style>
	  @media screen and (max-width: 768px) {
#p2{
transform: translateY(-1rem);
margin-left: 1rem;
    }
	#bil1{
transform: translateY(1rem);
margin-left: 5rem;
    }
	#qr{
		margin-left: 7rem;
		transform: translateY(-5rem);
	}
	#numberr{
		margin-left: -2.2rem;
		transform: translateY(-5rem);
	}
}
</style>
<body>

	<div class="boxhead">
<h3 id="bil1"> Gcash Payment</h3>
<a href="../users.php">
	<p id="p2"> < Back</p>
    </a>    <br>    <br>
    <div class="d-flex justify-content-center align-items-center vh-100">
	<?php include ("ff.php");?>
     

    	<form class="shadow w-450 p-3" 
    	      action="php/signup.php" 
    	      method="post"
    	      enctype="multipart/form-data">

    		
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
<img src="qrgcash.png" id="qr" style = "height: 160px ; width: 160px;"alt="">

<h5 id="numberr"> 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 09159124940</h5>
		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label">Full Name</label>
		    <input type="text" 
		           class="form-control"
		           name="fname"
		           value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Amount to Pay</label>
		    <input  readonly type="text" 
		           class="form-control"
		           name="uname"
		           value="<?Php echo$_GET['search'] ; ?> " >
		  </div>
	  <div class="mb-3">
		    <label class="form-label">Reference Number</label>
		    <input type="type" 
		           class="form-control"
		           name="ref"
				   maxlength="13">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Sender Account Number</label>
		    <input type="text" 
		           class="form-control"
		           name="pass"
				   value="" >
		  </div>
	
	
		  <div class="mb-3">
		    <label class="form-label">Upload Proof of Payment</label>
		    <input type="file" 
		           class="form-control"
		           name="pp">
		  </div>
		  <?php 
   
   if(isset($_POST['submit'])){
	   $message = $_POST['message'];
	   $query ="INSERT INTO `payment` (`id`, `fname`, `username`, `ref`, `password`, `pp`, `status`, `stat`, `date`, `type`, `message`) VALUES (NULL, '', '','','','','','unread', 'CURRENT_TIMESTAMP','comment', 'New Payment Received')";
	   if(performQuery($query)){
		  
	   }
	}   
		 
   ?>
          <input name="message"class="form-control mr-sm-2" type="hidden" placeholder="Message" value="">

		  <button type="submit" class="btn btn-primary">Submit</button>
		  <a href="../payment.php">


</a>
		</form>
		
    </div>

</body>
</html>