<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SchoolsCompass | We Guide, You Decide</title>
   <link rel="stylesheet" href="<?php echo $this->webroot?>css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->webroot?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo $this->webroot?>css/mdb.min.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="<?php echo $this->webroot?>css/style.css" rel="stylesheet">
    <!-- Responsive styles -->
    <link href="<?php echo $this->webroot?>css/responsive.css" rel="stylesheet">
    <link href="<?php echo $this->webroot?>css/select2.min.css" rel="stylesheet">
    <link href="<?php echo $this->webroot?>css/star-rating-svg.css" rel="stylesheet">
    <link href="<?php echo $this->webroot?>css/font-awesome.min.css" rel="stylesheet">
     <link href="<?php echo $this->webroot?>css/jqx.base.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $this->webroot?>js/jquery.min.js"></script>
     <script type="text/javascript" src="<?php echo $this->webroot?>js/jquery.star-rating-svg.js"></script>
</head>

<body>

    <header>
        <!--Sub-Heading Navigation -->
        <nav class="navbar navbar-dark blue darken-1 nav-top">  
            <ul class="flex-list">
                <p class="flex-list flex-list--text">Welcome <span id="name">&nbsp;&nbsp;<?php echo $parents['Parentt']['first_name'];?></span></p>
            </ul>
            
        </nav>

        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white nav-margin">
            <a class="navbar-brand" href="#"><h3><strong>SchoolsCompass</strong></h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->webroot?>home/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo $this->webroot?>home/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo $this->webroot?>home/refer">Refer a School</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->webroot?>home/logout">Log out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--Main Navigation-->

    <!--Main Layout-->
   
      <?php echo $this->fetch('content');?>
              

    <!--Main Layout-->
    <!-- /Start your project here-->

    
    <!--Footer-->
    <footer class="page-footer blue-grey lighten-5 pt-0">

        <div class="blue darken-1">
            <div class="container-fluid"> 
                <!--Grid row-->
                <div class="row py-4 foot-note">

                    <!--Grid column-->
                    <div class="col-md-5 text-left mb-md-0">
                        <h6 class="mb-0 white-text text-center text-md-left"><strong>Get connected with us on social networks!</strong></h6>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-7 text-center text-md-right">
                        <!--Facebook-->
                        <a class="icons-sm fb-ic ml-0"><i class="fa fa-facebook white-text mr-lg-4"> </i></a>
                        <!--Twitter-->
                        <a class="icons-sm tw-ic"><i class="fa fa-twitter white-text mr-lg-4"> </i></a>
                        <!--Google +-->
                        <a class="icons-sm gplus-ic"><i class="fa fa-google-plus white-text mr-lg-4"> </i></a>
                        <!--Linkedin-->
                        <a class="icons-sm li-ic"><i class="fa fa-linkedin white-text mr-lg-4"> </i></a>
                        <!--Instagram-->
                        <a class="icons-sm ins-ic"><i class="fa fa-instagram white-text mr-lg-4"> </i></a>
                    </div>
                    <!--Grid column-->

                </div>
              </div>
            
            <!--Grid row-->
        </div>
        

      <!--Footer Links-->
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">

                <!--First column-->
                <div class="col-md-3 mb-r dark-grey-text">
                    <h6 class="title font-bold"><strong>SchoolsCompass</strong></h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto">
                    <p>About SchoolCompass here.</p>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-3 mx-auto mb-r dark-grey-text">
                    <h6 class="title font-bold"><strong>Products</strong></h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto">
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-md-3 mx-auto mb-r dark-grey-text">
                    <h6 class="title font-bold"><strong>Useful links</strong></h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto">
                </div>
                <!--/.Third column-->

                <!--Fourth column-->
                <div class="col-md-3 dark-grey-text">
                    <h6 class="title font-bold"><strong>Contact</strong></h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto">
                    <p><i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p><i class="fa fa-envelope mr-3"></i> info@schoolscompass.com.ng</p>
                    <p><i class="fa fa-phone mr-3"></i> +234 817 035 0088</p>
                    <p><i class="fa fa-print mr-3"></i> +234 817 035 0088</p>
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

        <!-- Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2017 Copyright: <a href="http://www.schoolscompass.com.ng"><strong> SchoolsCompass</strong></a>
            </div>
        </div>

        <!--/.Copyright -->
        
    </footer>
<!--/.Footer-->

    <!-- SCRIPTS -->
<!--    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>-->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->webroot?>js/mdb.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->webroot?>js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->webroot?>js/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo $this->webroot?>js/jqxchart.js"></script>
    <script type="text/javascript" src="<?php echo $this->webroot?>js/jqxdata.js"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize Material Select
            //$('.mdb-select').material_select();
        });
        $(".select2").select2({
            minimumResultsForSearch: -1
        });
        
        $(".select2_").select2();
    </script>
</body>

</html>
