
<!--Main Layout-->
    <main class="text-center py-5">
        <section>

            <!-- Registration Form Section -->
            <div class="row row-padding flex-center">
                              <div id="forReview">
                    <input type="hidden" name="data[Parent_review][parent_id]" value="<?php echo $parents['Parentt']['id']?>">
                    <select class="select2_ form-control" data-placeholder="Select a school to view aggregated reviews" name="data[School][school_id]" id="select_school" required>
                            <option value=""></option>
                            <?php if(isset($schools)){ foreach($schools as $school){?>
                            <option value="<?php echo $school['Parent_review']['school_id']?>"><?php echo $school['School']['name']?></option>
                            <?php }}?>
                        </select>

                    <button type="button" id="review" class="btn waves-effect blue list-search-btn">View</button>
                   </div>
                
                 <section class="result" id="result">
            <div class="contanier" id="do">
                  
                   
            </div>
            
        </section>
            </div>

        </section>
    </main>
    <!--Main Layout-->



<script>
    //$("#result").hide();
    $("#review").attr("disabled", "disabled");
$(document).ready(function(){
    $(document).on('change', '#select_school', function(){
        $("#review").removeAttr("disabled", "disabled");
    });
    $(document).on('click', '#review', function(){
        id = $("#select_school").val();
        //alert(id);
        $.ajax({
            url : "<?php echo $this->webroot;?>home/check_review",
            type : "POST",
            data: {school_id: id},
            beforeSubmit: $("#review").text("Please wait...").attr("disabled", "disabled"),
            success: function(response){
                $("#do").html(response);
                $("#review").text("View").removeAttr("disabled", "disabled");
            },
            error: function(){
                alert("Oops! An error was encountered. Please try again.");
            },
        });
    });
});
</script>