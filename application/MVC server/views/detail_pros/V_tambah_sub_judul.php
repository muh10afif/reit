<div class="container">
    
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url('prospektus') ?>">Tambah Sub Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah </li>
    </ol>
</nav>
<!-- /Breadcrumb -->


<!-- Title -->
<div class="hk-pg-header">
    <div class="col-md-6">
		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="plus"></i></span></span>Tambah Sub Detail</h2>
	</div>
    <div class="col-md-6">
        <?php if ($detail != null): ?>
            <a href="<?= base_url('prospektus/tambah_sub_detail/'.$id_det_pros.'/'.$id_pros.'/'.$detail) ?>">
        <?php else: ?>
            <a href="<?= base_url('prospektus/tambah_sub_detail/'.$id_det_pros.'/'.$id_pros) ?>">
        <?php endif ?>
        
        <button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?>K E M B A L I</button></a>
    </div>
</div>
<?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

    <button class="btn btn-sun mb-10" type="button" data-toggle="collapse" data-target="#daftar" aria-expanded="false" aria-controls="upload">
        <i class="ti-image"></i><?= nbs(3) ?>Daftar Gambar
    </button><?= nbs(3) ?>
    <button class="btn btn-sky mb-10" type="button" data-toggle="collapse" data-target="#upload" aria-expanded="false" aria-controls="upload">
        <i class="ti-upload"></i><?= nbs(3) ?>Upload Gambar
    </button>

    <div class="collapse mt-10" id="daftar">
        <div class="card card-body">
            <form method="post" action="<?= base_url('prospektus/hapus_gambar_detail/'.$id_det_pros.'/'.$id_pros.'/sub') ?>">
                <div class="row mb-20">
                    <div class="col-md-12">
                        <?php if ($this->session->userdata('level') != 'kontributor'): ?>
                            <button class="btn btn-danger btn-lg float-right"  onclick = "return confirm('Anda yakin akan menghapus ini ?..')"><i class="ti-trash"></i><?= nbs(3) ?>Hapus</button>
                        <?php endif ?>
                    </div>
                </div>
                
            <div class="row">
            <?php $i=0; foreach ($data_gambar as $g): ?>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card mb-20 gallery shadow-sm shadow-hover-xl">
                        <a data-gallery="foto" href="<?= base_url('assets/gambar/'.$g['file_foto']) ?>" >
                        <img class="card-img-top h-100p" src="<?= base_url('assets/gambar/'.$g['file_foto']) ?>" alt="Card image cap"></a>
                        <div class="card-body h-100p">
                            <p class="card-text"><?= $g['file_foto'] ?></p>
                            
                        </div>
                        <?php if ($this->session->userdata('level') != 'kontributor'): ?>
                            <div class="custom-control custom-checkbox mb-15 text-center">
                                <input class="custom-control-input" name="hapus[]" value="<?= $g['id_file_foto'] ?>" id="hapus<?= $i ?>" type="checkbox">
                                <label class="custom-control-label" for="hapus<?= $i ?>"><span class="badge badge-soft-danger">Hapus</span></label>
                            </div>
                        <?php endif ?>
                    
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                   <input type="" id="nama_foto<?= $i ?>" class="form-control" value="<?= base_url('assets/gambar/'.$g['file_foto']) ?>"> 
                                </div>
                                <div class="col-md-12 text-center mt-5">
                                    <button type="button" id="copy<?= $i ?>" class="btn btn-xs btn-light">Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php $i++; endforeach ?>
            </div>
            </form>
        </div>
    </div>

    <div class="collapse mt-10" id="upload">
        <div class="card card-body">
            <form method="POST" action="<?= base_url('prospektus/simpan_gambar_detail/sub') ?>" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <input type="hidden" name="id_pros" value="<?= $id_pros ?>">
                    <input type="hidden" name="id_det_pros" value="<?= $id_det_pros ?>">

                    <div class="form-group mb-0">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                            <span class="input-group-append">
                                    <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                            <input name="gambar[]" type="file" class="demo form-control" multiple data-jpreview-container="#preview-container">
                            </span>
                            <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </span>
                        </div>
                    </div>
                    <br>
                    
                    <button type="submit" class="btn btn-gradient-warning"><i class="ti-upload"></i><?= nbs(3) ?>U P L O A D</button>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-12">
                    <div id="preview-container" class="jpreview-container">
                    </div>
                </div>
                </div>

                
            </form>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form method="post" action="<?= base_url('prospektus/tambah_data_sub_judul') ?>" enctype="multipart/form-data">
            <div class="card-body">
                <input type="hidden" name="id_pros" value="<?= $id_pros ?>">
                <input type="hidden" name="id_det_pros" value="<?= $id_det_pros ?>">
                <label for="judul">Judul Sub Detail</label>
                <select name="judul" id="judul" class="form-control select2">
                    <option value="">-- Pilih Judul --</option>
                    <?php foreach ($judul->result_array() as $j): ?>
                        <option value="<?= $j['id_judul'] ?>"><?= $j['nama'] ?></option>
                    <?php endforeach ?>
                </select><br><br>
                <label for="isi">Isi</label>
                <div class="tinymce-wrap">
                    <textarea class="tinymce form-control" name="isi_judul"></textarea>
                </div><br>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                <button type="submit" class="btn btn-icon btn-icon-style-1 btn-success mt-10 float-right" style="width: 120px;"><i class="ti-check"></i><?= nbs(2) ?>SIMPAN</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>

<?php $jml = count($data_gambar) ?>

<?php for ($i = 0; $i < $jml; $i++) : ?>

    <script>

        document.querySelector("#copy<?= $i ?>").onclick = function () {
            document.querySelector("#nama_foto<?= $i ?>").select();

            document.execCommand('copy');
        }
        
    </script>
    
<?php endfor ?>