<h1>Notifications</h1>

<?php
    
    include("nttf.php");

    $id = $_GET['id'];

    $query ="UPDATE `payment` SET `stat` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `payment` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='like'){
                echo ucfirst($i['name'])." liked your post. <br/>".$i['date'];
            }else{
                echo "New Payment.<br/>".$i['message'];
            }
        }
    }
    
?><br/>
<a href="index.php">Back</a>