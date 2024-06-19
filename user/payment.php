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
 <link rel="stylesheet" href="../css/pay1.css">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
 
    <title>Document</title>
</head>
<style>
  @media screen and (max-width: 768px) {
    .bo{
        display: none;
    }
    .boxed{
        display: none;
    }
.boxedd{
    display: none;
}
.uplang{
    display: none;
}

.container {
  margin: 0 auto;
  transform: translateY(15rem);
  margin-left: 3rem;
}
#back{
    transform: translateY(20rem);
    margin-left: 11rem;
}

.payment-icon {
  background-size: 100px 63px;
  display: inline-block;
  height: 63px;
  width: 100px;
}

.payment-icon--visa {
  background-image: url("https://cdn.shopify.com/s/assets/payment_icons/visa-319d545c6fd255c9aad5eeaad21fd6f7f7b4fdbdb1a35ce83b89cca12a187f00.svg");
}

.payment-icon--master {
  background-image: url("https://cdn.shopify.com/s/assets/payment_icons/master-173035bc8124581983d4efa50cf8626e8553c2b311353fbf67485f9c1a2b88d1.svg");
}

.payment-icon--american-express {
  background-image: url("https://cdn.shopify.com/s/assets/payment_icons/american_express-ed5c54cf3ceb18cd4deb3687857b816c07e4f4c7e8719da4a206cea3e7961be1.svg");
}

.payment-icon--discover {
  background-image: url("../images/gcash21.png");

}

@media screen and (max-width: 768px) {

#house{

}
  #navv{
      display: flex;
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      transform: translateY(24rem);

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
  
  
  }


  }
</style>
<body>

<div class="bo">


    </div>
    <h1 id="bp">CHOOSE PAYMENT</h1>
    <div class="boxed">
        <h5 id="txtyellow"> 1. REVIEW
        </div> 
        <div class="boxedd">
            <h5 id="txtyelloww"><b> 2. CHOOSE PAYMENT
            </div>  
    
            <div class="uplang">
           

            <!-- Example single danger button -->
           
            <!-- Dropdown menu -->
            
                   
           <br>           <br>           <br>          <br>           <br>           <br>         <br>           <br>           <br>           <br>           <br>           <br>           <br>           <br>           <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="./pay/index.php">
<img src="../images/gcash21.png" style=" height:200px; width: 400px;" alt="" id="gcash1">
</a>
<a href="./pay/index1.php">
<img src="../images/credit.png" style=" height:250px; width: 250px;" alt="" id="gcash1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</a>
<a href="../admin/oph/login.php">
<script src="https://www.paypalobjects.com/api/button.js?"
     data-merchant="braintree"
     data-id="paypal-button"
     data-button="checkout"
     data-color="gold"
     data-size="medium"
     data-shape="pill"
     data-button_type="submit"
     data-button_disabled="false"
 ></script>
 </a>
</a>
</div>
<div class="container">

  <span class="payment-icon payment-icon--master"></span>
  <a href = "#"
  <span class="payment-icon payment-icon--american-express">
  <a></span>
  <a rel='facebox' href="bpay.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
                
  <span class="payment-icon payment-icon--discover" width="720px"></span>
  </a>
</div>
<!-- partial -->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a rel='facebox' href="billsum.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
<button type="button"  id="back"class="btn btn-primary">Back</button>
</a>
<br> <br>

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


  
</body>


</html>