<style type="text/css">
	#id_tabel thead tr th {
		vertical-align: middle;
		text-align: center;
	}
</style>
<div class="container">

<!-- Title -->
<div class="hk-pg-header mt-10">
    <div>
		<h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="check-circle"></i></span></span>Approve Lot</h2>

	</div>
	
</div>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body table-responsive">
				<table id="id_tabel" class="table table-hover table-bordered w-100 display">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Investor</th>
							<th><?php echo lang('trans_code') ?></th>
							<th>Jumlah Unit</th>
							<th><?php echo lang('total_lot') ?></th>
							<th>Status</th>
							<th>Detail</th>
						</tr>
					</thead>
					<tbody>
						
						<?php $no=1; foreach ($data_invest as $d): ?>
							<tr>
								<td align="center"><?= $no++ ?></td>
								<td><?= $d['nama_pengguna'] ?></td>
								<td align="center"><?= $d['kode_transaksi'] ?></td>
								<td align="center"><?= $d['jml_unit'] ?></td>
								<td align="center"><?= $d['tot_lot'] ?></td>
								<td align="center">

									<?php $status = array_count_values($d['status'])  ?>

									<?php if (!empty($status[0])): ?>
										<span class="badge badge-yellow" style="font-size: 15px"><?= $status[0] ?> Pending</span>
									<?php endif ?>

									<?php if (!empty($status[1])): ?>
										<span class="badge badge-success" style="font-size: 15px"><?= $status[1] ?> Approved</span>
									<?php endif ?>

									<?php if (!empty($status[2])): ?>
										<span class="badge badge-red" style="font-size: 15px"><?= $status[2] ?> Suspended</span>
									<?php endif ?>
									
								</td>
								<td align="center"><a href="<?= base_url("manager/detail_approve/".$d['kode_transaksi']) ?>"><button type="button" class="btn btn-sm btn-info btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Detail" style="font-size: 15px"><i data-feather="info"></i></button></a></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>