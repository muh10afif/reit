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
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Data Prospektus</h2>
    </div>
    <div class="col-md-6">
        <a href="<?= base_url('prospektus/tambah/') ?>"><button class="btn btn-icon btn-icon-style-1 btn-success mt-10 float-right" style="width: 120px;"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add') ?></button></a>
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
							<th><?php echo lang('total_lot') ?></th>
							<th><?php echo lang('min_invest') ?></th>
							<th><?php echo lang('investor_target') ?></th>
							<th><?php echo lang('investment_period') ?></th>
							<th><?php echo lang('action') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($prospektus->result_array() as $k): ?>
							<tr>
								<td align="center"><?= $no++ ?></td>
								<td><?= $k['nama_unit'] ?></td>
								<td><?= $k['jumlah_lot'] ?></td>
								<td><?= $k['minimal_investasi'] ?></td>
								<td align="center"><?= $k['target_investor'] ?>%</td>
								<td align="center"><?= $k['periode_investasi'] ?> Tahun</td>
								<td width="20%" align="center">
									<a href="<?= base_url('prospektus/edit/'.$k['id_prospektus'].'/'.'d_pros') ?>"><button class="btn btn-info btn-sm btn-icon btn-icon-style-1"><span class="feather-icon feat"><i data-feather="edit-3"></i></span></button></a><?= nbs(2) ?>
									<a href="<?= base_url('prospektus/hapus_pros/'.$k['id_prospektus']) ?>"><button class="btn btn-orange btn-sm btn-icon btn-icon-style-1" onclick = "return confirm('Anda yakin akan menghapus ini ?..')"><span class="feather-icon feat"><i data-feather="trash-2"></i></span></button></a>
									<?= nbs(2) ?>
									<a href="<?= base_url('prospektus/tambah_detail/'.$k['id_prospektus']) ?>"><button class="btn btn-green btn-sm btn-icon btn-icon-style-1"><span class="feather-icon feat"><i data-feather="plus"></i></span></button></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>