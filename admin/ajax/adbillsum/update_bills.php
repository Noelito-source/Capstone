<?php include('../../database/connection.php');?>
<?php 
 $bills_id_list = explode(',', $_POST['billIds']);
 foreach ($bills_id_list as $bill_id) {
    $bill_id = (int)$bill_id;
    $query = "UPDATE bill SET status = 'Paid' WHERE id = $bill_id";
    mysqli_query($sql_con, $query);
 }
?>