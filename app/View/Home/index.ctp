<!--Main Layout-->
    <main class="text-center py-5">
        <section>
            
            <!-- Registration Form Section -->
            <div class="">
               <form class="form-horizontal" method="post" action="<?php echo $this->webroot?>home">
                   <?php echo $this->Flash->render('duplicate');?>
                   <?php echo $this->Flash->render('success');?>
                   <?php echo $this->Flash->render('error');?>
                              <div id="forReview">
                    <input type="hidden" name="data[Parent_review][parent_id]" value="<?php echo $parents['Parentt']['id']?>">
                     <input type="hidden" name="data[All_review][school_id]" value="" id="all_rev">
                 <select style="width:100%; max-width:80%;" class="select2_ col-md-12 form-control animated fadeIn" data-placeholder="Choose a school to review" name="data[Parent_review][school_id]" id="select_school">
                            <option value=""></option>
                            <?php if(isset($schools)){ foreach($schools as $school){?>
                            <option value="<?php echo $school['School']['id']?>"><?php echo $school['School']['name']?></option>
                            <?php }}?>
                        </select>
            <button style="width:100%; max-width:80%;" type="button" id="review" class="btn waves-effect blue list-search-btn">Review</button>
                    
                     <p class="font-small grey-text ">School does not exist? <a target="_blank" href="<?php echo $this->webroot?>home/refer" class="dark-grey-text font-bold" id="refer">Please refer your child's school</a></p>
                   </div>
              
                
                 <section class="result" id="result">
            <div class="contanier">
                    <div class="row">
                               <div class="col-md-6">
                <h4>Academics : </h4>
                <input type="hidden" name="data[All_review][categories][]" value="Academics">
                <input type="hidden" name="data[All_review][categories_options][]" id="acad_rating">

                  <div class="form-group">
                    <label for="ex3">How seriously is academic achievement taken in this school? How well do teachers teach in this school?</label>
                   <input type="hidden" name="data[Parent_review][question_1]" value="How seriously is academic achievement taken in this school? How well do teachers teach in this school?">
                      <textarea name="data[Parent_review][answer_1]" class="form-control" required></textarea>
                  </div>
                    <div class="form-group">
                            <h5>Rate this category</h5>
                            </div>
                    <span id="acad_rate"></span>
                    <input type="hidden" name="data[All_review][rate][]" value="" id="rate_for_acad">
                        </div>
                        
                              <div class="col-md-6">
                <h4>Management : </h4>
                <input type="hidden" name="data[All_review][categories][]" value="Management">
                <input type="hidden" name="data[All_review][categories_options][]" id="mgt_rating">

                  <div class="form-group">
                    <label for="ex3">What’s leadership like in this school? How well is the school and how well kept are its facilities? Is security of kids taken seriously?</label>
                   <input type="hidden" name="data[Parent_review][question_2]" value="What’s leadership like in this school? How well is the school and how well kept are its facilities? Is security of kids taken seriously?">
                   
                      <textarea required name="data[Parent_review][answer_2]" class="form-control"></textarea>
                  </div>
                    <div class="form-group">
                            <h5>Rate this category</h5>
                            </div>
                    <span id="mgt_rate"></span>
                      <input type="hidden" name="data[All_review][rate][]" value="" id="rate_for_mgt">            
                        </div>
                        
                              <div class="col-md-6">
                <h4>Co-curricular : </h4>
                <input type="hidden" required name="data[All_review][categories][]" value="Co-curricular">
                                  <input type="hidden" name="data[All_review][categories_options][]" id="co_rating">

                  <div class="form-group">
                    <label for="ex3">How well is other aspects of a child’s life taken care of? How much club/extra curricular activities happen in the school?</label>
                   <input type="hidden" name="data[Parent_review][question_3]" value="How well is other aspects of a child’s life taken care of? How much club/extra curricular activities happen in the school?">
                      <textarea required class="form-control" name="data[Parent_review][answer_3]"></textarea>
                  </div>
                    <div class="form-group">
                            <h5>Rate this category</h5>
                            </div>
                                  <span id="co_rate"></span>
                                  <input type="hidden" name="data[All_review][rate][]" value="" id="rate_for_co">
                        </div>
                        
                </div>
                  
                    <button type="submit" class="col-md-5 btn btn-primary">Submit</button>
                   
            </div>
            
        </section>
                     </form>
            </div>

        </section>
        
        
    </main>
    <!--Main Layout-->

<script>
    $("#result").hide();
    $("#review").attr("disabled", "disabled");
$(document).ready(function(){
    $(document).on('change', '#select_school', function(){
        $("#review").removeAttr("disabled", "disabled");
        $("#all_rev").val($(this).val());
    });
    $("#review").on('click', function(){
        $("#result").show('slow');
        $("#forReview").hide('slow');
    });
    $("#acad_rate").starRating({
    disableAfterRate: false,
    starShape: 'rounded',
    hoverColor: '#105694',
    starSize: 25,
    useGradient: false,
    strokeColor: '#1E88E5',
    activeColor: '#105694',
    callback: function(currentIndex, $el){
        $("#rate_for_acad").val(currentIndex);
        var lowArray = [0.5, 1, 1.5, 2];
        var averageArray = [2.5, 3, 3.5];
        var highArray = [4, 4.5, 5];
        if($.inArray(currentIndex, lowArray) !== -1){
             $("#acad_rating").val("Low");
        }
        if($.inArray(currentIndex, averageArray) !== -1){
             $("#acad_rating").val("Average");
        }
        if($.inArray(currentIndex, highArray) !== -1){
             $("#acad_rating").val("High");
        }
    }
  });
     $("#mgt_rate").starRating({
    disableAfterRate: false,
    hoverColor: '#105694',
    starShape: 'rounded',
    starSize: 25,
    useGradient: false,
    strokeColor: '#1E88E5',
    activeColor: '#105694',
    callback: function(currentIndex, $el){
        $("#rate_for_mgt").val(currentIndex);
       var lowArray = [0.5, 1, 1.5, 2];
        var averageArray = [2.5, 3, 3.5];
       var highArray = [4, 4.5, 5];
        if($.inArray(currentIndex, lowArray) !== -1){
             $("#mgt_rating").val("Low");
        }
        if($.inArray(currentIndex, averageArray) !== -1){
             $("#mgt_rating").val("Average");
        }
        if($.inArray(currentIndex, highArray) !== -1){
             $("#mgt_rating").val("High");
        }
    }
  });
     $("#co_rate").starRating({
    disableAfterRate: false,
    hoverColor: '#105694',
    starSize: 25,
    starShape: 'rounded',
    useGradient: false,
    strokeColor: '#1E88E5',
    activeColor: '#105694',
    callback: function(currentIndex, $el){
        $("#rate_for_co").val(currentIndex);
      var lowArray = [0.5, 1, 1.5, 2];
        var averageArray = [2.5, 3, 3.5];
        var highArray = [4, 4.5, 5];
        if($.inArray(currentIndex, lowArray) !== -1){
             $("#co_rating").val("Low");
        }
        if($.inArray(currentIndex, averageArray) !== -1){
             $("#co_rating").val("Average");
        }
        if($.inArray(currentIndex, highArray) !== -1){
             $("#co_rating").val("High");
        }
    }
  });
});
</script>