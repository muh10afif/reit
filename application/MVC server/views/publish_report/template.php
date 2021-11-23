<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?= nbs(3) ?>R E I - T R U S T</title>
    <meta name="description" content="Solusi Karya Digital 2019" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="<?= base_url() ?>assets/dist/img/logo11.png" type="image/x-icon">
	
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap Dropzone CSS -->
    <link href="<?= base_url() ?>assets/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>

	<!-- Bootstrap Dropzone CSS -->
    <link href="<?= base_url() ?>assets/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>

    <!-- Data Table CSS -->
    <link href="<?= base_url() ?>assets/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- select2 CSS -->
    <link href="<?= base_url() ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
	
    <!-- Toggles CSS -->
    <link href="<?= base_url() ?>assets/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url() ?>assets/vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
	
	<!-- Toastr CSS -->
    <link href="<?= base_url() ?>assets/vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!-- JPreview -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/jpreview/jpreview.css">

    <!-- Imageuploadify -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/imageuploadify/imageuploadify.min.css">

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
	<div class="hk-wrapper hk-horizontal-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="dashboard1.html">
                <img class="brand-img d-inline-block" src="<?= base_url() ?>assets/dist/img/logo-dark.png" alt="brand" />
            </a>
            <ul class="navbar-nav hk-navbar-content">
                
                
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="<?= base_url() ?>assets/dist/img/avatarr.png" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span><?= $this->session->userdata('nama');?> | <?= $this->session->userdata('level'); ?><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="profile.html"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->

        <!--Horizontal Nav-->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-row">

                        <li class="nav-item <?= ($aktif == 'prospektus') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('prospektus') ?>" >
                                <i class="material-icons">account_balance</i><?= nbs(3) ?>
                                <?php if ($this->session->userdata('level') == 'investor'): ?>
                                    <span class="nav-link-text">Katalog Properti</span>
                                <?php else: ?>
                                    <span class="nav-link-text">Prospektus Blok</span>
                                <?php endif ?>
                            </a>
                        </li>
                        
                        <?php if ($this->session->userdata('level') == 'admin') : ?>

                        <li class="nav-item <?= ($aktif == 'kawasan' || $aktif == 'unit') ? 'active' : '' ?>">
                            <a class="nav-link link-with-indicator" href="javascript:void(0);" data-toggle="collapse" data-target="#app_drp">
                                <i class="material-icons">dns</i><?= nbs(3) ?>
                                <span class="nav-link-text">Data</span>
                            </a>
                            <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item <?= ($aktif == 'kawasan') ? 'active' : '' ?>">
                                            <a href="<?= base_url('prospektus/kawasan') ?>" class="nav-link">
                                                <i class="material-icons">store</i><?= nbs(3) ?>
                                                <span class="nav-link-text">Kawasan</span>
                                            </a>
                                        </li>
                                        <li class="nav-item <?= ($aktif == 'unit') ? 'active' : '' ?>">
                                            <a href="<?= base_url('prospektus/unit') ?>" class="nav-link">
                                                <i class="material-icons">business</i><?= nbs(3) ?>
                                                <span class="nav-link-text">Unit</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <?php endif ?>
                        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'manager'): ?>

                            
                            <li class="nav-item <?= ($aktif == 'approve_lot') ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= base_url('approve_lot') ?>">
                                    <i class="material-icons">done_all</i><?= nbs(3) ?>
                                    <span class="nav-link-text">Approve Lot</span>
                                </a>
                            </li>
                            <li class="nav-item <?= ($aktif == 'publish_report') ? 'active' : '' ?>">
                                <a class="nav-link link-with-badge" href="<?= base_url('publish_report') ?>">
                                    <i class="material-icons">description</i><?= nbs(3) ?>
                                    <span class="nav-link-text">Publish Report</span>
                                </a>
                            </li>
                            
                        <?php endif ?>
                        
                        <?php if ($this->session->userdata('level') == 'investor' || $this->session->userdata('level') == 'admin'): ?>
                             <li class="nav-item <?= ($aktif == 'saham_properti') ? 'active' : '' ?>">
                                <a class="nav-link link-with-badge" href="<?= base_url('saham_properti') ?>">
                                    <i class="material-icons">bar_chart</i><?= nbs(3) ?>
                                    <span class="nav-link-text">Saham Properti</span>
                                </a>
                            </li>
                            <li class="nav-item <?= ($aktif == 'histori_transaksi') ? 'active' : '' ?>">
                                <a class="nav-link link-with-badge" href="<?= base_url('histori_transaksi') ?>">
                                    <i class="material-icons">history</i><?= nbs(3) ?>
                                    <span class="nav-link-text">Histori Transaksi</span>
                                </a>
                            </li>

                            <li class="nav-item <?= ($aktif == '' || $aktif == '') ? 'active' : '' ?>">
                                <a class="nav-link link-with-indicator" href="javascript:void(0);" data-toggle="collapse" data-target="#app_drp">
                                    <i class="material-icons">home</i><?= nbs(3) ?>
                                    <span class="nav-link-text">Home</span>
                                </a>
                                <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item <?= ($aktif == 'Home_en') ? 'active' : '' ?>">
                                                <a href="<?= base_url('Home_en/home_edit') ?>" class="nav-link">
                                                    <i class="material-icons">language</i><?= nbs(3) ?>
                                                    <span class="nav-link-text">English</span>
                                                </a>
                                            </li>
                                            <li class="nav-item <?= ($aktif == 'Home') ? 'active' : '' ?>">
                                                <a href="<?= base_url('Home/home_edit') ?>" class="nav-link">
                                                    <i class="material-icons">language</i><?= nbs(3) ?>
                                                    <span class="nav-link-text">Indonesia</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <?php if ($this->session->userdata('level') == 'copywriter' || $this->session->userdata('level') == 'admin'): ?>
                            <li class="nav-item <?= ($aktif == '' || $aktif == '') ? 'active' : '' ?>">
                                <a class="nav-link link-with-indicator" href="javascript:void(0);" data-toggle="collapse" data-target="#app_drp">
                                    <i class="material-icons">home</i><?= nbs(3) ?>
                                    <span class="nav-link-text">Home</span>
                                </a>
                                <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item <?= ($aktif == 'Home_en') ? 'active' : '' ?>">
                                                <a href="<?= base_url('Home_en/home_edit') ?>" class="nav-link">
                                                    <i class="material-icons">language</i><?= nbs(3) ?>
                                                    <span class="nav-link-text">English</span>
                                                </a>
                                            </li>
                                            <li class="nav-item <?= ($aktif == 'Home') ? 'active' : '' ?>">
                                                <a href="<?= base_url('Home/home_edit') ?>" class="nav-link">
                                                    <i class="material-icons">language</i><?= nbs(3) ?>
                                                    <span class="nav-link-text">Indonesia</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!--/Horizontal Nav-->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			
			<?= $konten ?>
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p><strong>Copyright &copy; 2019 Solusi Karya Digital.</strong> All rights reserved.</p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
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

    <!-- Jasny-bootstrap  JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="<?= base_url() ?>assets/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/feather.min.js"></script>

    <!-- Dropzone JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/dropzone/dist/dropzone.js"></script>

    <!-- Dropify JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/dropify/dist/js/dropify.min.js"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/form-file-upload-data.js"></script>

    <!-- Data Table JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/dataTables-data.js"></script>
    
    <!-- Select2 JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/select2-data.js"></script>
    

    <!-- Toggles JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/jquery-toggles/toggles.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/toggle-data.js"></script>


    <script src="<?= base_url() ?>assets/vendors/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/morris.js/morris.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/linecharts-data.js"></script>

    <!-- JPreview -->
    <script src="<?= base_url() ?>assets/vendors/jpreview/jpreview.js"></script>
    
    <!-- Imageuploadify -->
    <script src="<?= base_url() ?>assets/vendors/imageuploadify/imageuploadify.min.js"></script>
     <script src="<?= base_url() ?>assets/vendors/tinymce/tinymce.min.js"></script>
    
    <!-- Init JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/init.js"></script>
	<script src="<?= base_url() ?>assets/dist/js/dashboard2-data.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/tooltip-data.js"></script>

    <script src="<?php echo base_url('assets/vendors/ckeditor/ckeditor.js') ?>"></script>
    <script>
        CKEDITOR.replace( 'editor');
        CKEDITOR.replace( 'editor1');
        CKEDITOR.replace( 'editor2');
        CKEDITOR.replace( 'editor3');
    </script>

 

    <script type="text/javascript">
        $(document).ready(function() {
            $('#report').DataTable();
        } );
    </script>

    <script type="text/javascript">
        function tampil_form_buy() {
            $('#modal_buy').modal('show');
        }

        $('.demo').jPreview();

        $('input[type="file"]').imageuploadify();
    </script>

    <script>
        var save_method;

        // untuk menampilkan modal form tambah unit
        function tambah_unit(){
            save_method = 'tambah';
            $('#form_unit')[0].reset();
            $('.select2').select2().select2('val','');
            $('#modal_unit').modal('show');
            $('.a').text('Tambah Data Unit');
        }

        // untuk aksi simpan dan edit data unit
        function aksi_unit(){
            var url;

            if (save_method == 'tambah') {
                url = "<?php echo site_url('prospektus/tambah_unit') ?>";
            } else {
                url = "<?php echo site_url('prospektus/ubah_data_unit') ?>";
            }

            $.ajax({
                url     : url,
                type    : "POST",
                data    : $('#form_unit').serialize(),
                dataType: "JSON",
                success : function(data){
                    $('#modal_unit').modal('hide');
                    location.reload();
                },
                error   : function(data){
                    alert('Gagal! Memproses Data...');
                }
            });
        }

        // proses ambil data unit
        function edit_unit(id_unit) {
            save_method = 'ubah';
            $('#form_unit')[0].reset();

            $.ajax({
                url     : "<?php echo site_url('prospektus/ambil_data_unit') ?>/"+id_unit,
                type    : "GET",
                dataType: "JSON",
                success : function(data){
                    $('[name = "id_unit"]').val(data.id_unit);
                    $('[name = "nama"]').val(data.nama_unit);
                    $('[name = "harga"]').val(data.harga);
                    $('.select2').select2().select2('val',data.id_blok);

                    var txt1 = "<i class='ti-pencil'></i>&nbsp;&nbsp;&nbsp;";   
                  

                    $('#modal_unit').modal('show');
                    $('.a').text('Edit Data Unit');

                },
                error   : function(jqXHR, textStatus, errorThrown){
                    alert('Gagal! Memproses Data...');
                }
            })
        }

        // proses hapus unit
        function hapus_unit(id_unit)
        {
            if (confirm('Apakah yakin akan menghapus data ini ?')) {
                $.ajax({
                    url     : "<?php echo site_url('prospektus/hapus_unit') ?>/"+id_unit,
                    type    : "POST",
                    dataType: "JSON",
                    success : function(data)
                    {
                        location.reload();
                    },
                    error   : function(jqXHR, textStatus, errorThrown)
                    {
                        alert('Gagal! Memproses Data..');
                    }
                });
            }
        }

        // untuk menampilkan form tambah kawasan
        function tambah_kws() {
            save_method = 'tambah';
            $('#form_kws')[0].reset();
            $('.modal-title').text('Tambah Data Unit');
            $('#modal_kws').modal('show');
        }

         // untuk aksi proses menyimpan atau mmerubah data kawasan
         function aksi_kawasan() {
            var url;

            if (save_method == 'tambah') {
                url = "<?php echo site_url('prospektus/tambah_kws') ?>";
            } else {
                url = "<?php echo site_url('prospektus/ubah_data_kws') ?>";
            }

            $.ajax({
                url     : url,
                type    : "POST",
                data    : $('#form_kws').serialize(),
                dataType: "JSON",
                success : function(data)
                {
                    $('#modal_kws').modal('hide');
                    location.reload();
                },
                error   : function(jqXHR,textStatus, errorThrown){
                    alert('Gagal! Proses Data...');
                }
            });
         }

        // untuk fungsi edit kawasan
        function edit_kws(id_kawasan)
        {
            save_method = 'ubah';
            $('#form_kws')[0].reset();

            $.ajax({
                url     : "<?php echo site_url('prospektus/ambil_data_kws') ?>/"+id_kawasan,
                type    : "GET",
                dataType: "JSON",
                success : function(data)
                {
                    $('[name = "id_kawasan"]').val(data.id_kawasan);
                    $('[name = "nama"]').val(data.nama_kawasan);
                    $('[name = "alamat"]').val(data.alamat);

                    $('#modal_kws').modal('show');
                    $('.modal-title').text('Edit Data Kawasan');
                },
                error   : function(jqXHR, textStatus, errorThrown)
                {
                    alert('Gagal! Memperoses Data...');
                }
            })
        }

        // untuk hapus kawasan
        function hapus_kws(id_kawasan)
        {
            if (confirm('Apakah yakin akan menghapus data ini ?')) {

                $.ajax({
                    url     : "<?php echo site_url('prospektus/hapus_kws') ?>/"+id_kawasan,
                    type    : "POST",
                    dataType: "JSON",
                    success : function(data)
                    {
                        $('#modal_kws').modal('hide');
                        location.reload();
                    },
                    error   : function(jqXHR, textStatus, errorThrown)
                    {
                        alert('Gagal! Menghapus Data');
                    }
                });

            }
        }

        // untuk menampilkan form tambah blok
        function tambah_blok() {
            save_method = 'tambah';
            $('#form_blok')[0].reset(); 
            $('#modal_blok').modal('show');
        }

        // untuk menyimpan data blok baru
        $('#form_blok').submit(function(e){
        e.preventDefault(); 
          $.ajax({
                 url:"<?php echo site_url('prospektus/simpan_blok/tambah') ?>",
                 type:"post",
                 data:new FormData(this), //this is formData
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      $('#modal_blok').modal('hide');
                        location.reload();
               },
                error: function (jqXHR,textStatus, errorThrown) {
                    alert('Gagal Memproses Data!');
                }
             });
        });

        // untuk menampilkan data edit blok
        function edit_blok(id)
        {
            save_method = 'ubah';
            $('#form_edit_blok')[0].reset(); 
         
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('prospektus/ambil_data_ajax_blok')?>/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id"]').val(data.id);
                    $('[name="nama"]').val(data.nama);
                    $('[name="kawasan"]').val(data.kawasan);
                    $('[name="unit"]').val(data.unit);
                    $("#foto_baru").empty().append("<img src='<?= base_url() ?>assets/gambar/"+data.foto+"' class='img-thumbnail'>");
                    $('#modal_edit_blok').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
         }

         // untuk menyimpan perubahan data blok
         $('#form_edit_blok').submit(function(e){
            e.preventDefault(); 
              $.ajax({
                     url:"<?php echo site_url('prospektus/simpan_blok/edit') ?>",
                     type:"post",
                     data:new FormData(this), //this is formData
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          $('#modal_edit_blok').modal('hide');
                            location.reload();
                   },
                    error: function (jqXHR,textStatus, errorThrown) {
                        alert('Gagal Memproses Data!');
                    }
                 });
            });
    </script>
	
</body>

</html>