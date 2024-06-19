<?php 

	require 'functions.php';

	if(!is_logged_in())
	{
		redirect('login.php');
	}

	$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

	$row = db_query("select * from users where id = :id limit 1",['id'=>$id]);

	if($row)
	{
		$row = $row[0];
	}

?>


	<?php if(!empty($row)):?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="./css/Home1.css">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
   
    <title>Document</title>
</head>
<body>
 
  <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="https://flowbite.com/" class="flex items-center">
        <img src="../Login/images/Logo.png" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-blue-600">PWBS</span>
    </a>
    <div class="flex md:order-2">
        
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 mx-8" id="navbar-sticky">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 ml-11">
        <li>
          <a href="../Home/index.html" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white text-base mx-8 " aria-current="page" >Home</a>
        </li>
        <li>

        </li>
        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent text-base">Bills & Payment <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-base">Pay Bills</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-base">View Bills</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white  md:text-blue-700text-base ">History</a>
                  </li>
                </ul>
               
            </div>
        </li>
        <li>
          <a href="../notification/notif.html" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-base">Notification</a>
        </li>
        <li>
          <a href="../ContactUs/contact.html" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-base">Contact Us</a>
        </li>
        <li>
          <a href="../Gallery/index.html" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-base" >Gallery</a>
        </li>
        <div class="action">
				  <div class="profile" onclick="menuToggle();">
          <img src="<?=get_image($row['image'])?>" class="img-fluid rounded" style="">
				  </div>
		  
				  <div class="menu">
					  <h3>
						  Noelito Rivera
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
							  <span class="material-icons icons-size" id="logoutnathis">logout</span>
							  <a href="#">Logout</a>
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

				
				  </div>
      </ul>
    </div>
    </div>

  </nav>
  

  <img src="../Login/images/pfp.png" alt="" width="90" height="90" class="rounded-circle" id="image1" ></div>
  <h1 id="name1"> Hi, Noelito Rivera</h1>
  <h3 id="welcome">Welcome to PWBS!</h3>
  <p id="log">Your last log-in was on  Jan 26, 2023, 11:03:00 AM</p>
  <br><br><br><br>
  <hr style="height:2px;border-width:0;color:rgb(26, 29, 212);background-color:rgb(26, 29, 212)">
<br>
<div class="boxed">
  <h5 id="txtyellow"> To engage better with PWBS, please complete your profile information under
  
      <p id="p_circle">
      
          <a href="../Profile/edit.profile">
        My Profile
              <svg viewBox="0 0 70 36">
                  <path d="M6.9739 30.8153H63.0244C65.5269 30.8152 75.5358 -3.68471 35.4998 2.81531C-16.1598 11.2025 0.894099 33.9766 26.9922 34.3153C104.062 35.3153 54.5169 -6.68469 23.489 9.31527" />
              </svg>
          </a>
      
      </p>
  </div>
<br><br><br><br><br><br>
<div class="card">
  <a href="../History/index.html">
  <img src="../Login/images/history-removebg-preview.png" alt="" height="120px" width="120px" id="img1">
<h3 id="h3_history">HISTORY</h3>
</a>
</div>
<br>
<div class="card ">
  <a href="../Profile/user.html">
  <img src="../Login/images/USERPFP.png" alt="" height="120px" width="120px" id="img1">
  <h3 id="h3_acc">ACCOUNT</h3>
</a>
</div>
<br>
<div class="card1">
  <a href="../Billing Summary/index.html">
  <img src="../Login/images/Summary.png" alt="" height="120px" width="120px" id="img1">
  <h3 id="h3_sum">BILL SUMMARY</h3>
</a>
</div>
<br>
<div class="card1">
  <a href="../Announcement/"></a>
  <img src="../Login/images/Announcement.png" alt="" height="150px" width="150px" id="img1">
  <h3 id="h3_ann">ANNOUNCEMENT</h3>
</div>
<div class="card2">
  <a href="../Payment/pay.html">
  <img src="../Login/images/pay bills (1).png" alt="" height="120px" width="120px" id="img1">
  <h3 id="h3_paybills">PAY BILLS</h3>
</a>
</div>
<br>
<div class="card2">
  <a href="../notification/notif.html">
  <img src="../notif1.png" alt="" height="120px" width="120px" id="img1">
  <h3 id="h3_notif">NOTIFICATION</h3>
</a>
</div>
<br><br><br><br>
<h4 id="can">CUSTOMER ACCOUNT NUMBER</h4>
<br>
<h1 id="cannum"> <b> 109284093 </b></h1>
<br>
<br>
<h4 id="tad">TOTAL AMOUNT DUE:</h4>
<br>
<h1 id="tadprice"> <b> ₱ 534.00 </b></h1>
<br>
<h5 id="h5due">DUE DATE: </h5> <h5 id="h5due_num">2022-12-06</h5>

