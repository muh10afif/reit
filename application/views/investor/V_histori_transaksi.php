<style type="text/css">
	thead tr th {
		text-align: center;
	}
	.badge {
		font-size: 13px;
	}
</style>
<div class="container">

<!-- Title -->
<div class="hk-pg-header mt-10">
    <div>
		<h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="rotate-ccw"></i></span></span>Histori Transaksi</h2>

	</div>
	
</div>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-beli" role="tab" aria-controls="nav-home" aria-selected="true">Transaksi Beli</a>
				    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-jual" role="tab" aria-controls="nav-profile" aria-selected="false">Transaksi Jual</a>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <div class="tab-pane " id="nav-jual" role="tabpanel" aria-labelledby="nav-home-tab">
				  	<div class="row mt-20">
				  		<!-- <div class="col-md-2"></div>
				  		<div class="col-md-4">
				  			<select name="periode" class="form-control">
				  				<option value="">Periode</option>
				  			</select>
				  		</div>
				  		<div class="col-md-4">
				  			<button class="btn btn-success">Show It</button><?= nbs(5) ?>
				  			<button class="btn btn-info">Download PDF</button>
				  		</div>
				  		<div class="col-md-2"></div> -->
				  			
				  	</div>
				  	<div class="row mt-20">

				  		<div class="col-md-12">

				  			<table id="id_tabel_3" class="table table-hover w-100 display">
				  				<thead class="thead-light">
					  				<tr>
					  					<th>No</th>
					  					<th>Kode Prospektus</th>
					  					<th>Jumlah Lot</th>
					  					<th>Harga Beli</th>
					  					<th>Harga Jual</th>
					  					<th>Tanggal Beli</th>
					  					<th>Tanggal Jual</th>
					  				</tr>
				  				</thead>
				  				<tbody>
				  					<tr>
				  						<td>1</td>
				  						<td>IOP098977689</td>
				  						<td align="center">2</td>
				  						<td>Rp. <?= number_format(2000000000,0,'.','.') ?></td>
				  						<td>Rp. <?= number_format(2500000000,0,'.','.') ?></td>
				  						<td align="center">01-08-2019</td>
				  						<td align="center">04-08-2019</td>
				  					</tr>
				  				</tbody>
				  			</table>
				  		</div>
				  	</div>
				  </div>
				  <div class="tab-pane fade show active" id="nav-beli" role="tabpanel" aria-labelledby="nav-profile-tab">
				  	<div class="row mt-20">
				  		<!-- <div class="col-md-2"></div>
				  		<div class="col-md-4">
				  			<select name="periode" class="form-control">
				  				<option value="">Periode</option>
				  			</select>
				  		</div>
				  		<div class="col-md-4">
				  			<button class="btn btn-success">Show It</button><?= nbs(5) ?>
				  			<button class="btn btn-info">Download PDF</button>
				  		</div>
				  		<div class="col-md-2"></div> -->
				  			
				  	</div>
				  	<div class="row mt-20">
				  		<div class="col-md-12">
				  			<table id="id_tabel" class="table table-hover w-100 display">
				  				<thead class="thead-light">
					  				<tr>
					  					<th>No</th>
					  					<th>Kode Transaksi</th>
					  					<th>Kode Prospektus</th>
					  					<th>Jumlah Lot</th>
					  					<th>Harga</th>
					  					<th>Tanggal Beli</th>
					  					<th>Batas Bayar</th>
					  					<th>Status</th>
					  				</tr>
				  				</thead>
				  				<tbody>
				  					<?php $no=1; foreach ($tr_beli->result_array() as $b): ?>
				  						<tr>
				  							<td align="center"><?= $no ?></td>
				  							<td><?= $b['kode_transaksi'] ?></td>
				  							<td><?= $b['kode_prospektus'] ?></td>
				  							<td align="center"><?= $b['jumlah_lot'] ?></td>
				  							<td align="left">Rp. <?= number_format($b['harga'],0,'.','.') ?></td>
				  							<td><?= nice_date($b['add_time'], 'd-m-Y') ?></td>
				  							<td><?= nice_date($b['batas_bayar'], 'd-m-Y') ?></td>
				  							<td align="center">
				  								<?php if ($b['status'] == 0): ?>
													<span class="badge badge-soft-warning mt-5 mr-10">Pending</span>
				  								<?php elseif ($b['status'] == 1): ?>
				  									<span class="badge badge-soft-success mt-5 mr-10">Disetujui</span>
				  								<?php elseif ($b['status'] == 2): ?>
				  								   <span class="badge badge-soft-danger mt-5 mr-10">Ditolak</span>
				  								<?php endif ?>
				  								
				  							</td>
				  						</tr>
				  					<?php $no++; endforeach ?>
				  				</tbody>
				  			</table>
				  		</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>