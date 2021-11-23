<style type="text/css">
    .card-img-top {
        border-radius: 0px 0px 0px 0px;
    }
    .judul {
        border-radius: 5px 5px 0px 0px;
    }
</style>
<div class="container">

	<?php if ($cek_pengguna == 0): ?>
		<div class="jumbotron mt-20 bg-gradient-ashes " style="width: 100%;">
		  <h1 class="display-4 text-white">Welcome</h1>
		  <p class="lead text-white">Display proyekmu di rei-trust.com</p>
		  <hr class="my-4">
		  <a href="<?= base_url('prospektus/buat_project') ?>">

		  <button class="btn btn-success btn-lg btn-wth-icon btn-rounded icon-right"><span class="btn-text">Mulai disini</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right-circle"></i></span></span></button> </a>
		</div>
	
	<?php else: ?>
		<!-- Title -->
		<div class="hk-pg-header">
		    <div class="col-md-6">
		        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Prospektus Blok</h2>
		    </div>
		    <div class="col-md-6">
		            <a href="<?= base_url('prospektus/buat_project') ?>"><button class="btn btn-icon btn-icon-style-1 btn-green mt-10 float-right btn-lg shadow-xl" style="width: 140px;"><i class="ti-plus"></i><?= nbs(2) ?>T A M B A H</button></a>
		    </div>
				
		</div>
		    <?= $this->session->flashdata('pesan'); ?>
		<!-- /Title -->

		<!-- Row -->
		<div class="row">
		    <div class="col-xl-12">
		        <div class="hk-row">
		            
		            <?php foreach ($data_blok->result_array() as $d): ?>
		            <div class="col-md-4" >
		                <div class="card shadow-sm shadow-hover-xl">
		                    
		                    <div class="card-body judul color-wrap bg-dark-100 shadow-xl">
		                        <div class="col-md-12">
		                            <h5 class="card-title" style="color: white"><?= $d['nama_kawasan'] ?><?= nbs(3) ?></h5>
		                        </div>
		                        <div class="col-md-12 ">
		                          <small class="badge badge-pink">Blok <?= $d['nama_blok'] ?></small>
		                        </div>
		                        
		                        
		                    </div>
		                    <img class="card-img-top" width="200" height="250" src="<?= base_url() ?>assets/gambar/<?= base64_decode($d['gambar']) ?>" alt="Card image cap">
		                    
		                        <table class="table table-hover" align="center" width="100px">
		                            <thead class="thead-success">
		                                <tr>
		                                    <?php $date = date("Y-m-d", strtotime($d['add_time'])); ?>
		                                    <th align="left" style="color: white;"><i class="ti-calendar"></i><?= nbs(3) ?><?= tgl_indo($date) ?></th>
		                                    <th align="right" style="color: white;"><i class="ti-flag-alt"></i><?= nbs(3) ?><?= $d['jumlah_unit'] ?> Unit</th>
		                                </tr>
		                            </thead>
		                        </table>
		                        
		                    <div class="card-footer" style="margin-top: -14px">
		                        <div class="col-md-12 text-center">
		                        <a href="<?= base_url('prospektus/detail_kws/'.$d['id_blok']) ?>"><button class="btn btn-sm btn-icon btn-sky btn-icon-style-1" style="width: 100px;"><i class="ti-info-alt"></i><?= nbs(2) ?>D E T A I L</button></a>
		                        <?= nbs(3) ?>
                            	<button type="button" class="btn btn-sm btn-icon btn-indigo btn-icon-style-1" style="width: 90px;" onclick="edit_blok('<?= $d['id_blok'] ?>')"><i class="ti-pencil-alt"></i><?= nbs(2) ?>EDIT</button>
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
	<?php endif ?>
	

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
