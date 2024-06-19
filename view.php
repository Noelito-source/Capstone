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
<link rel="stylesheet" href="./css/view2.css">

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
        <P  id="etona">310</P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">Present</h2>
        <P id="etona"> 300</P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">CAN</h2>
        <P id="etona1"> PWB0001</P>
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
    <div class="order-list-container">
      <div class="order-list writing">
        <h3 class="tax">Sub Total</h3>
        <h3 class="total">Total</h3>
        <h3 class="thank-you">Thank you</h3>
        <h3 class="ordered-item c">Cubic</h3>
        <h3 class="ordered-item c-price"> &nbsp;&nbsp;&nbsp;&nbsp; 5</h3>
        <h3 class="ordered-item smgf">Cubic Amnt</h3>
        <h3 class="ordered-item smgf-price">  &nbsp;&nbsp;125</h3>
        <h3 class="ordered-item tea">Previous </h3>
        <h3 class="ordered-item tea-price">&nbsp; 600</h3>
        <h3 class="ordered-item relleno"> &nbsp; &nbsp;  Present</h3>
        <h3 class="ordered-item relleno-price">605</h3>
        <h3 class="ordered-item green-ranch">Consumption</h3>
        <h3 class="ordered-item green-price"> &nbsp;&nbsp; 5</h3>
        <h3 class="ordered-item bisc">TN</h3>
        <h3 class="ordered-item bisc-price"> 23818</h3>
        <h3 class="ordered-item tax-writing">&nbsp; <?php echo $i['message'] ?></h3>
        <h2 class="ordered-item total-writing" id="totalnadis"> &nbsp; <?php echo $i['message'] ?></h2>
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
        <h2 class="meta-item-label">Tn</h2>
        <P id="etona"> 23818</P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">Can</h2>
        <P id="etona1"> PWB0001</P> &nbsp;
      </div>
      <div class="meta-item">
        <h2 class="check-number"id="etona" >00001</h2>
      </div>
    </div>
  </div>
</div>
<!-- partial -->

</div>

</body>
</html>
