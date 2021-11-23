<style type="text/css">
	#datable_1 thead tr th {
		vertical-align: middle;
		text-align: center;
	}
	.feat {
	  width: 20px;
	  height: 20px;
	  vertical-align: middle;
	}
</style>
<div class="container">

<!-- Title -->
<div class="hk-pg-header mt-10">
 
	<div class="col-md-6">
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="package"></i></span></span>Data <?php echo lang('unit') ?></h2>
    </div>
    <div class="col-md-6">
        <button class="btn btn-icon btn-icon-style-1 btn-success mt-10 float-right" style="width: 120px;" onclick="tambah_unit()"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add') ?></button>
    </div>
	
</div>
<?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body table-responsive
			">
				<table id="datable_1" class="table table-hover w-100 display">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th><?php echo lang('unit') ?></th>
							<th><?php echo lang('price') ?></th>
							<th><?php echo lang('block') ?></th>
							<th><?php echo  lang('action') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_unit as $k): ?>
							<tr>
								<td align="center"><?= $no++ ?></td>
								<td><?= $k['nama_unit'] ?></td>
								<td>Rp. <?= number_format($k['harga'],0,'.','.') ?></td>
								<td><?= $k['nama_blok'] ?></td>
								<td width="20%" align="center">
									<button class="btn btn-info btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Edit" onclick="edit_unit('<?= $k['id_unit'] ?>')"><span class="feather-icon feat"><i data-feather="edit-3"></i></span></button><?= nbs(5) ?>
									<button class="btn btn-orange btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Hapus" onclick="hapus_unit('<?= $k['id_unit'] ?>')"><span class="feather-icon feat"><i data-feather="trash-2"></i></span></button></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>

<!-- Modal form Unit -->
<div class="modal fade" id="modal_unit" role="dialog" aria-labelledby="modal_unit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #12ba12;">
                <h5 class="modal-title" style="color: white;"><i class="ti-layout-grid2"></i><?= nbs(2) ?></h5><h5 class="modal-title a" style="color: white;"><?php echo lang('add') ?> <?php echo lang('unit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_unit">
                <div class="row">
                    <div class="col-md-12 form-group">
                    	<input type="hidden" name="id_unit">
                        <label for="nama"><?php echo lang('unit') ?></label>
                        <input class="form-control" id="nama" placeholder="<?php echo lang('i_unit') ?>" type="text" name="nama"><br>
                        <label for="harga"><?php echo lang('price') ?></label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="<?php echo lang('i_price') ?>"><br>
                        <label for="Blok"><?php echo lang('block') ?></label>
                        <select name="blok" id="blok" class="form-control select2">
                        	<option value="">-- <?php echo lang('choose_block') ?> --</option>
                        	<?php foreach ($data_blok as $b): ?>
                        		<option value="<?= $b['id_blok'] ?>"><?= $b['nama_blok'] ?></option>
                        	<?php endforeach ?>
                        </select>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?><?php echo lang('cancel') ?></button><?= nbs(5) ?>
                <button type="button" class="btn btn-primary" onclick="aksi_unit()"><i class="ti-save"></i><?= nbs(2) ?><?php echo lang('save') ?></button>
            </div>
        </div>
    </div>
</div>