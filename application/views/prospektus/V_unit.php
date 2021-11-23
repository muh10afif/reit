<style type="text/css">
    <?php $no=0; foreach ($data_unit_pros as $d) : ?>
    #errmsg_<?= $no; ?>
    {
    color: red;
    }
    <?php $no++; endforeach ?>
    /* Centered text */
    .over {
      position: absolute;
      top: 20%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
</style>
<div class="container">
    
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">
            <?php if (count($data_unit_pros) != 0): ?>

                <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                    <a href="<?= base_url('prospektus/kontributor') ?>">
                <?php else: ?>
                    <?php if ($this->session->userdata('level') == 'koperasi'): ?>
                        <a href="<?= base_url('prospektus/koperasi/blok/'.base64_encode($kd_transaksi)) ?>">
                    <?php else: ?>
                        <a href="<?= base_url('prospektus/index/blok/'.base64_encode($kd_transaksi)) ?>">
                    <?php endif ?>
                <?php endif ?>

            <?php else: ?>
                <a href="<?= base_url('prospektus/index/blok') ?>">
            <?php endif ?>

            Prospektus</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail <?php echo lang('regions') ?></li>
    </ol>
</nav>
<!-- /Breadcrumb -->


<!-- Title -->
<div class="hk-pg-header">
    <?php if (count($data_unit_pros) != 0): ?>
        <div class="col-md-10">
           
                <?php foreach ($data_unit_pros as $d): ?>
                <?php $nama =  $d['nama_kawasan']; $blok = $d['nama_blok'];?>
                <?php endforeach ?>
                <h3 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="info"></i></span></span>Detail <?php echo  lang('regions') ?> <?= $nama ?><?= nbs(2) ?></h3>
                <p class="ml-30"><i class="badge badge-pink">Blok <?= $blok ?></i></p>

    	</div>
    <!-- <div class="col-md-2">
        <?php if ($this->session->userdata('level') == 'kontributor'): ?>
            <a href="<?= base_url('prospektus/kontributor') ?>">
        <?php else: ?>
            <a href="<?= base_url('prospektus/index/'.base64_encode($kd_transaksi)) ?>">
        <?php endif ?>
        <button class="btn btn-info float-right btn-icon btn-icon-style-1" style="width: 170px;"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
    </div> -->
        <?php if ($this->session->userdata('level') != 'koperasi'): ?>
            <?php if ($this->session->userdata('level') != 'investor'): ?>
                <?php if (count($data_unit_pros) != ($jumlah_unit['jumlah_unit'])): ?>
                    <div class="col-md-2">
                        <a href="<?= base_url('prospektus/tambah/').$id_blok['id_blok'] ?>"><button class="btn btn-green float-left btn-icon btn-icon-style-1" style="width: 180px;"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add') ?></button></a>
                    </div>
                <?php endif ?>
            <?php endif ?>
        <?php endif ?>
    <?php else: ?>
    <!-- <div class="col-md-10">
         <a href="<?= base_url('prospektus/') ?>"><button class="btn btn-info btn-icon btn-icon-style-1" style="width: 170px;"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
    </div> -->
    <div class="col-md-12">
        <a href="<?= base_url('prospektus/tambah/').$id_blok['id_blok'] ?>"><button class="btn btn-success float-right btn-icon btn-icon-style-1" style="width: 250px;"><i class="ti-plus"></i><?= nbs(3) ?><?php echo lang('add') ?></button></a>
    </div>
    <?php endif ?>
    
</div>

<?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            <?php $i=1; $no=0; foreach ($data_unit_pros as $d): ?>
                <div class="col-md-4">

                <?php if ($d['sisa_lot'] == 0): ?>
                    <div class="card shadow-sm shadow-hover-xl border border-pink border border-3">
                <?php else: ?>
                    <div class="card shadow-sm shadow-hover-xl border border-light border border-3">
                <?php endif ?>

                <!-- <div class="card shadow-sm shadow-hover-xl"> -->
                    <?php if ($d['sisa_lot'] == 0): ?>
                        <h1 class="display-3 text-white over shadow-xl"><span class="badge badge-danger shadow-xl">SOLD</span></h1>
                    <?php endif ?>

                    <img class="card-img-top shadow border rounded-top-left rounded-top-right" height="240" src="<?= base_url() ?>assets/gambar/<?= base64_decode($d['file_foto']) ?>" alt="Card image cap">
                    <?php if ($this->session->userdata('level') == 'kontributor'): ?>

                        <table class="table table-hover border rounded-3" align="center" width="100%">
                            <thead class="bg-gradient-ashes">
                                <tr>
                                    <?php $date = date("Y-m-d", strtotime($d['add_time'])); ?>
                                    <th align="left" style="color: white;">Status</th>
                                    <th style="text-align: center;" style="color: white;">
                                       <?php if ($d['status'] == null): ?>
                                            <span class="badge badge-info">Data Belum Dikirim</span>
                                        <?php elseif ($d['status'] == 1): ?>
                                            <span class="badge badge-success">Data Publish</span>
                                        <?php elseif ($d['status'] == 2): ?>
                                            <span class="badge badge-danger">Data Ditolak</span>
                                        <?php elseif ($d['status'] == 3): ?>
                                            <span class="badge badge-warning">Data Terkirim</span>
                                        <?php endif ?> 
                                    </th>
                                </tr>
                            </thead>
                        </table>

                        
                    <?php endif ?>
                    

                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-6"><label><?php echo lang('investor_target') ?></label></div>
                            <div class="col-md-6" align="left"><?= $d['target_investor'] ?>%</div>
                            
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-6"><label><?php echo lang('unit_type') ?></label></div>
                            <div class="col-md-6" align="left"><?= $d['nama_unit'] ?></div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-6"><label><?php echo lang('price') ?></label></div>
                            <div class="col-md-6" align="left">Rp. <?= number_format($d['harga'],'0','.','.') ?></div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-6"><label><?php echo lang('investment_period') ?></label></div>
                            <div class="col-md-6" align="left"><?= $d['periode_investasi'] ?> Tahun</div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-6"><label><?php echo lang('min_invest') ?></label></div>
                            <div class="col-md-6" align="left">Rp. <?= number_format($d['minimal_investasi'],'0','.','.') ?></div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-6"><label><?php echo lang('total_lot') ?></label></div>
                            <div class="col-md-6" align="left">
                                <?= $sisa = $d['sisa_lot'] ?> 
                            Lot</div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                    </div>
                    <div class="card-footer text-center shadow">

                        <?php $id_p = $d['id_prospektus']; ?>

                        <?php $cek_kode = $this->M_prospektus->cek_kode_pros($id_p, $kd_transaksi)->num_rows(); ?>

                        <div class="col-md-12">
                            <?php if ($this->session->userdata('level') == 'manager' OR $this->session->userdata('level') == 'admin'): ?>
                                <a href="<?= base_url('prospektus/detail/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-sky btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a><?= nbs(2) ?>
                                <a href="<?= base_url('prospektus/edit/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-indigo btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-pencil-alt"></i><?= nbs(2) ?>EDIT</button></a><?= nbs(2) ?>
                                <button class="btn btn-sm btn-primary btn-icon btn-icon-style-1" onclick="edit_title('<?= $d['id_prospektus'] ?>')" style="width: 80px;"><i class="ti-comment"></i><?= nbs(2) ?>TITLE</button>    
                            <?php elseif($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'investor' || $this->session->userdata('level') == 'koperasi'): ?>
                                <a href="<?= base_url('prospektus/detail/'.$d['id_prospektus'].'/'.'x/'.base64_encode($kd_transaksi)) ?>"><button class="btn btn-gradient-warning" style="width: 100px;"><i class="ti-info-alt"></i><?= nbs(2) ?>Detail</button></a> <?= nbs(4) ?><!--
                                <button class="btn btn-sm btn-success btn-icon btn-icon-style-1" style="width: 100px;" onclick="tampil_form_buy(<?= $d['id_prospektus'] ?>)"><i class="ti-check"></i><?= nbs(2) ?><?php echo lang('invest') ?></button> -->
                                <?php if ($sisa != 0): ?>
                                    <button type="button" class="btn btn-gradient-info" <?= (!empty($cek_kode))  ? 'disabled' : '' ?> data-toggle="modal" data-target="#modal_invest<?= $no ?>">
                                        <i class="ti-check"></i><?= nbs(2) ?> INVESTASI
                                    </button>
                                <?php endif ?>
                                
                            <?php elseif ($this->session->userdata('level') == 'kontributor'): ?>
                                <a href="<?= base_url('prospektus/detail/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-sky btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a>
                                <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                                    <?php if ($d['status'] == null): ?>
                                        <?= nbs(3) ?>
                                        <a href="<?= base_url('prospektus/edit/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-indigo btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-pencil-alt"></i><?= nbs(2) ?>EDIT</button></a><?= nbs(4) ?>
                                        <a href="<?= base_url('prospektus/ubah_status_pros_con/'.$d['id_prospektus'].'/'.$this->uri->segment(3)) ?>"><button class="btn btn-sm btn-success btn-icon btn-icon-style-1" onclick="return confirm('Yakin akan mengirim data?')" style="width: 80px;"><i class="ti-check"></i><?= nbs(2) ?>KIRIM</button></a>
                                    <?php endif ?>
                                <?php else: ?>
                                        <?= nbs(3) ?>
                                        <a href="<?= base_url('prospektus/edit/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-indigo btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-pencil-alt"></i><?= nbs(2) ?>EDIT</button></a>
                                <?php endif ?>
                                
                            <?php endif ?>
                        </div>
                        
                    </div>
            
                    
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal_invest<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header color-wrap bg-gradient-info">
                            <h5 class="modal-title text-white"><i data-feather="tag"></i><?= nbs(3) ?>Investasi</h5>
                            <button type="button" class="close  text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                        </div>
                        <!-- form_open('prospektus/proses_invest'); -->

                        <div class="modal-body">
                        <form action="#" id="form_invest<?= $no ?>">
                            <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna'); ?>">
                            <input type="hidden" name="id_pros" value="<?= $d['id_prospektus'] ?>">
                            <input type="hidden" name="kode_transaksi" value="<?= $this->session->userdata('kode_transaksi'); ?>">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>NIK</label>
                                    <div class="form-group">
                                    <input type="text" name="nik" class="form-control" value="<?= $data_pengguna['nik'] ?>" required>
                                    </div>
                                    <label>Nama</label>
                                    <div class="form-group">
                                    <input type="text" name="nama" class="form-control" value="<?= $this->session->userdata('nama'); ?>" required>
                                    </div>
                                    <label>Alamat</label>
                                    <div class="form-group">
                                    <textarea class="form-control" name="alamat" required><?= $data_pengguna['alamat'] ?></textarea>
                                    </div>
                                    <label>Telepon</label>
                                    <div class="form-group">
                                    <input type="number" name="no_tlp" class="form-control" value="<?= $data_pengguna['no_telp'] ?>" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Harga Lot</label>
                                    <input type="hidden" id="minimal_<?= $no ?>" value="<?= $d['minimal_investasi']; ?>">
                                    <input type="hidden" id="min_lot_<?= $no ?>" value="<?= $d['sisa_lot'] ?>">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp. </span>
                                            </div>
                                            <input type="text" name="harga_invest" class="form-control filled-input" value="<?= number_format($d['minimal_investasi'],'0','.','.') ?>" readonly>
                                        </div>
                                        
                                    </div>
                                    <label>Jumlah Lot</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="jml_lot" id="jml_lot_<?= $no ?>" class="form-control" value="0" autofocus required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"> Lot </span>
                                            </div>
                                        </div> <span id="errmsg_<?= $no ?>"></span>
                                    </div>
                                    <label>Total</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp. </span>
                                            </div>
                                            <input type="text" id="total_<?= $no ?>" name="harga_total" class="form-control filled-input" readonly>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                         </form>   
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-gradient-warning" name="lanjut" type="button" id="lanjut" onclick="simpan_invest(<?= $no ?>, 'lanjut', '<?= $this->session->userdata('level') ?>')"><i class="ti-angle-double-left"></i><?= nbs(2) ?>Lanjutkan Investasi Lain</button><?= nbs(2) ?>
                            <button class="btn btn-gradient-danger" name="bayar" type="button" id="bayar" onclick="simpan_invest(<?= $no ?>, 'bayar', '<?= $this->session->userdata('level') ?>')"><i class="ti-check"></i><?= nbs(2) ?>Bayar</button>
                        </div>
                        
                    </div>
                </div>
            </div>

            <?php $i++; $no++; endforeach ?>
        </div>
            <?= $pagination ?>
    </div>
</div>

</div>

<!-- Modal form title -->
<div class="modal fade" id="modal_title" role="dialog" aria-labelledby="modal_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #12ba12;">
                <h5 class="modal-title" style="color: white;"><i class="ti-layout-grid2"></i><?= nbs(2) ?></h5><h5 class="modal-title a" style="color: white;">Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_title">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="hidden" name="id_pros">
                        <p>(Jumlah Karakter Maksimal: 150) </p>
                        <textarea class="form-control" id="title" rows="8" name="title" placeholder="Masukkan Title"></textarea>
                        <span id="hitung">150</span> Karakter Tersisa.
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?>B A T A L</button><?= nbs(5) ?>
                <button type="button" class="btn btn-primary" onclick="aksi_title()"><i class="ti-save"></i><?= nbs(2) ?>S I M P A N</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>

<?php $no=0; foreach ($data_unit_pros as $d) : ?>

<script type="text/javascript">

    $(document).ready(function () {

      $("#jml_lot_<?= $no ?>").keypress(function (e) {

         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

            $("#errmsg_<?= $no ?>").html("Masukkan hanya angka !!").show().fadeOut("slow");
            $("button[name='lanjut']").hide();
            $("button[name='bayar']").hide();

            return false;
         } else {
            $("button[name='lanjut']").show();
            $("button[name='bayar']").show();
         }
         
       });
    });

    $(document).ready(function () {

      $("#jml_lot_<?= $no ?>").keyup(function (e) {

         var a = $("#min_lot_<?= $no ?>").val();
         var b = $("#jml_lot_<?= $no ?>").val();

         if (parseInt(b) > parseInt(a)) {
            $("#errmsg_<?= $no ?>").html("Jumlah Lot lebih !!").show().fadeOut("slow");
            $("button[name='lanjut']").hide();
            $("button[name='bayar']").hide();

            return false;
         } else {
            $("button[name='lanjut']").show();
            $("button[name='bayar']").show();
         }

       });
    });

