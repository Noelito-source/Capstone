<?php session_start();
if(!isset($_SESSION['id'])){
	
	
	}
?>
<?php
include 'db2.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where id='$id'");
while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $owners_id=$row['owners_id'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons=$pres - $prev;
	  $bill=$totalcons * $price;
	  $date=$row['date'];
 
  }

?>

<?php
  
include 'db2.php';


$result = mysqli_query($conn,"SELECT * FROM users1 WHERE user_id  = '$owners_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['unique_id'] ;
				
				$lname= $test['fname'] ;					
				$fname=$test['lname'] ;
		
				$address=$test['address'] ;
				$contact=$test['email'] ;

?>

<style type="text/css">
#data { margin: 0 auto; width:600px; }

</style>
<div id="data">
<center>
<h1>PALANGOY MULTI-PURPOSE COOPERATIVE</h1>
<p>Palangoy, Binagnonan, Rizal</p>
<p><strong>Cashier: Arlene Sedutan</strong></p>
<p>Phone:0912345678 </p>
</center>
<div id="context">
<p>Name: <?php echo $lname.'&nbsp;'.$fname.'&nbsp;'?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Account Number: <?php echo $id; ?>
<br /><br />
Address: <?php echo $address; ?>
<br /> <br />
Email: <?php echo $contact; ?>
</p>
<center>Date: <?php echo $date; ?> </center>
<p>
Previous Reading : <?php echo $prev;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price: <?php echo $price; ?><br /><br />
Present Reading : <?php echo $pres; ?> <br /><br />
Consuption: <?php echo $totalcons;?>
<h1 align="center">Bill Amount:P <?php echo $bill; ?> </h1><br /><br />


</p>
<CENTER><form><input type="button" onclick="window.print()" value="Print page" /></form><a href="adbillsum.php">Back</a></CENTER>
</div>


</div>
