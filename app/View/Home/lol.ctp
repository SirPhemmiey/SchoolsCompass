
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--Main Layout-->
    <main class="text-center py-5">
        <section>

            <!-- Registration Form Section -->
            <div class="row row-padding flex-center">
               <form class="form-horizontal" method="post" action="<?php echo $this->webroot?>home/index">
                   <?php echo $this->Flash->render('success')?>
                   <?php echo $this->Flash->render('duplicate')?>
                   <?php echo $this->Flash->render('error')?>
                              <div id="forReview">
                    <input type="hidden" name="data[Parent_review][parent_id]" value="<?php echo $parents['Parentt']['id']?>">
                    <select name="data[Parent_review][school_id]" id="select_school" required>
                            <option value="choose" disabled selected>Choose a school to review</option>
                            <?php if(isset($schools)){ foreach($schools as $school){?>
                            <option value="<?php echo $school['School']['id']?>"><?php echo $school['School']['name']?></option>
                            <?php }}?>
                        </select>

                    <button type="button" id="review" class="btn waves-effect blue list-search-btn">Review</button>
                     <p class="font-small grey-text ">School does not exist? <a data-toggle="modal" data-target="#reviewModal" class="dark-grey-text font-bold" id="refer">Please refer your child's school</a></p>
                   </div>
              
                
                 <section class="result" id="result">
            <div class="contanier">
                    <div class="row">
                        <?php if(isset($queCat) && isset($catOption)){?>
                        <?php //foreach($queCat as $questionsCat){?>
                               <div class="col-md-6">
                <h4><?php echo $questionsCat['Category']['name']?> : </h4>
                <input type="hidden" name="data[All_review][categories_id][]" value="<?php echo $questionsCat['Category']['id']?>">
<!--
                                   <select name="data[All_review][categories_id]">
                                   <option value="<?php echo $options['Category_option']['id']?>"><?php echo $options['Category_option']['name']?></option>
                                   </select>
-->
                                   <select name="data[All_review][categories_options][]">
                                   <option value="choose" disabled selected>Choose an option</option>
                                   <option value="Low">Low</option>
                                   <option value="Average">Average</option>
                                   <option value="High">High</option>
                                   </select>
                <?php $i=0; foreach($catOption as $options){?>
<!--                <input type="radio" style="vertical-align:middle" class="js-switch" name="<?php echo $questionsCat['Category']['name']?>"  /> <?php echo $options['Category_option']['name']?>-->
<!--
                 <input type="radio" style="vertical-align:middle" class="js-switch" name="<?php echo $questionsCat['Category']['name']?>"  /> Low
                                   <input type="radio" style="vertical-align:middle" class="js-switch" name="<?php echo $questionsCat['Category']['name']?>"  /> Average
-->
<!--
                                <select name="data[All_review][categories_id][]">
                                    <option value=""></option>
                                   <option value="<?php echo $options['Category_option']['id']?>"><?php echo $options['Category_option']['name']?></option>
                                   </select>
-->
                <?php }?>
                  <div class="form-group">
                    <label for="ex3"><?php echo $questionsCat['Question']['q1']?></label>
                   <input type="hidden" name="data[Parent_review][q1]" value="<?php echo $questionsCat['Question']['q1']?>">
                   <input name="data[Parent_review][a1]" type="text" id="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="ex3"><?php echo $questionsCat['Question']['q2']?></label>
                    <input type="hidden" name="data[Parent_review][q2]" value="<?php echo $questionsCat['Question']['q2']?>">
                   <input name="data[Parent_review][a2]" type="text" id="" class="form-control" required>
                  </div>
                  <?php if($questionsCat['Question']['q3'] != ''){?>
                  <div class="form-group">
                    <label for="ex3"><?php echo $questionsCat['Question']['q3']?></label>
                      <input type="hidden" name="data[Parent_review][q3]" value="<?php echo $questionsCat['Question']['q3']?>">
                   <input name="data[Parent_review][a3]" type="text" id="" class="form-control" required>
                  </div>
                  <?php }?>
                    <div class="form-group">
                            <h5>Rate this category</h5>
                            </div>
                    <select class="example" id="rate" name="data[All_review][rate][]">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                     </select>
                        </div>
                        <?php }?>
                </div>
                  
                    <button type="submit" class="col-md-5 btn btn-sm btn-primary">Submit</button>
                   
            </div>
            
        </section>
                     </form>
            </div>
            
<!--
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
-->

        </section>
    </main>
    <!--Main Layout-->

<script>
    $("#result").hide();
    $("#review").attr("disabled", "disabled");
$(document).ready(function(){
    $(document).on('change', '#select_school', function(){
        id = $(this).val();
        //alert(id);
        $("#review").removeAttr("disabled", "disabled");
    });
    $("#review").on('click', function(){
        $("#result").show('slow');
        $("#forReview").hide('slow');
    });
    $(".example").barrating({
        theme: 'css-stars',
        initialRating: null
    });
    //$("#rate").on('change', function(){
    //    alert($(this).val());
    //});
   // $("input:radio").iCheck();
//   $('input:radio').rcSwitcher({
//					// reverse: true,
//					theme: 'yellowish-green',
//					width: 48,
//					height: 16,
//					onText: '&check;',
//					offText: '&cross;',
//					blobOffset: 2,
//					inputs: true,
//					autoStick: true,
//				})
//				// Listen to status changes
//				.on( 'turnon.rcSwitcher', function( e, data ){
//					alert()
//				} );
    //$("#reviewModal").modal();
//    $(document).on('click', '#refer', function(){
//        alert()
//    });
});
</script>