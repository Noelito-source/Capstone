<?php

include('db.php');

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$password = substr( str_shuffle( $chars ), 0, 5 );

// get page number
if (isset($_GET['page_no']) && $_GET['page_no'] !=="") {
    $page_no = $_GET['page_no'];
}   else{
    $page_no = 1;
}

// total rows of records to display
$total_records_per_page = 10;

// get the page offset for the LIMIT query
$offset = ($page_no - 1) * $total_records_per_page;
// get previous page
$previous_page = $page_no - 1;
// get next page
$next_page = $page_no + 1;

//get the total count of records
$result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM capstone.consumer") or die(mysqli_error($conn));

// total records
$records = mysqli_fetch_array($result_count);

// store total_records to a variable
$total_records = $records['total_records']; 

// get total pages 
$total_no_of_pages = ceil($total_records / $total_records_per_page);

// query string
$sql = "SELECT * FROM capstone.consumer LIMIT $offset , $total_records_per_page";
// result
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palangoy Multi-Purpose Cooperative</title>
    <link rel="stylesheet" href="../css/consumer_list.css">
  
</head>
    <body class="body">
        <!-- Main Header -->


        <h1 class="account_h1">Consumer List</h1>

        <button class="cssbuttons-io-button" id="register-show">
            <span>Add User</span>
        </button>

        <!-- DATA TABLE START -->
        <div class="dataTable">
                <table class="content-table" id="table-data">
                    <thead>
                        <th>Id</th>
                        <th>Consumer Acc No.</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Operator</th>
                    </thead>

                    <tbody>
                        <?php
                            include('../config/config2.php');
                            $query=mysqli_query($conn,"select * from `consumer`");
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['can']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                            
                                    <td class="td_text">
                                        <?php
                                            if($row['status'] == 1){
                                                echo '<a "$status=1" class="btn btn-success"  style="width: 75px">Active</a>';
                                            } else{
                                                echo '<a "$status=0" class="btn btn-danger">Inactive</a>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="../admin/consumer_list_update.php?id=<?php echo $row['id']; ?>">
                                            <button class="view" id="add-show">
                                                <span class='front icon'><i class='bx bx-edit-alt'></i></span>
                                            </button>
                                        </a>    
                                   
                                        <a href="../admin/admin_update/consumer_update.php?id=<?php echo $row['id']; ?>">
                                            <button class="add" id="add-show">
                                                <span class='front icon'><i class='bx bxs-detail' ></i></span>
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

        <!-- Register Modal Start-->
        <div id="register-modal-form">
                <div class="modal-form2">
                    <div class="top-form2">
                        <div class="close-modal-form">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>

                    <div class ="register-form">
                        <h2>Add new account</h2>

                        <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                        ?>

                        <form action="../function/add.php" method="post">
                            <input placeholder="Enter Last Name" type="text" name="lastname" class="input">
                            <input placeholder="Enter First Name" type="text" name="firstname" class="input">
                            <input placeholder="Enter Phone No." type="text" name="phone" class="input">
                            <input placeholder="Enter Email" type="text" name="email" class="input">
                            <input placeholder="Enter Address" type="text" name="address" class="input">
                            <input readonly value="<?php echo "PMPC-"; echo rand(000000, 900000); ?>" name="username" class="input">
                            <input readonly value="<?php echo "$password"; ?>" name="password" class="input">
                            <select class="txtbox_select" name="type">
                                <option value="Boarding House">Boarding House</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Household">Household</option>
                            </select>
                            <input type="hidden" value="1" name="status" class="input">
                            <input type="hidden" value="<?php echo "Consumer"; ?>" name="user_type" class="input">

                            <button type="submit" name="register_consumer" class ="submit-btn-1" onClick="alert('Saved successfully!');">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Register Modal End--> 

        <?php include "../shared/script.php"?>

        <script type="text/javascript">
            $(function() {

            $('#register-show').click(function() {
                $('#register-modal-form').fadeIn().css("display", "flex");
            });

            $('.close-modal-form').click(function() {
                $('#register-modal-form').fadeOut();
            });
            });
        </script>
    </body>
</html>