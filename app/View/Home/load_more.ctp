<?php foreach($comments_review as $comments){?>
<input type="hidden" id="s_id" value="<?php echo $comments_review[0]['School']['id']?>">
                                   <div class="cad col-md-8 container center-block">
                <div class="container">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="fa fa-quote-left"></i> <span><?php echo ucfirst($comments['Parent_review']['answer_1']);?>. <?php echo ucfirst($comments['Parent_review']['answer_1']);?> <?php echo ucfirst($comments['Parent_review']['answer_1']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?></span>  <i class="fa fa-quote-right"></i>
                        </div>
                        <div class="mb-2">
                            <i class="fa fa-quote-left"></i> <span><?php echo ucfirst($comments['Parent_review']['answer_2']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?>.</span>  <i class="fa fa-quote-right"></i>
                        </div>
                        <div class="mb-2">
                            <i class="fa fa-quote-left"></i> <span><?php echo ucfirst($comments['Parent_review']['answer_3']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?><?php echo ucfirst($comments['Parent_review']['answer_1']);?>.</span>  <i class="fa fa-quote-right"></i>
                        </div>
                        <span class="dark-grey-text font-bold"><em>Comments by</em> - <?php echo $comments['Parentt']['last_name']." ".$comments['Parentt']['first_name']; echo "<br>";?></span>
                        <div class="mb-2"></div>
                    </div>
                  
                </div> 
            </div>

    <?php }?>
<?php if(count($comments_review) >= 1 ){?>
<div id="more_<?php echo $comments['Parent_review']['id'];?>">
<center><button type="button" compass="<?php echo $comments['Parent_review']['id']?>" id="<?php echo $comments['Parent_review']['id']?>" class="btn waves-effect blue loadButton_<?php echo $comments['Parent_review']['id']?>">Load More</button></center>
</div>
<?php } else if(count($comments_review) < 1){?>
<center><button type="button" disabled class="btn waves-effect blue">No More comments</button></center>
<?php }?>

<script>
  $(document).on('click', '.loadButton_<?php echo $comments['Parent_review']['id']?>', function(){
          var ID = $(this).attr('compass');
          $(".loadButton_<?php echo $comments['Parent_review']['id']?>").attr("disabled", "disabled").text("loading...");
          $('#spinner').show();
          $.ajax({
              url : "<?php echo $this->webroot;?>home/loadMore",
              type : "POST",
              data : {id : ID, school_id: $("#s_id").val()},
              success: function(result){
                  $('#spinner').hide();
                  $('#more_'+ID).remove();
                  $("#append").append(result);
              },
              error: function(){
                  alert("Oops! An error was encountered while processing the request. Probably logout and login again.");
              }
          });
      });
</script>