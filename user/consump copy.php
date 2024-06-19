<?php include "nav.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/consump.css">
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <title>Document</title>
</head>
<body>
 <style>
   #navv{
      display: none;

    }
  .mvv{
    display: none;
    transform: translateY(15rem);
  }
@media screen and (max-width: 768px) {
  .mvv{
display: block;
    transform: translateY(15rem);
  }
#house{
}
  #navv{
      display: flex;
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      transform: translateY(35rem);

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
  .computation{
    display: none;
  }
  .down{
    display: none;
  }
  .boxtxt{
    display: none;
  }
  #num{
    display: none;
  }
  }
 </style>


<div class="consump">
    <h1>Consumption Report</h1>

    <div class="boxtxt" >    <h3 > <?php echo $row['unique_id'] ?></h3> </div>

</div>
<h3 id="num"> Customer Account Number</h3>
<div class="down">

    <p>CONSUMPTION REPORT AS OF</p>
    <h5>AVERAGE USAGE FOR 11 MONTHS</h5>
    <h2>MAY 2023</h2>
    <h3>-----</h3>
</div>
</div>
<div class="computation">
  <br>  <br>  <br>
    <h1>Computation</h1>
    <p>Current Charges:   &nbsp; &nbsp;   &nbsp;   &nbsp;  &nbsp;   &nbsp; &nbsp;      per cubic meter
 <h2>1st     5 cu.m (min)       &nbsp;       125.00          = ₱<br>

    2nd   10 cu.m (6-10)           27.00   x      = ₱ <br>
    
    3rd    10 cu.m (11-20)         29.00   x      = ₱<br>
    
    4th    10 cu.m (21-30)         31.00   x      = ₱<br>
    
    5th    10 cu.m (31-40)         33.00   x      = ₱<br>
    
    Succeeding cu.m                36.00   x      = ₱</h2>
</p>
</div>

</div>
<div class="mvv">
<h1>Computation</h1>
    <p>Current Charges:   &nbsp; &nbsp;   &nbsp;   &nbsp;  &nbsp;   &nbsp; &nbsp;      per cubic meter
 <h5>1st     5 cu.m (min)       &nbsp;       125.00          = ₱<br>

    2nd   10 cu.m (6-10)          27.00   x      = ₱ <br>
    
    3rd    10 cu.m (11-20)         29.00   x      = ₱<br>
    
    4th    10 cu.m (21-30)        31.00   x         = ₱<br>
    
    5th    10 cu.m (31-40)        33.00   x      = ₱<br>
    
    Succeeding cu.m              36.00   x      = ₱</h5>
</p>
</div>
</div>

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


  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="consumption.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/apexcharts'></script><script  src=""> </script>

  
</body>


</html>