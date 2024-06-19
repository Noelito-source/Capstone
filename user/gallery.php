<?php include('database/connection.php')?>
<?php session_start()?>
<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/default-skin/default-skin.min.css'><link rel="stylesheet" href="../css/Gal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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
 
<?php $page = 'gallery'?>
<?php include('navigation.php')?>

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
					<img src="../images/pictures/21-1.jpg" alt="21">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="../images/pictures/24-1.jpg" alt="23">
				</div>
			</div>
    
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="../images/pictures/24-2.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="../images/pictures/24-3.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="../images/pictures/24-4.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="../images/pictures/24-5.jpg" alt="23">
				</div>
			</div>
			<div class="gallery-item 23">
				<div class="gallery-item-inner">
					<img src="../images/pictures/23-1.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 23">
				<div class="gallery-item-inner">
					<img src="../images/pictures/23-2.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 23">
				<div class="gallery-item-inner">
					<img src="../images/pictures/23-3.jpg" alt="23">
				</div>
			</div>
      <div class="gallery-item 24">
				<div class="gallery-item-inner">
					<img src="../images/pictures/24-6.jpg" alt="23">
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
 
</body>
</html>
