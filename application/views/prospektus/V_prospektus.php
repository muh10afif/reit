<style type="text/css">
    .card-img-top {
        border-radius: 0px 0px 0px 0px;
    }
    .judul {
        border-radius: 5px 5px 0px 0px;
    }
    /* Centered text */
    .over {
      position: absolute;
      top: 45%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
</style>
<div class="container">
<!-- Title -->
<div class="hk-pg-header mt-10">
    <div class="col-md-6">
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Prospektus Kawasan</h2>
    </div>
    <div class="col-md-6">
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'manager' || $this->session->userdata('level') == 'copywriter'): ?>
            <button class="btn btn-icon btn-icon-style-1 btn-green mt-10 float-right shadow-xl" style="width: 140px;" onclick="tambah_blok()"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add'); ?></button>
        <?php endif ?>
    </div>
		
</div>
    <?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            
            <?php foreach ($data_blok as $d): ?>
            <div class="col-md-4" >
                <?php if ($d['ket'] == 'kontributor'): ?>
                    <div class="card shadow-sm shadow-hover-xl border border-pink border border-3">
                <?php else: ?>
                    <div class="card shadow-sm shadow-hover-xl border border-light border border-3">
                <?php endif ?>
                    
                    <div class="card-body judul color-wrap bg-dark-100 shadow-xl">
                        <div class="col-md-12">
                            <h5 class="card-title" style="color: white"><?= $d['nama_kawasan'] ?><?= nbs(3) ?></h5>
                        </div>
                        <div class="col-md-12 ">
                          <small class="badge badge-pink">Blok <?= $d['nama_blok'] ?></small>
                        </div>
                        
                        
                    </div>
                    <?php if ($d['ket'] == 'kontributor'): ?>
                        <!-- <div class="over"><?= ucfirst($d['ket']) ?></div> -->
                        <h1 class="display-4 text-white over shadow-xl"><span class="badge badge-danger badge-outline shadow-xl bg-light-10">Kontributor</span></h1>
                    <?php endif ?>
                    <img class="card-img-top responsive" height="250px" src="<?= base_url() ?>assets/gambar/<?= base64_decode($d['gambar']) ?>" alt="Card image cap">
                    
                        <table class="table table-hover" align="center" width="100px">
                            <thead class="thead-success">
                                <tr>
                                    <?php $date = date("Y-m-d", strtotime($d['add_time'])); ?>
                                    <th align="left" style="color: white;"><i class="ti-calendar"></i><?= nbs(3) ?><?= tgl_indo($date) ?></th>

                                    <th align="right" style="color: white;"><i class="ti-flag-alt"></i><?= nbs(3) ?>
                                    <?php if ($this->session->userdata('level') == 'investor' || $this->session->userdata('level') == 'koperasi'): ?>
                                        <?= $d['j_unit'] ?>
                                    <?php else: ?>
                                        <?= $d['jumlah_unit'] ?> 
                                    <?php endif ?>
                                    Unit</th>
                                </tr>
                            </thead>
                        </table>
                        
                    <div class="card-footer" style="margin-top: -14px">
                        <div class="col-md-12 text-center">

                        <?php if ($this->session->userdata('level') != 'koperasi'): ?>
                            <?php if ($this->session->userdata('level') == 'investor'): ?>
                                <?php if ($this->uri->segment(4) != null): ?>
                                    <a href="<?= base_url('prospektus/detail_kws/'.$d['id_blok'].'/'.base64_encode($kd_transaksi)) ?>"><button class="btn btn-sm btn-icon btn-sky btn-icon-style-1 mt-10" style="width: 90px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a>
                                <?php else: ?>
                                    <a href="<?= base_url('prospektus/detail_kws/'.$d['id_blok']) ?>"><button class="btn btn-sm btn-icon btn-sky btn-icon-style-1 mt-10" style="width: 90px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a>
                                <?php endif; ?>
                                
                            <?php else: ?>
                                <a href="<?= base_url('prospektus/detail_kws/'.$d['id_blok']) ?>"><button class="btn btn-sm btn-icon btn-sky btn-icon-style-1 mt-10" style="width: 90px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a>
                                <?= nbs(3) ?>
                                <button type="button" class="btn btn-sm btn-icon btn-indigo btn-icon-style-1 mt-10" style="width: 90px;" onclick="edit_blok('<?= $d['id_blok'] ?>')"><i class="ti-pencil-alt"></i><?= nbs(2) ?>EDIT</button>
                            <?php endif ?>
                            
                        <?php else: ?>
                            <?php if ($this->uri->segment(4) != 'blok'): ?>
                                <a href="<?= base_url('prospektus/detail_kws/'.$d['id_blok'].'/'.base64_encode($kd_transaksi)) ?>"><button class="btn btn-sm btn-icon btn-sky btn-icon-style-1" style="width: 100px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a>
                            <?php else: ?>
                            <a href="<?= base_url('prospektus/detail_kws/'.$d['id_blok']) ?>"><button class="btn btn-sm btn-icon btn-sky btn-icon-style-1" style="width: 100px;"><i class="ti-info-alt"></i><?= nbs(2) ?>DETAIL</button></a>
                            <?php endif; ?>

                            
                        <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>

		</div>		
            <?= $pagination ?>
	</div>
