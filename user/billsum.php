<?php include "nav.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
 <link rel="stylesheet" href="../css/pay.css">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
 
    <title>Document</title>
</head>
<body>
 
  
</div>

    </div>
    <h1 id="bp">BILLS & PAYMENT</h1>
    <div class="boxed">
        <h5 id="txtyellow"> 1. REVIEW
        </div> 
        <div class="boxedd">
            <h5 id="txtyelloww"> 2. CHOOSE PAYMENT
            </div>  
            <div class="boxeddd" >
                <h5 id="txtyellowww"> Reminder
                </div>     
            <div class="uplang">
            <h4 id="canh4">Customer Account Number</h4>
            
            <div class="boxtxt"> <h3>109284093</h3></div>


            <!-- Example single danger button -->
         
            <p id="pcheck"> Payments made through PWBS  &nbsp; <br>
                       (between 7:00 AM-11:00 PM Philippine time) are received by the system in real-time. Payments made
                       &nbsp; <br>through other payment 
                        channels will be reflected within 1-2  hours.</p>
                        
<link rel="stylesheet" href="../css/payy.css">

<div class="bo">


          

<link rel="stylesheet" href="./css/facebox.css">




<div id="colorp" style="bgcolor : #fff;" >
<br><br><br><br>
<?php
include 'db2.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where owners_id='$id'");

echo "<table border='1' id = 'myTable' bgcolor='#fff' >
<tr>
<th>Id</th>
<th>Previous Reading</th>
<th>Present Reading</th>
<th>Consumption</th>
<th>Price</th>
<th>Date</th>
<th>Bill Amount</th>

</tr>";

while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons= (int)$pres- (int)$prev;
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

  echo "</tr>";
  }
echo "</table>";

?> 

<h3 style="color: blue;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


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

                        <br><br> <br><br>
                        <br><br> <br><br>
                        <br><br> <br><br>
                        <br><br> <br><br>
                       &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;     &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp; 
                       &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;     &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp; 
                       &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp; 
                       &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp; 
                       &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp; 
                       &nbsp; 
                       <a href="payment.php">
                       <button type="button" class="btn btn-primary">Pay Now</button>
</a>
                        
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="pay.js"></script>

  <br><br><br><br><br><br>
  
</body>


</html>