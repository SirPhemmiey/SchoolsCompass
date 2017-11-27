<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SchoolsCompass | We guide, you decide</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->webroot?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo $this->webroot?>css/mdb.min.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="<?php echo $this->webroot?>css/style.css" rel="stylesheet">
    <!-- Responsive styles -->
    <link href="<?php echo $this->webroot?>css/responsive.css" rel="stylesheet">
</head>

<body style="background-color:">

    <header>
        <!--  Heading -->
    </header>
    <!-- End of Main Navigation-->

    <?php echo $this->fetch('content');?>

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
                    <div class="ccol-md-7 text-center text-md-right">
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
                    <p>About SchoolsCompass here.</p>
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
                © 2017 Copyright: <a href="https://www.MDBootstrap.com"><strong> SchoolsCompass</strong></a>
            </div>
        </div>
        <!--/.Copyright -->
        
    </footer>
<!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/jquery-3.1.1.min.js"></script>
    <!--Facebook JS-->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/facebook.js"></script>
    <!--Facebook JS-->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/oauthpopup.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/mdb.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Material Select
            //$('.mdb-select').material_select();
        });
    </script>
</body>

</html>
