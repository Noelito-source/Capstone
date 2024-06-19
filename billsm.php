<?php

include('config2.php');



$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

$result = mysqli_query($conn,"SELECT * FROM bill where owners_id='$id'");

while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons=$pres - $prev;
   $add6= 2;
   $add7= 4;
   $add8= 6;
   $add9= 8;
   $add10= 10;
   $add11= 14;
   $add12= 18;
   $add13= 22;
   $add14= 26;
   $add15= 30;
   $add16= 34;
   $add17= 38;
   $add18= 42;
   $add19= 46;
   $add20= 50;
   $add21= 56;
   $add22= 62;
   $add23= 68;
   $add24= 74;
   $add25= 80;
   $add26= 86;
   $add27= 92;
   $add28= 98;
   $add29= 104;
   $add30= 110;
   $add31= 118;
   $add32= 126;
   $add33= 134;
   $add34= 142;
   $add35= 150;
   $add36= 158;
   $add37= 166;
   $add38= 174;
   $add39= 182;
   $add40= 190;
   $add41= 201;
   $add42= 212;
    if(($totalcons == 1 >5 )|| ($totalcons == 1 <5  )){
$bill= (int)$totalcons  * (int)$price;
    }
 if($totalcons == 6 ){
       $bill= (int)$totalcons  * (int)$price + $add6;
    }
    if($totalcons == 7){
      $bill= (int)$totalcons  * (int)$price + $add7;
   }
   if($totalcons == 8){
    $bill= (int)$totalcons  * (int)$price + $add8;
 }
 if($totalcons == 9){
  $bill= (int)$totalcons  * (int)$price + $add9;
}
if($totalcons == 10){
  $bill= (int)$totalcons  * (int)$price + $add10;
}
if($totalcons == 11){
  $bill= (int)$totalcons  * (int)$price + $add11;
}
if($totalcons == 12){
  $bill= (int)$totalcons  * (int)$price + $add12;
}
if($totalcons == 13){
  $bill= (int)$totalcons  * (int)$price + $add13;
}
if($totalcons == 14){
  $bill= (int)$totalcons  * (int)$price + $add14;
  
}
if($totalcons == 15){
  $bill= (int)$totalcons  * (int)$price + $add15;
  
}
if($totalcons == 16){
  $bill= (int)$totalcons  * (int)$price + $add16;
  
}
if($totalcons == 17){
  $bill= (int)$totalcons  * (int)$price + $add17;
  
}
if($totalcons == 18){
  $bill= (int)$totalcons  * (int)$price + $add18;
  
}
if($totalcons == 19){
  $bill= (int)$totalcons  * (int)$price + $add19;
  
}
if($totalcons == 20){
  $bill= (int)$totalcons  * (int)$price + $add20;
  
}
if($totalcons == 21){
  $bill= (int)$totalcons  * (int)$price + $add21;
  
}
if($totalcons == 22){
  $bill= (int)$totalcons  * (int)$price + $add22;
  
}
if($totalcons == 23){
  $bill= (int)$totalcons  * (int)$price + $add23;
  
}
if($totalcons == 24){
  $bill= (int)$totalcons  * (int)$price + $add24;
  
}
if($totalcons == 25){
  $bill= (int)$totalcons  * (int)$price + $add25;
  
}
if($totalcons == 26){
  $bill= (int)$totalcons  * (int)$price + $add26;
  
}
if($totalcons == 27){
  $bill= (int)$totalcons  * (int)$price + $add27;
  
}
if($totalcons == 28){
  $bill= (int)$totalcons  * (int)$price + $add28;
  
}
if($totalcons == 29){
  $bill= (int)$totalcons  * (int)$price + $add29;
  
}
if($totalcons == 30){
  $bill= (int)$totalcons  * (int)$price + $add30;
  
}
if($totalcons == 31){
  $bill= (int)$totalcons  * (int)$price + $add31;
  
}
if($totalcons == 32){
  $bill= (int)$totalcons  * (int)$price + $add32;
  
}
if($totalcons == 33){
  $bill= (int)$totalcons  * (int)$price + $add33;
  
}
if($totalcons == 34){
  $bill= (int)$totalcons  * (int)$price + $add34;
  
}
if($totalcons == 35){
  $bill= (int)$totalcons  * (int)$price + $add35;
  
}
if($totalcons == 36){
  $bill= (int)$totalcons  * (int)$price + $add36;
  
}
if($totalcons == 37){
  $bill= (int)$totalcons  * (int)$price + $add37;
  
}
if($totalcons == 38){
  $bill= (int)$totalcons  * (int)$price + $add38;
  
}
if($totalcons == 39){
  $bill= (int)$totalcons  * (int)$price + $add39;
  
}
if($totalcons ==  40){
  $bill= (int)$totalcons  * (int)$price + $add40;
  
}
if($totalcons == 41){
  $bill= (int)$totalcons  * (int)$price + $add41;
  
      }
      if($totalcons == 42){
        $bill= (int)$totalcons  * (int)$price + $add42;
        
            }
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Palangoy Multi-Purpose Cooperative</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./css/billsm.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- ANIMATION -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"crossorigin="anonymous"></script>
</head>
    <body>
        <!-- NAVBAR START -->
        <div class="sidebar">
            <div class="logo_content">
                <div class="logo">
                    <img src="Logo.png">
                    <div class="logo_name">Palangoy Multi-Purpose <br>Cooperative</div>
                </div>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="home.html">
                          <i class='bx bx-grid-alt'></i>
                          <span class="links_name">Dashboard</span>
                      </a>
                </li>
                <li>
                    <a href="admins.php">
                          <i class='bx bx-user'></i>
                          <span class="links_name">Admins</span>
                      </a>
                </li>
                <li>
                    <a href="advisory.php">
                          <i class='bx bx-error'></i>
                          <span class="links_name">Advisory</span>
                      </a>
                </li>
                <li>
                    <a href="billingsum.php">
                          <i class='bx bx-list-ol'></i>
                          <span class="links_name">Bill Summary</span>
                      </a>
                </li>
                <li>
                    <a href="feedback.php">
                          <i class='bx bxs-user-detail' id="consa"></i>
                          <span class="links_name" id="consbg">Consumer List</span>
                      </a>
                </li>
                <li>
                    <a href="feedback.php">
                          <i class='bx bxs-user-detail' ></i>
                          <span class="links_name">Feedback</span>
                      </a>
                </li>
                <li>
                    <a href="audit_trail.html">
                          <i class='bx bx-history'></i>
                          <span class="links_name">Audit Trail</span>
                      </a>
                </li>
                
                <li>
                    <a href="#">
                          <i class='bx bx-cog'></i>
                          <span class="links_name">Settings</span>
                      </a>
                </li>
            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <img src="kengkot2.jpeg">
                        <div class="name_job">
                            <div class="name">PMPC</div>
                            <div class="job">Cooperative</div>
                        </div>
                    </div>
                    <a href="logout.php" class="btn"><i class='bx bx-log-out' id="log_out"></i></a>
                </div>
            </div>
        </div>
        <!-- NAVBAR END -->

        <!-- Modal ADD START -->
        <section class="admins">
            <button class="add" id="add-show">
                    <span class='shadow_add'></span>
                    <span class='edge_add'></span>
                    <span class='front_add icon'><i class='bx bxs-user-plus'></i></span>
            </button>

            <h1>ADMINS/STAFF</h1>

            <?php
                if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
            ?>

            <div id="add-modal-form">
                <div class="modal-form">
                    <div class="top-form">
                        <div class="close-modal-form">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>

                    <div class ="add-form">
                        <h2>Add new account</h2>

                        <form class="form" method="POST" action="add_account.php">
                            <input required placeholder="Enter username" type="text" name="username" class="input">
                            <input required placeholder="Enter email" type="email" name="email" class="input">
                            <input required placeholder="Enter password" type="password" name="password" class="input">
                            <select required type="text" name="user_type" class="input input--2" value="<?php echo $row['user_type']; ?>">
								<option value="user">User</option>
								<option value="admin">Admin</option>
                            </select>

                            <button type ="submit" name="add" class ="submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(function() {

                $('#add-show').click(function() {
                    $('#add-modal-form').fadeIn().css("display", "flex");
                });

                $('.close-modal-form').click(function() {
                    $('#add-modal-form').fadeOut();
                });
                });
            </script>
        <!-- MODAL ADD END -->

        <!-- DATA TABLE START -->
        <div class="dataTable">
                <table class="content-table" id="table-data">
                    <thead>
                        <th>Id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Password</th>
                        <th>User_type</th>
                        <th>Operator</th>
                    </thead>

                    <tbody>
                        <?php
                            include('config2.php');
                            $query=mysqli_query($conn,"select * from `bill`");
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['can']; ?></td>
                                    
                                    <td>
                                        <a href="edit_account.php?id=<?php echo $row['id']; ?>">
                                            <button class="edit">
                                                <span class='front icon'><i class='bx bx-edit-alt'></i></span>
                                            </button>
                                        </a>

                                        <a href="delete.php?id=<?php echo $row['id']; ?>">
                                            <button class="delete">
                                                <span class='front icon'><i class='bx bxs-trash'></i></span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } 
                        mysqli_close($conn)
                        ?>
                    </tbody>
                </table>
            </div>
        <!-- DATA TABLE END -->

        <!-- PAGINATION START -->
        <nav aria-label="...">
                    <ul class="pagination">

                        <li class="page-item"><a class="page-link <?= ($page_no <= 1) ?
                        'disabled' : ''; ?> " <?= ($page_no > 1) ? 'href=?page_no=' .
                        $previous_page : ''; ?>>Previous</a></li>


                            <?php for($counter = 1; $counter <= $total_no_of_pages; $counter++) { ?>

                                <?php if ($page_no !== $counter){?>
                                <li class="page-item"><a class="page-link" href="?page_no=<?=$counter; ?>"><?=$counter; ?></a></li>
                                <?php } else { ?>
                                    <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                                <?php } ?>
                            <?php } ?>
                                
                        <li class="page-item"><a class="page-link <?= 
                        ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" <?= ($page_no < $total_no_of_pages) ? 'href=?page_no=' . $next_page : ''; ?> >Next</a></li>
                    </ul>
                </nav>
                <div class="p-10">
                    <strong>Page <?= $page_no; ?> of <?= $total_no_of_pages; ?></strong> 
                </div>
        <!-- PAGINATION END -->
        </section>
    </body>     
</html>