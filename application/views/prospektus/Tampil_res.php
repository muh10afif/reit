<div class="container">
    
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url('prospektus') ?>">Prospektus</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</nav>
<!-- /Breadcrumb -->


<!-- Title -->
<div class="hk-pg-header">
    <div class="col-md-6">
		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="info"></i></span></span><?= $data_res['judul'] ?></h2>
	</div>
    <div class="col-md-6">
        <a href="<?= base_url('prospektus/detail/'.$id_pros.'/x') ?>"><button class="btn btn-info float-right"><i class="ti-angle-left"></i><?= nbs(3) ?>K E M B A L I</button></a>
    </div>
</div>

<?= $this->session->userdata('pesan'); ?>
<!-- /Title -->

<div class="card">
    <div class="card-body">
        <div class="col-md-12">
            <?= $data_res['isi'] ?>
        </div>
    </div>
</div>

</div>