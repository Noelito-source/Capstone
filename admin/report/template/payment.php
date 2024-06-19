<?php include('../../admin/database/connection.php');?>
<?php
   $date = $_GET['date'];
   $status = $_GET['status'];
   
   $filtered_payment_ids = [];
   $total_sale = 0;
   $query = "SELECT * FROM payment WHERE status = '$status'";
   if ($status == 'All') {
    $query = "SELECT * FROM payment";
   }
   $result = mysqli_query($sql_con, $query);
   if (mysqli_num_rows($result)) {
     while ($payment = mysqli_fetch_assoc($result)) { 
        if ($date == date('Y-m', strtotime($payment['date']))) {
           array_push($filtered_payment_ids, $payment['id']);
           $total_sale+=$payment['paid_amount'];
        }
     }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Pdf</title>
    <style>
       *{
        font-family: Arial, Helvetica, sans-serif;
       }
        /* body{
           margin-top: 1in;
           margin-bottom: 1in;
           margin-left: 0.5in;
           margin-right: 0.5in;
            
        } */
       #head{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 11;
        padding: 0px;
        margin: 0px;
        text-align: center;
       }
       table{
        border-collapse: collapse;
       }
       td{
        text-align: center;
        padding: 5px 0px 5px 0px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 12;
       }
    
       thead tr td{
        color: white;
        background: #0275d8;
        font-weight: bold;
        border: 1px solid white;
       }
       tbody tr:nth-child(even){
         background: #f2f2f2;
       }
       tbody tr td{
        font-size: 0.8rem;
        border: 1px solid #f2f2f2;
        
       }
       span{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 0px;
        margin: 0px;
        font-size: 12;

       }
      img{
        height: 54px;
        width: 158px;
      }
      .bold{
        font-weight: bold;
      }
      .underline{
        text-decoration: underline;
      }
      .total-sale{
        display: flex;
        justify-content: space-between;
      }
    </style>
</head>
<body>

          
        <div id="titleHeader">
              <h6 id="head" style="font-weight: bold; font-size: 12;">PALANGOY MULTI-PURPOSE COOPERATIVE</h6><br>
              <p id="head">0523 Pisces St. Palangoy Binagnonan, Rizal</p><br>
        </div>
        <br>
        <br>
         <table style="width: 100%;">
            <tr>
                <td style="border-width: 0px !important;text-align: left !important;">
                  <h3>Total collected amount: <?php echo $total_sale?></h3>
                </td>
                <td style="border-width: 0px !important;text-align: right !important;">
                  <h3>Date Covered: <?php echo date('F Y', strtotime($_GET['date']))?></h3>
                </td>
            </tr>
            <tr>
              <td style="border-width: 0px !important;text-align: left !important;background: white !important;">
                 <h3>Status: <?php echo $status?></h3>
              </td>
            </tr>
         </table>
         <table style="width:100%;">
            <thead>
              <tr style="font-weight: bold;">
                 <td>Consumer</td>
                 <td>Mode of payment</td>
                 <td>Paid amount</td>
                 <td>Date</td>
                 <td>Time</td>
               </tr>
            </thead>
            <tbody>
              <?php foreach($filtered_payment_ids as $id):?>
                <?php
                 $query = "SELECT * FROM payment WHERE id = $id";
                 $payment = mysqli_fetch_assoc(mysqli_query($sql_con, $query));  
                 
                 $query = "SELECT * FROM users1 WHERE user_id = ".$payment['user_id'];
                 $user = mysqli_fetch_assoc(mysqli_query($sql_con, $query)); 
                ?>
                 <tr>
                   <td class="text-center"><?php echo $user['fname']. ' ' .$user['lname']?></td>
                   <td class="text-center"><?php echo ucfirst($payment['type'])?></td>
                   <td class="text-center"><?php echo $payment['paid_amount']?></td>
                   <td class="text-center"><?php echo date('F d, Y', strtotime($payment['date']))?></td>
                   <td class="text-center"><?php echo date('g:i A', strtotime($payment['date']))?></td>
                 </tr>
              <?php endforeach;?>
          </tbody>      
         </table>
         
    

        
</body>
</html>