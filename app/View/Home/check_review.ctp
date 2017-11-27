 <link href="<?php echo $this->webroot?>css/star-rating-svg.css" rel="stylesheet">

<section class="result" id="">
<center><strong><h3>Aggregated Review Of <b><?php echo ucwords($schools['School']['name']);?></b></h3></strong></center><br>
            <div class="container" id="">
            <div class="row">
                <div class="col-md-5">
<!--                <h4>Academics</h4>-->
                </div>
                <div class="col-md-5">
                    <h5><i><em><strong></strong></em></i></h5>
                </div>
            </div>

                <span id="acad_rate"></span>
                    <div id="academics" class="row ">
                               <div class="col-md-2">
              <h4><strong>Academics </strong> </h4>
                        </div>
                              <div class="col-md-3">     
                                  <div id="jqxChartAcademics" style="width:280px; height:280px;"></div>
                        </div>
                        <div class="col-md-5">
                        <div class="card">
                            <div class="form-group">
                                <div class="card-body">
                                    <div class="text-center mb-4">
                                     <?php foreach($comments_review as $comments){?>
                                        <i class="fa fa-quote-left"></i> <b><?php echo ucfirst($comments['Parent_review']['answer_1']);?>.</b> <i class="fa fa-quote-right"></i>
                                        <span class="dark-grey-text font-bold">- <?php echo $comments['Parentt']['last_name']." ".$comments['Parentt']['first_name']; echo "<br>";?></span>
                                        <?php }?>
                                        <a href="<?php echo $this->webroot;?>home/comments?s_id=<?php echo $school_id;?>" class="btn waves-effect blue">See all comments</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                </div><br>
                
                  <span id="management_rate"></span>
                    <div id="management" class="row">
                               <div class="col-md-2">
              <h4><strong>Management </strong> </h4>
                        </div>
                              <div class="col-md-3">     
                 <div id="jqxChartManagement" style="width:280px; height:280px;"></div>
                        </div>
                        <div class="col-md-5">
                        <div class="card">
                            <div class="form-group">
                                <div class="card-body">
                                     <div class="text-center mb-4">
                                     <?php foreach($comments_review as $comments){?>
                                        <i class="fa fa-quote-left"></i> <b><?php echo ucfirst($comments['Parent_review']['answer_2']);?>.</b> <i class="fa fa-quote-right"></i>
                                        <span class="dark-grey-text font-bold">- <?php echo $comments['Parentt']['last_name']." ".$comments['Parentt']['first_name']; echo "<br>";?></span>
                                        <?php }?>
                                        <a href="<?php echo $this->webroot;?>home/comments?s_id=<?php echo $school_id;?>" class="btn waves-effect blue">See all comments</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                </div><br>
                
                 <span id="co_rate"></span>
                    <div id="co_curricular" class="row">
                               <div class="col-md-2">
              <h4><strong>Co-curricular </strong> </h4>
                        </div>
                              <div class="col-md-3">     
                <div id="jqxChartCo" style="width:280px; height:280px;"></div>
                        </div>
                        <div class="col-md-5">
                        <div class="card">
                            <div class="form-group">
                                <div class="card-body">
                                     <div class="text-center mb-4">
                                     <?php foreach($comments_review as $comments){?>
                                        <i class="fa fa-quote-left"></i> <b><?php echo ucfirst($comments['Parent_review']['answer_3']);?>.</b> <i class="fa fa-quote-right"></i>
                                        <span class="dark-grey-text font-bold">- <?php echo $comments['Parentt']['last_name']." ".$comments['Parentt']['first_name']; echo "<br>";?></span>
                                        <?php }?>
                                        <a href="<?php echo $this->webroot;?>home/comments?s_id=<?php echo $school_id;?>" class="btn waves-effect blue">See all comments</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                </div>
                   
            </div>
            
        </section>
    <script type="text/javascript" src="<?php echo $this->webroot?>js/jquery.star-rating-svg.js"></script>


