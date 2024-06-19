<?php include('../database/connection.php')?>
<?php

$query = "SELECT * FROM cubic_charges WHERE id = 1";
$cubic_charges = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
echo json_encode($cubic_charges)
?>