</div>
<!-- /Row -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal_buy" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Investasi</h5>
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
                            <label for="lastName">Nama</label>
                            <input class="form-control" id="lastName" placeholder="" value="" type="text"><br>
                            <label for="lastName">Alamat</label>
                            <textarea class="form-control" name="alamat"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="firstName">Telepon</label>
                            <input class="form-control" id="firstName" placeholder="" value="" type="text"><br>
                            <label for="lastName">Jumlah Lot</label>
                            <input class="form-control" id="lastName" placeholder="" value="" type="text"><br>
                            <label for="lastName">Metode Bayar</label>
                            <select name="metode" class="form-control">
                                <option value="">Cash</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times fa-lg"></i><?= nbs(3) ?>Close</button><?= nbs(5) ?>
                <button type="button" class="btn btn-success"><i class="fa fa-check fa-lg"></i><?= nbs(3) ?>Investasi</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


<!-- Modal form tambah blok -->
<div class="modal fade" id="modal_blok" tabindex="-1" role="dialog" aria-labelledby="modal_blok" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <h5 class="modal-title" style="color: white;"><i class="ti-plus"></i><?= nbs(2) ?>Tambah Data Blok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="form_blok">
                <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="nama">Nama Blok</label>
                            <input class="form-control" id="nama" placeholder="Masukkan Nama Blok" type="text" name="nama"><br>
                            <label for="kawasan">Nama Kawasan</label>
                            <select name="kawasan" class="form-control">
                                <option value="">-- Pilih Nama Kawasan --</option>
                                <?php foreach ($kawasan as $k): ?>
                                    <option value="<?= $k['id_kawasan'] ?>"><?= $k['nama_kawasan'] ?></option>
                                <?php endforeach ?>
                            </select><br>
                            <label for="unit">Jumlah Unit</label>
                            <input type="number" class="form-control" placeholder="Masukkan Jumlah Unit" name="unit">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="gbr">Foto Thumbnail</label>
                            <input type="file" id="input-file-now gbr" name="foto" class="dropify" /><br>
                        </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?>B A T A L</button><?= nbs(5) ?>
                <button type="submit" class="btn btn-primary"><i class="ti-save"></i><?= nbs(2) ?>S I M P A N</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal form Edit blok -->
<div class="modal fade" id="modal_edit_blok" tabindex="-1" role="dialog" aria-labelledby="modal_edit_blok" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #12ba12;">
                <h5 class="modal-title" style="color: white;"><i class="ti-pencil"></i><?= nbs(2) ?>Edit Data Blok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="form_edit_blok" enctype="multipart/form-data">
                <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="hidden" name="id">
                            <label for="nama">Nama Blok</label>
                            <input class="form-control" id="nama" placeholder="Masukkan Nama Blok" type="text" name="nama"><br>
                            <label for="kawasan">Nama Kawasan</label>
                            <select name="kawasan" class="form-control">
                                <option value="">-- Pilih Nama Kawasan --</option>
                                <?php foreach ($kawasan as $k): ?>
                                    <option value="<?= $k['id_kawasan'] ?>"><?= $k['nama_kawasan'] ?></option>
                                <?php endforeach ?>
                            </select><br>
                            <label for="unit">Jumlah Unit</label>
                            <input type="number" class="form-control" placeholder="Masukkan Jumlah Unit" name="unit"><br>
                            <label for="gbr">Foto Thumbnail</label>
                            <span class="badge badge-indigo mb-10">Foto Sebelumnya</span>
                            <div id="foto_baru">
                                
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            
                            <span class="badge badge-indigo mb-10 mt-10">Foto Baru</span>
                             <input type="file" id="input-file-now gbr" name="foto" class="dropify" />
                            <br>
                        </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?>B A T A L</button><?= nbs(5) ?>
                <button type="submit" class="btn btn-primary"><i class="ti-save"></i><?= nbs(2) ?>S I M P A N</button>
            </div>
            </form>
        </div>
    </div>
</div>