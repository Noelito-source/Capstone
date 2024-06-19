<?php

@include '../config/config.php';
$sql = "DELETE FROM account WHERE id='" . $_GET["id"] . "'";
if(mysqli_query($conn,$sql)) {
    header('location: ../view/account.php');
    echo "Record deleted";
}
else{
    echo "Error deleting: ". mysqli_error($conn);
}

mysqli_close($conn);

?>