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
        
            <div class="hero-wrapper" style="padding-bottom: ">
                <!--============ Secondary Navigation ===============================================================-->
                 <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
                    <?php echo nbs(30) ?><a class="navbar-brand"><img src="<?php echo base_url()?>assets_frontend/signin/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active ">
                                <a class="nav-link" href="<?php echo base_url() ?>"><i class="fa fa-home"></i> <?php echo lang('home') ?> <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link " href="<?php echo base_url('frontend/Signin') ?>"><i class="fa fa-pencil-square-o"></i> <?php echo lang('login') ?> <span class="sr-only">(current)</span></a>
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
                
                <!-- End Secondary Navigation -->
            </div>
            <!--end hero-wrapper-->

        <!--end hero-->

        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="content">
            <section class="block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                            <h2> <i class="fa fa-pencil-square-o"></i> Register</h2>
                                <?php echo $this->session->flashdata('message'); ?>
                            
                            
                            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                            <form action="<?php echo base_url('frontend/Signin/register_proses') ?>" method="POST" class="form clearfix">
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Name</label>
                                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Name" required value="<?php echo set_value('nama'); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-form-label required">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Repeat Password" required value="<?php echo set_value('email'); ?>">
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="username">Username</label> 
                                    <input name="username" type="text" class="form-control" id="username" placeholder="Username" required value="<?php echo set_value('username'); ?>">
                                    
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="password" class="col-form-label required">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required value="<?php echo set_value('password'); ?>">
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="confirm_password" class="col-form-label required">Repeat Password</label>
                                    <input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Repeat Password" required value="<?php echo set_value('confirm_password'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password" class="col-form-label required">Choose level</label>
                                    <select name="level"  class="form-control" required="required">
                                        <option value="3">Investor</option>
                                        <option value="6">Contributor</option>
                                        <option value="7">Koperasi</option>
                                    </select>
                                </div>
                                <!--end form-group-->
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                            <hr>
                            <p>
                                By clicking "Register" button, you agree with our <a href="#" class="link">Terms & Conditions.</a><br>
                               <a href="<?php echo base_url('frontend/Disclaimer')?>" class="link">Disclaimer</a>
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
   
    </div>
    <!--end page-->

  <script src="<?php echo base_url()?>assets_frontend/signin/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets_frontend/signin/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets_frontend/signin/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
    <script src="<?php echo base_url()?>assets_frontend/signin/js/selectize.min.js"></script>
    <script src="<?php echo base_url()?>assets_frontend/signin/js/masonry.pkgd.min.js"></script>
    <script src="<?php echo base_url()?>assets_frontend/signin/js/icheck.min.js"></script>
    <script src="<?php echo base_url()?>assets_frontend/signin/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets_frontend/signin/js/custom.js"></script>


</body>
</html>
