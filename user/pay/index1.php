
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Credit Card</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/stylee.css">
</head>
<body>
  <div class="boxhead">
<h3 id="bil1">Credit Card Payment</h3>
<a href="../payment.php">
	<p id="p2"> < Back</p>
    </a>
    </div>
    <br>    <br>   
    <div class="d-flex justify-content-center align-items-center vh-100">

       
          </a>
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
      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
<img src="qrdcredit.png" style = "height: 160px ; width: 160px;"alt="">

<h5> 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1823624521</h5>
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
		    <label class="form-label">Price</label>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>
	  <div class="mb-3">
		    <label class="form-label">Ref</label>
		    <input type="text" 
		           class="form-control"
		           name="ref">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Account Number</label>
		    <input type="text" 
		           class="form-control"
		           name="pass">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Upload Proof</label>
		    <input type="file" 
		           class="form-control"
		           name="pp">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Submit</button>
      		
		</form>
    
    </div>
</body>
</html>