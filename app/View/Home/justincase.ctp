<!--Main Layout-->
    <main class="text-center py-5">
        <section>

            <!-- Registration Form Section -->
            <div class="row row-padding flex-center">
                 <form class=" flex-form">
                               <select class="mdb-select colorful-select dropdown-primary" name="data[School][id]" id="select_school" required>
                            <option value="" disabled selected>Choose a school to review</option>
                            <?php if(isset($schools)){ foreach($schools as $school){?>
                            <option value="<?php echo $school['School']['id']?>"><?php echo $school['School']['name']?></option>
                            <?php }}?>
                        </select>
                     
<!--
                      <select class="mdb-select colorful-select dropdown-primary" name="" id="">
                            <option value="" disabled selected>Model</option>
                        </select>

                        <select class="mdb-select colorful-select dropdown-primary" name="" id="">
                            <option value="" disabled selected>Min Price</option>
                        </select>

                        <select class="mdb-select colorful-select dropdown-primary" name="" id="">
                            <option value="" disabled selected>Max Price</option>
                        </select>
-->

                    <button type="submit" class="btn waves-effect blue list-search-btn">Review</button>
                     <p class="font-small grey-text ">School does not exist? <a data-toggle="modal" data-target="#reviewModal" class="dark-grey-text font-bold" id="refer">Please refer your child's school</a></p>
                </form>
                  
                
<!--
                <div id="ajaxDiv">                
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" checked /> Checked
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" /> Unchecked
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" disabled="disabled" /> Disabled
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" disabled="disabled" checked="checked" /> Disabled Checked
                            </label>
                          </div>
                        </div>
                </div>
-->
                
                 <section class="result" id="result">
            <div class="container">
                <form class="form-inline" method="post" action="">
                <div class="col-md-7">
                    <div class="row">
                <h4>Academics : </h4>&nbsp;&nbsp;
                <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data"  /> Low
                    </label>
                </div>&nbsp;
                 <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data"  /> Average
                    </label>
                </div>&nbsp;
                 <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data"  /> High
                    </label>
                </div>
                      
                  <div class="form-group">
                    <label for="ex3">How seriously is academic achievement taken in this school?</label>
                   <input name="data[Parent][last_name]" type="text" id="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="ex4"> How well do teachers teach in this school?</label>
                    <input name="data[Parent][last_name]" type="text" id="" class="form-control" required>
                  </div>
                
                    <h5>Rate this category</h5>
                </div>
                    </div>
                
                <div class="col-md-5">
                     <div class="row">
                <h4>Management : </h4>&nbsp;&nbsp;
                <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data2"  /> Low
                    </label>
                </div>&nbsp;
                 <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data2"  /> Average
                    </label>
                </div>&nbsp;
                 <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data2"  /> High
                    </label>
                </div>

                  <div class="form-group">
                    <label for="ex3">What’s leadership like in this school?</label>
                   <input name="data[Parent][last_name]" type="text" id="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="ex4"> How well is the school and how well kept are its facilities?</label>
                    <input name="data[Parent][last_name]" type="text" id="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="ex4"> Is security of kids taken seriously?</label>
                    <input name="data[Parent][last_name]" type="text" id="" class="form-control" required>
                  </div>

                    <h5>Rate this category</h5>
                </div>
                    </div>
                
                <div class="row col-md-6">
                <h4>Co-curriculum : </h4>&nbsp;&nbsp;
                <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data3"  /> Low
                    </label>
                </div>&nbsp;
                 <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data3"  /> Average
                    </label>
                </div>&nbsp;
                 <div class="">
                    <label>
                     <input type="radio" class="js-switch" name="data3"  /> High
                    </label>
                </div>

                  <div class="form-group">
                    <label for="ex3">How well is other aspects of a child’s life taken care of</label>
                   <input name="data[Parent][last_name]" type="text" id="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="ex4">How much club/extra curricular activities happen in the school? </label>
                    <input name="data[Parent][last_name]" type="text" id="" class="form-control" required>
                  </div>
                    <h5>Rate this category</h5>
                </div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </form>
            </div>
            
        </section>
            </div>
            
            <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Review School</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    <p>This is it man</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <!--Main Layout-->

<script>
$(document).ready(function(){
    $(document).on('change', '#select_school', function(){
        id = $(this).val();
        alert(id);
    });
    $("#reviewModal").modal();
//    $(document).on('click', '#refer', function(){
//        alert()
//    });
});
</script>