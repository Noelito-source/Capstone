
<?php include "nav.php" ?>
<?php
if (!isset($_SESSION['unique_id'])) {
  header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/default-skin/default-skin.min.css'><link rel="stylesheet" href="../css/announcee.css">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="../js/ann.js">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head> 
    

    <title>Home</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
  <?php require_once('db.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
    <link rel="stylesheet" href="../css2.0/bootstrap.min.css">
    <link rel="stylesheet" href="../fullcalendar/lib/main.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="../jss/jquery-3.6.0.min.js"></script>
    <script src="../jss/bootstrap.min.js"></script>
    <script src="../fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }
*{
    text-decoration: none;
}
        html,
        body {
            height: 100%;
            width: 100%;
            
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
        #calendar{
            width:1350px;
        }
        
  @media screen and (max-width: 768px) {
    #calendar{
        margin: -54px 5px;
        position: absolute;
        width: 390px;
        height: 570px;
    
    }
 
      #navv{
          display: flex;
          position: -webkit-sticky;
          position: sticky;
          top: 0;
    transform: translateY(33rem);
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
</head><br><br><br>

               
                    <div class="row">
                        <div class="col-md-9">
                            <div id="calendar" ></div>
                        </div>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                    </div>
                </div>
            <!-- Event Details Modal -->
                <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-0">
                            <div class="modal-header rounded-0">
                                <h5 class="modal-title">Schedule Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body rounded-0">
                                <div class="container-fluid">
                                    <dl>
                                        <dt class="text-muted">Title</dt>
                                        <dd id="title" class="fw-bold fs-4"></dd>
                                        <dt class="text-muted">Description</dt>
                                        <dd id="description" class=""></dd>
                                        <dt class="text-muted">Start</dt>
                                        <dd id="start" class=""></dd>
                                        <dt class="text-muted">End</dt>
                                        <dd id="end" class=""></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="modal-footer rounded-0">
                                <div class="text-end">
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                        </div>
                    </div>
                </div>
            <!-- Event Details Modal -->



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

    <?php 
    $schedules = $conn->query("SELECT * FROM `schedule_list`");
    $sched_res = [];
    foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
        $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
        $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
        $sched_res[$row['id']] = $row;
    }
    ?>
    <?php 
    if(isset($conn)) $conn->close();
    ?>
    </body>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <script src="../jss/script.js"></script>
    
    </body>
</html>
</body>
</html>
