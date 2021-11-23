<style type="text/css">
	thead tr th {
		text-align: center;
	}

	<?php $angka=1; foreach ($det_history as $dh): ?>

		<?php $hasil = $this->M_prospektus->get_data_det_invest($dh['id_tr_investor']) ?>

		<?php foreach ($hasil->result_array() as $h): ?>

			#errmsg_<?= $angka ?>
			{
			color: red;
			}

		<?php $angka++; endforeach ?>

	<?php endforeach ?>
	
</style>
<div class="container">

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">
            <a href="<?= base_url('prospektus/history_kop') ?>">History Transaksi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail History</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

  <!-- Title -->
  <div class="hk-pg-header">
    <div class="col-md-6">
      <h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><i class="material-icons">info</i></span></span>Detail History Transaksi</h2>
    </div>
    
  </div>
  <?= $this->session->flashdata("pesan"); ?>
  <?php $angka=1; $no=0; $i=1; foreach ($det_history as $dh): $no++; $i++;?>
  	 <div class="row">
	  	<div class="col-md-12">
	  		<div class="card bg-light">
	  			<div class="card-body">
		  			<h5><?= $dh['jml_lot'] ?> LOT, Total Harga Rp. <?= number_format($dh['harga'],0,'.','.') ?></h5>
		  			 <p>Kawasan <?= $dh['nama_kawasan'] ?> Blok <?= $dh['nama_blok'] ?> Unit <?= $dh['nama_unit'] ?></p>
		  			 <p>Alamat <?= $dh['alamat'] ?> </p>

		  			 <div class="button-list mb-15">
                        <a class="btn btn-info" data-toggle="collapse" href="#collapseExample_<?= $no ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
							Tambah Anggota
						</a>
                    </div>
                    <div class="collapse" id="collapseExample_<?= $no ?>">
                        <div class="card card-body">

                        	<?= form_open('prospektus/tambah_anggota_det'); ?>
                        	<div class="row">
	                            <div class="col-md-2"></div>
	                            <div class="col-md-6">
	                            	<input type="hidden" name="kd_tr" value="<?= $this->uri->segment(3) ?>">
	                            	<input type="hidden" name="id_tr_investor" value="<?= $dh['id_tr_investor'] ?>">
	                            	 <select class="select2 select2-multiple" multiple="multiple" name="nama[]">
	                            	 	<?php foreach ($anggota->result_array() as $a): ?>
	                            	 		<option value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
	                            	 	<?php endforeach ?>
	                            	 </select>
	                            </div>
	                            <div class="col-md-2">
	                            	<button type="submit" class="btn btn-primary">Simpan</button>
	                            </div>
	                            <div class="col-md-2"></div>
                            </div>
                            <?= form_close(); ?>

                        </div>
                    </div>

                    <div class="card">
                    <div class="card-body">

                    <?= form_open('prospektus/simpan_nilai_investasi/'.$this->uri->segment(3)); ?>
                    
		  			 <table class="table table-bordered table-hover display">
		  			 	<thead class="thead-light">
		  			 		<tr>
		  			 			<th>No</th>
		  			 			<th>Nama Anggota</th>
		  			 			<th>Nilai Investasi</th>
		  			 			<th>Aksi</th>
		  			 		</tr>
		  			 	</thead>
		  			 	<tbody>
		  			 		<?php $hasil = $this->M_prospektus->get_data_det_invest($dh['id_tr_investor']) ?>

		  			 		<?php $nmr=0; foreach ($hasil->result_array() as $h): $nmr++;?>
		  			 			<tr>
		  			 				<td align="center"><?= $nmr ?></td>
		  			 				<td><?= $h['nama_anggota'] ?></td>
		  			 				<td>
		  			 					<div class="form-group">
			                                <div class="input-group">
			                                    <div class="input-group-prepend">
			                                        <span class="input-group-text">Rp. </span>
			                                    </div>
			                                    <input type="hidden" name="harga" value="<?= $dh['harga'] ?>">
			                                    <input type="hidden" name="jml_data" value="<?= count($hasil->result_array()) ?>">
			                                    <input type="hidden" name="id_det_invest_<?= $nmr ?>" value="<?= $h['id_detail_investasi'] ?>">
			                                    <input type="text" style="text-align: right;" value="<?= $h['nilai_investasi'] ?>" name="nilai_invest_<?= $nmr ?>" id="nilai_<?= $angka ?>" placeholder="Masukkan Nilai Investasi" class="form-control">
			                                </div>
			                                <span id="errmsg_<?= $angka ?>"></span>
			                            </div>
		  			 				</td>
		  			 				<td align="center"><a href="<?= base_url('prospektus/hapus_his_det/'.$h['id_detail_investasi'].'/'.$this->uri->segment(3)) ?>"><button type="button" class="btn btn-icon btn-icon-circle btn-danger btn-icon-style-2" data-toggle="tooltip-dark" data-placement="top" title="" data-original-title="Hapus" onclick="return confirm('Yakin akan menghapus data ini ?')"><span class="btn-icon-wrap"><i class="icon-trash"></i></span></button></a></td>
		  			 			</tr>
		  			 		<?php $angka++; endforeach ?>
		  			 		<?php if (!empty($hasil->result_array())): ?>
								<!-- <tr>
		  			 				<td colspan="2" align="right">Total</td>
		  			 				<td>
		  			 					<div class="form-group">
			                                <div class="input-group">
			                                    <div class="input-group-prepend">
			                                        <span class="input-group-text">Rp. </span>
			                                    </div>
			                                    <input type="text" style="text-align: right;" name="total" id="total_<?= $no ?>" class="form-control divide" >
			                                </div>
			                            </div>
		  			 					</td>
		  			 				<td></td>
		  			 			</tr> -->
		  			 		<?php else: ?>
		  			 			<tr>
		  			 				<td colspan="4" align="center">Data Kosong</td>
		  			 			</tr>
		  			 		<?php endif ?>
		  			 			
		  			 	</tbody>
		  			 </table>
		  			 <button class="btn btn-success" type="submit">Simpan Data</button>
		  			 <?= form_close(); ?>

		  			 </div>
		  			</div>

	  			</div>
	  		</div>					
	  	</div>
	  </div>
  <?php endforeach ?>
  

