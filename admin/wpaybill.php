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
 <form method="post" action="waddbill.php">
 <table width="346" border="1">
  <tr>
  <input type="hidden" name="owners_id" value="<?php echo $id; ?>" />
  <input type="hidden" name="date" value="<?php echo $date; ?>" />
  <label class="label"> Previous Reading</label>
                      
    <td width="118">Previous Reading:</td>
    <td width="66"><input type="text" name="prev"  /></td>
    <td>Cu.m</td>
  </tr>
  <tr>
    <td>Present Reading:</td>
    <td><input type="text" name="pres"  /></td>
    <td>Cu.m</td>
  </tr>
  <tr>
    <td>Price/Cu.m</td>
    <td><input type="text" name="price" value="25"   /></td>
    <td>php</td>
  </tr>
  
   <tr>
    <td><input type="submit" name="total" value="Add"  /></td>
  </tr>
</table>
</form>