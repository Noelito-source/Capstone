<?php include('database/connection.php'); ?>
<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: login.php");
}


if (isset($_GET['notification'])) {
    $notif_id = $_GET['notification'];
    $query = "UPDATE `notifications` SET `status` = 'read' WHERE `id` = $notif_id";
    mysqli_query($sql_con, $query);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="../css/ppppay.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Paybill</title>
</head>

<style>
   *{ 
    font-family: 'Poppins', sans-serif;
  }
  #butt{
    transform: translateY(23rem);
  }
  #myTable{
    margin-left: 6rem;
    width: 80%;
  }
  #search{
    transform: translateY(23rem);
    margin-left: 40rem;
    border: none;
background-color: transparent;
font-size: larger;
  }
#cus{
  transform: translateY(15rem);
  margin-left: 33rem;
}
  #navv{
    display: none;
  }
         .wrapper {
    position: relative;
}
.boxedd{
  display:none ;
}
input {
    padding-left: 48px;
}

.wrapper span {
    position: absolute;
    left: 2px;
}
         @media screen and (max-width: 768px) {
    .table{
      width: 20%;
      margin-left: -0.5rem;
      display: flex;
    }
     #navv{
    display: flex;
  }
     
    #myTable{
      width: 10%;
      display: flex;
    }
 
    #box{
        width: 20rem; 
        margin-left: 4rem; 
display: none;
  
    }
    #txtyellow{
      margin-left: -2rem;
    }
    #ntn{
      margin-left: 10rem;
    }
    .wrapper {
    position: relative;
}

input {
    padding-left: 48px;
}

.wrapper span {
    position: absolute;
    left: 2px;
}
    #butt{
  transform: translateY(25rem);
  margin-left: -15rem;
    }
    #search{
      margin-left: 7.1rem;
border: none;
background-color: transparent;
font-size: larger;
transform: translateY(1rem);


    }
  }

</style>
<body>
<?php $page = 'paybill'?>
<?php include('navigation.php')?>
<div class="main-con container-md my-5 py-5">
  <h1 class="fw-bold text-primary">PAY BILL</h1>
  <div class="main-container border rounded-3 mt-2" style="background:#f2f2f2">
      <div class="nav-rooms d-flex border-bottom">
        <div id="navLatest" user-id="<?php echo $_SESSION['unique_id']?>" class="py-2 px-4 user-select-none border-2 mt-2" style="font-weight:bold;cursor: pointer;">
           Latest Bill
        </div>
      </div>
      <div class="bills-list py-3 mx-1">

      </div>
  </div>

</div>

<script>
  $(document).ready(function(){
      (function(){
        let userId = $('#navLatest').attr('user-id')
         $.ajax({
	        url: 'ajax/billsumm/latest_bill.php',
	        type: 'GET',
          data: {
            userid: userId,
          },
	        success: function(data){
             $('.bills-list').html(data)
	        }
	      })
      })();
   })
 
</script>
 
  
</body>
</html>
 