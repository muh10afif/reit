<style type="text/css">
	.a div:hover {
		background-color: white;
		color: #63d160;
		border-radius: 5px;
	}
	.satu .dua span:hover {
		box-shadow: 2px 2px 5px rgba(0,0,0,1);
		border-radius: 0px;
	}
</style>
<div class="container">
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url('manager/approve_lot') ?>">Approve Lot</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Title -->
<div class="hk-pg-header row">
    	<div class="col-md-12">
    		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="info"></i></span></span>Detail Transaksi Investor</h2>
    	</div>
</div>
<!-- /Title -->

<?= $this->session->flashdata('pesan'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-2">
						<label>Investor</label>
					</div>
					<div class="col-md-10">
						:<?= nbs(5).strtoupper($data_invest_1['nama_pengguna']) ?>
					</div>
					
				</div>
				<div class="row mt-10">
					<div class="col-md-2">
						<label>Kode Transaksi</label>
					</div>
					<div class="col-md-10">
						:<?= nbs(5).$data_invest_1['kode_transaksi'] ?>
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>

<?php $no=1; foreach ($data_invest_2 as $d): ?>

<?php $st =  $d['status'] ?>
    
<div class="row">
	<div class="col-md-12">
        <?php if ($st == 0): ?>
            <div class="card text-white bg-blue">
        <?php elseif ($st == 1): ?>
            <div class="card text-white bg-success">
        <?php else: ?>    
            <div class="card text-white bg-danger">
        <?php endif ?>
        
            <div class="card-body">

            	<div class="row satu">
            		<div class="col-md-2">
            			Unit
            		</div>
            		<div class="col-md-6">
            			:<?= nbs(5) ?><?= $d['nama_unit'] ?>, Kawasan <?= $d['nama_kawasan'] ?>, Blok <?= $d['nama_blok'] ?>
            		</div>
            		<div class="col-md-4 ">
            			
            		</div>
                    <div class="col-md-2 mt-15">
                        Alamat
                    </div>
                    <div class="col-md-6 mt-15">
                        :<?= nbs(5) ?><?= $d['alamat'] ?>
                    </div>
                    <div class="col-md-4 mt-15">
                        
                    </div>

            		<div class="col-md-2 mt-15">
            			<?php echo lang('total_lot') ?>
            		</div>
            		<div class="col-md-6 mt-15">
            			:<?= nbs(5) ?><?= $d['jumlah_lot'] ?>
            		</div>


                    
            		<div class="col-md-4 text-center dua" style="margin-top: -40px">

            			 <?php if ($st == 0): ?>
                       
                            <a href="<?= base_url('manager/ubah_stat_invest/2/'.$data_invest_1['kode_transaksi'].'/'.$d['id_tr_investor'].'/'.$d['jumlah_lot']) ?>"><span class="fa fa-times-circle fa-4x ikon" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Tolak" style="color: white;"></span></a><?= nbs(8) ?>
                            <a href="<?= base_url('manager/ubah_stat_invest/1/'.$data_invest_1['kode_transaksi'].'/'.$d['id_tr_investor'].'/'.$d['jumlah_lot']) ?>"><span class="fa fa-check-circle fa-4x ikon" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Setujui" style="color: white;"></span></a>

                        <?php elseif ($st == 1): ?>

                            <span class="badge badge-info mb-20" style="font-size: 20px" data-toggle="modal" data-target="#modal<?= $no ?>">Disetujui</span><?= nbs(10) ?>
                            <a href="#"><span class="fa fa-print fa-4x ikon" style="color: white;"></span></a>

                        <?php else: ?>    

                            <span class="badge badge-success mb-20 mt-10" style="font-size: 20px" data-toggle="modal" data-target="#modal<?= $no ?>">Ditolak</span>

                        <?php endif ?>

            		</div>
            	</div>

            </div>
        </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header color-wrap bg-gradient-info">
                <h5 class="modal-title text-white"><i data-feather="check-circle"></i><?= nbs(3) ?>Ubah Status Transaksi</h5>
                <button type="button" class="close  text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <?= form_open('manager/ubah_stat_invest/2/'.$data_invest_1['kode_transaksi'].'/'.$d['id_tr_investor'].'/'.$d['jumlah_lot'].'/x'); ?>
            <div class="modal-body">
                    
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="status">
                            <option value="1" <?= ($st == 1) ? 'selected' : '' ?>>Disetujui</option>
                            <option value="2" <?= ($st == 2) ? 'selected' : '' ?>>Ditolak</option>
                            <option value="0" <?= ($st == 0) ? 'selected' : '' ?>>Pending</option>
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-gradient-warning" data-dismiss="modal"><i class="ti-angle-double-left"></i><?= nbs(2) ?>Kembali</button><?= nbs(2) ?>
                <button class="btn btn-gradient-danger" type="submit"><i class="ti-check"></i><?= nbs(2) ?>Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $no++; endforeach ?>


</div>