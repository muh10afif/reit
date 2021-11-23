<!DOCTYPE html>
<!-- 
Template Name: Mintos - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: https://hencework.ticksy.com/

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login | REI Trush</title>
    <meta name="description" content="REI Trust - Solusi Karya Digital 2019" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="<?= base_url() ?>assets/favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
   
	<!-- HK Wrapper -->
	<div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
                <a class="d-flex auth-brand" href="#">
                    <img class="brand-img" src="<?= base_url() ?>assets/dist/img/logo-dark.png" alt="brand" />
                </a>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/bg1.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">R E I - T R U S T <br> Investasi Property</h1>
                                        <p class="text-white">Membuat transaksi besar tersedia bagi investor setiap hari.</p>
                                    </div>
                                </div>
								<div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/bg1.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Solusi Inovatif</h1>
                                        <p class="text-white">REI Trust terus tumbuh sebagai perusahaan dengan pendekatan mutakhir untuk investasi dan penciptaan investasi anda.</p>
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                <form>
                                    <h1 class="display-4 mb-20">Selamat Datang</h1><br>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email" type="email">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Password" type="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-25">
                                        <input class="custom-control-input" id="same-address" type="checkbox" checked>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">L O G I N</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
	<!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="<?= base_url() ?>assets/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Owl JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/init.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/login-data.js"></script>
</body>

</html>