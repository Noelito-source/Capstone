<?php
include 'db2.php';
	
	$owners_id = $_POST['owners_id'];
	$prev = $_POST['prev'];
	$pres = $_POST['pres'];
	$price = $_POST['price'];
	$date=$_POST['date'] ;
	$id=$_POST['id'] ;
	$bill=$_POST['bill'] ;

	mysqli_query($conn,"INSERT INTO  bill (id,owners_id,prev,pres,price,bill,date) 
		 VALUES ('$id','$owners_id','$prev','$pres','$price','$bill','$date')"); 
				
				echo '<script>alert("success")</script>';
				echo '<script>windows: location="sadbillsum.php"</script>';