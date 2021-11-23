<div class="container">
    
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url('prospektus') ?>">Prospektus</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo lang('add') ?> data</li>
    </ol>
</nav>
<!-- /Breadcrumb -->


<!-- Title -->
<div class="hk-pg-header">
    <div class="col-md-6">
		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="plus"></i></span></span><?php echo lang('add') ?> Data</h2>
	</div>
    <div class="col-md-6">
        <?php if ($id_blok != null): ?>
            <a href="<?= base_url('prospektus/detail_kws/'.$id_blok) ?>">
        <?php else: ?>
            <a href="<?= base_url('prospektus/data_pros') ?>">
        <?php endif ?>
        <button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
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
                        <form method="post" action="<?= base_url('prospektus/proses/tambah') ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm">
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="hidden" name="id_blok" value="<?= $id_blok ?>">
                                    <label for="target"><?php echo lang('investor_target') ?></label>
                                    <input class="form-control" name="target" id="target" placeholder="<?php echo lang('i_target') ?>" type="number"><br>
                                    <label for="unit"><?php echo lang('unit_type') ?></label>
                                    <select name="unit" id="unit" class="form-control">
                                        <option value="">-- <?php echo lang('choose_unit') ?> --</option>
                                       <?php foreach ($unit->result_array() as $u): ?>
                                           <option value="<?= $u['id_unit'] ?>"><?= $u['nama_unit'] ?></option>
                                       <?php endforeach ?>
                                    </select><br>
                                    <label for="harga"><?php echo lang('price') ?></label>
                                    <input class="form-control" id="harga" name="harga" placeholder="<?php echo lang('i_price') ?>" type="text" readonly><br>
                                    <label for="jml"><?php echo lang('total_lot') ?></label>
                                    <input class="form-control" id="jml" name="jml_lot" placeholder="<?php echo lang('i_total_lot') ?>" value="" type="number"><br>
                                    <label for="invest"><?php echo lang('min_invest') ?></label>
                                    <input class="form-control" id="invest" name="invest_min" placeholder="<?php echo lang('i_min_invest') ?>" type="number" readonly><br>
                                    <label for="lokasi"><?php echo lang('location') ?></label>
                                    <textarea class="form-control" name="lokasi" id="lokasi" placeholder="<?php echo lang('location') ?>" rows="5"></textarea><br>
                                    <label for="ket"><?php echo  lang('info') ?></label>
                                    <textarea class="form-control" name="ket" id="ket" placeholder="<?php echo lang('info') ?>" rows="5"></textarea><br>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="periode"><?php echo lang('investment_period') ?></label>
                                    <input class="form-control" name="periode" id="periode" placeholder="Masukkan Periode Investasi" type="number"><br>
                                    <label for="foto"><?php echo lang('pict_thumbnail') ?></label>
                                    <input type="file" id="input-file-now foto" name="foto_thumb" class="dropify" /><br>
                                    <label for="foto"><?php echo lang('pict_property') ?></label>
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
                            <label class="custom-control-label" for="customCheck4"><?php echo lang('agree') ?><a href="#"><?php echo lang('rules') ?></a></label>
                        </div>
                	</div>
                	<div class="col-md-4"><button class="btn btn-success float-right" name="submit" type="submit"><i class="ti-check"></i><?= nbs(3) ?><?php echo  lang('save') ?></button></div>	
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



