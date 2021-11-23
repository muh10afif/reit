<style type="text/css">
    #errmsg
    {
    color: red;
    }
</style>
<div class="container">
    
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <?php if ($this->session->userdata('level') != 'kontributor'): ?>
                                
                <?php if ($this->session->userdata('level') == 'koperasi'): ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('prospektus/koperasi/blok/'.base64_encode($this->session->userdata('kode_transaksi'))) ?>">Prospektus</a></li>
                <?php elseif ($this->session->userdata('level') == 'investor'): ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('prospektus/index/blok/'.base64_encode($this->session->userdata('kode_transaksi'))) ?>">Katalog Properti</a></li>
                <?php else: ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('prospektus/index/blok/') ?>">Prospektus Blok</a></li>
                <?php endif ?>

            <?php else: ?>
                <li class="breadcrumb-item"><a href="<?= base_url('prospektus/kontributor') ?>">Prospektus</a></li>
            <?php endif ?>

            <?php if ($aksi == 'approve'): ?>
                <li class="breadcrumb-item"><a href="<?= base_url('prospektus/approve_pros') ?>">List Approve</a></li>
            <?php else: ?>
                <li class="breadcrumb-item"><a href="<?= base_url('prospektus/detail_kws/'.$id_blok['id_blok'].'/'.base64_encode($kd_transaksi)) ?>">Detail Kawasan</a></li>
            <?php endif ?>
            <li class="breadcrumb-item active" aria-current="page">Detail Unit</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->


    <!-- Title -->
    <div class="hk-pg-header">
        <div class="col-md-12">
    		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="info"></i></span></span>Detail Prospektus Unit</h2>
    	</div>
        <!-- <div class="col-md-6">
            <?php if ($aksi == 'approve'): ?>
                <a href="<?= base_url('prospektus/approve_pros') ?>"><button class="btn btn-info float-right btn-icon btn-icon-style-1" style="width: 170px;"><i class="ti-angle-left"></i><?= nbs(3) ?>K E M B A L I</button></a>
            <?php else: ?>
                <a href="<?= base_url('prospektus/detail_kws/'.$id_blok['id_blok'].'/'.base64_encode($kd_transaksi)) ?>"><button class="btn btn-info float-right btn-icon btn-icon-style-1" style="width: 170px;"><i class="ti-angle-left"></i><?= nbs(3) ?>K E M B A L I</button></a>
            <?php endif ?>
            
        </div> -->
    </div>
    <!-- menampilkan session -->
    <?= $this->session->userdata('pesan'); ?>
    <!-- /Title -->

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php for ($i = 0; $i < count($det_foto_pros); $i++) : ?>
                                <?php if ($i == 0): ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>
                                <?php else: ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                                <?php endif ?>
                            <?php endfor ?>
                        </ol>

                        <div class="carousel-inner" style="border-radius: 10px">
                            <?php $no=0; foreach ($det_foto_pros as $p): $no++ ?>
                                <?php if ($no == 1): ?>
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="<?= base_url() ?>assets/gambar/<?= base64_decode($p['file_foto']) ?>" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <!-- <h5 class="text-white"><?= $p['ket'] ?></h5> -->
                                            <!-- <p>This is content paragraph enough to say.</p> -->
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>assets/gambar/<?= base64_decode($p['file_foto']) ?>" alt="First slide">
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>

                        <?php if (count($det_foto_pros) != 1): ?>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        <?php endif ?>
                    </div> <!-- akhir carouselExampleIndicators -->

                    <div class="card mt-10">
                        <div class="card-body text-center">
                            <p class="mt-10 text-justify"><?= $detail_pros['keterangan'] ?></p>
                        </div>
                    </div>
                    
                    <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                        <?php if ($detail_pros['status'] == null): ?>
                            <a href="<?= base_url('prospektus/tambah_detail/'.$id_pros.'/detail') ?>"><button class="btn btn-purple mb-20"><i class="ti-plus"></i><?= nbs(3) ?>TAMBAH DETAIL</button></a>
                        <?php endif ?>
                    <?php else: ?>
                        <?php if ($this->session->userdata('level') != 'koperasi'): ?>
                            <?php if ($this->session->userdata('level') != 'investor'): ?>
                                <a href="<?= base_url('prospektus/tambah_detail/'.$id_pros.'/detail') ?>"><button class="btn btn-purple mb-20"><i class="ti-plus"></i><?= nbs(3) ?>TAMBAH DETAIL</button></a>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endif ?>
                    
                        
                    <?php $a=0; foreach ($detail as $d): $a++?>

                    <div class="card mt-10">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6"><h1 class="display-6"><?= $d['nama'] ?></h1> </div>
                                <div class="col-md-6">
                                    <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                                        <?php if ($detail_pros['status'] == null): ?>
                                            <a href="<?= base_url('prospektus/edit_judul_detail/'.$d['id_detail_pros'].'/'.$id_pros) ?>"><button class="btn btn-sun float-right"><i class="ti-pencil"></i><?= nbs(3) ?>E D I T</button></a>
                                            <a href="<?= base_url('prospektus/hapus_judul_detail/'.$d['id_detail_pros'].'/'.$id_pros) ?>"><button class="btn btn-red float-right mr-10" onclick="return confirm('Yakin akan menghapus ini!')"><i class="ti-trash"></i></button></a>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <?php if ($this->session->userdata('level') != 'koperasi'): ?>
                                            <?php if ($this->session->userdata('level') != 'investor'): ?>
                                                <a href="<?= base_url('prospektus/edit_judul_detail/'.$d['id_detail_pros'].'/'.$id_pros) ?>"><button class="btn btn-sun float-right"><i class="ti-pencil"></i></button></a>
                                                <a href="<?= base_url('prospektus/hapus_judul_detail/'.$d['id_detail_pros'].'/'.$id_pros) ?>"><button class="btn btn-red float-right mr-10" onclick="return confirm('Yakin akan menghapus ini!')"><i class="ti-trash"></i></button></a>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endif ?>
                                    

                                </div>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <?= $d['isi'] ?>

                            <?php $dp = $this->M_prospektus->get_sub_detail($d['id_detail_pros']); ?>

                            <div class="accordion mt-10" id="accordion_<?= $a ?>">

                                <?php foreach ($dp->result_array() as $v) : ?>

                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_<?= $i ?>" aria-expanded="false"><?= $v['nama'] ?></a>
                                        </div>
                                        <div id="collapse_<?= $i ?>" class="collapse" data-parent="#accordion_<?= $a ?>">
                                            <div class="card-body pa-15"><?= $v['sub_isi'] ?></div>
                                        </div>
                                    </div>
                                    
                                <?php $i++; endforeach; ?>

                            </div>
                        </div>
                    </div> <!-- akhir card -->

                    <?php endforeach ?>

                </div>
                    
                <!-- konten sebelah kanan -->
                <div class="col-md-4">

                    <div class="card text-white bg-gradient-warning shadow-sm shadow-hover-xl">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">Target Pengembalian Investasi</div>
                                <div class="col-md-6" align="">:<?= nbs(3) ?><?= $detail_pros['target_investor'] ?>%</div>
                            </div>
                            <hr class="hr-light-20" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="row">
                                <div class="col-md-6">Jenis Unit</div>
                                <div class="col-md-6" align="">:<?= nbs(3) ?><?= $detail_pros['nama_unit'] ?></div>
                            </div>
                            <hr class="hr-light-20" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="row">
                                <div class="col-md-6">Harga</div>
                                <div class="col-md-6" align="">:<?= nbs(3) ?>Rp. <?= number_format($detail_pros['harga'],'0','.','.') ?></div>
                            </div>
                            <hr class="hr-light-20" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="row">
                                <div class="col-md-6">Periode Investasi</div>
                                <div class="col-md-6" align="">:<?= nbs(3) ?><?= $detail_pros['periode_investasi'] ?> Tahun</div>
                            </div>
                            <hr class="hr-light-20" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="row">
                                <div class="col-md-6">Investasi Minimum</div>
                                <div class="col-md-6" align="">:<?= nbs(3) ?>Rp. <?= number_format($detail_pros['minimal_investasi'],'0','.','.') ?></div>
                            </div>
                            <hr class="hr-light-20" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="row">
                                <div class="col-md-6">Jumlah Lot</div>
                                <div class="col-md-6" align="">:<?= nbs(3) ?><?= $sisa = ($detail_pros['jumlah_lot'] - $jml_lot_beli['jml_lot_beli']) ?> Lot</div>
                            </div>
                            <hr class="hr-light-20" style="margin-top: 5px; margin-bottom: 5px;">
                        </div>
                    </div>

                    <?= br(1) ?>

                        <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                        <div class="card">
                            <a href="<?= base_url('prospektus/ubah_status_pros_con/'.$detail_pros['id_prospektus']) ?>">
                                <button class="btn btn-lg btn-gradient-info btn-block pull-left" onclick="return confirm('Yakin akan mengirim data?..')" <?= ($detail_pros['status'] == 3 || $detail_pros['status'] == 1 || $detail_pros['status'] == 2) ? 'disabled' : ''; ?>>
                                    <i class="ti-check"></i><?= nbs(2) ?> KIRIM</button></a>
                        </div><?= br(1) ?>
                        <?php else: ?>

                            <?php if ($cek_kode == 0): ?>
                                <div class="card">

                                <?php if ($this->session->userdata('level') != 'koperasi'): ?>
                                    <?php if($this->session->userdata('level') != 'admin'): ?>
                                        <?php if($this->session->userdata('level') != 'manager'):?>
                                            <button class="btn btn-lg btn-gradient-info btn-block pull-left" data-toggle="modal" <?= ($sisa == 0) ? 'disabled' : '' ?> data-target="#modal_invest"><i class="ti-check"></i><?= nbs(2) ?> INVESTASI</button>
                                        <?php endif ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button type="button" class="btn btn-lg btn-gradient-info btn-block pull-left" data-toggle="modal" <?= ($sisa == 0) ? 'disabled' : '' ?> data-target="#modal_invest">
                                        <i class="ti-check"></i><?= nbs(2) ?> INVESTASI
                                    </button>
                                    
                                <?php endif ?>

                                 </div><?= br(1) ?>
                            <?php else: ?>
                                <div class="card">
                                 <button type="button" class="btn btn-lg btn-gradient-info btn-block pull-left" disabled data-toggle="modal" data-target="#modal_invest">
                                        <i class="ti-check"></i><?= nbs(2) ?> INVESTASI
                                    </button>
                                </div>
                            <?php endif ?>

                        <?php endif ?>
                        
                   

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>DOCUMENT</h5></div>
                                <div class="col-md-6 text-right">
                                    <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                                        <?php if ($detail_pros['status'] == null): ?>
                                            <a href="<?= base_url('prospektus/tambah_dok/'.$id_pros) ?>"><button class="btn btn-purple"><i class="ti-plus"></i><?= nbs(3) ?>TAMBAH</button></a>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <?php if ($this->session->userdata('level') != 'koperasi'): ?>
                                            <?php if ($this->session->userdata('level') != 'investor'): ?>
                                                <a href="<?= base_url('prospektus/tambah_dok/'.$id_pros) ?>"><button class="btn btn-purple"><i class="ti-plus"></i><?= nbs(3) ?>TAMBAH</button></a>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endif ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="font-size: 18px;">
                            <div class="row">
                                <div class="col-md-12">
                                <table class="table table-hover">
                                    <?php foreach ($data_dok->result_array() as $d): ?>
                                        
                                            <tr style="border-top: hidden;">
                                                <td><i class="fa fa-file"></i><a target="_blank" href="<?= base_url('prospektus/tampil_pdf/'.str_replace('=','_',$d['dokumen']).'/Preview') ?>"><?= nbs(5) ?><?= $d['judul'] ?></a></td>

                                                <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                                                    <?php if ($detail_pros['status'] == null): ?>
                                                    <td align="right"><a href="<?= base_url('prospektus/hapus_dokumen/'.$d['id_file_dok'].'/'.$id_pros.'/'.str_replace('=','_',$d['dokumen'])) ?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan hapus dokumen')"><i class="ti-trash"></i></button></a></td>
                                                    <?php endif ?>
                                                <?php else: ?>
                                                    <?php if ($this->session->userdata('level') != 'koperasi'): ?>
                                                        <?php if ($this->session->userdata('level') != 'investor'): ?>
                                                        <td align="right"><a href="<?= base_url('prospektus/hapus_dokumen/'.$d['id_file_dok'].'/'.$id_pros.'/'.str_replace('=','_',$d['dokumen'])) ?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan hapus dokumen')"><i class="ti-trash"></i></button></a></td>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endif ?>

                                                
                                            </tr>
                                        
                                    <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>RESOURCES </h5></div>
                                <div class="col-md-6 text-right">
                                    <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                                        <?php if ($detail_pros['status'] == null): ?>
                                            <a href="<?= base_url('prospektus/tambah_resources/'.$id_pros) ?>"><button class="btn btn-purple"><i class="ti-plus"></i><?= nbs(3) ?>TAMBAH</button></a>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <?php if ($this->session->userdata('level') != 'koperasi'): ?>
                                            <?php if ($this->session->userdata('level') != 'investor'): ?>
                                                <a href="<?= base_url('prospektus/tambah_resources/'.$id_pros) ?>"><button class="btn btn-purple"><i class="ti-plus"></i><?= nbs(3) ?>TAMBAH</button></a>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endif ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="font-size: 18px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                                                           
                                    <?php foreach ($data_res->result_array() as $d): ?>
                                        <tr style="border-top: hidden;">
                                            <td>
                                                <i class="ti-arrow-circle-right"></i><?= nbs(5) ?><a target="_blank" href="<?= base_url('prospektus/tampil_res/'.$d['id_resources'].'/'.$id_pros) ?>"><?= $d['judul'] ?></a>
                                            </td>
                                            <?php if ($this->session->userdata('level') == 'kontributor'): ?>
                                                <?php if ($detail_pros['status'] == null): ?>
                                                    <td align="right">
                                                    <a href="<?= base_url('prospektus/hapus_resources/'.$d['id_resources'].'/'.$id_pros) ?>">
                                                    <button class="btn btn-red btn-sm" onclick="return confirm('Yakin akan hapus data!')"><i class="ti-trash"></i></button></a><?= nbs(2) ?>
                                                    <a href="">
                                                    <button class="btn btn-sun btn-sm"><i class="ti-pencil"></i></button></a></td> 
                                                <?php endif ?>
                                            <?php else: ?>
                                                <?php if ($this->session->userdata('level') != 'koperasi'): ?>
                                                    <?php if ($this->session->userdata('level') != 'investor'): ?>
                                                    <td align="right">
                                                    <a href="<?= base_url('prospektus/hapus_resources/'.$d['id_resources'].'/'.$id_pros) ?>">
                                                    <button class="btn btn-red btn-sm" onclick="return confirm('Yakin akan hapus data!')"><i class="ti-trash"></i></button></a><?= nbs(2) ?>
                                                    <a href="<?= base_url('prospektus/edit_resources/'.$d['id_resources'].'/'.$id_pros) ?>">
                                                    <button class="btn btn-sun btn-sm"><i class="ti-pencil"></i></button></a></td> 
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php endif ?>
                                            
                                        </tr>
                                        
                                    <?php endforeach ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- akhir col-md-4 -->
            </div>
        </div>
    </div>

