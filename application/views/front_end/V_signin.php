<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">
    <title>R E I - T R U S T Investasi Property</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/signin/bootstrap/css/bootstrap.css" type="text/css">
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
        
            <div class="hero-wrapper" style="padding-bottom: 0rem;">
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
                            <li class="nav-item active">
                                <a class="nav-link " href="<?php echo base_url('frontend/Signin/register') ?>"><i class="fa fa-pencil-square-o"></i> <?php echo lang('registration') ?> <span class="sr-only">(current)</span></a>
                            </li>
                            <?php echo nbs(10); ?>
                             <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url('LanguageSwitcher/switchLang/english') ?>"> <img style="height: 9px;width:15px;" src="<?php echo base_url() ?>assets_frontend/images/all/en.png"> EN </a>
                            </li>
                             <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url('LanguageSwitcher/switchLang/indonesia') ?>" class="margin-left:-50px;"><img style="height: 9px;width:15px;" src="<?php echo base_url() ?>assets_frontend/images/all/id.png"> ID  </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!--end hero-wrapper-->
   

        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="content">
            <section class="block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <form method="POST" class="form clearfix" action="<?= base_url('frontend/Signin/cek_login')?>"  >
                            <h2><?php echo lang('login') ?> <i class="fa fa-sign-in"></i></h2> 
                            <div class="form-group">
                                     <?php echo $this->session->flashdata('pesan'); ?>
                                    <label for="username" class="col-form-label required"><?php echo lang('username') ?></label>
                                    <input name="username" type="text" class="form-control" id="username" placeholder="<?php echo lang('username') ?>" >
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="password" class="col-form-label required"><?php echo lang('password') ?></label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="<?php echo lang('password') ?>" >
                                </div>
                                <!--end form-group-->
                                <div >
                                    <button type="submit" class="btn btn-primary pull-right"><?php echo lang('login') ?></button>
                                    <!-- a href="index.html" class="btn btn-primary"> Sign In</a> -->
                                </div>
                            </form>
                            <hr>
                            <p>
                                <?php echo lang('not_registered') ?><a href="<?php echo base_url('frontend/Signin/register') ?>" class="link"><?php echo lang('click_here') ?></a>
                            </p>
                        </div>
                        <!--end col-md-6-->
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <!--end footer-->
    </div>
    <!--end page-->

	<script src="<?php echo base_url() ?>assets_frontend/signin/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets_frontend/signin/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets_frontend/signin/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
	<script src="<?php echo base_url() ?>assets_frontend/signin/js/selectize.min.js"></script>
	<script src="<?php echo base_url() ?>assets_frontend/signin/js/masonry.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>assets_frontend/signin/js/icheck.min.js"></script>
	<script src="<?php echo base_url() ?>assets_frontend/signin/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>assets_frontend/signin/js/custom.js"></script>

</body>
</html>
