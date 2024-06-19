<?php include "nav.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="stylesheet" href="../css/ppppay.css">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
 
    <title>Document</title>
</head>

<style>
         
         @media screen and (max-width: 768px) {
    .table{
      width: 30%;
      margin-left: 1.5rem;
    }
    #myTable{
      width: 10%;
    }
    #txtyellow{

    }
    #box{
        width: 20rem; 
        margin-left: 4rem; 
display: none;
  
    }
    #txtyellow{
      margin-left: -2rem;
    }
    #ntn{
      margin-left: 10rem;
    }
    
  }

</style>
<body>
<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users1 WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
  
</div>

    </div>
    <h1 id="bp">BILLS & PAYMENT</h1>
    <div class="boxed" id="box">
        <h5 id="txtyellow"> 1. REVIEW
        </div> 
        <div class="boxedd">
            <h5 id="txtyelloww"> 2. CHOOSE PAYMENT
            </div>  
            <div class="boxeddd" id="boxx">
                <h5 id="txtyellowww"> Reminder
                </div>     
            <div class="uplang">
            <h4 id="canh4">Customer Account Number</h4>
            
            <div class="boxtxt"> <h3>109284093</h3></div>
 <div>Customer Account Number</div>

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
         
    
          
   



          
          echo "<div id=\"checkbox-container\">";
          echo "<table>";
          
          echo"<td>  <input type=\"checkbox\"  name=\"checkbox\" value= \"<?=$bill =?>\">  $bill </td>";

          echo "</table>";
          
          echo "</div>";
          echo "<span class=\"recalculate-text text-right text-underline\"></span>";
  }
          echo "
          <script >
          const recalculateText = document.querySelector(\".recalculate-text\");
          const checkboxContainer = document.querySelector(\"#checkbox-container\");
          let total = 0;
          
          // Create a number formatter to print out on the UI - this is a better approach than regex IMO.
          const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
          });
          
          //Notice the use of event delegation here - meaning I only added 1 single event handler to a single DOM element
          //Read this blog for more on event delegation and why it's useful: https://davidwalsh.name/event-delegate
          checkboxContainer.addEventListener('change', e => {
            //Also notice that I am listening for the change event, instead of the click event.
            //See here: https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/change_event
            if (e.target.tagName == \"INPUT\") {
              const floatValue = parseFloat(e.target.value);
              if (e.target.checked) {
                total += floatValue;
              } else {
                total -= floatValue;
              }
            }
          
            recalculateText.innerHTML = formatter.format(total);
          });
          </script> "
          
        
?> 
<span  ></span>
<h3 style="color: blue;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<script>const recalculateText = document.querySelector(".recalculate-text");
const checkboxContainer = document.querySelector("#checkbox-container");
let total = 0;

// Create a number formatter to print out on the UI - this is a better approach than regex IMO.
const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD'
});

//Notice the use of event delegation here - meaning I only added 1 single event handler to a single DOM element
//Read this blog for more on event delegation and why it's useful: https://davidwalsh.name/event-delegate
checkboxContainer.addEventListener('change', e => {
  //Also notice that I am listening for the change event, instead of the click event.
  //See here: https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/change_event
  if (e.target.tagName == "INPUT") {
    const floatValue = parseFloat(e.target.value);
    if (e.target.checked) {
      total += floatValue;
    } else {
      total -= floatValue;
    }
  }

  recalculateText.innerHTML = formatter.format(total);
});
</script>
<script>
function updateSubTotal() {
  var table = document.getElementById("myTable");
  let subTotal = Array.from(table.rows).slice(1).reduce((total, row) => {
    return total + parseFloat(row.cells[1].innerHTML);
  }, 0);
  document.getElementById("val").innerHTML = "SubTotal = ₱" + subTotal.toFixed(2);
}

function onClickRemove(deleteButton) {
  let row = deleteButton.parentElement.parentElement;
  row.parentNode.removeChild(row);
  updateSubTotal(); // Call after delete
}
</script>
</div>

                     
<nav class="main-nav" id="navv" style="display:none">
	<ul class="main-nav__list">
		<li class="main-nav__item ">
			<a href="users.php" class="main-nav__link">
				<span class="main-nav__icon" id="house">
					<ion-icon name="home-outline"></ion-icon>
				</span>
				<span class="main-nav__text">Home</span>
			</a>
		</li>
		<li class="main-nav__item main-nav__item--active">
    <a rel='facebox' href="viewb.php?id=<?php echo $row['user_id'];?>"   class="main-nav__link">
				<span class="main-nav__icon">
					<ion-icon name="cash-outline"></ion-icon>
				</span>
				<span class="main-nav__text">Pay Bills</span>
			</a>
		</li>
		<li class="main-nav__item">
			<a href="about.php" class="main-nav__link">
				<span class="main-nav__icon">
					<ion-icon name="alert-circle-outline"></ion-icon>
				</span>
				<span class="main-nav__text">About Us</span>
			</a>
		</li>
		<li class="main-nav__item ">
			<a href="gallery.php" class="main-nav__link">
				<span class="main-nav__icon">
					<ion-icon name="camera-outline"></ion-icon>
				</span>
				<span class="main-nav__text">Gallery</span>
			</a>
		</li>
		<li class="main-nav__item ">
			<a href="feedback2.php" class="main-nav__link">
				<span class="main-nav__icon">
					<ion-icon name="heart-outline"></ion-icon>
				</span>
				<span class="main-nav__text">Feedback</span>
			</a>
		</li>
    
		<li class="main-nav__item">
			<a href="#" class="main-nav__link">
				<span class="main-nav__icon">
					<ion-icon name="settings-outline"></ion-icon>
				</span>
				<span class="main-nav__text">Settings</span>
			</a>
		</li>
		<div class="main-nav__indicator"></div>
	</ul>
</nav><script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script  src="./script.js"></script>
</html>
            
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="pay.js"></script>


  
</body>


</html>