</div> <!-- akhir container -->



<!-- Modal -->
<div class="modal fade" id="modal_invest" tabindex="-1" role="dialog" aria-labelledby="modal_invest" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header color-wrap bg-gradient-info">
                <h5 class="modal-title text-white">Investasi</h5>
                <button type="button" class="close  text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_invest">
                    <!-- <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna'); ?>">
                    <input type="hidden" name="id_pros" value="<?= $id_pros ?>">
                    <input type="hidden" name="kode_transaksi" value="<?= $this->session->userdata('kode_transaksi'); ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Harga Lot</label><br>
                            <input type="hidden" id="minimal" value="<?= $detail_pros['minimal_investasi']; ?>">
                            <input type="hidden" id="min_lot" value="<?= $sisa ?>">

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input type="text" name="harga" class="form-control filled-input" value="<?= number_format($detail_pros['minimal_investasi'],'0','.','.') ?>" readonly>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Jumlah Lot</label>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="jml_lot" id="jml_lot" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"> Lot </span>
                                    </div>
                                </div> <span id="errmsg"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Total</label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input type="text" id="total" name="harga_total" class="form-control filled-input" readonly>
                                </div>
                                
                            </div>
                        </div>
                    </div> -->

                    <!-- batas -->

                    <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna'); ?>">
                    <input type="hidden" name="id_pros" value="<?= $id_pros ?>">
                    <input type="hidden" name="kode_transaksi" value="<?= $this->session->userdata('kode_transaksi'); ?>">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>NIK</label>
                            <div class="form-group">
                            <input type="text" name="nik" class="form-control" value="<?= $data_pengguna['nik'] ?>" required>
                            </div>
                            <label>Nama</label>
                            <div class="form-group">
                            <input type="text" name="nama" class="form-control" value="<?= $this->session->userdata('nama'); ?>" required>
                            </div>
                            <label>Alamat</label>
                            <div class="form-group">
                            <textarea class="form-control" name="alamat" required><?= $data_pengguna['alamat'] ?></textarea>
                            </div>
                            <label>Telepon</label>
                            <div class="form-group">
                            <input type="number" name="no_tlp" class="form-control" value="<?= $data_pengguna['no_telp'] ?>" required>
                            </div>
                            
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Harga Lot</label>
                            <input type="hidden" id="minimal" value="<?= $detail_pros['minimal_investasi']; ?>">
                            <input type="hidden" id="min_lot" value="<?= $sisa ?>">

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input type="text" name="harga" class="form-control filled-input" value="<?= number_format($detail_pros['minimal_investasi'],'0','.','.') ?>" readonly>
                                </div>
                                
                            </div>
                            <label>Jumlah Lot</label>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="jml_lot" id="jml_lot" class="form-control" value="0">
                                    <div class="input-group-append">
                                        <span class="input-group-text"> Lot </span>
                                    </div>
                                </div> <span id="errmsg"></span>
                            </div>
                            <label>Total</label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input type="text" id="total" name="harga_total" class="form-control filled-input" readonly>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- batas akhir -->

                </form>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-gradient-warning" name="lanjut" onclick="simpan_invest('lanjut', '<?= $this->session->userdata('level') ?>')"><i class="ti-angle-double-left"></i><?= nbs(2) ?>Lanjutkan Investasi Lain</button><?= nbs(2) ?>
                <button class="btn btn-gradient-danger" name="bayar" onclick="simpan_invest('bayar', '<?= $this->session->userdata('level') ?>')"><i class="ti-check"></i><?= nbs(2) ?>Bayar</button>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_dok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #12ba12;">
                <h5 class="modal-title" style="color: white;">Form Tambah Upload Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_dok">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="nama">Judul</label>
                            <input class="form-control" id="nama" name="nama[]" placeholder="Masukkan Judul" type="text"><br>
                            <label for="lastName">Dokumen</label>
                            <div class="form-group">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-append">
                                            <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                                    <input type="file" name="foto[]" class="form-control">
                                    </span>
                                    <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </span>
                                    
                                </div>
                            </div>
                            <input id="idf" value="1" type="hidden" />
                                <a class="btn btn-blue" onclick="tambahPilihan();return false;" href="#" role="button"><i class="ti-plus"></i><?= nbs(3) ?>Tambah Judul dan Upload Dokumen</a><br>
                            
                              <div id="divPilihan" style="margin-top: 10px;"></div>

                            <br>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?>B A T A L</button><?= nbs(5) ?>
                <button type="button" onclick="aksi_dok()" class="btn btn-primary"><i class="ti-save"></i><?= nbs(2) ?>S I M P A N</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

      $("#jml_lot").keypress(function (e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#errmsg").html("Masukkan hanya angka !!").show().fadeOut("slow");

            return false;
        }
       });

      $("#jml_lot").keyup(function (e) {

         var a = $("#min_lot").val();
         var b = $("#jml_lot").val();

         if (parseInt(b) > parseInt(a)) {
            $("#errmsg").html("Jumlah Lot lebih !!").show().fadeOut("slow");
            $("button[name='lanjut']").hide();
            $("button[name='bayar']").hide();

            return false;
         } else {
            $("button[name='lanjut']").show();
            $("button[name='bayar']").show();
         }

       });
    });

