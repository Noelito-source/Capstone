 
<style>
       .logo-pbws, .user-profile{
          width: 40px;
          height: 40px;
          border-radius: 50%;
        }
         .notification-dropdown{
           width: 300px;
           height: 400px;
           overflow-x: hidden;
           overflow-y: auto;
         }
 
         .active{
           padding: 10px 14px 10px 14px;
           border-radius: 50%;
           background: #030bff17;
         }
         /* for responsiveness */
         .menus{
            display: flex;
         }
         .mobile-nav{
            display: none;
            z-index: 3000;
         }
         @media screen and (max-width: 768px) {
            .menus{
              display: none;
            }
            .mobile-nav{
                width: 100%;
                display: block;
                position: fixed;
                bottom: 0;
            }
         }
  </style>
   <nav class="navigation-top fixed-top bg-white  d-flex align-items-center justify-content-between p-2 shadow ">
      <div class="logo d-flex align-items-center">
         <img class="logo-pbws" src="../images/Logo.png" alt="logo">
         <span class="mx-2 text-primary" style=" font-size: 1.25rem;">PBWS</span>
      </div>
      <div class="menu-items d-flex align-items-center">
         <div class="menus align-content-center">
           <a href="users.php" class="nav-link mx-3">
             Home
          </a>
          <a href="gallery.php" class="nav-link mx-3">
            Gallery
          </a>
          <div class="dropdown" type="button">
             <a class="nav-link mx-3" data-bs-toggle="dropdown">
                Billing & Payment
             </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="viewbb.php">Bill Summary</a>
              <div class=" dropdown-divider"></div>
              <a class="dropdown-item" href="billsumm.php">Paybills</a>
              <div class=" dropdown-divider"></div>
              <a class="dropdown-item" href="history.php">History</a>
              <div class=" dropdown-divider"></div>
            </div>
          </div>
           <div class="dropdown">
             <a class="nav-link mx-3" type="button" data-bs-toggle="dropdown">
                Contact Us
             </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="about.php">About Us</a>
              <div class=" dropdown-divider"></div>
              <a class="dropdown-item" href="feedback2.php">Feedback</a>
              <div class=" dropdown-divider"></div>
              <!-- <a class="dropdown-item" href="#">Messages</a> -->
            </div>
          </div>
        </div>
       
        <div class="notification-container d-flex align-items-center mx-3">
         <?php
            $query = "SELECT * FROM users1 WHERE unique_id = ".$_SESSION['unique_id'];
            $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
            $user_id = $user['user_id'];

            $query = "SELECT * FROM `notifications` WHERE user_id = $user_id AND `status` = 'unread' ORDER BY `date` DESC";
            $result = mysqli_query($sql_con, $query);
            $new_notifications = mysqli_num_rows($result);
          ?>
          <div class="dropdown">
             <a class=" nav-link position-relative" id="btnViewNotification" data-bs-toggle="dropdown">
                  <i class="bi bi-bell" style="font-size: 1.8rem"></i>
                  <?php if($new_notifications):?>
                    <span class="badge bg-danger position-absolute top-0 me-2" style="font-size: 0.6rem"><?php echo $new_notifications; ?></span>
                  <?php endif;?>
             </a>
            <div class="dropdown-menu notification-dropdown">
              <?php 
               $query = "SELECT * FROM `notifications` WHERE user_id = $user_id ORDER BY `date` DESC";
               $result = mysqli_query($sql_con, $query);
              ?>
              <h5 class=" dropdown-header">Notifications</h5>
              <?php if(mysqli_num_rows($result)):?>
                <?php while($notification = mysqli_fetch_assoc($result)):?>
                 <?php
                    $href = 'billsumm.php?notification='.$notification['id'];
                    if ($notification['type'] == 'payment') {
                        $id = $notification['source_id'];
                        $query = "SELECT * FROM payment WHERE id = $id";
                        $payment = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
                        $href = "view.php?id=".$payment['id'].'&notification='.$notification['id'];
                    }
                 ?>
                 <a class="dropdown-item" href="<?php echo $href?>" target="_blank">
                   <div id="title" class=" d-flex align-items-center justify-content-between">
                     <small class=" fw-bold">
                        <?php echo ucfirst($notification['type'])?>
                     </small>
                     <div class=" d-flex">
                       <small>
                          <?php echo date('m/d/Y h:i A', strtotime($notification['date'])) ?>
                       </small>
                       <?php if($notification['status'] == 'unread'):?>
                          <div class="ms-1 bg-primary rounded-circle" style="width:10px; height: 10px"></div>
                        <?php endif;?>
                     </div>
                   </div>
                   <small id="message" class="py-2">
                     <?php echo ucfirst($notification['message'])?>
                   </small>
                   <div class=" dropdown-divider"></div>
                 </a>
               <?php endwhile;?>
              <?php else:?>
                 <div class="con h-75 d-flex justify-content-center align-items-center">
                     <div class=" m-auto">
                       <h5 class=" display-1 text-center"><i class="bi bi-bell"></i></h5>
                       <small class=" d-block text-center">No Notifications</small>
                     </div>
                 </div>
              <?php endif;?>
            </div>
          </div>
      </div>
      <div class="dropdown">
          <?php 
            $result = mysqli_query($sql_con, "SELECT * FROM users1 WHERE unique_id = {$_SESSION['unique_id']}");
            $user = mysqli_fetch_assoc($result);
          ?>
           <a class="nav-link" data-bs-toggle="dropdown">
             <img  class="user-profile" src="../admin/php/images/<?php echo $user['img']; ?>" alt="profile">
           </a>
          <div class="dropdown-menu">
            <div href="" class=" dropdown-header ">
               <p class="m-0 p-0 text-center fw-bold" style="font-size: 1.2rem"><?php echo $user['fname']. ' ' .$user['lname']?> </p>  
               <small class=" d-block text-center">Consumer</small>
            </div>
            <div class=" dropdown-divider"></div>
            <a class="dropdown-item" href="account.php">
              <i class="bi bi-person-fill"></i>
              My Profile
            </a>
            <a class="dropdown-item" href="logout.php">
              <i class="bi bi-box-arrow-left"></i>
              Logout
            </a>
          </div>
        </div>
      </div>
 </nav>



 <nav class="mobile-nav navbar navbar-expand-sm bg-white border px-2">
 <div class=" d-flex align-items-center justify-content-between px-2">
   <a rel='facebox' href="billsumm.php"   class="nav-link">
	  <span class="icon-con d-block text-center <?php echo $page == 'paybill' ? 'active':''?>">
		 <ion-icon name="cash-outline" class=" text-primary"></ion-icon>
	  </span>
    <?php if($page == 'paybill'):?>
      <span class="nav-text d-block text-center text-primary" style="font-size: 0.7rem;">PayBill</span>
     <?php endif;?>
   </a>
   <a href="viewbb.php" class="nav-link">
	  <span class="icon-con d-block text-center <?php echo $page == 'billsum' ? 'active':''?>">
        <ion-icon name="newspaper-outline" class=" text-primary"></ion-icon>
	  </span>
    <?php if($page == 'billsum'):?>
      <span class="nav-text d-block text-center text-primary" style="font-size: 0.7rem;">Bills</span>
     <?php endif;?>
    </a>
    <a href="history.php" class="nav-link">
	    <span class="icon-con d-block text-center <?php echo $page == 'history' ? 'active':''?>">
		    <ion-icon name="time-outline" class=" text-primary"></ion-icon>
	    </span>
      <?php if($page == 'history'):?>
        <span class="nav-text d-block text-center text-primary" style="font-size: 0.7rem;">History</span>
      <?php endif;?>
  	</a>
    <a href="users.php" class=" nav-link">
     <span class="icon-con d-block text-center <?php echo $page == 'home' ? 'active':''?>" id="house">
	     <ion-icon name="home-outline" class=" text-primary"></ion-icon>
     </span>
     <?php if($page == 'home'):?>
      <span class="nav-text d-block text-center text-primary" style="font-size: 0.7rem;">Home</span>
     <?php endif;?>
   </a>
   <a href="about.php" class="nav-link">
	  <span class="icon-con d-block text-center <?php echo $page == 'about' ? 'active':''?>">
	    <ion-icon name="alert-circle-outline" class=" text-primary"></ion-icon>
	  </span>
    <?php if($page == 'about'):?>
      <span class="nav-text d-block text-center text-primary" style="font-size: 0.7rem;">About Us</span>
     <?php endif;?>
   </a>
   <a href="gallery.php" class="nav-link">
	  <span class="icon-con d-block text-center <?php echo $page == 'gallery' ? 'active':''?>">
		 <ion-icon name="camera-outline" class=" text-primary"></ion-icon>
	  </span>
    <?php if($page == 'gallery'):?>
      <span class="nav-text d-block text-center text-primary" style="font-size: 0.7rem;">Gallery</span>
     <?php endif;?>
   </a>
    <a href="feedback2.php" class="nav-link">
	    <span class="icon-con d-block text-center <?php echo $page == 'feedback' ? 'active':''?>">
	      <ion-icon name="heart-outline" class=" text-primary"></ion-icon>
	    </span>
      <?php if($page == 'feedback'):?>
        <span class="nav-text d-block text-center text-primary" style="font-size: 0.7rem;">Feedback</span>
      <?php endif;?>
    </a>
  </div>
</nav>