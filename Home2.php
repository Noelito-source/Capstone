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
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/Home2.css">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
</head>
<body>
<!-- partial:index.partial.html -->
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700">
  <!-- Code by Angela Delise  
 https://codepen.io/angeladelise/pen/wvzRNzw?editors=1100 -->

</head>

<body>
  <nav class="nav">
    <ul class="nav__list">
      <li class="nav__listlogo">
        <img src="./images/Logo.png" alt="" height="60px" width="60px" id="lgo1">
        <h5 id="H1WBS">PWBS</h5>
      </li>
      <li class="nav__listitem">Home</li>
      <li class="nav__listitem">Bills & Payment
        <ul class="nav__listitemdrop">
          <li>Bill Summary </li>
          <li>Pay</li>
          <li>History</li>
        </ul>
      </li>
      
      <li class="nav__listitem">Contact Us
        <ul class="nav__listitemdrop">
		<a href="./about.php">  <li>  About</li></a> 
          <li> </a>feedback</li>
        </ul>
      </li>
	  <?php
                $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>
      <li class="nav__listitem">Notification</li>
      <li class="nav__listitem">Gallery</li>
    </ul>
    <div class="action">
      <div class="profile" onclick="menuToggle();">
      <img src="<?=get_image($row['image'])?>" class="img-fluid rounded" style="">
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
                  <a href="./index.php">My Profile</a>
              </li>
              <li>
                  <span class="material-icons icons-size">mode</span>
                  <a href="./profile-edit.php">Edit Account</a>
              </li>
            
              <li>
                  <span class="material-icons icons-size">logout</span>
                  <a href="#">Wallet</a>
              </li>
          </ul>
      </div>
  </div>
 
  </nav>
  <script>
    function menuToggle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
    }
</script>
</body>

<!-- 

-->
<!-- partial -->
  
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
