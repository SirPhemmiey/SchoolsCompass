
<!--Main Layout-->
<style>
/*
.center-block {
    //width:350px;
    padding:1px 0px 0px 50px;
    background-color:#eceadc;
    color:#ec8007
    }
*/
    #bod{
        border: solid 2px black;
        background-color: grey;
    }
.container {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
    .jqx-chart-legend-text{
     
    }
</style>
    <main class="">
        <section>
             <div class="" id="append">
                 <h4><strong class="container"> Comments on&nbsp;<b>~<?php echo $comments_review[0]['School']['name'];?></b></strong></h4>
                 <input type="hidden" id="s_id" value="<?php echo $comments_review[0]['School']['id']?>">
                  <?php foreach($comments_review as $comments){?>
            <div class="cad col-md-8 container center-block">
                <div class="container">
                    <div class="card-body" id="body">
                        <div class="mb-2">
                            <i class="fa fa-quote-left"></i> <span><?php echo ucfirst($comments['Parent_review']['answer_1']);?>.</span>
                        </div>
                        <div class="mb-2">
                          <span><?php echo ucfirst($comments['Parent_review']['answer_2']);?>.</span>
                        </div>
                        <div class="mb-2">
                          <span><?php echo ucfirst($comments['Parent_review']['answer_3']);?>.</span> <i class="fa fa-quote-right"></i>
                        </div>
                        <span class="dark-grey-text font-bold"><em>Comments by</em> - <?php echo $comments['Parentt']['last_name']." ".$comments['Parentt']['first_name']; echo "<br>";?></span>
                        <div class="mb-2"></div>
                    </div>
                  
                </div> 
            </div>
                 <?php }?>
                  
                        </div>
<?php if(count($comments_review)>0){?>
<div id="more<?php echo $comments['Parent_review']['id'];?>">
<center><button type="button" compass="<?php echo $comments['Parent_review']['id']?>" id="<?php echo $comments['Parent_review']['id']?>" class="btn waves-effect blue loadButton<?php echo $comments['Parent_review']['id']?>">Load More</button></center>
<center><span><i style="display:none;" id="spinner" class="spinner fa fa-spinner fa-pulse fa-2x"></i></span></center>
</div>
<?php } else{?>
<center><button type="button" disabled compass="" class="btn waves-effect blue">No More Comments</button></center>
<?php }?>
        </section>
    </main>
    <!--Main Layout-->
<script>
  $(document).on('click', '.loadButton<?php echo $comments['Parent_review']['id']?>', function(){
          var ID = $(this).attr('compass');
          $(".loadButton<?php echo $comments['Parent_review']['id']?>").attr("disabled", "disabled").text("loading...");
          $('#spinner').show();
          $.ajax({
              url : "<?php echo $this->webroot;?>home/loadMore",
              type : "POST",
              data : {id : ID, school_id: $("#s_id").val()},
              success: function(result){
                  $('#spinner').hide();
                  $('#more'+ID).remove();
                  $("#append").append(result);
              },
              error: function(){
                   alert("Oops! An error was encountered while processing the request. Probably logout and login again.");
              }
          });
      });
</script>
<script>

    </script>