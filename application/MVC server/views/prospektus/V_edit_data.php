<div class="container">
    
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url('prospektus') ?>">Prospektus</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit data</li>
    </ol>
</nav>
<!-- /Breadcrumb -->


<!-- Title -->
<div class="hk-pg-header">
    <div class="col-md-6">
		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="plus"></i></span></span>Edit Data</h2>
	</div>
    <div class="col-md-6">
        <?php if ($d_pros == 'd_pros'): ?>
             <a href="<?= base_url('prospektus/data_pros') ?>"><button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
        <?php elseif ($d_pros == 'x'): ?>
            <a href="<?= base_url('prospektus/detail_kws/'.$id_blok['id_blok']) ?>"><button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
        <?php endif ?>
    </div>
</div>
<!-- /Title -->


<!-- Row -->
<div class="row">
	<div class="col-md-12">
    	<div class="card">
    		<div class="card-body">
    			 <div class="row">
                    <div class="col-sm"><!-- enctype="multipart/form-data" -->
                        <form method="post" action="<?= base_url('prospektus/proses/edit') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id_prospektus" value="<?= $pros['id_prospektus'] ?>">
                            <div class="row">
                                <div class="col-sm">
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="hidden" name="d_pros" value="<?= $d_pros ?>">
                                    <input type="hidden" name="id_blok" value="<?= $id_blok['id_blok'] ?>">
                                    <label for="target"><?php echo lang('investor_target') ?></label>
                                    <input class="form-control" name="target" id="target" value="<?= $pros['target_investor'] ?>" type="number"><br>
                                    <label for="unit"><?php echo lang('unit_type') ?></label>
                                    <select name="unit" id="unit" class="form-control">
                                        <option value="">-- <?php echo lang('choose_unit') ?> --</option>
                                       <?php foreach ($unit->result_array() as $u): ?>
                                            <?php $id = $pros['id_unit'] ?>
                                           <option value="<?= $id_u = $u['id_unit'] ?>" <?= ($id_u == $id) ? 'selected' : '' ?>><?= $u['nama_unit'] ?></option>
                                       <?php endforeach ?>
                                    </select><br>
                                    <label for="harga"><?php echo  lang('pricea') ?></label>
                                    <input class="form-control" id="harga" name="harga" value="<?= $pros['harga'] ?>" type="text" readonly><br>
                                    <label for="lokasi"><?php echo lang('location') ?></label>
                                    <textarea class="form-control" name="lokasi" id="lokasi" rows="5"><?= $pros['alamat'] ?></textarea><br>
                                    <label for="ket"><?php echo  lang('info') ?></label>
                                    <textarea class="form-control" name="ket" id="ket" rows="5"><?= $pros['keterangan'] ?></textarea><br>
                                    <label for="periode"><?php echo lang('investment_period') ?></label>
                                    <input class="form-control" name="periode" id="periode" value="<?= $pros['periode_investasi'] ?>" type="number"><br>
                                    <label for="invest"><?php echo lang('min_invest') ?></label>
                                    <input class="form-control" id="invest" name="invest_min" value="<?= $pros['minimal_investasi'] ?>" type="number"><br>
                                    <label for="jml"><?php echo lang('total_lot') ?></label>
                                    <input class="form-control" id="jml" name="jml_lot" value="<?= $pros['jumlah_lot'] ?>" value="" type="number"><br>
                                </div>
                                <div class="col-md-6 form-group">
                                    
                                    <label for="foto"><?php echo lang('pict_thumbnail') ?></label><br>
                                    <span class="badge badge-indigo mb-10"><?php echo lang('last_picture') ?></span>

                                         <img src="<?= base_url() ?>assets/gambar/<?= base64_decode($pros['file_foto']) ?>" class="img-thumbnail">
                                         <input type="hidden" value="<?= $pros['id_file_foto']?>" name="id_ft_thumb">
                                         <input type="hidden" value="<?= $pros['file_foto']?>" name="ft_thumb">
                                    <span class="badge badge-indigo mb-10"><?php echo lang('new_picture') ?></span>
                                    <input type="file" id="input-file-now foto" name="foto_thumb" class="dropify" /><br>
                                   
                                    
                                    <label for="foto"><?php echo lang('pict_property') ?></label><br>
                                    <span class="badge badge-indigo mb-10"><?php echo lang('last_picture') ?></span>
                                    <div class="row">
                                        <?php foreach ($foto_pros as $f): ?>
                                            <div class="col-md-4">
                                                <img src="<?= base_url() ?>assets/gambar/<?= base64_decode($f['file_foto']) ?>" class="img-thumbnail">
                                                 <input type="hidden" value="<?= $f['id_file_foto']?>" name="id_ft[]">
                                                 <input type="hidden" value="<?= $f['file_foto']?>" name="ft[]">
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <span class="badge badge-indigo mb-10 mt-10"><?php echo lang('new_picture') ?></span>
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
                </div>
                <hr>
                <div class="row">
                	<div class="col-md-8">
                		<div class="custom-control custom-checkbox checkbox-primary">
                			<!-- radio = checked -->
                            <input type="checkbox" class="custom-control-input" id="customCheck4" required>
                            <label class="custom-control-label" for="customCheck4"><?php echo lang('term_condition') ?><a href="#"><?php echo lang('rules') ?></a></label>
                        </div>
                	</div>
                	<div class="col-md-4"><button class="btn btn-success float-right" name="submit" type="submit"><i class="ti-check"></i><?= nbs(3) ?>S I M P A N</button></div>	
                </div>
                
                </form>
    			
    		</div>
    	</div>
    </div>
</div>

</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>

<script>
    $(document).ready(function(){
         $('#unit').on('input', function(){
             
            var id = $(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('prospektus/get_harga')?>",
                dataType : "JSON",
                data : {kode: id},
                cache:false,
                success: function(data){
                    $.each(data,function(harga){
                        $('[name="harga"]').val(data.harga);
                    });
                     
                }
            });
            return false;
       });

    });

    function hapus_foto(id) {
        $.ajax({
              type: 'POST',
              data: 'id='+id,
              url: "<?php echo base_url('prospektus/hapus_foto') ?>",
              success: function(result) {
                var response = JSON.parse(result);
                if(response.status == true){    
                  alert('berhasil');
                }else{                
                  alert('gagal');
                }
              }
            });
        }
</script>



