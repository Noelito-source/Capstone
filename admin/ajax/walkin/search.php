<?php include('../../database/connection.php');?>
<?php
  $q = $_GET['search'];
  $query = "SELECT * FROM users1 WHERE fname LIKE '%$q%' OR lname LIKE '%$q%' OR unique_id LIKE '%$q%'";
  $result = mysqli_query($sql_con, $query);
?>
    <?php if(mysqli_num_rows($result)):?>
         <?php while($consumer = mysqli_fetch_assoc($result)): ?>
             <div class="col-2">
                <div class="consumerProfile rounded-3 pt-2" consumer-id="<?php echo $consumer['user_id']?>"> 
                  <div class=" image-con d-flex justify-content-center mb-2">
		   	            <div class="image-border border-primary p-1">
		                  <img id="consumerImage" src="php/images/<?php echo $consumer['img']?>" alt="">
		                </div>
			             </div>
                   <h6 class="text-center m-0 p-0" style="color: #1D2D44;font-weight:bold;"><?php echo $consumer['unique_id']?></h6>
                   <small class=" d-block text-center"><?php echo $consumer['fname']. ' ' .$consumer['lname']?></small>
                 </div>
              </div>
           <?php endwhile;?>
    <?php else:?>
        <div class="col-12">
            <small class="d-block py-5 text-center text-secondary">Consumer does not exist</small>
         </div>
    <?php endif;?>
<script>
    $('.consumerProfile').click(function(){
     $('#btnSelectConsumer').removeAttr('disabled');
     $('.consumerProfile').removeClass('selected')
     $('#consumerid').val($(this).attr('consumer-id'))
     $(this).addClass('selected')
  })
</script>