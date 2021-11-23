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
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="list"></i></span></span>Data <?php echo lang('block') ?></h2>
    </div>
    <div class="col-md-6">
        <button class="btn btn-icon btn-icon-style-1 btn-success mt-10 float-right" onclick="tambah_blok()" style="width: 120px;"><i class="ti-plus"></i><?= nbs(2) ?><?php echo  lang('add') ?></button>
    </div>
	
</div>
<?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body table-responsive">
				<table id="datable_1" class="table table-hover w-100 display">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th><?php echo lang('block') ?></th>
							<th><?php echo lang('regions') ?></th>
							<th><?php echo  lang('unit_total') ?></th>
							<th><?php echo lang('pictuer') ?></th>
							<th><?php echo lang('action') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_blok->result_array() as $k): ?>
							<tr>
								<td align="center"><?= $no++ ?></td>
								<td><?= $k['nama_blok'] ?></td>
								<td><?= $k['nama_kawasan'] ?></td>
								<td><?= $k['jumlah_unit'] ?></td>
								<td align="center" class="gallery">
									<a data-gallery="foto" href="<?= base_url('assets/gambar/'.base64_decode($k['gambar'])) ?>"><img width="200px" height="150px" src="<?= base_url('assets/gambar/'.base64_decode($k['gambar'])) ?>"></a></td>
								<td width="20%" align="center">
									<button class="btn btn-info btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Edit" onclick="edit_blok('<?= $k['id_blok'] ?>')"><span class="feather-icon feat"><i data-feather="edit-3"></i></span></button><?= nbs(5) ?>
									<button class="btn btn-orange btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Hapus" onclick="hapus_blok('<?= $k['id_blok'] ?>')"><span class="feather-icon feat"><i data-feather="trash-2"></i></span></button></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>



<!-- Modal form tambah blok -->
<div class="modal fade" id="modal_blok" tabindex="-1" role="dialog" aria-labelledby="modal_blok" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #12ba12;">
                <h5 class="modal-title" style="color: white;"><i class="ti-plus"></i><?= nbs(2) ?><?php echo  lang('add') ?> <?php echo  lang('block') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="form_blok">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nama"><?php echo lang('block') ?></label>
                        <input class="form-control" id="nama" placeholder="<?php echo lang('i_block') ?>" type="text" name="nama"><br>
                        <label for="kawasan"><?php echo  lang('regions') ?></label>
                        <select name="kawasan" class="form-control">
                            <option value="">-- <?php echo  lang('choose_regions') ?> --</option>
                            <?php foreach ($kawasan as $k): ?>
                                <option value="<?= $k['id_kawasan'] ?>"><?= $k['nama_kawasan'] ?></option>
                            <?php endforeach ?>
                        </select><br>
                        <label for="unit"><?php echo  lang('unit_total') ?></label>
                        <input type="number" class="form-control" placeholder="<?php echo lang('i_unit') ?>" name="unit">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="gbr"><?php echo lang('picture') ?></label>
                        <input type="file" id="input-file-now gbr" name="foto" class="dropify" /><br>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?><?php echo lang('cancel') ?></button><?= nbs(5) ?>
                <button type="submit" class="btn btn-primary"><i class="ti-save"></i><?= nbs(2) ?><?php echo lang('save') ?></button>
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
                            <label for="nama"><?php echo lang('block') ?></label>
                            <input class="form-control" id="nama" placeholder="<?php echo lang('i_block') ?>" type="text" name="nama"><br>
                            <label for="kawasan"><?php echo  lang('regions') ?></label>
                            <select name="kawasan" class="form-control">
                                <option value="">-- <?php echo lang('choose_regions') ?> --</option>
                                <?php foreach ($kawasan as $k): ?>
                                    <option value="<?= $k['id_kawasan'] ?>"><?= $k['nama_kawasan'] ?></option>
                                <?php endforeach ?>
                            </select><br>
                            <label for="unit"><?php echo lang('unit_total') ?></label>
                            <input type="number" class="form-control" placeholder="<?php echo lang('i_unit') ?>" name="unit"><br>
                            <label for="gbr">Foto Thumbnail</label>
                            <span class="badge badge-indigo mb-10"><?php echo lang('last_picture') ?></span>
                            <div id="foto_baru">
                                
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            
                            <span class="badge badge-indigo mb-10 mt-10"><?php echo lang('new_picture') ?></span>
                             <input type="file" id="input-file-now gbr" name="foto" class="dropify" />
                            <br>
                        </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?><?php echo lang('cancel') ?></button><?= nbs(5) ?>
                <button type="submit" class="btn btn-primary"><i class="ti-save"></i><?= nbs(2) ?><?php echo lang('save') ?></button>
            </div>
            </form>
        </div>
    </div>
</div>