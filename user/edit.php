
<?php 
  
  include_once "./php/config.php";
  if(!isset($_SESSION['unique_id'])){

  }
?>
<?php
    include("nav.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
      
  #navv{
    display: none;
  }

@media screen and (max-width: 768px) {

#house{

}
  #navv{
      display: flex;
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      transform: translateY(15rem);

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

</style>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

			<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users1 WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
                <form method="POST" action="code.php">

<div class="card shadow">
    <h1>ADMINS/STAFFS</h1>
    <div class="input-field">
        <label class="add">ID</label>
        <input type="text" value="<?php echo $row['user_id']; ?>" name="user_id" class="input">
    </div>
    <div class="input-field">
        <label class="add">Name</label>
        <input type="text" value="<?php echo $row['fname']; ?>" name="fname" class="input">
    </div>

    <div class="input-field">
        <label class="add">Email</label>
        <input type="text" value="<?php echo $row['lname']; ?>" name="lname"  class="input">
    </div>

    <div class="input-field">
        <label class="add">Password</label>
        <input type="password" value="<?php echo $row['password']; ?>" name="password"  class="input">
    </div>

  

    <div class="buttons">
        <button class="save" type="submit" name="update_consumer_list"> Save </button>

        <a href="admin.php">
            <button class="cancel"> Cancel </button>
        </a>
    </div>
</div>
</form>
                    </div>
                </div>
            </div>
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


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>