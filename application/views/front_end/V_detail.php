<style type="text/css">
    table tr {
        border-top: hidden;
    }
</style>
<div class="container" >
<div class="hk-pg-header">
<div class="row">
    <div class="col-md-12 mt-20">
        <h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="info"></i></span></span><?php echo lang('prospektus_detail') ?></h2>
    </div>
    <div class="col-md-12">
        <a href="<?= base_url('frontend/Prospektus/unit/'.$id_blok['id_blok']) ?>"><button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?><?php echo lang('back') ?></button></a>
    </div>
</div>
</div>
<?= $this->session->userdata('pesan'); ?>
<!-- /Title -->


<div class="row mt-5">
<div class="col-md-7">
    
    <!-- <img class="card-img-top mt-10" src="<?= base_url() ?>assets/dist/img/foto.jpg" alt="Card image cap"> -->
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
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white">First Slide Label</h5>
                    <p>This is content paragraph enough to say.</p>
                </div> -->
            </div>
            <?php else: ?>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url() ?>assets/gambar/<?= base64_decode($p['file_foto']) ?>" alt="First slide">
            </div>
            <?php endif ?>
            <?php endforeach ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

            <div class="card mt-15">
        <div class="card-body text-center">
            <p class="mt-10 text-justify"><?= $detail_pros['keterangan'] ?></p>
        </div>
    </div>
    <?php $a=0; foreach ($detail as $d): $a++?>
    <div class="card">
        <div class="card-header">
            <h1 class="display-6"><?= strtoupper($d['nama']) ?></h1>
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
    </div>
    <?php endforeach ?>
    
</div>
<div class="col-md-5 ">
    <div class="card text-white bg-green">
        <div class="card-body">
             <table class="table table-responsive">
                    <tr>
                        <td><?php echo lang('investor_target') ?></td>
                        <td> <?= $detail_pros['target_investor'] ?>%</td>
                    </tr>
                    <tr>
                        <td><?php echo lang('unit_type') ?></td>
                        <td><?= $detail_pros['nama_unit'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo lang('price') ?></td>
                        <td>Rp.<?= number_format($detail_pros['harga'])  ?></td>
                    </tr>
                    <tr>
                        <td><?php echo lang('investment_period') ?></td>
                        <td><?= $detail_pros['periode_investasi'] ?> <?php echo lang('year') ?></td>
                    </tr>
                    <tr>
                        <td><?php echo lang('min_invest') ?></td>
                        <td>Rp.<?= number_format($detail_pros['minimal_investasi'])  ?></td>
                    </tr>
                    <tr>
                        <td><?php echo lang('total_lot') ?></td>
                        <td><?= $detail_pros['jumlah_lot'] ?> Lot</td>
                    </tr>
            </table>
        </div>
    </div>
    <?php if ($cek_transaksi == 0): ?>
        <div class="card">
            <a href="<?= base_url("frontend/prospektus/buat_invest/$id_pros") ?>"><button class="btn btn-blue btn-block pull-left"><i class="ti-check"></i><?= nbs(2) ?> <?php echo lang('invest') ?></button></a>
        </div>
    <?php endif ?>
    <div class="card mb-4">
        <div class="card-body">
            <div class="container">
                <h5><?php echo lang('document') ?></h5>
                <?php foreach ($data_dok->result_array() as $d): ?>
                <i class="fa fa-file"></i><a target="_blank" href="<?= base_url('prospektus/tampil_pdf/'.base64_decode($d['dokumen']).'/a') ?>"><?= nbs(5) ?><?= $d['judul'] ?></a><br>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="container">
                <h5>RESOURCE</h5>
                <?php foreach ($data_res->result_array() as $d): ?>
                <i class="ti-arrow-circle-right"></i><?= nbs(5) ?><a target="_blank" href="<?= base_url('prospektus/tampil_res/'.$d['id_resources'].'/'.$id_pros) ?>"><?= $d['judul'] ?></a><br>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    
</div>

<script src="<?php echo base_url()?>assets_frontend/signin/js/jquery-3.3.1.min.js"></script>
<script>
    $("img").addClass("img-fluid");
    $("iframe").addClass("embed-responsive");
</script>
                        