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
  <title>CodePen - Grid Experiment No. 6</title>
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
        <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label" 2>Previous</h2>
        <P  id="pre">310</P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">Present</h2>
        <P id="pre"> 300</P>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">CAN</h2>
        <P id="pro"> PWB0001</P>
      </div>
      <div class="meta-item">
        <h2 class="check-number">00001</h2>
      </div>
    </div>
    <h3 class="item-types">
      appt-soup/sal-entree-veg/pot-dessert-bev
    </h3>
    <div class="order-list-container">
      <div class="order-list writing">
        <h3 class="tax">Tax</h3>
        <h3 class="total">Total</h3>
        <h3 class="thank-you">Thank you</h3>
        <h3 class="ordered-item c">C</h3>
        <h3 class="ordered-item c-price">2.99</h3>
        <h3 class="ordered-item smgf">sm gf</h3>
        <h3 class="ordered-item smgf-price">2.19</h3>
        <h3 class="ordered-item tea">tea</h3>
        <h3 class="ordered-item tea-price">3.09</h3>
        <h3 class="ordered-item relleno">1 relleno</h3>
        <h3 class="ordered-item relleno-price">12.75</h3>
        <h3 class="ordered-item green-ranch">1 green ranch</h3>
        <h3 class="ordered-item green-price">11.35</h3>
        <h3 class="ordered-item bisc">bisc</h3>
        <h3 class="ordered-item bisc-price">2.99</h3>
        <h3 class="ordered-item tax-writing"><?php echo $i['message'] ?></h3>
        <h3 class="ordered-item total-writing"> <?php echo $i['message'] ?></h3>
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
      <h4 class="small-caps">GuestCheck™</h4>
      <h4>nationalchecking.com</h4>
      <h4 class="small-caps usa">made in PALANGOY</h4>
    </div>
    <div class="perforation"></div>
    <h4 class="guest-receipt">Guest Receipt</h4>
    <div class="guest-receipt-meta">
      <div class="meta-item">
        <h2 class="meta-item-label" h2>Date</h2>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">Amount</h2>
      </div>
      <div class="meta-item">
        <h2 class="meta-item-label">Guests</h2>
      </div>
      <div class="meta-item">
        <h2 class="check-number">46126</h2>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  
</body>
</html>
