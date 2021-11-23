<style type="text/css">
	table tr {
		border-top: hidden;
	}
	table {
		color: black;
	}
</style>
<div class="container" >

	<div class="hk-pg-header">
	<div class="row">
	    <div class="col-md-12 mt-20">
	        <h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="info"></i></span></span>Investasi</h2>
	        <a href="<?= base_url("frontend/Prospektus/detail_prospektus/$id_pros") ?>"><button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
	    </div>
	</div>
	</div>
	<?= $this->session->userdata('pesan'); ?>

	

	<?php if ($kd_tr == null): ?>

		<div class="card mt-10">
			<div class="card-body">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<img src="<?= base_url() ?>assets/gambar/<?= base64_decode($foto['file_foto']) ?>" class="img-fluid img-thumbnail" alt="img">
					</div>
					<div class="col-md-5">
						<table class="table table-hover">
							<tr>
								<td>Nama Unit</td>
								<td>:</td>
								<td><?= $pros['nama_unit'] ?></td>
							</tr>
							<tr>
								<td>Nama Blok</td>
								<td>:</td>
								<td><?= $pros['nama_blok'] ?></td>
							</tr>
							<tr>
								<td>Nama Kawasan</td>
								<td>:</td>
								<td><?= $pros['nama_kawasan'] ?></td>
							</tr>
							<tr>
								<td>Harga</td>
								<td>:</td>
								<td>Rp. <?= number_format($pros['harga']) ?></td>
							</tr>
							<tr>
								<td>Jumlah Lot</td>
								<td>:</td>
								<td><?= $pros['jumlah_lot'] ?></td>
							</tr>
							<tr>
								<td>Minimum Investasi</td>
								<td>:</td>
								<td>Rp. <?= number_format($pros['minimal_investasi']) ?><input type="hidden" id="minimal" value="<?= $pros['minimal_investasi'] ?>"></td>
							</tr>
						</table>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>

		<?= form_open('frontend/Prospektus/simpan_tr_investor'); ?>

		<input type="hidden" name="id_pros" value="<?= $id_pros ?>">
		<input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna'); ?>">

		<div class="card mt-10">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<table class="table table-hover table-responsive">
							<tr>
								<td>Investor ID</td>
								<td>:</td>
								<td><?= $pengguna['sid'] ?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><?= $pengguna['nik'] ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?= $pengguna['nama_pengguna'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4">
						<table class="table table-hover table-responsive">
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?= $pengguna['alamat'] ?></td>
							</tr>
							<tr>
								<td>No Telepon</td>
								<td>:</td>
								<td><?= $pengguna['no_telp'] ?></td>
							</tr>
							<tr>
								<td>Jumlah Lot</td>
								<td>:</td>
								<td><input type="number" name="jml_lot" max="<?= $jml_lot ?>" id="jml_lot" class="form-control" required /></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4">
						<table class="table table-hover table-responsive">
							<tr>
								<td>Metode Bayar</td>
								<td>:</td>
								<td><select name="mt_bayar" id="metode" class="form-control custom-select" required>
									<option value="">-- Pilih --</option>
									<option value="cash">Cash</option>
									<option value="transfer">Transfer</option>
								</select></td>
							</tr>
							<tr>
								<td>Total</td>
								<td>:</td>
								<td><input type="text" id="total" name="total" class="form-control transparent-input" readonly></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-10">
	        <div class="col-sm" align="right">
				<button type="submit" class="btn btn-purple btn-icon btn-icon-style-1" style="width: 150px;"><i class="ti-save"></i><?= nbs(3) ?>S I M P A N</button>
			</div>
		</div>

		<?= form_close(); ?>
		
	<?php else: ?>

	<div class="card mt-10">
		<div class="card-body">
			<div class="row justify-content-md-center">
				<div class="col-md-8">
					<h3 class="display-4">Transaksi Anda Diterima</h3>

					<?php if ($mt_bayar != 'transfer'): ?>
						<h2 class="mt-10"><mark>Silahkan bayar dengan metode Cash</mark></h2><br>
						<h5>Batas Bayar <?= tgl_indo_timestamp($batas_bayar) ?></h5>
					<?php else: ?>

						<?php if ($bank): ?>

							<h5>Total : <?= number_format($total) ?></h5>
							<h5 class="mt-10">Bank Transfer <?= ucfirst($bank) ?></h5>
							<h5>Batas Bayar <?= tgl_indo_timestamp($batas_bayar) ?></h5>


						<?php else: ?>

							<h2 class="mt-10">Silahkan pilih Bank yang akan ditransfer:</h2>

							<?= form_open('frontend/Prospektus/simpan_bank'); ?>

							<input type="hidden" name="kd_tr" value="<?= $kd_tr ?>">
							<input type="hidden" name="id_pros" value="<?= $id_pros ?>">

							<table class="table table-hover" align="left">
								<tr>
									<td>
										<div class="custom-control custom-radio radio-cyan">
				                            <input type="radio" id="customRadio7" name="bank" value="mandiri" class="custom-control-input" checked>
				                            <label class="custom-control-label" for="customRadio7">Bank Mandiri | 023449099999</label>
				                        </div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="custom-control custom-radio radio-cyan">
				                            <input type="radio" id="customRadio8" name="bank" value="bca" class="custom-control-input">
				                            <label class="custom-control-label" for="customRadio8">Bank BCA | 043567889900</label>
				                        </div>
									</td>
								</tr>
							</table>

							<button type="submit" class="btn btn-sm btn-purple btn-icon btn-icon-style-1" style="width: 120px;"><i class="ti-check"></i><?= nbs(3) ?>B A Y A R</button>
							
							<?= form_close(); ?>
							
						<?php endif ?>
						
                        
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>		

	<?php endif ?>

	

</div>

<script src="<?php echo base_url()?>assets_frontend/signin/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/bootstrap-input-spinner/src/bootstrap-input-spinner.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/inputspinner-data.js"></script>
<!-- number separators -->
<script src="<?= base_url() ?>assets/vendors/number_separator/easy-number-separator.js"></script>

<script>
	$(document).ready(function(e) {
   
        $("input").keyup( function() {

          var tot_nilai = 0;
          var ribuan = 0;
          var a = $("input[id=minimal]").val();
          var b = $("input[id=jml_lot]").val();
          tot_nilai = parseInt(a) * parseInt(b);

          var reverse = tot_nilai.toString().split('').reverse().join(''),
		  ribuan 	= reverse.match(/\d{1,3}/g);
		  ribuan	= ribuan.join('.').split('').reverse().join('');

		  $("input[id=total]").val(ribuan);

        });
      });
</script>