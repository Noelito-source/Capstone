<?php include "nav.php" ?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="../css/payy.css">

<div class="bo">

    </div>
    <h1 id="bp">BILLING SUMMARY</h1>
    <a rel='facebox' href="viewbb.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">]
    <div class="rightt">
    <div class="boxed">
        <h5 id="txtyelloww">1.BILLS
        </div> </a>
        <div class="boxedd">
            <h5 id="txtyellow"> 2. HISTORY
            </div>  </div>
          <style>
            *{
              
            }
            #bpP{
              display: none;
            }
            #myTable{
              width: 80%;
              margin-left: 12rem;
              transform: translateY(13rem);
              border-collapse: collapse;
  box-shadow: 20px 20px 20px 5px #f3f8fe;
  background-color: white;
  text-align: left;
            }
            th {
    background-color: #d0def2;
    padding: 0.75rem 2rem;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    font-size: 0.7rem;
    font-weight: 900;
  }

  td {
    padding: 1rem 2rem;
    background-color:#fff;
  }
            .boxedd{
            background-color: #fff;
                          }
                        
                          #navv{
                            display: none;
                     }
                          .rightt{
                            margin-left: 5rem;
                          }
@media screen and (max-width: 768px) {
#house{

}
#bpP{

}
#bp{
margin-left: 4rem;

}

.boxedd{
  width: 55%;
  margin-left: 7.7rem;
}
.boxed{
width: 110%;
margin-left: -3.5rem;
}
#txtyellow{
  margin-left: 2rem
}
#txtyelloww{
  margin-left: 4rem
}
#bp{
  margin-left: 4rem;
}

#myTable{
             
  margin-left: .3rem;
  transform: translateY(13rem);
            }


  #navv{

visibility: visible;
      display: flex;
      position: -webkit-sticky;
      position: sticky;
      top: 0;

    }
 
.main-nav {
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
$id =$_SESSION['unique_id'];
$result = mysqli_query($conn,"SELECT * FROM payment where user_id=$id");

echo "<table border='1' id = 'myTable' bgcolor='#fff' >
<tr>
<th id=\"remove\">Name</th>
<th>Price</th>
<th id=\"remove\">Reference Number</th>
<th >Date</th>
<th>Status</th>



</tr>";
while($row = mysqli_fetch_array($result)){
   echo "<tr>";
  echo "<td id=\"remove\" >" . $row['fname'] . "</td>";
  echo "<td>" .  $row['username']. "</td>";
  echo "<td id=\"remove\">" . $row['ref'] ."</td>";
  echo "<td>" . $row['date'] ."</td>";
  echo "<td>" . $row['status'] ."</td>";
 
  echo "</tr>";
}


          
   
 



  
echo "</table>";

?> 
<br><br><br><br><br>
<h3 style="color: blue;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
		<li class="main-nav__item">
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
		<li class="main-nav__item">
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
    
		<li class="main-nav__item main-nav__item--active">
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
