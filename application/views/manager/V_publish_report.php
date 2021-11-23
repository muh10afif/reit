<style type="text/css">
	thead tr th {
		text-align: center;
	}
</style>
<div class="container">

<!-- Title -->
<div class="hk-pg-header mt-10">
    <div>
		<h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="file-text"></i></span></span>Publish Report</h2>
	</div>
</div>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-prospektus" role="tab" aria-controls="nav-home" aria-selected="true">Prospektus</a>
				    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-unit" role="tab" aria-controls="nav-profile" aria-selected="false">Unit</a>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <div class="tab-pane fade show active" id="nav-prospektus" role="tabpanel" aria-labelledby="nav-home-tab">
				  	<!-- <div class="row mt-20">
				  		<div class="col-md-2"></div>
				  		<div class="col-md-4">
				  			<select name="periode" class="form-control">
				  				<option value="">Periode</option>
				  			</select>
				  		</div>
				  		<div class="col-md-4">
				  			<button class="btn btn-success">Tampilkan</button><?= nbs(5) ?>
				  			<button class="btn btn-info">Download PDF</button>
				  		</div>
				  		<div class="col-md-2"></div>
				  			
				  	</div> -->
				  	<div class="row mt-20">

				  		<div class="col-md-12">

				  			<table id="id_tabel" class="table table-hover table-bordered w-100 display">
				  				<thead class="thead-light">
					  				<tr>
					  					<th>No</th>
					  					<th>Kode Prospektus</th>
					  					<th>Kode Unit</th>
					  					<th>Jumlah Lot</th>
					  					<th>Jumlah Terjual</th>
					  					<th>Sisa</th>
					  					<th>Nilai Unit</th>
					  				</tr>
				  				</thead>
				  				<tbody>

				  					<?php $no=1; foreach ($data_pros as $d): ?>

				  						<?php $jml_t 	= $d['jml_terjual'] ?>
				  						<?php $sisa 	= $d['sisa'] ?>

				  						<?php $unik 	= random_string('numeric', 5); ?>

				  						<tr>
				  							<td align="center"><?= $no ?></td>
				  							<td>PROS<?= $unik.$d['id_pros']; ?></td>
				  							<td>UNT<?= $unik.$d['id_unit']; ?></td>
				  							<td align="center"><?= $d['jml_lot'] ?></td>
				  							<td align="center"><?= ($jml_t == null) ? "0" : "$jml_t"; ?></td>
				  							<td align="center"><?= ($sisa == null) ? "0" : "$sisa"; ?></td>
				  							<td align="right">Rp. <?= number_format($d['harga_unit'],0,'.','.') ?></td>
				  						</tr>
				  					<?php $no++; endforeach ?>
				  				</tbody>
				  			</table>
				  		</div>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="nav-unit" role="tabpanel" aria-labelledby="nav-profile-tab">
				  	<!-- <div class="row mt-20">
				  		<div class="col-md-2"></div>
				  		<div class="col-md-4">
				  			<select name="periode" class="form-control">
				  				<option value="">Unit</option>
				  			</select>
				  		</div>
				  		<div class="col-md-4">
				  			<button class="btn btn-success">Tampilkan</button><?= nbs(5) ?>
				  			<button class="btn btn-info">Download PDF</button>
				  		</div>
				  		<div class="col-md-2"></div>
				  			
				  	</div> -->
				  	<div class="row mt-20">
				  		<div class="col-md-12">
				  			<table id="id_tabel_3" class="table table-hover table-bordered w-100 display">
				  				<thead class="thead-light">
					  				<tr>
					  					<th>No</th>
					  					<th>Pembeli</th>
					  					<th>Jumlah Lot</th>
					  					<th>Jumlah Unit</th>
					  					<th>Nilai Unit</th>
					  				</tr>
				  				</thead>
				  				<tbody>
				  					<?php $no=1; foreach ($data_unit as $u): ?>
				  						<tr>
				  							<td align="center"><?= $no ?></td>
				  							<td><?= $u['pembeli'] ?></td>
				  							<td align="center"><?= $u['jumlah_lot'] ?></td>
				  							<td align="center"><?= $u['jumlah_unit'] ?></td>
				  							<td align="right">Rp. <?= number_format($u['nilai_unit'],0,'.','.') ?></td>
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