<?php
    include("functions2.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/default-skin/default-skin.min.css'><link rel="stylesheet" href="../css/nac">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    
</head> 
    

    <title>Home</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
  
    <nav class=" navbar navbar-expand-md   navbar navbar-dark  bg-white shadow-sm p-3 mb-5 fixed-top shadow-sm p-3 mb-5 bg-white rounded ">
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-primary" href="#">
    <img src="./images/Logo.png" width="30" height="30" class="d-inline-block align-top " alt="">
 PWBS
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-dark" href="index1.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Bills & Payment
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">View Bills</a>
          <a class="dropdown-item" href="#">Pay Bills</a>
          <a class="dropdown-item" href="#">History</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-dark" href="gallery.php">Gallery</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Contact Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="about.php">About</a>
          <a class="dropdown-item" href="feedback2.php">Feedback</a>
      
        </div>
      </li>
    </ul>
 
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link text-dark " href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications 
                <?php
                $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-danger"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `notifications` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='comment'){
                    echo "Payment Successful!";
                }else if($i['type']=='like'){
                    echo ucfirst($i['name'])." liked your post.";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>
          </li>
          <div class="action">
        <div class="profile" onclick="menuToggle();">
            <img src="<?=get_image($row['image'])?>" alt="">
        </div>

        <div class="menu">
            <h3>
            <?=esc($row['firstname'])?> <?=esc($row['lastname'])?>
                <div>
                   Member
                </div>
            </h3>
            <ul>
                <li>
                    <span class="material-icons icons-size">person</span>
                    <a href="index.php">My Profile</a>
                </li>
                <li>
                    <span class="material-icons icons-size">mode</span>
                    <a href="profile-edit.php">Edit Account</a>
                </li>
          
                <li>
                    <span class="material-icons icons-size">logout</span>
                    <a href="login.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }
    </script>
        </ul>
          <?php 
          
          if(isset($_POST['submit'])){
              $message = $_POST['message'];
              $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '', 'comment', '$message', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                 
              }
          }
                
          ?>
       
      </div>
    </nav>
<!DOCTYPE html>
<!-- Design by foolishdeveloper.com-->
<html lang="en">
<head>
  <title>filterable gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style media="screen">

body{
	line-height: 1.5;
	font-family: sans-serif;
}
*{
	margin:0;
	box-sizing: border-box;
}
.container{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
img{
	max-width: 100%;
	vertical-align: middle;
}
/*.gallery*/
.gallery{
	width: 100%;
	display: block;
	min-height: 100vh;
	background-color: #ffffff;
	padding: 100px 0;
}
.gallery .gallery-filter{
	padding: 0 15px;
	width: 100%;
	text-align: center;
	margin-bottom: 40px;
}
.gallery .gallery-filter .filter-item{
	color: black;
	font-size: 17px;
  border: 2px solid #0064CE;
	text-transform: uppercase;
	display: inline-block;
  border-radius: 20px;
  margin-right: 8px;
	cursor: pointer;
  padding: 8px 20px 8px 20px;
	line-height: 1.2;
	transition: all 0.3s ease;
}
.gallery .gallery-filter .filter-item.active{
	color: white;
	border-color : #0064CE;
  background: #0064CE;
}
.gallery .gallery-item{
	width: calc(100% / 3);
	padding: 15px;

}
.gallery .gallery-item-inner img{
	width: 100%;
  border: 3px solid #d4dad9;
}
.gallery .gallery-item.show{
	animation: fadeIn 0.5s ease;
}
@keyframes fadeIn{
	0%{
		opacity: 0;
	}
	100%{
		opacity: 1;
	}
}
.gallery .gallery-item.hide{
	display: none;
}

/*responsive*/
@media(max-width: 491px){
	.gallery .gallery-item{
		width: 50%;
	}
}
@media(max-width: 467px){
    .gallery .gallery-item{
		width: 100%;
	}
	.gallery .gallery-filter .filter-item{
		margin-bottom: 10px;
	}
}

  </style>
</head>
<body>

<section class="gallery">
	<div class="container">
		<div class="row">
			<div class="gallery-filter">
				<span class="filter-item active" data-filter="all">all</span>
				<span class="filter-item" data-filter="23">23rd General Assembly 04242022</span>
				<span class="filter-item" data-filter="24">24th Gen Assembly 2023</span>
				<span class="filter-item" data-filter="21">2021 OCTOBER COOPERATIVE MONTH</span>
        
			</div>
		</div>
		<div class="row">
			<!-- gallery item start -->
      <div class="gallery-item 21">
				<div class="gallery-item-inner">
					<img src="./images/pictures/21-1.jpg" alt="21">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="./images/pictures/24-1.jpg" alt="23">
				</div>
			</div>
    
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="./images/pictures/24-2.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="./images/pictures/24-3.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="./images/pictures/24-4.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="./images/pictures/24-5.jpg" alt="23">
				</div>
			</div>
			<div class="gallery-item 23">
				<div class="gallery-item-inner">
					<img src="./images/pictures/23-1.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 23">
				<div class="gallery-item-inner">
					<img src="./images/pictures/23-2.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 23">
				<div class="gallery-item-inner">
					<img src="./images/pictures/23-3.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="./images/pictures/24-6.jpg" alt="23">
				</div>
			</div>
			<!-- gallery item start -->
	
			<!-- gallery item end -->
		</div>
	</div>
</section>

<script>


 const filterContainer = document.querySelector(".gallery-filter"),
 galleryItems = document.querySelectorAll(".gallery-item");

 filterContainer.addEventListener("click", (event) =>{
   if(event.target.classList.contains("filter-item")){
   	 // deactivate existing active 'filter-item'
   	 filterContainer.querySelector(".active").classList.remove("active");
   	 // activate new 'filter-item'
   	 event.target.classList.add("active");
   	 const filterValue = event.target.getAttribute("data-filter");
   	 galleryItems.forEach((item) =>{
       if(item.classList.contains(filterValue) || filterValue === 'all'){
       	item.classList.remove("hide");
       	 item.classList.add("show");
       }
       else{
       	item.classList.remove("show");
       	item.classList.add("hide");
       }
   	 });
   }
 });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
