<?php
                            include('db.php');
                            $query=mysqli_query($conn,"select * from `payment`");
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                  <?php while($row = mysqli_fetch_array($search_result)):?>
                                <tr>
                                <td><?php echo $row['id']; ?></td>
                                    <td>  <img src="../user/pay/upload/<?php echo $row['pp']; ?>" alt="" style="height: 60px; width: 60px; border-radius: 2px 2px"></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
									<td><?php echo $row['ref']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
								
                                         
									<td>
                                     
									 <a rel='facebox' href="paybill.php?id=<?php echo $row['id']; ?>">
											 <button class="edit">
												 <span class='front icon' ><i class="bi bi-receipt"></i></span>
											 </button>
										 </a>
										 <a rel='facebox' href="adshow.php?id=<?php echo $row['id']; ?>">
										
											 <button class="delete">
												 <span class='front icon'><i class="bi bi-eye"></i></span>
											 </button>
										 </a>
									 </td>
                                </tr>
                                <?php endwhile;?>
                                <?php } 
                        mysqli_close($conn)
                        ?>