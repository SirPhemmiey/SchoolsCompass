<!--Main Layout-->
    <main class="text-center py-5">
        <section>

            <!-- Registration Form Section -->
            <div class="row row-padding flex-center">
                
                <!-- Registration/Sign up form -->
                <form action="<?php echo $this->webroot?>home/signup" method="POST" role="form" name="signUp">
                    
                    <div  id="signup_form" class="form-simple">

                        <div class="card">
                            <!--Form Header-->
                            <div class="form-group">
                                
                                <div class="header pt-3 white-text blue darken-1">

                                    <div class="row d-flex justify-content-center">
                                        <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Sign up</h3>
                                    </div>

                                </div>
                                <!--Form Header-->
                                <?php echo $this->Flash->render('error')?>
                                <?php echo $this->Flash->render('success')?>
                                <?php echo $this->Flash->render('duplicate')?>
                                <div class="card-body mx-4 mt-4">
                                    <!--Form Body-->
                                    <div class="md-form">
                                        <input name="data[Parentt][first_name]" type="text" id="form-fname" class="form-control" autofocus required>
                                        <label for="form-fname">Your first name</label>
                                    </div>

                                    <div class="md-form">
                                        <input name="data[Parentt][last_name]" type="text" id="form-lname" class="form-control" required>
                                        <label for="form-lname">Your last name</label>
                                    </div>

                                    
                                    <div class="md-form">
                                        <input name="data[Parentt][email]" type="email" id="form-email" class="form-control" required>
                                        <label for="form-email">Your email</label>
                                    </div>

                                    <div class="md-form pb-3">
                                        <input name="data[Parentt][password]" type="password" id="form-pass" class="form-control" required>
                                        <label for="form-pass">Your password</label>
                                    </div>

                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn blue darken-1 btn-block z-depth-2">Sign Up</button>
<!--                                        OR-->
<!--                                        <a href="<?php echo $loginUrl;?>" id="fb_login"><img src="https://i.stack.imgur.com/Vk9SO.png"  alt="facebook-login"></a>-->
<!--                                         <a href="<?php echo $loginUrl;?>" id="fb_login"><button type="button" class="btn blue darken-1 btn-block z-depth-2">Connect with Facebook</button></a>-->
                                    </div>
                                    <p class="font-small grey-text ">Already have an account? <a class="dark-grey-text font-bold" href="<?php echo $this->webroot?>home/login">Login</a>.</p>

                                </div>

                            </div>
                        </div>
                    </div>

                </form>
                <?php $userID = $this->Session->read('userID');
$user = $this->Session->read('user');
$last_name = $this->Session->read('last_name');
                //debug($user);?>
	<?php if(!isset($user)) {?>
<!--
          <center><a href="<?php echo $loginUrl;?>" id="fb_login"><img src="https://i.stack.imgur.com/Vk9SO.png" width="200px" height="200px" alt="facebook-login"></a></center>
          <br>
-->
          <?php }?>

            </div>

        </section>
    </main>
    <!--Main Layout-->