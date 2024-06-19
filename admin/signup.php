<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
<form method="post">
                            <input required placeholder="Enter Firstname" type="text" name="firstname" class="input">
                            <input required placeholder="Enter Lastname" type="text" name="lastname" class="input">
                            <input required placeholder="Enter Username" type="text" name="username" class="input">
                            <input required placeholder="Enter Can" type="text" name="can" class="input">
                    <select class="form-select" name="gender" id="gndr">
			  	  <option selected value="">--Select Gender--</option>
				  <option value="Male">Male</option>
				  <option value="Female">Female</option>
			  </select>
              <input required placeholder="Enter Email" type="text" name="email" class="input">
                            <input required placeholder="Enter password" type="password" name="password" class="input">
                            <input required placeholder="Retype password" type="password" name="retype_password" class="input">
                            <button type ="submit" name="add" class ="submit-btn">Submit</button>
                        </form>
	
</body>
</html>

<script>
	
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
				alert("Profile created successfully");
				window.location.href = 'login.php';
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
