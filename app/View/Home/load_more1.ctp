<!--Main Layout-->
<style>
.center-block {
    //width:250px;
    padding:10px;
    background-color:#eceadc;
    color:#ec8007
    }
</style>
    <main class="text-center py-5">
        <section>
             <div class="col-md-7 row justify-content-center">
                 <span id="rate"></span>
                  <?php $i=1; foreach($comments_review as $comments){?>
            <div class="card" id="card">
                <div class="form-group">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <span id="rate_<?php echo $i;?>"></span>
                            <h5><strong><?php echo $comments['All_review']['categories'];?></strong></h5>
                            <i class="fa fa-quote-left"></i> <span><?php echo ucfirst($comments['Parent_review']['answer_1']);?>.</span>  <i class="fa fa-quote-right"></i>
                            <span class="dark-grey-text font-bold">- <?php echo $comments['Parentt']['last_name']." ".$comments['Parentt']['first_name']; echo "<br>";?></span>
                        </div>
                    </div>
                </div>
            </div>
                 <script>
                  $("#rate_<?php echo $i;?>").starRating({
                 initialRating: "<?php echo $comments['All_review']['rate'];?>",
                 starShape: 'rounded',
                 starSize: 20,
                 //useGradient: false,
                 strokeColor: '#1E88E5',
                 activeColor: '#ec8007',
                 readOnly : true
                }); 
                 </script>
                  <?php $i++;} ?>
                        </div>
            <center><span><i style="display:none;" id="spinner" class="fa fa-spinner fa-pulse fa-2x"></i></span></center>
<!--            <a href="<?php echo $this->webroot?>home/loadMore" id="loadMore">Load more <i class="fa fa-arrow-down"></i></a>-->
<?php if(count($comments_review) == 2){?>
<center><button type="button" SirPhemmiey="<?php echo $comments['Parent_review']['id']?>" id="<?php echo $comments['Parent_review']['id']?>" class="cmn-btn loadButton">Load More</button></center>
<?php } else{?>
<center><button type="button" disabled class="cmn-btn">No More comments</button></center>
<?php }?>
        </section>
    </main>
    <!--Main Layout-->
<script>
  $(document).on('click', '.loadButton', function(){
          var ID = $(this).attr('SirPhemmiey');
          $(".loadButton").hide();
          $('#spinner').show();
          $.ajax({
              url : "<?php echo $this->webroot;?>home/loadMore",
              type : "POST",
              data : {id : ID},
              success: function(result){
                  $('#spinner').hide();
                  $('#more'+ID).remove();
                  $("#card").append(result);
              }
          });
      });
</script>