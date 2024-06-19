<?php
include 'db2.php';
	$id = $_POST['id'];
	mysqli_query($conn,"DELETE from bill WHERE id='$id'");
			

		 echo "<script>windows: location='adbillsum.php'</script>";				
			