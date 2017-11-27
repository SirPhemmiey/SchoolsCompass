<!--Main Layout-->
    <main class="text-center py-5">
        <section>

            <!-- Registration Form Section -->
            <div class="row row-padding flex-center">
                
                <!-- Registration/Sign up form -->
                <form action="<?php echo $this->webroot?>home/refer" method="POST" role="form" name="">
                    
                    <div  id="signup_form" class="form-simple">

                        <div class="card">
                            <!--Form Header-->
                            <div class="form-group">
                                
                                <div class="header pt-3 white-text blue darken-1">

                                    <div class="row d-flex justify-content-center">
                                        <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">What school does your child go to?</h3>
                                    </div>   
                                </div>
                                 <h5>Fill this form before you write a review about it.</h5> 
                                <!--Form Header-->
                                <?php echo $this->Flash->render('error')?>
                                <?php echo $this->Flash->render('success')?>
                                <?php echo $this->Flash->render('duplicate')?>
                                <?php echo $this->Flash->render('emptyy')?>
                                <div class="card-body mx-4 mt-4">
                                    <!--Form Body-->
                                    <div class="md-form">
                                        <input name="data[School][name]" type="text" id="" class="form-control" autofocus required>
                                        <label for="">Name of School</label>
                                    </div>

                                    <div class="md-form">
                                        <input name="data[School][website]" placeholder="http://www.google.com" type="url" id="" class="form-control" required>
                                        <label for="">Website</label>
                                    </div>

                                    
                                    <div class="md-form">
                                        <input name="data[School][contact_name]" type="text" id="" class="form-control" required>
                                        <label for="">Name of School Contact</label>
                                    </div>
                                    
                                    <div class="md-form">
                                        <select data-placeholder="Choose the position of school" required class="form-control select2" name="data[School][position]">
                                        <option value=""></option>
                                        <option value="Proprietor">Proprietor</option>
                                        <option value="Head Teacher">Head Teacher</option>
                                        </select>
                                    </div>

                                    <div class="md-form pb-3">
                                        <input name="data[School][contact_number]" type="number" id="" class="form-control" required>
                                        <label for="form-pass">Contact Phone Number</label>
                                    </div>
                                    
                                     <div class="md-form pb-3">
                                        <input name="data[School][contact_email]" type="email" id="" class="form-control" required>
                                        <label for="form-pass">Contact Email</label>
                                    </div>

                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn blue darken-1 btn-block z-depth-2">Give a Referral</button>
                                    </div>
                                    <p class="font-small grey-text ">Seen the school you want? <a class="dark-grey-text font-bold" href="<?php echo $this->webroot?>home">Give a review</a>.</p>

                                </div>

                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </section>
    </main>
    <!--Main Layout-->