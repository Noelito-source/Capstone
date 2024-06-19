

     <?php
    include("nav.php");
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - CSS User Profile Card</title>
  <link rel="stylesheet" href="../css/acs.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<style>
  #navv{
    display: none;
  }
</style>
<body>
<!-- partial:index.partial.html -->
<script src="https://kit.fontawesome.com/a3b45a8e7c.js" crossorigin="anonymous"></script>
<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users1 WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <br> <br> <br>  <br> <br> <br>  <br> <br> <br>
<div class="wrapper">
    <div class="left">
    <img src="../admin/php/images/<?php echo $row['img']; ?>" alt="" style="width: 300px; height: 300px;">
        <h4>
            <?php echo $row['fname']. " " . $row['lname'] ?></h4>
            <br>
         <p id="cons">Consumer</p>
         <p id="uid"><?php echo $row['unique_id'] ?></p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Address</h4>
                    <p>  <?php echo $row['address'] ?></h4></p>
                 </div>
                 <br>
                 <div class="data">
                   <h4>Account Number</h4>
                    <p><?php echo $row['unique_id'] ?></p>
              </div>
            </div>
        </div>
      
      <div class="projects">
          
            <div class="projects_data">
                 <div class="data">
                    <h4>Email address</h4>
                    <p><?php echo $row['email'] ?></p>
                 </div>
           
            </div>
        </div>
      
        <div class="social_media">
            <ul>
              <li><a href="users.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"  color= "white"fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a></li>
              <li> <a href="edit.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16"  color= "white"height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a> </li>
       
          </ul>
      </div>
    </div>
</div>
<div class="card" data-state="#about" id="etona">
  <div class="card-header">
    <div class="card-cover" style="background-image: url('https://images.unsplash.com/photo-1549068106-b024baf5062d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80')"></div>
    <img class="card-avatar"     src="../admin/php/images/<?php echo $row['img']; ?>" alt="avatar" />
    <h1 class="card-fullname"> <?php echo $row['fname']. " " . $row['lname'] ?></h1>
    <h2 class="card-jobtitle">Member</h2>
  </div>
  <div class="card-main">
    <div class="card-section is-active" id="about">
      <div class="card-content">
        <div class="card-subtitle">ABOUT</div>
        <p class="card-desc">Member of Palangoy Multi- Purpose Cooperative.
        </p>
      </div>
     
    </div>
    <div class="card-section" id="experience">
      <div class="card-content">
        <div class="card-subtitle">WORK EXPERIENCE</div>
        <div class="card-timeline">
          <div class="card-item" data-year="2014">
            <div class="card-item-title">Front-end Developer at <span>JotForm</span></div>
            <div class="card-item-desc">Disrupt stumptown retro everyday carry unicorn.</div>
          </div>
          <div class="card-item" data-year="2016">
            <div class="card-item-title">UI Developer at <span>GitHub</span></div>
            <div class="card-item-desc">Developed new conversion funnels and disrupt.</div>
          </div>
          <div class="card-item" data-year="2018">
            <div class="card-item-title">Illustrator at <span>Google</span></div>
            <div class="card-item-desc">Onboarding illustrations for App.</div>
          </div>
          <div class="card-item" data-year="2020">
            <div class="card-item-title">Full-Stack Developer at <span>CodePen</span></div>
            <div class="card-item-desc">Responsible for the encomposing brand expreience.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-section" id="contact">
      <div class="card-content">
        <div class="card-subtitle">CONTACT</div>
        <div class="card-contact-wrapper">
          <div class="card-contact">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
              <circle cx="12" cy="10" r="3" /></svg>
              <?php echo $row['address'] ?>
          </div>
          <div class="card-contact">
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" /></svg>(269) 756-9809</div>
          <div class="card-contact">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
              <path d="M22 6l-10 7L2 6" /></svg>
              <?php echo $row['email'] ?>
          </div>

        </div>
      </div>
    </div>
    <div class="card-buttons">
      <button data-section="#about" class="is-active">ABOUT</button>

      <button data-section="#contact">CONTACT</button>
    </div>
  </div>
</div>
<!-- partial -->

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


  <script>const buttons = document.querySelectorAll(".card-buttons button");
const sections = document.querySelectorAll(".card-section");
const card = document.querySelector(".card");

const handleButtonClick = e => {
  const targetSection = e.target.getAttribute("data-section");
  const section = document.querySelector(targetSection);
  targetSection !== "#about" ?
  card.classList.add("is-active") :
  card.classList.remove("is-active");
  card.setAttribute("data-state", targetSection);
  sections.forEach(s => s.classList.remove("is-active"));
  buttons.forEach(b => b.classList.remove("is-active"));
  e.target.classList.add("is-active");
  section.classList.add("is-active");
};

buttons.forEach(btn => {
  btn.addEventListener("click", handleButtonClick);
});</script>
</body>
</html>