</script>

<script language="javascript">
     function tambahPilihan() {
       var idf = document.getElementById("idf").value;
       var stre;
       stre="<p id='srow" + idf + "'><input type='text' class='form-control' name='nama[]' placeholder='Masukkan Judul' /><br><input type='file' name='foto[]' class='form-control'> <a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'><br>Hapus</a></p>";
       $("#divPilihan").append(stre);
       idf = (idf-1) + 2;
       document.getElementById("idf").value = idf;
     }
     function hapusElemen(idf) {
       $(idf).remove();
     }

</script>

<script>
    $("img").addClass("img-fluid");
    $("iframe").addClass("embed-responsive");
</script>

<script>
    $(document).ready(function(e) {
   
        $("input").keyup( function() {

          var tot_nilai = 0;
          var a = $("input[id=minimal]").val();
          var b = $("input[id=jml_lot]").val();
          tot_nilai = parseInt(a) * parseInt(b);

          var reverse = tot_nilai.toString().split('').reverse().join(''),
          ribuan    = reverse.match(/\d{1,3}/g);
          ribuan    = ribuan.join('.').split('').reverse().join('');

          $("input[id=total]").val(ribuan);
          
        });
      });


    function simpan_invest(aksi, level) {
        var b = $("#jml_lot").val();

        if (parseInt(b) == 0) {
            $("#errmsg").html("Jumlah lot tidak boleh bernilai 0").show().fadeOut("slow");
        } else {
            var url = "<?php echo site_url('prospektus/proses_invest') ?>";

            $.ajax({
                url     : url,
                type    : "POST",
                data    : $('#form_invest').serialize(),
                dataType: "JSON",
                success : function(data) {
                    $('#modal_invest').modal('hide');

                    if (aksi == 'lanjut') {

                        if (level == 'investor') {
                            url = "<?php echo site_url('prospektus/index/')?>"+data['kd_tr'];
                        } else {
                            url = "<?php echo site_url('prospektus/koperasi/')?>"+data['kd_tr'];
                        }

                    } else {
                        url = "<?php echo site_url('prospektus/transaksi_kop/')?>"+data['kd_tr'];
                    }

                    window.location.href=url;
                },
                error   : function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal! Memproses Data');
                }
            });
        
        }
        
    }

</script>
