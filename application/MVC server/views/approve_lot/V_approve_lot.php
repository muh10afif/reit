<style type="text/css">
	#datable_1 thead tr th {
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
				<table id="datable_1" class="table table-hover w-100 display">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Investor</th>
							<th><?php echo lang('trans_code') ?></th>
							<th><?php echo lang('total_lot') ?></th>
							<th>Status</th>
							<th>Detail</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_invest->result_array() as $d): ?>
							<tr>
								<td align="center"><?= $no++ ?></td>
								<td><?= $d['nama_pengguna'] ?></td>
								<td align="center"><?= $d['kode_transaksi'] ?></td>
								<td align="center"><?= $d['jumlah_lot'] ?></td>
								<td align="center">
									<?php $sts = $d['status'] ?>
									<?php if ($sts == 0): ?>
										<span class="badge badge-yellow" style="font-size: 15px">Pending</span>
									<?php else: ?>
										<span class="badge badge-success" style="font-size: 15px">Approved</span>
									<?php endif ?>
									
								</td>
								<td align="center"><a href="<?= base_url('approve_lot/detail/'.$d['id_tr_investor']) ?>"><button type="button" class="btn btn-sm btn-info btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Detail" style="font-size: 15px"><i data-feather="info"></i></button></a></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>