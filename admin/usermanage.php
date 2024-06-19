<div id="register-modal-form">
                <div class="modal-form">
                    <div class="top-form">
                        <div class="close-modal-form">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>
                        <main>
                            <div class="container registration">
                                <div class="title">
                                    <h1>Registration Form</h1>
                                </div>

                                <div class="container-wrapper">
                                    <form action="add.php" method="post" class="frmRegister">
                                        <div class="register">
                                            <input type="text" class="txtbox1" name="lastname" placeholder="Enter Last Name" required>
                                            <input type="text" class="txtbox1" name="firstname" placeholder="Enter First Name" required>
                                        </div>
                                            <input type="text" class="txtbox" name="email" placeholder="Enter Email" required>
                                            <input type="text" class="txtbox" name="address" placeholder="Enter Address" required>
                                            <input type="text" class="txtbox" name="phone" placeholder="Enter Phone" required>
                                            <input type="text" class="txtbox" name="username" placeholder="Enter Username" required>
                                            <input type="password" class="txtbox" name="password" placeholder="Enter Password" required>
                                            <select class="txtbox_select" name="user_type">
                                                <option value="Consumer">Consumer</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Staff">Staff</option>
                                                <option value="Water_Tender">Water Tender</option>
                                            </select>
                                            
                                            <div class="btnWrapper">
                                                <button type="submit" class="btn btnRegister" name="submit">Register</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        <!-- Register Modal End--> 

       

        <script type="text/javascript">
            $(function() {

            $('#register-show').click(function() {
                $('#register-modal-form').fadeIn().css("display", "flex");
            });

            $('.close-modal-form').click(function() {
                $('#register-modal-form').fadeOut();
            });
            });


            <?php
            if (isset($_SESSION["notify"])) {
                if ($_SESSION["notify"]=="success-add_account") {?>
                toastr.success('Reservation Added.', 'Success Added!', 
                {positionClass: 'toast-bottom-right',
                    timeOut: 5000,  
                    titleClass: 'toast-title',   
                    messageClass: 'toast-message', 
                    target: 'body',
                    newestOnTop: true,
                    preventDuplicates: false,
                    progressBar: true,
                })
            <?php }
            if ($_SESSION["notify"]=="failed") {?>
                toastr.error('Failed.', 'Failed Action!', 
                {positionClass: 'toast-bottom-right',
                    timeOut: 5000,  
                    titleClass: 'toast-title',   
                    messageClass: 'toast-message', 
                    target: 'body',
                    newestOnTop: true,
                    preventDuplicates: false,
                    progressBar: true
                })
            <?php }
            if ($_SESSION["notify"]=="invalid") {?>
            toastr.error('Invalid.', 'Invalid password!', 
            {positionClass: 'toast-bottom-right',
                timeOut: 5000,  
                titleClass: 'toast-title',   
                messageClass: 'toast-message', 
                target: 'body',
                newestOnTop: true,
                preventDuplicates: false,
                progressBar: true
            })
        <?php }
        if ($_SESSION["notify"]=="not-found") {?>
            toastr.error('Not found.', 'Record not found!', 
            {positionClass: 'toast-bottom-right',
                timeOut: 5000,  
                titleClass: 'toast-title',   
                messageClass: 'toast-message', 
                target: 'body',
                newestOnTop: true,
                preventDuplicates: false,
                progressBar: true
            })

        <?php }
        unset($_SESSION["notify"]); }
        ?>
        </script>