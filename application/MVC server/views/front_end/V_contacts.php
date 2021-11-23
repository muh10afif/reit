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
                    <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
                        <div class="bg par-elem"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="pattern-bg"></div>
                        <div class="container">
                            <div class="section-title">
                                <h2>Hubungi <span>Kami </span>   </h2>
                                <p> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                <div class="horizonral-subtitle"><span>Contacts</span></div>
                            </div>
                        </div>
                        <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
                    </section>
                    <!-- section end-->
                    <!-- section end-->  
                    <section data-scrollax-parent="true" id="sec1">
                        <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" >Buat Janji Dengan Kami<span>//</span></div>
                        <div class="container">
                            <!-- contact details --> 
                            <div class="fl-wrap   mar-bottom">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="pr-title fl-wrap">
                                            <h3>Contact  Details</h3>
                                            <span>Lorem Ipsum generators on the Internet   king this the first true generator</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <!-- features-box-container --> 
                                        <div class="features-box-container single-serv fl-wrap">
                                            <div class="row">
                                                <!--features-box --> 
                                                <div class="features-box col-md-4">
                                                    <div class="time-line-icon">
                                                        <i class="fal fa-mobile-android"></i>
                                                    </div>
                                                    <h3>01. Phone</h3>
                                                    <a href="#">+489756412322</a>
                                                </div>
                                                <!-- features-box end  --> 
                                                <!--features-box --> 
                                                <div class="features-box col-md-4">
                                                    <div class="time-line-icon">
                                                        <i class="fal fa-compass"></i>
                                                    </div>
                                                    <h3>02. Location</h3>
                                                    <a href="#">Indonesia</a>
                                                </div>
                                                <!-- features-box end  --> 
                                                <!--features-box --> 
                                                <div class="features-box col-md-4">
                                                    <div class="time-line-icon">
                                                        <i class="fal fa-envelope-open"></i>
                                                    </div>
                                                    <h3>03. Email</h3>
                                                    <a href="#">yourmail@domain.com</a>
                                                </div>
                                                <!-- features-box end  --> 
                                            </div>
                                        </div>
                                        <!-- features-box-container end  -->
                                    </div>
                                </div>
                            </div>
                            <!-- contact details end  --> 
                            <div class="fw-map-container fl-wrap mar-bottom">
                                <div class="map-container">
                                    <div id="singleMap" data-latitude="40.7143528" data-longitude="-74.0059731" data-mapTitle="Out Location"></div>
                                </div>
                            </div>
                            <!--  map end  --> 
                            <div class="fl-wrap mar-top">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="pr-title fl-wrap">
                                            <h3>Buat Janji Dengan Kami</h3>
                                            <span>Lorem Ipsum generators on the Internet   king this the first true generator</span>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div id="contact-form">
                                            <div id="message"></div>
                                            <form  class="custom-form" action="php/contact.php" name="contactform" id="contactform">
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label><i class="fal fa-user"></i></label>
                                                            <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label><i class="fal fa-envelope"></i> </label>
                                                            <input type="text"  name="email" id="email" placeholder="Email Address *" value=""/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label><i class="fal fa-mobile-android"></i> </label>
                                                            <input type="text"  name="phone" id="phone" placeholder="Phone *" value=""/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="subject" id="subject" data-placeholder="Subject" class="chosen-select sel-dec">
                                                                <option>Subject</option>
                                                                <option value="Order Project">Order Project</option>
                                                                <option value="Support">Support</option>
                                                                <option value="Other Question">Other Question</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>
                                                    <div class="verify-wrap">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <button class="btn float-btn flat-btn color-btn" id="submit">Send Message</button>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <!-- contact form  end--> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-parallax-module" data-position-top="70"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
                        <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
                        <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
                        <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
                        <div class="sec-lines"></div>
                    </section>
                    <!-- section end-->              
                    <!-- section-->
                    <section class="dark-bg2 small-padding order-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Temukan kami di Media Sosial : </h3>
                                </div>
                                <div class="col-md-4">
                                    <ul >
                                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end-->
                </div>
                <!-- Content end -->
                <!-- footer-->
                <div class="height-emulator fl-wrap"></div>
                <footer class="main-footer fixed-footer">
                    <div class="footer-inner fl-wrap">
                        <div class="container">
                            <div class="partcile-dec" data-parcount="90"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="footer-title fl-wrap">
                                        <span>B D I C A P I T A L</span>

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="footer-header fl-wrap"><span>01.</span>Last Twitts</div>
                                    <div class="footer-box fl-wrap">
                                        <div class="twitter-swiper-container fl-wrap" id="twitts-container"></div>
                                        <a href="#" class="btn float-btn trsp-btn">Follow</a>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="footer-header fl-wrap"><span>02.</span> Subscribe / Contacts</div>
                                    <div class="footer-box fl-wrap">
                                        <p>Terima kasih telah mengunjungi situs web kami. Pastikan Anda mendaftar untuk mendapatkan pembaruan tentang penawaran dan berita baru dari keluarga investasi BDI Capital</p>
                                        <div class="subcribe-form fl-wrap">
                                            <form id="subscribe" class="fl-wrap">
                                                <input class="enteremail" name="email" id="subscribe-email" placeholder="email" spellcheck="false" type="text">
                                                <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fal fa-paper-plane"></i> Send </button>
                                                <label for="subscribe-email" class="subscribe-message"></label>
                                            </form>
                                        </div>
                                        <div class="footer-contacts fl-wrap">
                                            <ul>
                                                <li><i class="fal fa-phone"></i><span>Phone :</span><a href="#">+489756412322</a></li>
                                                <li><i class="fal fa-envelope"></i><span>Email :</span><a href="#">yourmail@domain.com</a></li>
                                                <li><i class="fal fa-map-marker"></i><span>Address</span><a href="#">I n d o n e s i a</a></li>
                                            </ul>
                                        </div>
                                        <!-- nav-contacts end -->                                        
                                        <!-- footer-socilal -->            
                                        <div class="footer-socilal fl-wrap">
                                            <ul >
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                            </ul>
                                        </div>
                                        <!-- footer-socilal end -->       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subfooter fl-wrap">
                        <div class="container">
                            <!-- policy-box-->
                            <div class="policy-box">
                                <span>&#169; PT. Realestate Investasi Terpercaya  /  All rights reserved. </span>
                            </div>
                            <!-- policy-box end-->
                            <a href="#" class="to-top color-bg"><i class="fal fa-angle-up"></i><span></span></a>
                        </div>
                    </div>
                </footer>
                <!-- footer end-->
                <!-- contact-btn -->    
                <a class="contact-btn color-bg" href="contacts.html"><i class="fal fa-envelope"></i><span>Buat Janji Dengan Kami</span></a>  
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