</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- number divider -->
    <script src="<?= base_url() ?>assets/dist/number_divider/number-divider.min.js"></script>

<?php $angka=1; $no=0; foreach ($det_history as $dh): $no++; ?>

	<?php $hasil = $this->M_prospektus->get_data_det_invest($dh['id_tr_investor']) ?>

	<?php foreach ($hasil->result_array() as $h): ?>

		<script type="text/javascript">
			$(document).ready(function () {
			  //called when key is pressed in textbox
			  $("#nilai_<?= $angka ?>").keypress(function (e) {
			     //if the letter is not digit then display error and don't type anything
			     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			        //display error message
			        $("#errmsg_<?= $angka ?>").html("Masukkan hanya angka !!").show().fadeOut("slow");

					return false;
			    }
			   });
			});
		</script>

		<script type="text/javascript">
	        $("#nilai_<?= $angka ?>").divide({
	              delimiter: '.',
	              divideThousand: true,
	              delimiterRegExp: /[\.\,\s]/g
	            });

	    </script>


	<?php $angka++; endforeach ?>

<?php endforeach ?>

<script type="text/javascript">
    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
</script>


<script type="text/javascript">
    function sum() {

      var txtFirstNumberValue = document.getElementById('nilai_1').value;
      var txtSecondNumberValue = document.getElementById('nilai_2').value;

    txtFirstNumberValue = txtFirstNumberValue.split('.').join('');
    txtSecondNumberValue = txtSecondNumberValue.split('.').join('');

      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);

      if (!isNaN(result)) {
         document.getElementById('total_1').value = formatNumber(result);
      }
            
    }

    /*$(document).ready(function(e) {
   
    	$("input").keyup( function() {

			var tot_nilai = 0;

		    $("input[id=nilai_2]").each(function() {
		    	var a = $(this).val();
		    	a = a.split('.').join('');
		        tot_nilai = tot_nilai + parseInt(a);
		      });

		    if (!isNaN(tot_nilai)) {
		         document.getElementById('total_2').value = formatNumber(tot_nilai);
		      }

    	});
  	});*/
</script>





