<link rel="stylesheet" href="./css/facebox.css">

<h4 style="color:#F00;">Note: Bill Amount = Total Consumption * Price/Cu.m</h4>
<p>1st     5 cu.m (min)            125.00            = ₱ <br>

2nd   10 cu.m (6-10)           27.00   x      = ₱<br>


3rd    10 cu.m (11-20)         29.00   x      = ₱<br>


4th    10 cu.m (21-30)         31.00   x      = ₱<br>


5th    10 cu.m (31-40)         33.00   x      = ₱<br>


Succeeding cu.m                36.00   x     = ₱</p>

<div id="colorp" style="bgcolor : #fff;">
<?php
include 'db2.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where owners_id='$id'");

echo "<table border='1' id = 'myTable' bgcolor='#fff' >
<tr>
<th>Id</th>
<th>Previous Reading</th>
<th>Present Reading</th>
<th>Consuption</th>
<th>Price</th>
<th>Date</th>
<th>Bill Amount</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons= $pres- $prev;
   $add6= 2;
   $add7= 4;
   $add8= 6;
   $add9= 8;
   $add10= 10;
   $add11= 14;
   $add12= 18;
   $add13= 22;
   $add14= 26;
   $add15= 30;
   $add16= 34;
   $add17= 38;
   $add18= 42;
   $add19= 46;
   $add20= 50;
   $add21= 56;
   $add22= 62;
   $add23= 68;
   $add24= 74;
   $add25= 80;
   $add26= 86;
   $add27= 92;
   $add28= 98;
   $add29= 104;
   $add30= 110;
   $add31= 118;
   $add32= 126;
   $add33= 134;
   $add34= 142;
   $add35= 150;
   $add36= 158;
   $add37= 166;
   $add38= 174;
   $add39= 182;
   $add40= 190;
   $add41= 201;
   $add42= 212;
   
    if(($totalcons == 1 >5 )|| ($totalcons == 1 <5  )){
$bill= (int)$totalcons  * (int)$price;
    }
 if($totalcons == 6 ){
       $bill= (int)$totalcons  * (int)$price + $add6;
    }
    if($totalcons == 7){
      $bill= (int)$totalcons  * (int)$price + $add7;
   }
   if($totalcons == 8){
    $bill= (int)$totalcons  * (int)$price + $add8;
 }
 if($totalcons == 9){
  $bill= (int)$totalcons  * (int)$price + $add9;
}
if($totalcons == 10){
  $bill= (int)$totalcons  * (int)$price + $add10;
}
if($totalcons == 11){
  $bill= (int)$totalcons  * (int)$price + $add11;
}
if($totalcons == 12){
  $bill= (int)$totalcons  * (int)$price + $add12;
}
if($totalcons == 13){
  $bill= (int)$totalcons  * (int)$price + $add13;
}
if($totalcons == 14){
  $bill= (int)$totalcons  * (int)$price + $add14;
  
}
if($totalcons == 15){
  $bill= (int)$totalcons  * (int)$price + $add15;
  
}
if($totalcons == 16){
  $bill= (int)$totalcons  * (int)$price + $add16;
  
}
if($totalcons == 17){
  $bill= (int)$totalcons  * (int)$price + $add17;
  
}
if($totalcons == 18){
  $bill= (int)$totalcons  * (int)$price + $add18;
  
}
if($totalcons == 19){
  $bill= (int)$totalcons  * (int)$price + $add19;
  
}
if($totalcons == 20){
  $bill= (int)$totalcons  * (int)$price + $add20;
  
}
if($totalcons == 21){
  $bill= (int)$totalcons  * (int)$price + $add21;
  
}
if($totalcons == 22){
  $bill= (int)$totalcons  * (int)$price + $add22;
  
}
if($totalcons == 23){
  $bill= (int)$totalcons  * (int)$price + $add23;
  
}
if($totalcons == 24){
  $bill= (int)$totalcons  * (int)$price + $add24;
  
}
if($totalcons == 25){
  $bill= (int)$totalcons  * (int)$price + $add25;
  
}
if($totalcons == 26){
  $bill= (int)$totalcons  * (int)$price + $add26;
  
}
if($totalcons == 27){
  $bill= (int)$totalcons  * (int)$price + $add27;
  
}
if($totalcons == 28){
  $bill= (int)$totalcons  * (int)$price + $add28;
  
}
if($totalcons == 29){
  $bill= (int)$totalcons  * (int)$price + $add29;
  
}
if($totalcons == 30){
  $bill= (int)$totalcons  * (int)$price + $add30;
  
}
if($totalcons == 31){
  $bill= (int)$totalcons  * (int)$price + $add31;
  
}
if($totalcons == 32){
  $bill= (int)$totalcons  * (int)$price + $add32;
  
}
if($totalcons == 33){
  $bill= (int)$totalcons  * (int)$price + $add33;
  
}
if($totalcons == 34){
  $bill= (int)$totalcons  * (int)$price + $add34;
  
}
if($totalcons == 35){
  $bill= (int)$totalcons  * (int)$price + $add35;
  
}
if($totalcons == 36){
  $bill= (int)$totalcons  * (int)$price + $add36;
  
}
if($totalcons == 37){
  $bill= (int)$totalcons  * (int)$price + $add37;
  
}
if($totalcons == 38){
  $bill= (int)$totalcons  * (int)$price + $add38;
  
}
if($totalcons == 39){
  $bill= (int)$totalcons  * (int)$price + $add39;
  
}
if($totalcons ==  40){
  $bill= (int)$totalcons  * (int)$price + $add40;
  
}
if($totalcons == 41){
  $bill= (int)$totalcons  * (int)$price + $add41;
  
      }
      if($totalcons == 42){
        $bill= (int)$totalcons  * (int)$price + $add42;
        
            }
         
    
          
   
    echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $prev . "</td>";
  echo "<td>" . $pres . "</td>";
  echo "<td>". $totalcons."</td>";
  echo "<td>" . $price . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $bill . "</td>";
 echo "<td><a rel='facebox' href='viewpayment.php?id=".$row['id']."'>Expand </a>| ";
 echo "<a rel='facebox' href='delbill.php?id=".$row['id']."'>Done</td>";
  echo "</tr>";
  }
echo "</table>";

?>

<script>
function updateSubTotal() {
  var table = document.getElementById("myTable");
  let subTotal = Array.from(table.rows).slice(1).reduce((total, row) => {
    return total + parseFloat(row.cells[1].innerHTML);
  }, 0);
  document.getElementById("val").innerHTML = "SubTotal = $" + subTotal.toFixed(2);
}

function onClickRemove(deleteButton) {
  let row = deleteButton.parentElement.parentElement;
  row.parentNode.removeChild(row);
  updateSubTotal(); // Call after delete
}
</script>
</div>
