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
        <li class="breadcrumb-item"><a href="<?= base_url('approve_lot') ?>">Approve Lot</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Title -->
<div class="hk-pg-header row">
    	<div class="col-md-6">
    		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="plus"></i></span></span>Detail</h2>
    	</div>
    	<div class="col-md-6">
    		<a href="<?= base_url('approve_lot/') ?>"><button class="btn btn-info float-right"><i class="icon-arrow-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
    	</div>
</div>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-2">
						<?php echo lang('name') ?>
					</div>
					<div class="col-md-10">
						:<?= nbs(5).strtoupper($data_invest['nama_pengguna']) ?>
					</div>
					
				</div>
				<div class="row mt-10">
					<div class="col-md-2">
						<?php echo lang('trans_code') ?>
					</div>
					<div class="col-md-10">
						:<?= nbs(5).$data_invest['kode_transaksi'] ?>
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>
                <?php $st =  $data_invest['status'] ?>

                <?php if ($st == 0): ?>
                    
				<div class="row">
					<div class="col-md-12">
                        <div class="card text-white bg-blue">
                            <div class="card-body">

                            	<div class="row satu">
                            		<div class="col-md-3">
                            			Unit
                            		</div>
                            		<div class="col-md-4">
                            			<?= $data_invest['nama_unit'] ?>
                            		</div>
                            		<div class="col-md-5 ">
                            			
                            		</div>
                            		<div class="col-md-3 mt-15">
                            			<?php echo lang('total_lot') ?>
                            		</div>
                            		<div class="col-md-4 mt-15">
                            			<?= $data_invest['jumlah_lot'] ?>
                            		</div>
                            		<div class="col-md-5 text-center dua" style="margin-top: -20px">
                            			<a href="<?= base_url('approve_lot/ubah_stat_invest/2') ?>"><span class="fa fa-times-circle fa-4x ikon" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Tolak" style="color: white;"></span></a><?= nbs(8) ?>
                        				<a href="<?= base_url('approve_lot/ubah_stat_invest/1') ?>"><span class="fa fa-check-circle fa-4x ikon" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Setujui" style="color: white;"></span></a>
                                        <?php if ($st == 1): ?>
                                            <?= nbs(8) ?>
                                            <a href="#"><span class="fa fa-print fa-4x ikon disabled" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Print" style="color: white;"></span></a>
                                        <?php endif ?>
                                        

                            		</div>
                            	</div>

                            </div>
                        </div>
					</div>
				</div>

                <?php elseif ($st == 1): ?>

				<div class="row">
					<div class="col-md-12">
                        <div class="card text-white bg-success">
                            <div class="card-body">

                            	<div class="row satu">
                            		<div class="col-md-3">
                            			Unit
                            		</div>
                            		<div class="col-md-4">
                            			<input type="text" name="unit" class="form-control">
                            		</div>
                            		<div class="col-md-5 ">
                            			
                            		</div>
                            		<div class="col-md-3 mt-15">
                            			<?php echo lang('total_lot') ?>
                            		</div>
                            		<div class="col-md-4 mt-15">
                            			<input type="text" name="unit" class="form-control">
                            		</div>
                            		<div class="col-md-5 text-center dua" style="margin-top: 0px">
                            			<span class="badge badge-info mb-20" style="font-size: 20px">Disetujui</span><?= nbs(10) ?>
                        				<a href="#"><span class="fa fa-print fa-4x ikon" style="color: white;"></span></a>
                            		</div>
                            	</div>

                            </div>
                        </div>
					</div>
				</div>
                
                <?php elseif ($st == 2): ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-white bg-danger">
                            <div class="card-body">

                                <div class="row satu">
                                    <div class="col-md-3">
                                        Unit
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="unit" class="form-control">
                                    </div>
                                    <div class="col-md-5 ">
                                        
                                    </div>
                                    <div class="col-md-3 mt-15">
                                        <?php echo lang('total_lot') ?>
                                    </div>
                                    <div class="col-md-4 mt-15">
                                        <input type="text" name="unit" class="form-control">
                                    </div>
                                    <div class="col-md-5 text-center dua" style="margin-top: 0px">
                                        <span class="badge badge-warning mb-20" style="font-size: 20px">Ditolak</span><?= nbs(10) ?>
                                        <a href="#"><span class="fa fa-print fa-4x ikon" style="color: white;"></span></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
                <?php endif ?>


</div>