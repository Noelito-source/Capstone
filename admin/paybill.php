<style>
td,
th {
  border: 1px solid rgb(190, 190, 190);
  padding: 10px;
}

td {
  text-align: center;
}

tr:nth-child(even) {
  background-color: #ffff;
}

th[scope='col'] {
  background-color: #696969;
  color: #fff;
}

th[scope='row'] {
  background-color: #d7d9f2;
}

caption {
  padding: 10px;
  caption-side: bottom;
}

table {
  border-collapse: collapse;
  border: 2px solid rgb(200, 200, 200);
  letter-spacing: 1px;

  font-size: 0.8rem;
}

</style>
<?php session_start(); ?>
<?php
  include 'db2.php';
$owner_id =$_REQUEST['id'];

$result = mysqli_query($conn,"SELECT * FROM users1 WHERE user_id  = '$owner_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['user_id'] ;
				$lname= $test['fname'] ;					
				$fname=$test['lname'] ;
				$mi=$test['email'] ;
				$address=$test['address'] ;
				$contact=$test['unique_id'] ;
        

?>

<p><h1>Consumer Bill</h1></p>
 <h1 style = "font-size : 18px ">Name: <?php echo $lname.'&nbsp;' .$fname;?></h1>
<p><?php $date=date('y/m/d H:i:s');
 echo $date;?></p>
 <form method="post" action="addbill.php" style="background-color:powderblue;">
 <table width="346" border="1" >
  <tr>
  <input type="hidden" name="owners_id" value="<?php echo $id; ?>" />
  <input type="hidden" name="date" value="<?php echo $date; ?>" />

                      
    <td width="118">Previous Reading:</td>
    <td width="66"><input type="text" name="prev" id="inp"   /></td>
    <td >Cu.m</td>
  </tr>
  <tr>
    <td>Present Reading:</td>
    <td><input type="text" name="pres" id="inp" /></td>
    <td  style="border:none;">Cu.m</td>
  </tr>
  <tr>
    <td>Price/Cu.m</td>
    <td><input type="text" name="price" value="25"  id="inp"   /></td>
    <td style="border:none;">php</td>
  </tr>
  
   <tr>
    <td></td>
    <td><input type="submit" name="total" value="Add"  /></td>
    <td style="border:none;"></td>
  </tr>
</table>
</form>