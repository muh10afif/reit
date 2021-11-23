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
                <!--  showshare -->  
                <div class="show-share showshare hidden-lg hidden-md">
                <a class=" color-bg" href="<?= base_url('frontend/Signin/register') ?>"><i class="fal fa-user"></i><span>Registration</span></a>
                </div>
                <div class="btn-group pull-left " style="margin-top: 30px;">
                            <a class="" href="<?php echo base_url('Home_en') ?>" style="color: #FAC921;"><img style="height: 9px;width:15px; " src="<?php echo base_url('assets_frontend/images/all/en.png') ?>" alt=""> EN | </a>
                            <a class="" href="<?php echo base_url('Home') ?>" style="color: #FAC921;">ID <img style="height: 9px;width:15px; " src="<?php echo base_url('assets_frontend/images/all/id.png') ?>" alt=""></a>
                        </div>
                <!--  showshare end -->
            </header>
            <!--  header end -->
            <!--  navigation bar -->
            <div class="nav-overlay">
                <div class="tooltip color-bg">Close Menu</div>
            </div>
            <div class="nav-holder">
                <a class="header-logo" href="index.html"><img src="<?= base_url() ?>assets_frontend/home/images/logo2.png" alt=""></a> 
                <div class="nav-title"><span>Menu</span></div>
                <div class="nav-inner-wrap">
                    <nav class="nav-inner sound-nav" id="menu">
                        <ul>
                            <li>
                                <a href="#" class="act-link">Home</a>
                            </li>
                            <li>
                                <a href="#">Invest</a>
                                <!--level 2 -->
                                <ul>
                                    <li><a href="<?php echo base_url('frontend/Prospektus') ?>">Our Investment</a></li>
                                        <!--level 3 -->
                                        <ul>
                                            
                                        </ul>
                                        <!--level 3 end -->
                                    </li>
                                </ul>
                                <!--level 2 end -->
                            </li>
                            <li><a href="<?php echo base_url('frontend/Disclaimer') ?>">Disclaimer</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li>
                                <a href="#">Pages</a>
                                <!--level 2 -->
                                <ul>
                                    <li><a href="https://www.ojk.go.id/id/kanal/pasar-modal/regulasi/peraturan-ojk/Documents/Pages/POJK-Nomor-52-POJK.04-2017/SAL%20POJK%2052%20-%20DINFRA.pdf"target="_blank">DINFRA OJK</a></li>
                                    <li><a href="https://www.ojk.go.id/id/regulasi/Documents/Pages/Dana-Investasi-Real-Estat-Berbentuk-Kontrak-Investasi-Kolektif/SAL%20POJK%2064%20-%20DIRE.pdf#search=NOMOR%2064%20%2FPOJK%2E04%2F2017"target="_blank">DIRE OJK</li>
                                </ul>
                                <a href="<?= base_url('login') ?>">Log In</a>
                                <a href="register-admin.html">Register</a>
                                <!--level 2 end -->
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--  navigation bar end -->
            <!-- wrapper-->
            <div id="wrapper">
                <!-- scroll-nav-wrap-->
                <div class="scroll-nav-wrap fl-wrap">
                    <div class="scroll-down-wrap">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                        <span>Scroll Down</span>
                    </div>
                    <nav class="scroll-nav scroll-init">
                        <ul>
                            <li><a class="scroll-link act-link" href="#sec1">Home</a></li>
                            <li><a class="scroll-link" href="#sec5">Our Projects</a></li>
                            <li><a class="scroll-link" href="#sec2">Invest</a></li>
                            <li><a class="scroll-link" href="#sec7">FAQ</a></li>
                            <li><a class="scroll-link" href="#sec4">News</a></li>
                            <li><a class="scroll-link" href="#sec6">Clients</a></li>
                        </ul>
                    </nav>
                    
                     
                </div>
                <!-- scroll-nav-wrap end-->
                <!-- hero-wrap-->
                <div class="hero-wrap" id="sec1" data-scrollax-parent="true">
                    <!-- hero-inner-->
                    <div class="hero-inner fl-wrap full-height" style="margin-top: -50px;">
                        <div class="half-hero-wrap">
                            <h1>R E I   <br>T R U S T<br> <span>Property Investment</span></h1>
                                        <h4><?php echo $title_jumbotron ?></h4>
                            <div class="clearfix"></div>
                            <a href="<?php echo base_url('frontend/Signin') ?>" class="custom-scroll-link btn float-btn flat-btn color-btn mar-top">Invest With Us</a>
              
             
                        </div>
                        <div class="bg"  data-bg="<?= base_url() ?>assets_frontend/images/bg/<?php echo $gb_jumbotron ?>" data-scrollax="properties: { translateY: '250px' }" ></div>
                        <div class="overlay"></div>
                        <!--hero dec-->
                        <div class="hero-decor-let">
                            <div>Perumahan</div>
                            <div><span>Pusat Komersial</span></div>
                            <div>Rumah Sakit</div>
                            <div><span>Eco Park</span></div>
                        </div>
                        <div class="hero-decor-numb"><span>106.84513  </span><span>-6.21462 </span> <a href="https://goo.gl/maps/jWLNji39Xpv" target="_blank" class="hero-decor-numb-tooltip">Berpusat di Indonesia</a></div>
                        <div class="pattern-bg"></div>
                        <div class="hero-line-dec"></div>
                    </div>
                    <!--hero dec end-->
                </div>
                <!-- hero-wrap end-->
                <!-- Content-->
                <div class="content">
                    <!--section -->
                    <section class="dark-bg" id="sec5">
                        <div class="fet_pr-carousel-title">
                            <div class="fet_pr-carousel-title-item">
                                <h3>Our Project</h3>
                                <p>“Before you decide to purchase this participation unit, please kindly read our diclaimer statement on our disclaimer page“</p>
                                <a href="#" class="btn float-btn flat-btn color-btn mar-top">Project Detail</a>
                            </div>
                        </div>
                        <!--slider-carousel-wrap -->
                        <div class="slider-carousel-wrap fl-wrap">
                            <!--fet_pr-carousel -->
                            <div class="fet_pr-carousel cur_carousel-slider-container fl-wrap">
                                <!--slick-item -->
                                <?php foreach ($data_project_thumb->result() as $row ) { ;
                                    $gambar = base64_decode($row->gambar);  ?>
                                <div class="slick-item">
                                    <div class="fet_pr-carousel-box">
                                        <div class="fet_pr-carousel-box-media fl-wrap">
                                            <img style="height:320px;" src="<?php echo base_url()?>assets/gambar/<?php echo $gambar ?>" class="respimg" alt="">
                                            <a href="<?php echo base_url()?>assets/gambar/<?php echo $gambar ?>" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                        </div>
                                        <div class="fet_pr-carousel-box-text fl-wrap">
                                            <h3><a href="portfolio-single5.html"><?php echo $row->nama_kawasan ?></a></h3>
                                            <div class="fet_pr-carousel-cat"><a href="#"><?php echo $row->alamat ;?></a> <a href="#"></a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                                <!--slick-item end -->

                            </div>
                            <!--fet_pr-carousel end -->
                            <div class="sp-cont sp-arr sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                            <div class="sp-cont sp-arr sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                        </div>
                        <!--slider-carousel-wrap end-->
                        <div class="fet_pr-carousel-counter"></div>
                    </section>
                    <!-- section end --> 
                    <!-- section-->
                    <section data-scrollax-parent="true" id="sec2">
                        <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" > <span>//</span>Words About  </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="collage-image fl-wrap">
                                        <div class="collage-image-title" data-scrollax="properties: { translateY: '150px' }">REI Trust</div>
                                        <img src="<?= base_url() ?>assets_frontend/images/all/<?php echo $inv_gambar ?>" class="respimg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="main-about fl-wrap">
                                        <h2><?php echo $inv_title_promo ;?></h2>
                                        <!-- features-box-container --> 
                                        <div class="features-box-container fl-wrap">
                                            <div class="row">
                                                <!--features-box --> 
                                                <div class="features-box col-md-6">
                                                    <div class="time-line-icon">
                                                        <i class="fal fa-home"></i>
                                                    </div>
                                                    <h3><?php echo $inv_promo_title_cont1 ?></h3>
                                                    <p><?php echo $inv_promo_cont1 ?></p>
                                                </div>
                                                <!-- features-box end  --> 
                                                <!--features-box --> 
                                                <div class="features-box col-md-6">
                                                    <div class="time-line-icon">
                                                        <i class="fal fa-mobile-android"></i>
                                                    </div>
                                                    <h3><?php echo $inv_promo_title_cont2 ?></h3>
                                                    <p><?php echo $inv_promo_cont2 ?></p>
                                                </div>
                                                <!-- features-box end  --> 
                                                <!--features-box --> 
                                                <div class="features-box col-md-6">
                                                    <div class="time-line-icon">
                                                        <i class="fab fa-pagelines"></i>
                                                    </div>
                                                    <h3><?php echo $inv_promo_title_cont3 ?></h3>
                                                    <p><?php echo $inv_promo_cont3 ?></p>
                                                </div>
                                                <!-- features-box end  -->                                
                                                <!--features-box --> 
                                                <div class="features-box col-md-6">
                                                    <div class="time-line-icon">
                                                        <i class="fal fa-shopping-bag"></i>
                                                    </div>
                                                    <h3><?php echo $inv_promo_title_cont4 ?></h3>
                                                    <p><?php echo $inv_promo_cont4 ?></p>
                                                </div>
                                                <!-- features-box end  -->  
                                            </div>
                                        </div>
                                        <!-- features-box-container end  -->
                                        <!-- <a href="portfolio.html" class="btn float-btn flat-btn color-btn">My Portfolio</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-parallax-module" data-position-top="90"  data-position-left="25" data-scrollax="properties: { translateY: '-250px' }"></div>
                        <div class="bg-parallax-module" data-position-top="70"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
                        <div class="sec-lines"></div>
                    </section>
                    <!-- section end-->
                    <!-- section-->
                    <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
                        <div class="bg par-elem"  data-bg="<?= base_url() ?>assets_frontend/images/bg/<?php echo $gb_jumbotron ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h2> <span>Our </span> <br> Project</h2>
                                <p>We have various system components that are specifically in accordance with the industry's needs and the right investment.</p>
                                <div class="horizonral-subtitle"><span>Cara </span></div>
                            </div>
                            <div class="fl-wrap facts-holder">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="<?php echo $inv_proyek_selesai; ?>">0</div>
                                            </div>
                                        </div>
                                        <h6>Finished Project</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="<?php echo $inv_client; ?>">0</div>
                                            </div>
                                        </div>
                                        <h6>Our Clients</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                               <!--  <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="825">0</div>
                                            </div>
                                        </div>
                                        <h6>Jam Kerja </h6>
                                    </div>
                                </div> -->
                                <!-- inline-facts end -->                              
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="<?php echo $inv_proyek_berjalan; ?>">0</div>
                                            </div>
                                        </div>
                                        <h6>Unit Property</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->                             
                            </div>
                        </div>
                    </section>
                    <!-- section end-->
                    <!-- section-->
                    <section data-scrollax-parent="true" id="sec3">
                        <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" >Soul City  <span>//</span></div>
                        <div class="container">
                            <!-- section-title -->
                            
                                <!-- custom-inner end -->
                            </div>
                            <!-- custom-inner-holder -->

                    <!-- section end-->
                    <!-- section  -->
                    <section class="dark-bg sinsec-dec sinsec-dec2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="hidden-xs hidden-sm embed-responsive embed-responsive-4by3">
                                        <iframe style="width: 80%;min-height:350px;" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $vid_link ?>"></iframe>
                                    </div>
                                    <div class="hidden-md hidden-lg embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $vid_link ?>"></iframe>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="video-promo-text fl-wrap mar-top">
                                <h3>Presentation Video</h3>
                                <?php echo $vid_narasi ?>s
                                <a href="https://youtu.be/RvDTXApHCMM" class="btn float-btn flat-btn color-btn mar-top">My Youtube Chanel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="half-bg-dec single-half-bg-dec" data-ran="12"></div>
                        <div class="sec-lines"></div>
                    </section>
                    <!-- sectio endn-->                              
                    <!-- section-->
                   <section>
                        <section data-scrollax-parent="true" id="sec7">
                        <div class="section-subtitle left-pos"  data-scrollax="properties: { translateY: '-250px' }" ><span>//</span>Frequently Asked Questions</div>
                        <div class="container" style="margin-top: -120px;">
                            <div class="section-title fl-wrap">
                                <h2>Frequently Asked Questions <span> (FAQ)</span></h2>
                               <!--  <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida.  </p> -->
                            </div>
                            <!-- serv-carousel-wrap-->  
                            <div class="serv-carousel-wrap slider-carousel-wrap fl-wrap" style="margin-top: -80px;margin-left:10px;">
                                <div class="sp-cont  sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                                <div class="sp-cont   sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                                <!-- serv-carousel --> 
                                <div class="serv-carousel fl-wrap cur_carousel-slider-container">
                                    <!-- serv-carousel-item --> 
                                    <?php $no = 1 ;foreach ($data_faq as $row ): ?>
                                        <div class="serv-carousel-item">
                                        <div class="serv-wrap fl-wrap">
                                            <div class="time-line-icon">
                                                <i class="far fa-question-circle"></i>
                                            </div>
                                            <h4><?php echo $row->faq_judul ?></h4>
                                            <div class="process-details anyClass"  >
                                                <!-- <div class="serv-img">
                                                    <img src="images/services/1.jpg" alt=""> 
                                                    <a href="images/services/1-big.jpg" class="serv-zoom   image-popup"><i class="fal fa-search"></i></a>
                                                </div> -->
                                                <p><?php echo $row->faq_content ?></p>
                                                    
                                            </div>
                                            <span class="process-numder">0<?php echo $no ?></span>
                                        </div>
                                    </div>
                                    <?php $no++; endforeach; ?>
                                    
                                    <!-- serv-carousel-item end -->                                                                 
                                </div>
                                <!-- serv-carousel  end--> 
                            </div>
                            <!-- serv-carousel-wrap end-->  
                        </div>
                        <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
                        <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
                        <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
                        <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
                        <div class="sec-lines"></div>
                    </section>
                    </section>
                    <!-- section end -->
                    <!-- section-->
                    <section class="parallax-section dark-bg sec-half parallax-sec-half-left" data-scrollax-parent="true" id="sec4">
                        <div class="bg par-elem"  data-bg="<?= base_url() ?>assets_frontend/images/bg/<?php echo $gb_jumbotron ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h2>The Investment built <span>with us</span></h2>  
                                <?php echo $berita ?>
                                <div class="horizonral-subtitle"><span>REIT</span></div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!-- section -->
                    
                    <!-- section end -->
                     
                    <!--section -->
                    <section  data-scrollax-parent="true" id="sec6">
                        <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" >Testimonials<span>//</span></div>
                        <div class="container">
                            <div class="section-title fl-wrap">
                                <h3>Reviews</h3>
                                <h2>Klien kami dan <span>Testimonials</span></h2>
                                <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida.  </p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!--slider-carousel-wrap -->
                        <div class="slider-carousel-wrap text-carousel-wrap fl-wrap">
                            <div class="text-carousel-controls fl-wrap">
                                <div class="container">
                                    <div class="sp-cont  sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                                    <div class="sp-cont   sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                                </div>
                            </div>
                            <div class="text-carousel cur_carousel-slider-container fl-wrap">
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="<?= base_url() ?>assets_frontend/home/images/avatar/1.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Rizal  - <span>Happy Client</span></div>
                                        <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat."</p>
                                        <a href="#" class="testim-link">Via Facebook</a>
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="<?= base_url() ?>assets_frontend/home/images/avatar/1.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                                        <div class="review-owner fl-wrap">Iqbal  - <span>Happy Client</span></div>
                                        <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat."</p>
                                        <a href="#" class="testim-link">Via Facebook</a>
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="<?= base_url() ?>assets_frontend/home/images/avatar/1.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Kevin  - <span>Happy Client</span></div>
                                        <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat."</p>
                                        <a href="#" class="testim-link">Via Facebook</a>
                                    </div>
                                </div>
                                <!--slick-item end -->                                                         
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="<?= base_url() ?>assets_frontend/home/images/avatar/1.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Maulana  - <span>Happy Client</span></div>
                                        <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat."</p>
                                        <a href="#" class="testim-link">Via Facebook</a>
                                    </div>
                                </div>
                                <!--slick-item end -->                                   
                            </div>
                        </div>
                        <!--slider-carousel-wrap end-->
                        <!-- client-list -->
                        <div class="fl-wrap">
                            <div class="container">
                                <ul class="client-list client-list-white">
                                    <li><a href="#" target="_blank"><img src="<?= base_url() ?>assets_frontend/home/images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="<?= base_url() ?>assets_frontend/home/images/clients/2.png" alt=""></a></li>
                                    <li><a href="#" style="margin-top:35px; " target="_blank"><img src="<?= base_url() ?>assets_frontend/home/images/clients/3.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="<?= base_url() ?>assets_frontend/home/images/clients/4.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="<?= base_url() ?>assets_frontend/home/images/clients/5.png" alt=""></a></li>
                                </ul>
                            </div>
                            <!-- client-list end-->
                        </div>
                        <div class="sec-lines"></div>
                    </section>
                    <!-- section end -->                    
                    <!-- section-->
                    <section class="dark-bg2 small-padding order-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Ready to invest with us?</h3>
                                </div>
                                <div class="col-md-4"><a href="<?php echo base_url('frontend/Signin') ?>" class="btn flat-btn color-btn">Invest</a> </div>
                            </div>
                        </div>
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
                                        <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a notification by email.</p>
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
                                <span>&#169; PT.Real Estate Invesment Trust 2019  /  All rights reserved. </span>
                            </div>
                            <!-- policy-box end-->
                            <a href="#" class="to-top color-bg"><i class="fal fa-angle-up"></i><span></span></a>
                        </div>
                    </div>
                    <!--subfooter end--> 
                </footer>
                <!-- footer end-->
                <!-- contact-btn --> 

                <a class="contact-btn color-bg" href="<?= base_url('frontend/Signin/register') ?>"><i class="fal fa-user"></i><span>Registration</span></a>

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