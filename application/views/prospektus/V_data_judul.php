<style type="text/css">
	#id_tabel thead tr th {
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
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Data <?php echo lang('title_detail') ?></h2>
    </div>
    <div class="col-md-6">
    	<button class="btn btn-icon btn-icon-style-1 btn-success mt-10 float-right" onclick="tambah_judul()" style="width: 120px;"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add') ?></button>
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
							<th><?php echo lang('title_detail') ?></th>
							<th><?php echo lang('title_sub') ?></th>
							<th><?php echo lang('action') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_judul->result_array() as $d): ?>
							<tr>
								<td align="center"><?= $no++ ?></td>
								<td><?= $d['nama'] ?></td>
								<td align="center"><?= ($d['sub']==0) ? 'Tidak' : 'Ya'; ?></td>
								<td width="20%" align="center">
									<button class="btn btn-info btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Edit" onclick="edit_judul('<?= $d['id_judul'] ?>')"><span class="ti-pencil-alt"></span></button><?= nbs(5) ?>
									<button class="btn btn-orange btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Hapus" onclick="hapus_judul('<?= $d['id_judul'] ?>')"><span class="ti-trash"></span></button></td>
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
<div class="modal fade" id="modal_judul" role="dialog" aria-labelledby="modal_judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #12ba12;">
                <h5 class="modal-title" style="color: white;"><i class="ti-layout-grid2"></i><?= nbs(2) ?></h5><h5 class="modal-title a" style="color: white;"><?php echo lang('add') ?> <?php echo lang('title_detail') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_judul">
                <div class="row">
                    <div class="col-md-12 form-group">
                    	<input type="hidden" name="id_judul">
                        <label for="nama"><?php echo lang('title') ?></label>
                        <textarea class="form-control" id="nama" placeholder="<?php echo lang('i_unit') ?>" name="nama" rows="1"></textarea>
                        <br>
                        <label for="sub"><?php echo lang('title_sub') ?></label><br>
                        <select name="sub" class="form-control">
                        	<option value="0"><?php echo lang('no') ?></option>
                        	<option value="1"><?php echo lang('yes') ?></option>
                        </select>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?><?php echo lang('cancel') ?></button><?= nbs(5) ?>
                <button type="button" class="btn btn-primary" onclick="aksi_judul()"><i class="ti-save"></i><?= nbs(2) ?><?php echo lang('save') ?></button>
            </div>
        </div>
    </div>
</div>