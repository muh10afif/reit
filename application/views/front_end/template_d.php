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
        <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/signin/css/user.css">
        <link href="<?= base_url() ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?= base_url() ?>assets/dist/img/logo11.png" type="image/x-icon">
    </head>
    <body style="background-color: white;">
        <div class="page sub-page">
            <!--*********************************************************************************************************-->
            <!--************ HERO ***************************************************************************************-->
            <!--*********************************************************************************************************-->
            <header class="hero" >
                <div class="hero-wrapper" style="padding-bottom: 0rem;">
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
                                <li class="nav-item active ">
                                    <div class="dropdown open">
                                        <a class="nav-link active dropdown-toggle"  id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user" style="color:white;"></i> | <?php echo $this->session->userdata('nama'); ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                            <a class="dropdown-item " href="<?php echo base_url('frontend/signin/logout') ?>"><i class="fa fa-sign-in"></i> <?php echo lang('logout') ?><span class="sr-only">(current)</span></a>
                                        </div>
                                    </div>
                                </li>
                                <?php echo nbs(10); ?>
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo base_url('LanguageSwitcher/switchLang/english') ?>"> <img style="height: 9px;width:15px;" src="<?php echo base_url() ?>assets_frontend/images/all/en.png"> EN </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo base_url('LanguageSwitcher/switchLang/indonesia') ?>" class="margin-left:-50px;"> ID <img style="height: 9px;width:15px;" src="<?php echo base_url() ?>assets_frontend/images/all/id.png"> </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--============ End Secondary Navigation ===========================================================-->
                    <!--============ Main Navigation ====================================================================-->
                    <!-- <div class="main-navigation">
                        <div class="container" <?php if($this->session->userdata('masuk') != TRUE){ echo "hidden";} ?>>
                            <nav class="navbar navbar-expand-lg navbar- justify-content-between">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbar">
                                    
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="active" href="<?php echo base_url('frontend/Prospektus') ?>">Katalog Investor</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="" href="transaksi-saya.html">Transaksi Saya</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="" href="investasi-saya.html">Investasi Saya</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="" href="dokumen.html">Dokumen</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="" href="kontak.html">Kontak</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> -->
                            
                            <!--============ End Main Navigation ===============================================================-->
                            <!-- <div class="background"></div> -->
                            <!--end background-->
                        </div>
                        <!--end hero-wrapper-->
                    </header>
                    
                    <!--==============================================
                    =            Mobile detail prospektus            =
                    ===============================================-->

                    <?= $konten ?>
                    
                    <!-- <div class="container" >
                        <div class="hk-pg-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="info"></i></span></span><?php echo lang('prospektus_detail') ?></h2>
                                </div>
                                <div class="col-md-12">
                                    <a href="<?= base_url('frontend/Prospektus/unit/'.$id_blok['id_blok']) ?>"><button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
                                </div>
                            </div>
                        </div>
                        <?= $this->session->userdata('pesan'); ?>
                        /Title
                        
                        
                        <div class="row mt-5">
                            <div class="col-md-7">
                                
                                <img class="card-img-top mt-10" src="<?= base_url() ?>assets/dist/img/foto.jpg" alt="Card image cap">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php for ($i = 0; $i < count($det_foto_pros); $i++) : ?>
                                        <?php if ($i == 0): ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>
                                        <?php else: ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                                        <?php endif ?>
                                        <?php endfor ?>
                                    </ol>
                                    <div class="carousel-inner" style="border-radius: 10px">
                                        <?php $no=0; foreach ($det_foto_pros as $p): $no++ ?>
                                        <?php if ($no == 1): ?>
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="<?= base_url() ?>assets/gambar/<?= base64_decode($p['file_foto']) ?>" alt="First slide">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5 class="text-white">First Slide Label</h5>
                                                <p>This is content paragraph enough to say.</p>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="<?= base_url() ?>assets/gambar/<?= base64_decode($p['file_foto']) ?>" alt="First slide">
                                        </div>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                    
                                        <div class="card mt-15">
                                    <div class="card-body text-center">
                                        <p class="mt-10 text-justify"><?= $detail_pros['keterangan'] ?></p>
                                    </div>
                                </div>
                                <?php $a=0; foreach ($detail as $d): $a++?>
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="display-6"><?= strtoupper($d['nama']) ?></h1>
                                    </div>
                                    <div class="card-body">
                                        <?= $d['isi'] ?>
                                        <?php $dp = $this->M_prospektus->get_sub_detail($d['id_detail_pros']); ?>
                                        <div class="accordion mt-10" id="accordion_<?= $a ?>">
                                            <?php foreach ($dp->result_array() as $v) : ?>
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_<?= $i ?>" aria-expanded="false"><?= $v['nama'] ?></a>
                                                </div>
                                                <div id="collapse_<?= $i ?>" class="collapse" data-parent="#accordion_<?= $a ?>">
                                                    <div class="card-body pa-15"><?= $v['sub_isi'] ?></div>
                                                </div>
                                            </div>
                                            
                                            <?php $i++; endforeach; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php endforeach ?>
                                
                            </div>
                            <div class="col-md-5 ">
                                <div class="card text-white bg-green">
                                    <div class="card-body">
                                         <table class="table table-responsive" style="width: 100%;">
                                                <tr>
                                                    <td><?php echo lang('investor_target') ?></td>
                                                    <td> <?= $detail_pros['target_investor'] ?>%</td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('unit_type') ?></td>
                                                    <td><?= $detail_pros['nama_unit'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('price') ?></td>
                                                    <td>Rp.<?= number_format($detail_pros['harga'])  ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('investment_period') ?></td>
                                                    <td><?= $detail_pros['periode_investasi'] ?> <?php echo lang('year') ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('min_invest') ?></td>
                                                    <td>Rp.<?= number_format($detail_pros['minimal_investasi'])  ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('total_lot') ?></td>
                                                    <td><?= $detail_pros['jumlah_lot'] ?> Lot</td>
                                                </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <button class="btn btn-blue btn-block pull-left" onclick="tampil_form_buy()"><i class="ti-check"></i><?= nbs(2) ?> <?php echo lang('invest') ?></button>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="container">
                                            <h5><?php echo lang('document') ?></h5>
                                            <?php foreach ($data_dok->result_array() as $d): ?>
                                            <i class="fa fa-file"></i><a target="_blank" href="<?= base_url('prospektus/tampil_pdf/'.base64_decode($d['dokumen']).'/a') ?>"><?= nbs(5) ?><?= $d['judul'] ?></a><br>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="container">
                                            <h5>RESOURCE</h5>
                                            <?php foreach ($data_res->result_array() as $d): ?>
                                            <i class="ti-arrow-circle-right"></i><?= nbs(5) ?><a target="_blank" href="<?= base_url('prospektus/tampil_res/'.$d['id_resources'].'/'.$id_pros) ?>"><?= $d['judul'] ?></a><br>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                         -->
                        <!-- <div class="row mt-10">
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p class="mt-10 text-justify"><?= $detail_pros['keterangan'] ?></p>
                                    </div>
                                </div>
                                <?php $a=0; foreach ($detail as $d): $a++?>
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="display-6"><?= strtoupper($d['nama']) ?></h1>
                                    </div>
                                    <div class="card-body">
                                        <?= $d['isi'] ?>
                                        <?php $dp = $this->M_prospektus->get_sub_detail($d['id_detail_pros']); ?>
                                        <div class="accordion mt-10" id="accordion_<?= $a ?>">
                                            <?php foreach ($dp->result_array() as $v) : ?>
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_<?= $i ?>" aria-expanded="false"><?= $v['nama'] ?></a>
                                                </div>
                                                <div id="collapse_<?= $i ?>" class="collapse" data-parent="#accordion_<?= $a ?>">
                                                    <div class="card-body pa-15"><?= $v['sub_isi'] ?></div>
                                                </div>
                                            </div>
                                            
                                            <?php $i++; endforeach; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php endforeach ?>
                                
                            </div>
                        </div><?= br(2) ?>
                    </div>
                    </div> -->
                    <!--====  End of Mobile detail prospektus  ====-->
                    
                    
                </div>
                <!-- Modal
                <div class="modal fade" id="modal_buy" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Investasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="<?= base_url('frontend/prospektus/awal_tr_investor') ?>">
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="hidden" name="id_pros" value="<?= $id_pros ?>">
                                            <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>">
                                            <label for="firstName">Investor ID</label>
                                            <input class="form-control" name="sid" placeholder="Masukkan SID" value="<?= $pengguna['sid'] ?>" type="text" ><br>
                                            <label for="lastName">NIK</label>
                                            <input class="form-control" name="nik" placeholder="Masukkan NIK" value="<?= $pengguna['nik'] ?>" type="text"><br>
                                            <label for="lastName">Nama</label>
                                            <input class="form-control" name="nama" placeholder="Masukkan Nama Pengguna" value="<?= $pengguna['nama_pengguna'] ?>" type="text"><br>
                                            
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="lastName">Alamat</label>
                                            <textarea class="form-control" name="alamat" name="alamat" placeholder="Masukkan Alamat"><?= $pengguna['alamat'] ?></textarea>
                                            <label for="firstName">Telepon</label>
                                            <input class="form-control" name="no_telp" placeholder="Masukkan No Telepon" value="<?= $pengguna['no_telp'] ?>" type="text"><br>
                                            <label for="lastName">Jumlah Lot</label>
                                            <input class="form-control" name="jml_lot" placeholder="Masukkan Jumlah Lot" type="text">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times fa-lg"></i><?= nbs(3) ?>Close</button><?= nbs(5) ?>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check fa-lg"></i><?= nbs(3) ?>Investasi</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                Modal -->
                
                
                <!--end footer-->
            </div>
            <!--end page-->
            <script src="<?php echo base_url()?>assets_frontend/signin/js/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>assets_frontend/signin/js/popper.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>assets_frontend/signin/bootstrap/js/bootstrap.min.js"></script>
            <!--     -->
            <!-- Bootstrap Input spinner JavaScript -->
            <script src="<?php echo base_url()?>assets/vendors/bootstrap-input-spinner/src/bootstrap-input-spinner.js"></script>
            <script src="<?php echo base_url()?>assets/dist/js/inputspinner-data.js"></script>
            <script src="<?php echo base_url()?>assets_frontend/signin/js/selectize.min.js"></script>
            <script src="<?php echo base_url()?>assets_frontend/signin/js/masonry.pkgd.min.js"></script>
            <script src="<?php echo base_url()?>assets_frontend/signin/js/icheck.min.js"></script>
            <script src="<?php echo base_url()?>assets_frontend/signin/js/jquery.validate.min.js"></script>
            <script src="<?php echo base_url()?>assets_frontend/signin/js/custom.js"></script>
            <!-- number separators -->
            <script src="<?= base_url() ?>assets/vendors/number_separator/easy-number-separator.js"></script>
            
            <script type="text/javascript">
            function tampil_form_buy() {
            $('#modal_buy').modal('show');
            }
            $('.demo').jPreview();
            $('input[type="file"]').imageuploadify();

            $("img").addClass("img-fluid");
            $("iframe").addClass("embed-responsive");
            </script>
        </body>
    </html>