</script>

<script>

    $(document).ready(function(e) {
       
        $("input").keyup( function() {

          var tot_nilai = 0;
          var a = $("input[id=minimal_<?= $no ?>]").val();
          var b = $("input[id=jml_lot_<?= $no ?>]").val();
          tot_nilai = parseInt(a) * parseInt(b);

          var reverse = tot_nilai.toString().split('').reverse().join(''),
          ribuan    = reverse.match(/\d{1,3}/g);
          ribuan    = ribuan.join('.').split('').reverse().join('');

          $("input[id=total_<?= $no ?>]").val(ribuan);
          
        });

      });
        
</script>

<?php $no++; endforeach ?>

<script type="text/javascript">

    $(document).ready(function() {
        $('#title').keyup(function() {
        var len = this.value.length;
        if (len >= 150) {
            this.value = this.value.substring(0, 150);
        }

        $('#hitung').text(150 - len);
        });
    });

    var save_method;

    function simpan_invest(no, aksi, level) {
        var b = $("#jml_lot_"+no).val();

        if (parseInt(b) == 0) {
            $("#errmsg_"+no).html("Jumlah lot tidak boleh bernilai 0").show().fadeOut("slow");
        } else {
            var url = "<?php echo site_url('prospektus/proses_invest') ?>";

            $.ajax({
                url     : url,
                type    : "POST",
                data    : $('#form_invest'+no).serialize(),
                dataType: "JSON",
                success : function(data) {
                    $('#modal_invest'+no).modal('hide');

                    if (aksi == 'lanjut') {

                        if (level == 'investor') {
                            url = "<?php echo site_url('prospektus/index/')?>"+data['kd_tr'];
                        } else {
                            url = "<?php echo site_url('prospektus/koperasi/')?>"+data['kd_tr'];
                        }

                    } else {
                        url = "<?php echo site_url('prospektus/transaksi_kop/')?>"+data['kd_tr'];
                    }

                    window.location.href=url;


                },
                error   : function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal! Memproses Data');
                }
            });
        
        }

        
    }

    // menyimpan data title
    function aksi_title() {
        var url;

        url = "<?php echo site_url('prospektus/simpan_title_pros') ?>";

        $.ajax({
            url     : url,
            type    : "POST",
            data    : $('#form_title').serialize(),
            dataType: "JSON",
            success : function(data)
            {
                $('#modal_title').modal('hide');
                location.reload();
            },
            error   : function(jqXHR, textStatus, errorThrown)
            {
                alert('Gagal! Memproses Data...');
            }
        });
    }

    // menampilkan data title
    function edit_title(id_pros) {
        save_method = 'ubah';
        $('#form_title')[0].reset();

        $.ajax({
            url     : "<?php echo site_url('prospektus/ambil_title_pros') ?>/"+id_pros,
            type    : "GET",
            dataType: "JSON",
            success : function(data)
            {
                $('[name = "id_pros"]').val(data.id_prospektus);
                $('[name = "title"]').val(data.title);

                $('#modal_title').modal('show');
            },
            error   : function (jqXHR, textStatus, errorThrown)
            {
                alert('Gagal! Memperoses Data...');
            }
        });
    }
</script>
