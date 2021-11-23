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
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="box"></i></span></span>Data <?php echo lang('regions') ?></h2>
    </div>
    <div class="col-md-6">
        <button class="btn btn-icon btn-icon-style-1 btn-success mt-10 float-right" style="width: 120px;" onclick="tambah_kws()"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add') ?></button>
    </div>
	
</div>
<?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body table-responsive
			">
				<table id="id_tabel" class="table table-hover w-100 display">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th><?php echo lang('regions') ?></th>
							<th><?php echo lang('address') ?></th>
							<th><?php echo lang('action') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_kws as $k): ?>
							<tr>
								<td align="center"><?= $no++ ?></td>
								<td><?= $k['nama_kawasan'] ?></td>
								<td><?= $k['alamat'] ?></td>
								<td width="20%" align="center">
									<button class="btn btn-info btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Edit" onclick="edit_kws('<?= $k['id_kawasan'] ?>')"><span class="feather-icon feat"><i data-feather="edit-3"></i></span></button><?= nbs(5) ?>
									<button class="btn btn-orange btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Hapus" onclick="hapus_kws('<?= $k['id_kawasan'] ?>')"><span class="feather-icon feat"><i data-feather="trash-2"></i></span></button></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>

<!-- Modal form kawasan -->
<div class="modal fade" id="modal_kws" tabindex="-1" role="dialog" aria-labelledby="modal_kws" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #12ba12;">
            	<h5><span id="jdl"></span></h5>
                <h5 class="modal-title" style="color: white;"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add') ?> <?php echo lang('regions') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_kws">
                <div class="row">
                    <div class="col-md-12 form-group">
                    	<input type="hidden" name="id_kawasan">
                        <label for="nama"><?php echo lang('regions') ?></label>
                        <input class="form-control" id="nama" placeholder="<?php echo lang('regions') ?>" type="text" name="nama"><br>
                        <label for="alamat"><?php echo  lang('address') ?></label>
                        <textarea name="alamat" id="alamat" cols="30" class="form-control" placeholder="<?php echo lang('i_address') ?>"></textarea>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?><?php echo lang('cancel') ?></button><?= nbs(5) ?>
                <button type="button" class="btn btn-primary" onclick="aksi_kawasan()"><i class="ti-save"></i><?= nbs(2) ?><?php echo lang('save') ?></button>
            </div>
        </div>
    </div>
</div>