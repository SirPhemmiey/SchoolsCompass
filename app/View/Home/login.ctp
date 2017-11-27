<!--Main Layout-->
    <main class="text-center py-5">
        <section>

            <!-- Registration Form Section -->
            <div class="row row-padding flex-center">
                
                <!-- Registration/Sign up form -->
                <form action="<?php echo $this->webroot?>home/login" method="POST" role="form" name="">
                    
                    <div  id="signup_form" class="form-simple">

                        <div class="card">
                            <!--Form Header-->
                            <div class="form-group">
                                
                                <div class="header pt-3 white-text blue darken-1">

                                    <div class="row d-flex justify-content-center">
                                        <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Login</h3>
                                    </div>

                                </div>
                                <!--Form Header-->
                                <?php echo $this->Flash->render('error')?>
                                <div class="card-body mx-4 mt-4">
                                    <!--Form Body-->                                  
                                    <div class="md-form">
                                        <input name="data[Parentt][email]" type="email" id="form-email" class="form-control" required>
                                        <label for="form-email">Your email</label>
                                    </div>

                                    <div class="md-form pb-3">
                                        <input name="data[Parentt][password]" type="password" id="form-pass" class="form-control" required>
                                        <label for="form-pass">Your password</label>
                                    </div>

                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn blue darken-1 btn-block z-depth-2">Login</button>
<!--
                                        OR <br>
                                        <a href="<?php echo $loginUrl;?>" id="fb_login"><img src="https://i.stack.imgur.com/Vk9SO.png"  alt="facebook-login"></a>
-->
<!--
                                        <?php $first_name = $this->Session->read('first_name');
                                        $last_name = $this->Session->read('last_name');
                                        $email = $this->Session->read('email');
                                        $userID = $this->Session->read('userID');
                                        $user = $this->Session->read('user');
                                        echo $first_name. "<br>";
                                        echo $last_name. "<br>";
                                            echo $email. "<br>";
                                        echo $userID. "<br>";
                                        echo $user. "<br>";?>
-->
                                    </div>
                                    <p class="font-small grey-text ">Don't have an account? <a class="dark-grey-text font-bold" href="<?php echo $this->webroot?>home/signup">Register</a>.</p>

                                </div>

                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </section>
    </main>
    <!--Main Layout-->