<?php
include('database/connection.php');
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: login.php");
}
?>
 
 
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodePen - CSS User Profile Card</title>
  <link rel="stylesheet" href="../css/acs.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/a3b45a8e7c.js" crossorigin="anonymous"></script>
</head>
<style>
  #etona{
    width: 100%;
    display: none;
  }
  .password-change-con{
    display: none;
  }
  .alert-msg{
		border: 1px solid #dcfce7;
		border-left: 2px solid #16a34a;
		background: #dcfce7;
	}
  .btn-con button{
    background: linear-gradient(to right,#2E89FF,#2d41c5);
  }
  .error{
    border: 1px solid red !important;
  }
  @media screen and (max-width: 768px) {
    #etona{
      display: block;
    }
  }
</style>
<body>
<!-- partial:index.partial.html -->
<?php include('navigation.php')?>
<?php 
            $sql = mysqli_query($sql_con, "SELECT * FROM users1 WHERE unique_id = {$_SESSION['unique_id']}");
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
              <div class="alert-con d-none">
	  	          <div class="alert-msg my-2 d-flex align-items-center py-2">
		              <i class="bi bi-exclamation-circle-fill px-3" style="font-size: 1.3rem;color: #16a34a;"></i>
		              <h6 class="note m-0 p-0 " style="color: #16a34a;">Edit successfully!</h6>
	              </div>
		         </div>
            <div class="info_data">
                 <div class="data">
                    <h4>Address</h4>
                    <?php
                      $address_details = explode('-', $row['address']);
                    ?>
                    <?php if(count($address_details) == 3):?>
                      <p><?php echo $address_details[0]?></h4></p>
                      <p><?php echo $address_details[1]?></h4></p>
                      <p><?php echo $address_details[2]?></h4></p>
                    <?php else:?>
                      <p><?php echo $address_details[0]?></h4></p>
                      <p><?php echo $address_details[1]?></h4></p>
                    <?php endif?>
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
                    <input type="email" id="email" class="w-100" style="font-size:24px; border:0px; outline:0px;color:#919aa3;" value="<?php echo $row['email']?>" readonly>
                    <small id="errorEmail" class=" text-danger"></small>
                 </div>
            </div>
            <div class="password-change-con mt-2 border-bottom">
               <div class="d-flex justify-content-between">
                 <div class="data w-100 px-2">
                     <h4>Old Password</h4>
                     <input type="password" id="oldPass" class=" form-control rounded-0" style="color:#919aa3;" placeholder="Enter your old password">
                     <small id="errorOldPass" class=" text-danger"></small>
                </div>
                 <div class="data w-100 px-2">
                    <h4>New Password</h4>
                    <input type="password" id="newPass" class=" form-control rounded-0" style="color:#919aa3;" placeholder="Enter your new password">
                    <small id="errorNewPass" class=" text-danger"></small>
                 </div>
               </div>
                 <div class="btn-con my-1 text-end">
                     <button type="button" id="btnSubmit" class=" btn text-white ">
                       <ion-icon name="save-outline" style="width:20px;height:20px"></ion-icon>
                     </button>
                 </div>
            </div>
        </div>
        <div class="social_media">
            <ul>
              <li>
                 <a href="users.php">
                   <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"  color= "white"fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                       <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                     </svg>
                   </div>
                 </a>
              </li>
              <li> 
                <a id="btnEdit" style="cursor:pointer;"> 
                  <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16"  color= "white"height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </div>
                </a>
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
<script>
  function validate(error){
        $('#email').removeClass('error')
        $('#errorEmail').text('')
        $('#oldPass').removeClass('error')
        $('#errorOldPass').text('')
        $('#newPass').removeClass('error')
        $('#errorNewPass').text('')
      if (error.length) {
         error.forEach(val => {
            if (val == 'email') {
               $('#errorEmail').text('Invalid Email')
               $('#email').addClass('error')
            }
            if (val == 'oldpassword') {
              console.log('pold')
               $('#errorOldPass').text('Incorrect Password')
               $('#oldPass').addClass('error')
            }
            if (val == 'newpassword') {
               $('#errorNewPass').text('Input your new Password')
               $('#newPass').addClass('error')
            }
         });
      }else{
        $('#oldPass').val('')
        $('#newPass').val('')
        $('.alert-con').removeClass('d-none')
        setTimeout(() => {
          $('.alert-con').addClass('d-none')
        }, 3000);
      }
  }
 
  $(document).ready(function(){
     $('#btnEdit').click(function(){
        $('.password-change-con').slideToggle()
        if (document.querySelector('#email').getAttribute('style') != '') {
          $('#email').attr('style', '')
          $('#email').removeAttr('readonly')
          $('#email').addClass('form-control rounded-0')
        }else{
          $('#email').attr('style', 'font-size:24px; border:0px; outline:0px;color:#919aa3;')
          $('#email').attr('readonly', '')
          $('#email').removeClass('form-control rounded-0')
        }
     })

     $('#btnSubmit').click(function(){
        const newEmail = $('#email').val()
        const oldPass = $('#oldPass').val()
        const newPass = $('#newPass').val()
        $.ajax({
		       url: 'ajax/account/edit_account.php',
		       type: 'POST',
           data: {
			  	   email: newEmail,
             oldpass: oldPass,
             newpass: newPass
			     },
		       success: function(data){
               validate(JSON.parse(data))
		       }
	      })
      })
     
  })
</script>
<script>
  const buttons = document.querySelectorAll(".card-buttons button");
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
  });
</script>
</body>
</html>
