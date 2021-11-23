<div class="container">
    
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url('prospektus/detail/'.$id_pros.'/x') ?>">Prospektus</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah data</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->


    <!-- Title -->
    <div class="hk-pg-header">
        <div class="col-md-6">
    		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="edit-3"></i></span></span>Ubah <?= $data_detail['nama'] ?></h2>
    	</div>
        <div class="col-md-6">
            <a href="<?= base_url('prospektus/detail/'.$id_pros.'/x') ?>">  
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
            <form method="post" action="<?= base_url('prospektus/hapus_gambar_detail/'.$id_det_pros.'/'.$id_pros) ?>">
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
            <form method="POST" action="<?= base_url('prospektus/simpan_gambar_detail') ?>" enctype="multipart/form-data">
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

    <!-- <div class="card card-body">
        <form method="post" action="<?= base_url('prospektus/hapus_gambar_detail/'.$id_det_pros.'/'.$id_pros) ?>">
            <div class="row mb-20">
                <div class="col-md-12">
                    <h1 class="display-5">Daftar Gambar</h1> <button class="btn btn-danger btn-lg float-right"><i class="ti-trash"></i><?= nbs(3) ?>Hapus</button>
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
                    <div class="custom-control custom-checkbox mb-15 text-center">
                        <input class="custom-control-input" name="hapus[]" value="<?= $g['id_file_foto'] ?>" id="hapus<?= $i ?>" type="checkbox">
                        <label class="custom-control-label" for="hapus<?= $i ?>"><span class="badge badge-soft-danger">Hapus</span></label>
                    </div>
                </div>
            </div>
            
        <?php $i++; endforeach ?>
        </div>
        <?= $pagination ?>
        </form>
    </div> -->


    <form method="POST" action="<?= base_url('prospektus/simpan_ubah_judul_det') ?>">

    <div class="card mt-10">
        <div class="card-body">
            <div class="row">
                <!-- <div class="col-md-12 mb-10">
                    <button class="btn btn-danger float-right" onclick = "return confirm('Anda yakin akan menghapus ini ?..')"><i class="ti-trash"></i><?= nbs(3) ?>Hapus</button>
                </div> -->
                <div class="col-md-12">
    
                    <input type="hidden" name="id_pros" value="<?= $id_pros ?>">
                    <input type="hidden" name="id_det" value="<?= $data_detail['id_detail_pros'] ?>">
                    <label for="judul">Judul</label>
                    <input readonly class="form-control" id="judul" name="judul" value="<?= $data_detail['nama'] ?>" type="text"><br>
                    <label>Isi</label>
                    <div class="tinymce-wrap">
                        <textarea class="tinymce form-control" name="isi"><?= $data_detail['isi'] ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php $i=0; foreach ($sub_detail->result_array() as $v): ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- <div class="col-md-12 mb-10">
                    <button class="btn btn-danger float-right" onclick = "return confirm('Anda yakin akan menghapus ini ?..')"><i class="ti-trash"></i><?= nbs(3) ?>Hapus</button>
                </div> -->
                <div class="col-md-12">

                    <input type="hidden" name="id_sub[]" value="<?= $v['id_sub_detail_pros'] ?>">
                    <label for="sub_judul">Sub Judul</label>
                    <input readonly class="form-control" id="sub_judul" name="sub_judul[]" value="<?= $v['nama'] ?>" type="text"><br>
                    <label>Isi</label>
                    <div class="tinymce-wrap">
                        <textarea class="tinymce form-control" name="sub_isi[]"><?= $v['sub_isi'] ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php $i++; endforeach ?>
    
    <div class="col-md-12 text-center mt-20">
       <button type="submit" class="btn btn-icon btn-icon-style-1 btn-green btn-lg" style="width: 140px;"><i class="ti-save"></i><?= nbs(3) ?>S I M P A N</button> 
    </div><?= br(2) ?>

    </form>

</div>

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