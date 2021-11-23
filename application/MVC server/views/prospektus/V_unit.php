<div class="container">
    
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url('prospektus') ?>">Prospektus</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail <?php echo  lang('regions') ?></li>
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
            <h3 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="info"></i></span></span>Detail <?php echo  lang('regions') ?> <?= $nama ?><?= nbs(2) ?><i class="badge badge-pink">Blok <?= $blok ?></i></h3>

	</div>
    <div class="col-md-2">
        <?php if ($this->session->userdata('level') == 'kontributor'): ?>
            <a href="<?= base_url('prospektus/kontributor') ?>">
        <?php else: ?>
            <a href="<?= base_url('prospektus/') ?>">
        <?php endif ?>
        <button class="btn btn-info float-right btn-icon btn-icon-style-1" style="width: 170px;"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
    </div>
    <div class="col-md mt-10">
        <a href="<?= base_url('prospektus/tambah/').$id_blok['id_blok'] ?>"><button class="btn btn-green float-left btn-icon btn-icon-style-1" style="width: 180px;"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add') ?> Prospektus</button></a>
    </div>
    <?php else: ?>
    <div class="col-md-10">
         <a href="<?= base_url('prospektus/') ?>"><button class="btn btn-info btn-icon btn-icon-style-1" style="width: 170px;"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
    </div>
    <div class="col-md-2">
        <a href="<?= base_url('prospektus/tambah/').$id_blok['id_blok'] ?>"><button class="btn btn-success float-right btn-icon btn-icon-style-1" style="width: 170px;"><i class="ti-plus"></i><?= nbs(3) ?><?php echo lang('add') ?> Prospektus</button></a>
    </div>
    <?php endif ?>
    
</div>

<?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            <?php $i=1; foreach ($data_unit_pros as $d): ?>
                <div class="col-md-4">
                <div class="card shadow-sm shadow-hover-xl">
                    
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
                            <div class="col-md-7"><?php echo lang('investor_target') ?></div>
                            <div class="col-md-5" align="right"><?= $d['target_investor'] ?>%</div>
                            
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-7"><?php echo lang('unit_type') ?></div>
                            <div class="col-md-5" align="right"><?= $d['nama_unit'] ?></div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-7"><?php echo lang('price') ?></div>
                            <div class="col-md-5" align="right">Rp. <?= number_format($d['harga'],'0','.','.') ?></div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-7"><?php echo lang('investment_period') ?></div>
                            <div class="col-md-5" align="right"><?= $d['periode_investasi'] ?> Tahun</div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-7"><?php echo lang('min_invest') ?></div>
                            <div class="col-md-5" align="right">Rp. <?= number_format($d['minimal_investasi'],'0','.','.') ?></div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-md-7"><?php echo lang('total_lot') ?></div>
                            <div class="col-md-5" align="right"><?= $d['jumlah_lot'] ?> Lot</div>
                        </div>
                        <hr class="hr-primary" style="margin-top: 5px; margin-bottom: 5px;">
                    </div>
                    <div class="card-footer text-center shadow">

                        <div class="col-md-12">
                            <?php if ($this->session->userdata('level') == 'manager' OR $this->session->userdata('level') == 'admin'): ?>
                                <a href="<?= base_url('prospektus/detail/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-sky btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a><?= nbs(5) ?>
                                <a href="<?= base_url('prospektus/edit/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-indigo btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-pencil-alt"></i><?= nbs(2) ?>EDIT</button></a><?= nbs(5) ?>
                                <button class="btn btn-sm btn-primary btn-icon btn-icon-style-1" onclick="edit_title('<?= $d['id_prospektus'] ?>')" style="width: 80px;"><i class="ti-comment"></i><?= nbs(2) ?>TITLE</button>    
                            <?php elseif($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'investor'): ?>
                                <a href="<?= base_url('prospektus/detail/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-sky btn-icon btn-icon-style-1" style="width: 100px;"><i class="ti-info-alt"></i><?= nbs(2) ?>Detail</button></a><?= nbs(4) ?>
                                <button class="btn btn-success btn-icon btn-icon-style-1" style="width: 100px;" onclick="tampil_form_buy(<?= $d['id_prospektus'] ?>)"><i class="ti-check"></i><?= nbs(2) ?><?php echo lang('invest') ?></button>
                            <?php elseif ($this->session->userdata('level') == 'kontributor'): ?>
                                <a href="<?= base_url('prospektus/detail/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-sky btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a>
                                <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                                    <?php if ($d['status'] == null): ?>
                                        <?= nbs(5) ?>
                                        <a href="<?= base_url('prospektus/edit/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-indigo btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-pencil-alt"></i><?= nbs(2) ?>EDIT</button></a>
                                    <?php endif ?>
                                <?php else: ?>
                                        <?= nbs(5) ?>
                                        <a href="<?= base_url('prospektus/edit/'.$d['id_prospektus'].'/'.'x') ?>"><button class="btn btn-sm btn-indigo btn-icon btn-icon-style-1" style="width: 80px;"><i class="ti-pencil-alt"></i><?= nbs(2) ?>EDIT</button></a>
                                <?php endif ?>
                                
                            <?php endif ?>
                        </div>
                        
                    </div>
            
                    
                </div>
            </div>
            <?php $i++; endforeach ?>
        </div>
            <?= $pagination ?>
    </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="modal_buy" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo  lang('invets') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="firstName">Investor ID</label>
                            <input class="form-control" id="firstName" placeholder="" value="" type="text"><br>
                            <label for="lastName">NIK</label>
                            <input class="form-control" id="lastName" placeholder="" value="" type="text"><br>
                            <label for="lastName"><?php echo lang('name') ?></label>
                            <input class="form-control" id="lastName" placeholder="" value="" type="text"><br>
                            <label for="lastName"><?php echo lang('address') ?></label>
                            <textarea class="form-control" name="alamat"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="firstName"><?php echo lang('telephone') ?></label>
                            <input class="form-control" id="firstName" placeholder="" value="" type="text"><br>
                            <label for="lastName"><?php echo lang('total_lot') ?></label>
                            <input class="form-control" id="lastName" placeholder="" value="" type="text"><br>
                            <label for="lastName"><?php echo lang('payment_method') ?></label>
                            <select name="metode" class="form-control">
                                <option value="">Cash</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times fa-lg"></i><?= nbs(3) ?>Close</button><?= nbs(5) ?>
                <button type="button" class="btn btn-success"><i class="fa fa-check fa-lg"></i><?= nbs(3) ?><?php echo lang('invest') ?></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

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
