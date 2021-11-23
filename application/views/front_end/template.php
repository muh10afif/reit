
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">
    <title>R E I - T R U S T Investasi Property</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/signin/bootstrap/css/bootstrap.css" type="text/css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/signin/fonts/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/signin/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/signin/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/signin/css/user.css">


    <link rel="icon" href="<?= base_url() ?>assets/dist/img/logo11.png" type="image/x-icon">
</head>
<body>
    <div class="page sub-page">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <header class="hero" >
            <div class="hero-wrapper" style="padding-bottom: 0rem;">
                <!--============ Secondary Navigation ===============================================================-->
                <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
                   <a class="navbar-brand"><img src="<?php echo base_url()?>assets_frontend/signin/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active ">
                                <a class="nav-link" href="<?php echo base_url() ?>"><i class="fa fa-home"></i> <?php echo lang('home') ?> <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active ">
                                <div class="dropdown open">
                                        <a class="nav-link active dropdown-toggle"  id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fa fa-user" style="color:white;"></i> | <?php echo $this->session->userdata('nama'); ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                            <a class="dropdown-item " href="<?php echo base_url('frontend/signin/logout') ?>" style="font-size:11pt;"><i class="fa fa-sign-in"></i> <?php echo lang('logout') ?><span class="sr-only">(current)</span></a>

                                        </div>
                                    </div>
                            </li>
                            <?php echo nbs(10); ?>
                             <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url('LanguageSwitcher/switchLang/english') ?>"> <img style="height: 9px;width:15px;" src="<?php echo base_url() ?>assets_frontend/images/all/en.png"> EN </a>
                            </li>
                             <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url('LanguageSwitcher/switchLang/indonesia') ?>" class="margin-left:-50px;"> <img style="height: 9px;width:15px;" src="<?php echo base_url() ?>assets_frontend/images/all/id.png"> ID  </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Secondary Navigation -->
                    <!-- nav yp -->
                    <div class="main-navigation" <?php if ($this->session->userdata('masuk') != TRUE) {echo 'hidden';} ?>  >
                        <div class="container">
                            <nav class="navbar navbar-expand-lg navbar-light ">
                              <button class="navbar-toggler btn-block " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                              </button>

                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                  <li class="nav-item active">
                                    <a class="nav-link" href=""><?php echo lang('offer') ?></a>
                                  </li>
                                   <li class="nav-item ">
                                    <a class="nav-link" href="#"><?php echo  lang('my_transaction') ?></a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#"><?php echo  lang('my_invest') ?></a>
                                  </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#"><?php echo lang('document') ?></a>
                                  </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#"><?php echo lang('contact') ?></a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                        </div>  
                    
                    <!-- /nav yp -->

                    <!--end container-->
                </div>
                <!--============ End Main Navigation ================================================================-->
                <!-- <div class="background"></div> -->
                <!--end background-->
            </div>
            <!--end hero-wrapper-->
        </header>
        <!--end hero--> 
        <!--************ CONTENT ************************************************************************************-->
        <?= $konten ?>     
        <!--************ FOOTER *************************************************************************************-->
        
        <footer class="footer">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5" >
                            <a href="#" class="brand d-none d-sm-block">
                                <img src="<?php echo base_url()?>assets_frontend/signin/img/logo.png" alt="">
                            </a>
                            <p class="d-none d-sm-block">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet
                                fermentum sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra.
                            </p>
                        </div>
                        <!--end col-md-5-->
                        <div class="col-md-3">
                           <!--  <h2>Navigation</h2> -->
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                   <!--  <nav>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#">Home</a>
                                            </li>
                                            <li>
                                                <a href="#">Listing</a>
                                            </li>
                                            <li>
                                                <a href="#">Pages</a>
                                            </li>
                                            <li>
                                                <a href="#">Extras</a>
                                            </li>
                                            <li>
                                                <a href="#">Contact</a>
                                            </li>
                                            <li>
                                                <a href="#">Submit Ad</a>
                                            </li>
                                        </ul>
                                    </nav> -->
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <nav>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#">My Ads</a>
                                            </li>
                                            <li>
                                                <a href="#">Sign In</a>
                                            </li>
                                            <li>
                                                <a href="#">Register</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!--end col-md-3-->
                        <div class="col-md-4">
                            <h2>Contact</h2>
                            <address>
                                <figure>
                                    124 Abia Martin Drive<br>
                                    New York, NY 10011
                                </figure>
                                <br>
                                <strong>Email:</strong> <a href="#">hello@example.com</a>
                                <br>
                                <strong>Skype: </strong> Craigs
                                <br>
                                <br>
                                <a href="contact.html" class="btn btn-primary text-caps btn-framed">Contact Us</a>
                            </address>
                        </div>
                        <!--end col-md-4-->
                    </div>
                    <!--end row-->
                </div>
                <div class="background">
                    <div class="background-image original-size">
                        <img src="<?php echo base_url()?>assets_frontend/signin/img/footer-background-icons.jpg" alt="">
                    </div>
                    <!--end background-image-->
                </div>
                <!--end background-->
            </div>
        </footer>
        <!--end footer-->
    </div>
    <!--end page-->
	<!-- <script src="<?php echo base_url()?>assets_frontend/signin/js/jquery-3.3.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- number separators -->
    <script src="<?= base_url() ?>assets/vendors/number_separator/easy-number-separator.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assets_frontend/signin/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets_frontend/signin/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets_frontend/signin/bootstrap/js/bootstrap.min.js"></script>
    <!--     -->
	<script src="<?php echo base_url()?>assets_frontend/signin/js/selectize.min.js"></script>
	<script src="<?php echo base_url()?>assets_frontend/signin/js/masonry.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>assets_frontend/signin/js/icheck.min.js"></script>
	<script src="<?php echo base_url()?>assets_frontend/signin/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url()?>assets_frontend/signin/js/custom.js"></script>

    
</body>
</html>
