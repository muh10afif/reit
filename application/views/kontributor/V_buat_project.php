<style type="text/css">
	#errmsg, #errmsg_p, #errmsg_unit
	{
	color: red;
	}
</style>
<div class="container">
	

		<?php if ($this->session->userdata('sess_buat') == 'kawasan'): ?>
		<div class="hk-pg-header mt-10">
		    <div class="col-md-6">
		        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Buat Kawasan</h2>
		    </div>
		    	<div class="col-md-6">
		    </div>
		</div>
		<div class="card mt-10">

			<form method="post" action="<?= base_url('prospektus/simpan_kawasan_con') ?>">
				<div class="card-body">
					
		            <div class="row">
		                <div class="col-md-12 form-group">
		                    <label for="nama">Nama Kawasan</label>
		                    <input class="form-control" id="nama" placeholder="Masukkan Nama Kawasan" type="text" name="nama" required><br>
		                    <label for="alamat">Alamat</label>
		                    <textarea name="alamat" id="alamat" cols="30" class="form-control" placeholder="Masukkan Alamat" required></textarea>
		                </div>
		            </div>
		            
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success btn-lg btn-wth-icon icon-wthot-bg btn-rounded icon-right"><span class="btn-text">Next</span><span class="icon-label"><i class="fa fa-angle-right"></i> </span></button>
				</div>
			</form>

		</div>
		<?php elseif ($this->session->userdata('sess_buat') == 'blok'): ?>
		<div class="hk-pg-header mt-10">
		    <div class="col-md-6">
		        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="box"></i></span></span>Buat Blok</h2>
		    </div>
		    	<div class="col-md-6">
		    </div>
		</div>
		<div class="card mt-10">
		    <form method="post" action="<?= base_url('prospektus/simpan_blok_con') ?>" enctype="multipart/form-data">
				<div class="card-body">
					<div class="row">
		            <div class="col-md-6 form-group">
		            	<input type="hidden" name="id_kws" value="<?= $this->session->userdata('id'); ?>">
                        <label for="nama">Nama Blok</label>
                        <input class="form-control" id="nama" placeholder="Masukkan Nama Blok" type="text" name="nama" required><br>
                        <label for="kawasan">Nama Kawasan</label>
                        <input type="text" class="form-control"  name="kawasan" value="<?= $nama_kws ?>" readonly><br>
                        <label for="unit">Jumlah Unit</label>
                        <input type="number" class="form-control" placeholder="Masukkan Jumlah Unit" name="unit" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="gbr">Foto Thumbnail</label>
                        <input type="file" id="input-file-now gbr" name="foto" class="dropify" required><br>
                    </div>
                </div>
		            
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success btn-lg btn-wth-icon icon-wthot-bg btn-rounded icon-right"><span class="btn-text">Next</span><span class="icon-label"><i class="fa fa-angle-right"></i> </span></button>
				</div>
			</form>
		</div>

		<?php elseif ($this->session->userdata('sess_buat') == 'unit'): ?>
		<div class="hk-pg-header mt-10">
		    <div class="col-md-6">
		        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="square"></i></span></span>Buat Unit</h2>
		    </div>
		    	<div class="col-md-6">
		    </div>
		</div>
		<div class="card mt-10">

		    <form method="post" action="<?= base_url('prospektus/simpan_unit_con') ?>">
				<div class="card-body">
					
					<div class="row">
	                    <div class="col-md-12 form-group">
	                    	<input type="hidden" name="id_blok" value="<?= $this->session->userdata('id'); ?>">
	                        <label for="nama">Nama Unit</label>
	                        <input class="form-control" id="nama" placeholder="Masukkan Nama Unit" type="text" name="nama" required><br>
	                        <label for="harga">Harga</label>
	                        <!-- <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" required> -->

	                        <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input type="text" class="divide form-control" id="harga" name="harga" placeholder="Masukkan Harga" required>
                                </div>
                            	<span id="errmsg_unit"></span>
                            </div>
	                        <label for="Blok">Blok</label>
	                        <input type="text" class="form-control" readonly value="<?= $nama_blok ?>">
	                    </div>
	                </div>
		            
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success btn-lg btn-wth-icon icon-wthot-bg btn-rounded icon-right"><span class="btn-text">Next</span><span class="icon-label"><i class="fa fa-angle-right"></i> </span></button>
				</div>
			</form>
		</div>

		<?php elseif ($this->session->userdata('sess_buat') == 'prospektus'): ?>
		<div class="hk-pg-header mt-10">
		    <div class="col-md-6">
		        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="circle"></i></span></span>Buat Prospektus</h2>
		    </div>
		    	<div class="col-md-6">
		    </div>
		</div>
		<div class="card mt-10">
		    <form method="post" action="<?= base_url('prospektus/simpan_pros_con') ?>" enctype="multipart/form-data">
				<div class="card-body">
					
					<div class="row">
                        <div class="col-md-6 form-group">
                        	<input type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>">
                            <input type="hidden" name="id_unit" value="<?= $this->session->userdata('id'); ?>">
                            <label for="target">Target Pengembalian Investasi </label>
                            <!-- <input class="form-control" name="target" id="target" placeholder="Masukkan Target Investor" type="number" required> -->

                            <div class="form-group">
	                            <div class="input-group">
	                                <input class="form-control" name="target" id="target" placeholder="Masukkan Target Investor" type="number">
	                                <div class="input-group-append">
	                                    <span class="input-group-text"> % </span>
	                                </div>
	                            </div>
	                        </div>
                            <label for="unit">Jenis Unit</label>
                            <input type="text" class="form-control" value="<?= $nama_unit ?>" readonly>
                            <br>
                            <label for="harga">Harga</label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input class="divide form-control" id="harga" name="harga" value="<?= $harga ?>" placeholder="Masukkan Harga" type="text" readonly>
                                </div>
                            </div>

                            <br>
                            <label for="jml">Jumlah Lot</label>
                            <input class="divide form-control" id="jml" name="jml_lot" placeholder="Masukkan Jumlah Lot" value="" type="text"><span id="errmsg"></span><br>
                            <label for="invest">Investasi Minimum</label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input class="divide form-control" id="invest" name="invest_min" placeholder="Masukkan Investasi Minimum" type="text" readonly>
                                </div>
                            </div>

                            <br>
                            <label for="lokasi">Lokasi</label>
                            <textarea class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi" rows="5"></textarea><br>
                            <label for="ket">Keterangan</label>
                            <textarea class="form-control" name="ket" id="ket" placeholder="Masukkan Keterangan Prospektus" rows="5"></textarea><br>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="periode">Periode Investasi</label>
                            

                            <div class="form-group">
	                            <div class="input-group">
	                                <input class="form-control" name="periode" id="periode" placeholder="Masukkan Periode Investasi" type="text" required>
	                                <div class="input-group-append">
	                                    <span class="input-group-text"> Tahun </span>
	                                </div>
	                            </div>
	                        </div>
	                        <span id="errmsg_p"></span><br>
                            <label for="foto">Foto Thumbnail</label>
                            <input type="file" id="input-file-now foto" name="foto_thumb" class="dropify" /><br>
                            <label for="foto">Foto Properti</label>
                            <div class="form-group">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-append">
                                            <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                                    <input type="file" name="foto[]" class="demo form-control" multiple data-jpreview-container="#preview-container2">
                                    </span>
                                    <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </span>
                                    
                                </div>
                            </div>
                            <div id="preview-container2" 
                                 class="jpreview-container">
                            </div>
                        </div>
                    </div>
		            
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success btn-lg btn-wth-icon icon-wthot-bg btn-rounded icon-right"><span class="btn-text">Finish</span><span class="icon-label"><i class="fa fa-bank"></i> </span></button>
				</div>
			</form>
		</div>
		<?php endif ?>

		
		

	</div>
