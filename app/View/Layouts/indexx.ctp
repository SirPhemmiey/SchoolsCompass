<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AutoDirect | Nigeria's No.1 Car Import Service</title>
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

<body>

    <header>
        <!--  Heading -->
        <nav class="navbar navbar-dark blue darken-4 nav-top">  
            <ul class="flex-list">
                <li class="flex-list-item"><a href="#">My Account</a></li>
                <li class="flex-list-item"><a href="#">My WishList</a></li>
                <li class="flex-list-item"><a href="#">Contact Us</a></li>
                <li class="flex-list-item"><a href="signin.html">Log In</a></li>
                <li class="flex-list-item"><a href="signup.html">Sign Up</a></li>
                <p class="flex-list flex-list--text">Welcome <span id="name"></span></p>
            </ul>           
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-white nav-margin">
            <a class="navbar-brand" href="#"><h3><strong>AutoDirect</strong></h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="search.html">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.html">FAQ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- End of Main Navigation-->

    <!--Main Layout-->
    <main class="text-center py-5">
        <div class="search-heading">
            <h2>Search</h2>
        </div>
        <section>
            <div class="search-area">
                <form class=" flex-form">
                    <!-- <input type="search" class="flex-input" placeholder="I'm searching for...Brand of Car"> -->
                    
                       
                       <select class="mdb-select colorful-select dropdown-primary" name="" id="" required>
                            <option value="" disabled selected>Make</option>
                            <option value="">Toyota</option>
                            <option value="">Honda</option>
                            <option value="">Mercedes</option>
                            <option value="">Mazda</option>
                            <option value="">Infinity</option>
                            <option value="">Audi</option>
                        </select>  
                      
                        <select class="mdb-select colorful-select dropdown-primary" name="" id="">
                            <option value="" disabled selected>Model</option>
                        </select>

                        <select class="mdb-select colorful-select dropdown-primary" name="" id="">
                            <option value="" disabled selected>Min Price</option>
                        </select>

                        <select class="mdb-select colorful-select dropdown-primary" name="" id="">
                            <option value="" disabled selected>Max Price</option>
                        </select>
                    
                        <select class="mdb-select colorful-select dropdown-primary" name="" id="">
                            <option value="" disabled selected>From</option>
                        </select> 
                     
                        <select class="mdb-select colorful-select dropdown-primary" name="" id="" >
                            <option value="" disabled selected>To</option>
                        </select> 

                    <button type="submit" class="btn waves-effect blue list-search-btn">Search</button>
                </form>
            </div>

        </section>

        <section class="result" id="result">
            <div class="container">
                <h3 class="text-left"><b><span id="total">169</span></b> results found</h3>
                <!--  Display serach result-->
                <div class="row">
                    <div class="col-md-8"> 
                        <div class="result__display">
                            <!-- List of search results -->
                            <div class="result__lists">

                                <!-- Search result item -->
                                <div class="result__item">
                                    <div class="result__item--wrapper">
                                        <!-- car Image -->
                                        <div class="result__item--main">
                                            <div class="result__item--img">
                                                <a href="#" id="result-link">
                                                    <img id="" src="<?php echo $this->webroot?>img/result/search-car.jpg" alt="Auto Item result">
                                                </a>
                                                <div class="link-overlay">
                                                    <p>Buy Now <span id="search-price">&#8358;1, 400, 000</span></p>
                                                </div>
                                            </div>
                                            <div class="result__item--details">
                                                <p>2017 Hyundai Elantra</p>
                                                <h6>Odometer: 53,000 km</h6>
                                                <a href="#">View details</a>
                                            </div>
                                        </div>
                                        <div class="result__item--meta">
                                            <h6>3 days and 4 hours</h6>
                                            <h5>&#8358; <span>1, 400, 000</span></h5>
                                            <button class="btn action darken blue">Bid</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Search result item -->
                                
                               
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
            
      
    </main>
    <!--Main Layout-->
        

    <!--Footer-->
    <footer class="page-footer blue-grey lighten-5 pt-0">

      
        <div class="blue darken-4">
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
                    <h6 class="title font-bold"><strong>Autodirect</strong></h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" ">
                    <p>About Autodirect here.</p>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-3 mx-auto mb-r dark-grey-text">
                    <h6 class="title font-bold"><strong>Products</strong></h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" ">
                    <p><a href="#!" class="dark-grey-text">Autoparts</a></p>
                    <p><a href="#!" class="dark-grey-text">Windshield Repair</a></p>
                    <p><a href="#!" class="dark-grey-text">Car Tracker</a></p>
                    <p><a href="#!" class="dark-grey-text">Delivery</a></p>
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-md-3 mx-auto mb-r dark-grey-text">
                    <h6 class="title font-bold"><strong>Useful links</strong></h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" ">
                    <p><a href="#!" class="dark-grey-text">Your Account</a></p>
                    <p><a href="#!" class="dark-grey-text">Become a Partner</a></p>
                    <p><a href="#!" class="dark-grey-text">Shipping Rates</a></p>
                    <p><a href="#!" class="dark-grey-text">Help</a></p>
                </div>
                <!--/.Third column-->

                <!--Fourth column-->
                <div class="col-md-3 dark-grey-text">
                    <h6 class="title font-bold"><strong>Contact</strong></h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto"">
                    <p><i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p><i class="fa fa-envelope mr-3"></i> info@autodirect.ng</p>
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
                © 2017 Copyright: <a href="https://www.MDBootstrap.com"><strong> AutoDirect.ng</strong></a>
            </div>
        </div>
        <!--/.Copyright -->
        
    </footer>
<!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo $this->webroot?>js/mdb.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Material Select
            $('.mdb-select').material_select();
        });
    </script>
</body>

</html>
