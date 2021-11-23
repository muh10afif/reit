<div class="container">
    
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url('prospektus/detail/'.$id_pros.'/x') ?>">Prospektus</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo lang('add') ?> data</li>
    </ol>
</nav>
<!-- /Breadcrumb -->


<!-- Title -->
<div class="hk-pg-header">
    <div class="col-md-6">
		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="plus"></i></span></span><?php echo lang('add') ?> <?php echo lang('document') ?></h2>
	</div>
    <div class="col-md-6">
        <a href="<?= base_url('prospektus/detail/'.$id_pros.'/x') ?>">  
        <button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
    </div>
</div>
<!-- /Title -->

<div class="card">
    <form method="post" action="<?= base_url('prospektus/simpan_dok') ?>" enctype="multipart/form-data">
    <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <input type="hidden" name="id_pros" value="<?= $id_pros ?>">
                    <label for="judul">Judul</label>
                    <input class="form-control" id="judul" name="judul[]" placeholder="Masukkan Judul" type="text"><br>
                    <label for="lastName">Dokumen</label>
                    <div class="form-group">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                            <span class="input-group-append">
                                    <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="dok[]" class="form-control">
                            </span>
                            <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </span>
                            
                        </div>
                    </div>

                    
                </div>
                <div class="col-md-12">
                    <input id="idf" value="1" type="hidden" />
                        <button class="btn btn-blue" onclick="tambahPilihan();return false;"><i class="ti-plus"></i><?= nbs(3) ?>Tambah Judul & Dokumen</button><br>
                    
                      <div id="divPilihan" style="margin-top: 10px;"></div>

                    <br>
                </div>
            </div>
    </div>
    <div class="card-footer">
        <div class="col-md-6"></div>
        <div class="col-md-6">
           <button type="submit" class="btn btn-icon btn-icon-style-1 btn-green mt-10 float-right shadow-xl" style="width: 140px;"><i class="ti-plus"></i><?= nbs(2) ?>S I M P A N</button> 
        </div>
    </div>
    </form>
</div>

</div>

<script language="javascript">
     function tambahPilihan() {
       var idf = document.getElementById("idf").value;
       var stre;
       stre="<p id='srow" + idf + "'><input type='text' class='form-control' name='judul[]' placeholder='Masukkan Judul' /><br><input type='file' name='dok[]' class='form-control'> <a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'><br>Hapus</a></p>";
       $("#divPilihan").append(stre);
       idf = (idf-1) + 2;
       document.getElementById("idf").value = idf;
     }
     function hapusElemen(idf) {
       $(idf).remove();
     }
</script>