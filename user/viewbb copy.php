<?php include "nav.php" ?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="../css/payy.css">

<div class="bo">

    </div>
    </div>
    <h1 id="bp">BILLING SUMMARY</h1>

    <h1 id="bpP">HISTORY</h1>
    </a>
    <div class="rightt">
    <div class="boxed">
        <h5 id="txtyellow">1.BILLS
        </div> 
        <a rel='facebox' href="viewb.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
        <div class="boxedd">
            <h5 id="txtyelloww">  2.HISTORY
            </div>  </div>
            </a>
  <style>
    .table{
      margin-left: 10rem;
    }
      #bpP{
        display: none;
      }    
    
            #myTable{
              width: 80%;
              margin-left: 8rem;
              transform: translateY(13rem);
              border-collapse: collapse;
  box-shadow: 20px 20px 20px 5px #f3f8fe;
  background-color: white;
  text-align: left;
           


            }
            th {
              margin-left: 30rem;
    background-color: #d0def2;
    padding: 0.75rem 2rem;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    font-size: 0.7rem;
    font-weight: 900;
  }
  #navv{
     display: none;

    }

  
@media screen and (max-width: 768px) {

#house{

}
#myTable{
              width: 80%;
              margin-left: 2rem;
              transform: translateY(13rem);
              border-collapse: collapse;
  box-shadow: 20px 20px 20px 5px #f3f8fe;
  background-color: white;
  text-align: left;
}
.boxedd{
  width: 45%;
  margin-left: 12.8rem;
}
.boxed{
width: 90%;
margin-left: 1.5rem;
}
#txtyellow{
  margin-left: 05rem
}
#txtyelloww{
  margin-left: 2rem
}
#bp{
  margin-left: 4rem;
}
  #navv{
      display: flex;
      position: -webkit-sticky;
      position: sticky;
      top: 0;

    }
 
.main-nav {
  display: flex;
  position: fixed;
  bottom:0 ;
  width: 420px;
  height: 70px;
  background-color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 10px;



}
    
  .main-nav__list {
    display: flex;
    list-style: none;
  }
  .main-nav__item {
    position: relative;
    width: 70px;
    height: 70px;
  }
  .main-nav__item:nth-child(2).main-nav__item--active ~ .main-nav__indicator {
    transform: translateX(70px);
  }
  .main-nav__item:nth-child(3).main-nav__item--active ~ .main-nav__indicator {
    transform: translateX(140px);
  }
  .main-nav__item:nth-child(4).main-nav__item--active ~ .main-nav__indicator {
    transform: translateX(210px);
  }
  .main-nav__item:nth-child(5).main-nav__item--active ~ .main-nav__indicator {
    transform: translateX(280px);
  }
  .main-nav__item--active .main-nav__icon {
    transform: translateY(-33px);
  }
  .main-nav__item--active .main-nav__text {
    transform: translateY(10px);
    opacity: 1;
  }
  .main-nav__link {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    position: relative;
    margin-left: -1.2rem;
  }
  .main-nav__icon {
    font-size: 1.5rem;
    line-height: 75px;
    color: var(--body-color);
    transition: 0.5s;
    z-index: 1;
    margin-left: -1.2rem;
  }
  .main-nav__text {
    font-weight: 400;
    font-size: 0.75rem;
    color: var(--body-color);
    position: absolute;
    letter-spacing: 0.05rem;
    transition: 0.5s;
    transform: translateY(20px);
    opacity: 0;
    margin-left: -1.2rem;
  }
  .main-nav__indicator {
    width: 70px;
    height: 70px;
    background-color: #030bff17;
   border-radius: 50% ;
    position: absolute;
    top: -50%;
    border: 6px solid var(--body-color);
    transition: 0.5s;
    margin-left: -1.2rem;
  }
  .main-nav__indicator::before, .main-nav__indicator::after {
    content: "";
    position: absolute;
    background-color: transparent;
    width: 20px;
    height: 20px;
    top: 50%;
    box-shadow: 0 -10px 0 0 var(--body-color);
  }
  .main-nav__indicator::before {
    left: -22px;
    border-top-right-radius: 20px;
  }
  .main-nav__indicator::after {
    right: -22px;
    border-top-left-radius: 20px;
  }
  #remove{
    display: none;
  }
  
  
  }




          </style>

<link rel="stylesheet" href="./css/facebox.css">




<div id="colorp" style="bgcolor : #fff;" >

<?php
include 'db2.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where owners_id='$id'");

echo "<table border='1'width='30%' class=\"table\" id = \"myTable\" bgcolor='#fff' >
<tr>


<th>Previous Reading</th>
<th>Present Reading</th>
<th id=\"remove\">Consumption</th>
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
 
    echo "<td id=\"remove\">" . $prev . "</td>";
    echo "<td>" . $pres . "</td>";
    echo "<td>" .  $totalcons . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>₱" . $bill . ".00</td>";
;

  echo "</tr>";
  }
echo "</table>";

?> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br>


<nav class="main-nav" id="navv">
	<ul class="main-nav__list">
		<li class="main-nav__item ">
			<a href="users.php" class="main-nav__link">
				<span class="main-nav__icon" id="house">
					<ion-icon name="home-outline"></ion-icon>
				</span>
				<span class="main-nav__text">Home</span>
			</a>
		</li>
		<li class="main-nav__item ">
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
		<li class="main-nav__item">
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
