<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>REI Trust - Investasi Real Estat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index4, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets_frontend/home/css/reset.css">
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets_frontend/home/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets_frontend/home/css/style.css">
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets_frontend/home/css/color.css">
        <!-- <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets_frontend/home/js/plugins/jvectormap/jquery-jvectormap-1.2.2.css"   /> -->
         <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css"  />
         <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/vendors/ckeditor/plugins/ckawesome/dialogs/ckawesome.css"   />
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/dist/img/logo11.png">
          <style>
            .anyClass {
              height:250px;
              overflow-y: scroll;
            }
        </style>    
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            <header class="main-header">
                <a class="logo-holder" href="<?php echo base_url() ?>">
                <img src="<?= base_url() ?>assets_frontend/home/images/logo.png"  alt="">
                </a>
                <!-- nav-button-wrap-->
                <div class="nav-button but-hol">
                    <span  class="nos"></span>
                    <span class="ncs"></span>
                    <span class="nbs"></span>
                    <div class="menu-button-text">Menu</div>
                </div>
                
                <!-- nav-button-wrap end-->
                
                <!-- <div class="header-social ">
                    <ul >
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                    </ul>
                </div> -->
                <!--  showshare -->  
                <!-- <div class="show-share showshare hidden-lg hidden-md ">
                    <i class="fal fa-user"></i>
                    <span>Share This</span>
                </div> -->
                <div class="show-share  hidden-lg hidden-md">
                <a class=" color-bg" href="<?= base_url('frontend/Signin/register') ?>"><i class="fal fa-user"></i><span><?php echo lang('registration') ?></span></a>
                </div>
                <div class="btn-group pull-left " style="margin-top: 30px;">
                            <a class="" href="<?php echo base_url('LanguageSwitcher/switchLang/english') ?>" style="color: #FAC921;"><img style="height: 9px;width:15px; " src="<?php echo base_url('assets_frontend/images/all/en.png') ?>" alt=""> EN | </a>
                            <a class="" href="<?php echo base_url('LanguageSwitcher/switchLang/indonesia') ?>" style="color: #FAC921;">ID <img style="height: 9px;width:15px; " src="<?php echo base_url('assets_frontend/images/all/id.png') ?>" alt=""></a>
                        </div>
                <!--  showshare end -->
            </header>
            <!--  header end -->
            <!--  navigation bar -->
            <div class="nav-overlay">
                <div class="tooltip color-bg"><?php echo lang('close_menu') ?></div>
            </div>
            <div class="nav-holder">
                <a class="header-logo" href="index.html"><img src="<?= base_url() ?>assets_frontend/home/images/logo2.png" alt=""></a> 
                <div class="nav-title"><span>Menu</span></div>
                <div class="nav-inner-wrap">
                    <nav class="nav-inner sound-nav" id="menu">
                        <ul>
                            <li>
                                <a href="#" class="act-link"><?php echo lang('home') ?></a>
                            </li>
                            <li>
                                <a href="#"><?php echo lang('invest') ?></a>
                                <!--level 2 -->
                                <ul>
                                    <li><a href="<?php echo base_url('frontend/Prospektus') ?>"><?php echo lang('our_invest') ?></a></li>
                                        <!--level 3 -->
                                        <ul>
                                            
                                        </ul>
                                        <!--level 3 end -->
                                    </li>
                                </ul>
                                <!--level 2 end -->
                            </li>
                            <li><a href="<?php echo base_url('frontend/Disclaimer') ?>"><?php echo lang('disclaimer') ?></a></li>
                            <li><a href="<?php echo base_url('Home/contact') ?>"><?php echo lang('contacts') ?></a></li>
                            <li>
                                <a href="#"><?php echo  lang('pages') ?></a>
                                <!--level 2 -->
                                <ul>
                                    <li><a href="https://www.ojk.go.id/id/kanal/pasar-modal/regulasi/peraturan-ojk/Documents/Pages/POJK-Nomor-52-POJK.04-2017/SAL%20POJK%2052%20-%20DINFRA.pdf"target="_blank">DINFRA OJK</a></li>
                                    <li><a href="https://www.ojk.go.id/id/regulasi/Documents/Pages/Dana-Investasi-Real-Estat-Berbentuk-Kontrak-Investasi-Kolektif/SAL%20POJK%2064%20-%20DIRE.pdf#search=NOMOR%2064%20%2FPOJK%2E04%2F2017"target="_blank">DIRE OJK</li>
                                </ul>
                                <a href="<?= base_url('frontend/Signin') ?>"><?php echo lang('login') ?></a>
                                <a href="register-admin.html"><?php echo lang('register') ?></a>
                                <!--level 2 end -->
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--  navigation bar end -->
            <!-- wrapper-->
            <div id="wrapper" class="single-page-wrap">
                <!-- Content-->
                <div class="content">
                    <div class="single-page-decor"></div>
                    <div class="single-page-fixed-row">
                        <div class="scroll-down-wrap">
                            <div class="mousey">
                                <div class="scroller"></div>
                            </div>
                            <span>Scroll Down</span>
                        </div>
                        <a href="<?php echo base_url() ?>" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>kembali ke beranda</span></a>
                    </div>
                    <!-- section-->
                    <section class="parallax-section parallax-sec-half-right" data-scrollax-parent="true">
                        <div class="container" style="width:70%;color: #000000;">
                            <p style="font-size: 14pt;color:black"><?php echo lang('term_condition') ?></p>
                            <?php echo $disclaimer ?>      
                        </div>
                        <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
                    </section>
                    <!-- section end-->
                   
                </div>
                <!-- Content end -->
               <!-- footer-->
                <div class="height-emulator fl-wrap"></div>
                <footer class="main-footer fixed-footer">
                    <!--footer-inner--> 
                    <div class="footer-inner fl-wrap">
                        <div class="container">
                            <div class="partcile-dec" data-parcount="90"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="footer-title fl-wrap">
                                        <span>REI Trust</span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <!-- <div class="footer-header fl-wrap"><span>01.</span>Last Twitts</div>
                                    <div class="footer-box fl-wrap">
                                        <div class="twitter-swiper-container fl-wrap" ></div>
                                        <a href="#" class="btn float-btn trsp-btn">Follow</a>
                                    </div> -->
                                </div>
                                <div class="col-md-5">
                                    <div class="footer-header fl-wrap" style="margin-top: 100px;"><span></span> Subscribe / Contacts</div>
                                    <!-- footer-box--> 
                                    <div class="footer-box fl-wrap">
                                        <p>Want to be notified when we launch a news or an update. Just sign up and we'll send you a notification by email.</p>
                                        <div class="subcribe-form fl-wrap">
                                            <form id="subscribe" class="fl-wrap">
                                                <input class="enteremail" name="email" id="subscribe-email" placeholder="email" spellcheck="false" type="text">
                                                <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fal fa-paper-plane"></i> Send </button>
                                                <label for="subscribe-email" class="subscribe-message"></label>
                                            </form>
                                        </div>
                                        <!-- footer-contacts-->                    
                                        <div class="footer-contacts fl-wrap">
                                            <ul>
                                                <li><i class="fal fa-phone"></i><span>Phone :</span><a href="#"><?php echo $phone_footer ?></a></li>
                                                <li><i class="fal fa-envelope"></i><span>Email :</span><a href="#"><?php echo $email_footer ?></a></li>
                                                <li><i class="fal fa-map-marker"></i><span>Address</span><a href="#"><?php echo $address_footer ?></a></li>
                                            </ul>
                                        </div>
                                        <!-- footer end -->                                        
                                        <!-- footer-socilal -->            
                                        <div class="footer-socilal fl-wrap">
                                            <ul >
                                                <li><a href="<?php echo $facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="<?php echo $instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="<?php echo $twitter ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                        <!-- footer-socilal end -->       
                                    </div>
                                    <!-- footer-box end--> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--footer-inne endr--> 
                    <!--subfooter--> 
                    <div class="subfooter fl-wrap">
                        <div class="container">
                            <!-- policy-box-->
                            <div class="policy-box">
                                <span>&#169; PT.Real Estat Investasi Terpercaya 2019  /  All rights reserved. </span>
                            </div>
                            <!-- policy-box end-->
                            <a href="#" class="to-top color-bg"><i class="fal fa-angle-up"></i><span></span></a>
                        </div>
                    </div>
                    <!--subfooter end--> 
                </footer>
                <!-- footer end-->
                <!-- contact-btn -->  
                 <a class="contact-btn color-bg"  href="<?= base_url('frontend/Signin') ?>"><i class="fal fa-user" style="margin-top: 30px;"></i><span><?php echo lang('login') ?></span></a>   
                <!-- contact-btn end -->        
            </div>
            <!--   content end -->
            <!-- share-wrapper -->                       
            <div class="share-wrapper isShare">
                <div class="share-title"><span>Share</span></div>
                <div class="close-share soa"><span>Close</span><i class="fal fa-times"></i></div>
                <div class="share-inner soa">
                    <div class="share-container"></div>
                </div>
            </div>
            <!-- share-wrapper end -->  
        </div>
        <!-- Main end -->

        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="<?= base_url() ?>assets_frontend/home/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets_frontend/home/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets_frontend/home/js/plugins.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets_frontend/home/js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendors/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/vendors/ckeditor/plugins/ckawesome/dialogs/ckawesome.js"></script>
    </body>
</html>