</div>

<!-- Bootstrap Dropzone CSS -->
	<link href="vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Dropify JavaScript -->
    <script src="<?= base_url() ?>assets/vendors/dropify/dist/js/dropify.min.js"></script>

 <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify({
                messages: {
                    default: 'Drop untuk memilih gambar',
                    replace: 'Ganti',
                    remove:  'Hapus',
                    error:   'error'
                }
            });
        });
         
    </script>

<script type="text/javascript">
	$(document).ready(function () {
	  //called when key is pressed in textbox
	  $("#jml").keypress(function (e) {
	     //if the letter is not digit then display error and don't type anything
	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        //display error message
	        $("#errmsg").html("Masukkan hanya angka !!").show().fadeOut("slow");

			return false;
	    }
	   });

	  $("#periode").keypress(function (e) {
	     //if the letter is not digit then display error and don't type anything
	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        //display error message
	        $("#errmsg_p").html("Masukkan hanya angka !!").show().fadeOut("slow");

			return false;
	    }
	   });

	  $("#harga").keypress(function (e) {
	     //if the letter is not digit then display error and don't type anything
	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        //display error message
	        $("#errmsg_unit").html("Masukkan hanya angka !!").show().fadeOut("slow");

			return false;
	    }
	   });
	});
</script>

<script>
	$(document).ready(function(e) {
   
	    $("input").keyup( function() {

	      var tot_nilai = 0;
	      var a = $("input[id=harga]").val();
	      var b = $("input[id=jml]").val();
	      tot_nilai = parseInt(a) / parseInt(b);

	      if (!isNaN(tot_nilai)) 
            {
                $("input[id=invest]").val(Math.round(tot_nilai));
            }
	      
	    });
	  });
</script>