<button class="c-button c-button--gooey"  onclick=""> <a href="../Payment/pay.html"> Pay Now</a>

  <div class="c-button__blobs">
  <div></div>
  <div></div>
  <div></div>
  </div>
</button>
<svg style="display: block; height: 0; width: 0;" version="1.1" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <filter id="goo">
      <feGaussianBlur result="blur" stdDeviation="10" in="SourceGraphic"></feGaussianBlur>
      <feColorMatrix result="goo" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" mode="matrix" in="blur"></feColorMatrix>
      <feBlend in2="goo" in="SourceGraphic"></feBlend>
    </filter>
  </defs>
</svg>
<h3 id="h1consum">Consumption Report</h3>
<hr style="height:4px;border-width:200%; width: 20%; margin-left: 10rem; color:rgb(26, 29, 212);background-color:rgb(26, 29, 212)" id="hrconsum">
<h3 id="h1ann">Latest Announcment</h3>
<hr style="height:4px;border-width:200%; width: 20%; margin-left: 50rem; color:rgb(26, 29, 212);background-color:rgb(26, 29, 212)" id="hrann">

<div id="chart">
</div>
<div class="announcement">
  <img src="../Login/images/water-interruption (2).png" alt="">
  <h3>Date: Febuary 20, 2023 </h3>
  <h3>Time: 8am-3pm </h3>
  <button class="c-button c-button--gooey"> <a href="../Announcement/annonce.html"> More</a>
    <div class="c-button__blobs">
    <div></div>
    <div></div>
    <div></div>
    </div>
  </button>
</div>
<div class="consump"> <button class="c-button c-button--gooey">  <a href="../Consumption Report/consumption.html"> More</a>
  <div class="c-button__blobs">
  <div></div>
  <div></div>
  <div></div>
  </div>
</button></div>

<div class="vl"></div>
<section class="footer" id="foot1">
  <h1>Thank you for using PMPC</h1>
  <p>You may follow us on our social media</p>

  <div class="wrapper">
      <a href="#">
          <li class="icon facebook">
              <span class="tooltip">Facebook</span>
              <span><i class='bx bxl-facebook'></i></span>
          </li>
      </a>

      <a href="#">
          <li class="icon twitter">
              <span class="tooltip">Twitter</span>
              <span><i class='bx bxl-twitter'></i></span>
          </li>
      </a>
      
      <a href="#">
          <li class="icon instagram">
              <span class="tooltip">Instagram</span>
              <span><i class='bx bxl-instagram-alt'></i></span>
          </li>
      </a>

      <a href="#">
          <li class="icon gmail">
              <span class="tooltip">Gmail</span>
              <span><i class='bx bxl-gmail' ></i></span>
          </li>
      </a>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            setTimeout(function(){
                $('.loader-bg').fadeToggle();
            }, 1500);
        </script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./js/Home1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>



</html>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            setTimeout(function(){
                $('.loader-bg').fadeToggle();
            }, 1500);
        </script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="home.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>



</html>

<?php else:?>
		<div class="text-center alert alert-danger">That profile was not found</div>
		<a href="index.php">
			<button class="btn btn-primary m-4">Home</button>
		</a>
	<?php endif;?>

</body>
</html>

<script>

	var image_added = false;

	function display_image(file)
	{
		var img = document.querySelector(".js-image");
		img.src = URL.createObjectURL(file);

		image_added = true;
	}
 
	var myaction  = 
	{
		collect_data: function(e, data_type)
		{
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input, form select");
			let myform = new FormData();
			myform.append('data_type',data_type);

			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

			if(image_added)
			{
				myform.append('image',document.querySelector('.js-image-input').files[0]);
			}

			myaction.send_data(myform);
		},

		send_data: function (form)
		{

			var ajax = new XMLHttpRequest();

			document.querySelector(".progress").classList.remove("d-none");

			//reset the prog bar
			document.querySelector(".progress-bar").style.width = "0%";
			document.querySelector(".progress-bar").innerHTML = "Working... 0%";

			ajax.addEventListener('readystatechange', function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{
						//all good
						myaction.handle_result(ajax.responseText);
					}else{
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			ajax.upload.addEventListener('progress', function(e){

				let percent = Math.round((e.loaded / e.total) * 100);
				document.querySelector(".progress-bar").style.width = percent + "%";
				document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
			});

			ajax.open('post','ajax.php', true);
			ajax.send(form);
		},

		handle_result: function (result)
		{
			console.log(result);
			var obj = JSON.parse(result);
			if(obj.success)
			{
				alert("Profile edited successfully");
				window.location.reload();
			}else{

				//show errors
				let error_inputs = document.querySelectorAll(".js-error");

				//empty all errors
				for (var i = 0; i < error_inputs.length; i++) {
					error_inputs[i].innerHTML = "";
				}

				//display errors
				for(key in obj.errors)
				{
					document.querySelector(".js-error-"+key).innerHTML = obj.errors[key];
				}
			}
		}
	};

</script>
