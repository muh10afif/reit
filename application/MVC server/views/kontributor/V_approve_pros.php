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
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="package"></i></span></span>Data Approve Prospektus</h2>
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
							<th>Nama Kontributor</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_pros as $d): ?>
							<tr>
								<td align="center"><?= $no++ ?></td>
								<td><?= $d['nama_pengguna'] ?></td>
								<td align="center"><?= tgl_indo_timestamp($d['add_time']) ?></td>
								<td align="center">
									<?php if ($d['status'] == 3): ?>
										<span class="badge badge-warning">Pending</span>
									<?php elseif ($d['status'] == 1): ?>
									    <span class="badge badge-success">Diterima</span>
									<?php else: ?>
										<span class="badge badge-danger">Ditolak</span>
									<?php endif ?>
								</td>
								<td width="20%" align="center">
									
									<a href="<?= base_url('prospektus/ubah_status_pros/1/'.$d['id_prospektus']) ?>"><button class="btn btn-success btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Diterima"><i class="ti-check"></i></button></a>
									<?= nbs(3) ?>
									<a href="<?= base_url('prospektus/ubah_status_pros/2/'.$d['id_prospektus']) ?>"><button class="btn btn-danger btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Ditolak"><i class="ti-close"></i></button></a>
									<?= nbs(3) ?>
									<a href="<?= base_url('prospektus/detail/'.$d['id_prospektus'].'/'.'approve') ?>"><button class="btn btn-info btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Detail"><i class="ti-info"></i></button></a>

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