<script>
  $("#acad_rate").starRating({
     initialRating: "<?php echo $academics_rating;?>",
     hoverColor: '#105694',
     starShape: 'rounded',
     starSize: 25,
     useGradient: false,
     strokeColor: '#1E88E5',
     activeColor: '#105694',
     readOnly : true
  });    
  $("#management_rate").starRating({
     initialRating: "<?php echo $management_rating;?>",
     hoverColor: '#105694',
     starShape: 'rounded',
     starSize: 25,
     useGradient: false,
     strokeColor: '#1E88E5',
     activeColor: '#105694',
     readOnly : true
  });   
  $("#co_rate").starRating({
     initialRating: "<?php echo $co_rating;?>",
     hoverColor: '#105694',
     starShape: 'rounded',
     starSize: 25,
     useGradient: false,
     strokeColor: '#1E88E5',
     activeColor: '#105694',
     readOnly : true
  });


var dataAcademics = [
      {Category: "Low", Percentage: "<?php if(isset($academics_low_percent)){ echo $academics_low_percent;}?>"},
      {Category: "Average", Percentage: "<?php if(isset($academics_average_percent)){ echo $academics_average_percent;}?>"},
      {Category: "High", Percentage: "<?php if(isset($academics_high_percent)){ echo $academics_high_percent;}?>"},
]
    var source = {
        dataType: "array",
        dataFields: [
            {name: 'Category'},
            {name: 'Percentage'}
        ],
        localdata: dataAcademics
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    
    var settings = {
        title: "",
        description: "",
        source: dataAdapter,
        colorScheme: 'scheme06',
        seriesGroups: [
            {
                type: "donut",
                showLabels: true,
                series: [
                    {
                        dataField: 'Percentage',
                        displayText: 'Category',
                        //labelRadius: 100,
                        initialAngle: 15,
                        //radius: 100,
                        innerRadius: 50,
                        //centerOffset: 0,
                        formatSettings: {sufix: '%', decimalPlaces:1}
                    }
                ]
            }
        ]
    };
    $("#jqxChartAcademics").jqxChart(settings);
    
    var dataManagement = [
      {Category: "Low", Percentage: "<?php if(isset($management_low_percent)){ echo $management_low_percent;}?>"},
      {Category: "Average", Percentage: "<?php if(isset($management_average_percent)){ echo $management_average_percent;}?>"},
      {Category: "High", Percentage: "<?php if(isset($management_high_percent)){ echo $management_high_percent;}?>"},
]
    var source = {
        dataType: "array",
        dataFields: [
            {name: 'Category'},
            {name: 'Percentage'}
        ],
        localdata: dataManagement
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    
    var settings = {
        title: "",
        description: "",
        source: dataAdapter,
        colorScheme: 'scheme06',
        seriesGroups: [
            {
                type: "donut",
                showLabels: true,
                series: [
                    {
                        dataField: 'Percentage',
                        displayText: 'Category',
                        //labelRadius: 100,
                        initialAngle: 15,
                        //radius: 100,
                        innerRadius: 50,
                        //centerOffset: 0,
                        formatSettings: {sufix: '%', decimalPlaces:1}
                    }
                ]
            }
        ]
    };
    $("#jqxChartManagement").jqxChart(settings);
    
    var dataCo = [
      {Category: "Low", Percentage: "<?php if(isset($co_low_percent)){ echo $co_low_percent;}?>"},
      {Category: "Average", Percentage: "<?php if(isset($co_average_percent)){ echo $co_average_percent;}?>"},
      {Category: "High", Percentage: "<?php if(isset($co_high_percent)){ echo $co_high_percent;}?>"},
]
    var source = {
        dataType: "array",
        dataFields: [
            {name: 'Category'},
            {name: 'Percentage'}
        ],
        localdata: dataCo
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    
    var settings = {
        title: "",
        description: "",
        source: dataAdapter,
        colorScheme: 'scheme06',
        seriesGroups: [
            {
                type: "donut",
                showLabels: true,
                series: [
                    {
                        dataField: 'Percentage',
                        displayText: 'Category',
                        //labelRadius: 100,
                        initialAngle: 15,
                        //radius: 100,
                        innerRadius: 50,
                        //centerOffset: 0,
                        formatSettings: {sufix: '%', decimalPlaces:1}
                    }
                ]
            }
        ]
    };
    $("#jqxChartCo").jqxChart(settings);
    
</script>