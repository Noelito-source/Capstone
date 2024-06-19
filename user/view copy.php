<?php include('database/connection.php'); ?>
<?php
    
    include("functions2.php");

    $id = $_GET['id'];

    $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `notifications` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>notifications</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../css/view2.css">

</head>
<body>
<!-- partial:index.partial.html -->
<link href="https://fonts.googleapis.com/css?family=Homemade+Apple|Old+Standard+TT:700|Share+Tech+Mono" rel="stylesheet">
<div class="background">
  <div class="check">
    <h1>PWBS™</h1>
    <div class="meta">
      <div class="meta-item">
        <h2 class="meta-item-label" h2>Date </h2>
        <small ><i id="etona"><?php echo date('F j, Y ') ?></i></small>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label" 2>Previous</h2>
        <P  id="etona"></P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">Present</h2>
        <P id="etona"> </P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">CAN</h2>
        <P id="etona1"> 1462956612</P>
      </div>
      <div class="meta-item">
        <h2 class="check-number" >00001</h2>
      </div>
    </div>
    <h3 class="item-types">
    #55 B Kasibulan St. Brgy, Palangoy, Binangonan, Rizal

CDA Reg. No. 9520-0446714 * CIN 010904001

Reg. TIN: 219-810-073-000- Exempt
    </h3>
    <h3 class="item-types">
    OFFICIAL RECEIPT
    </h3>
    <!---
    <h1>Computation</h1>
    <p>Current Charges:   &nbsp; &nbsp;   &nbsp;   &nbsp;  &nbsp;   &nbsp; &nbsp;      per cubic meter
 <h2>1st     5 cu.m (min)       &nbsp;       125.00          = ₱<br>

    2nd   10 cu.m (6-10)           27.00   x      = ₱ <br>
    
    3rd    10 cu.m (11-20)         29.00   x      = ₱<br>
    
    4th    10 cu.m (21-30)         31.00   x      = ₱<br>
    
    5th    10 cu.m (31-40)         33.00   x      = ₱<br>
    
    Succeeding cu.m                36.00   x      = ₱</h2>
</p>
  -->
    <div class="order-list-container">
      <div class="order-list writing">
        <h3 class="tax">Sub Total</h3>
        <h3 class="total">Total</h3>

        <h3 class="ordered-item c">Computation</h3>
        <h3 class="ordered-item c-price"> </h3>
        
      
        <h3 class="ordered-item tax-writing"  style="transform:translateY(-1.2rem);">&nbsp; <?php echo $i['message'] ?></h3>
        <h2 class="ordered-item total-writing" id="totalnadis" style="transform:translateY(-1.2rem);"> &nbsp; <?php echo $i['message'] ?></h2>
      </div>
      <div class="order-list grid-lines">
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item">Current Charges:   per cubic meter</div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item">1st     5 cu.m (min)         125.00          </div>
        <div class="grid-item"> = ₱</div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item">2nd   10 cu.m (6-10)    27.00   x   </div>
        <div class="grid-item">= ₱</div>
        <div class="grid-item"></div>
        <div class="grid-item"> </div>
        <div class="grid-item">  3rd    10 cu.m (11-20)  29.00   x     </div>
        <div class="grid-item"> = ₱</div>
        <div class="grid-item">   </div>
        <div class="grid-item"> </div>
        <div class="grid-item">  4th    10 cu.m (21-30) 31.00   x    </div>
        <div class="grid-item">  = ₱ </div>
        <div class="grid-item"> </div>
        <div class="grid-item"></div>
        <div class="grid-item"> 5th    10 cu.m (31-40)  33.00   x  </div>
        <div class="grid-item">= ₱</div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
      </div>

    </div>
    <div class="company-info">
      <h4>525</h4>
      <h4 class="small-caps">PWBSRECEIPT™</h4>
      <h4>Pwbs@gmail.com</h4>
      <h4 class="small-caps usa">made in PALANGOY</h4>
    </div>
    <div class="perforation"></div>
    <h4 class="guest-receipt">Consumer Receipt</h4>
    <div class="guest-receipt-meta">
      <div class="meta-item">
        <h2 class="meta-item-label" h2>Date</h2>
        <small ><i id="smol"><?php echo date('F j, Y ') ?></i></small>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label"></h2>
        <P id="etona"> </P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">Can</h2>
        1462956612 &nbsp;
      </div>
      <div class="meta-item">
        <h2 class="check-number"id="etona" >00001</h2>
      </div>
    </div>
  </div>
</div>
<!-- partial -->

</div>
<CENTER><form><input type="button" onclick="window.print()" value="Print page" /></form><a href="users.php">Back</a></CENTER>
</body>
</html>
