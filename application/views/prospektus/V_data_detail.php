<style type="text/css">
	#datable_1 thead tr th {
		vertical-align: middle;
		text-align: center;
	}
	.feat {
	  width: 20px;
	  height: 20px;
	  vertical-align: middle;
	}
</style>
<div class="container">

<!-- Title -->
<div class="hk-pg-header mt-10">
	<div class="col-md-12">
		<?php if ($detail != null): ?>
			<a href="<?= base_url('prospektus/detail/'.$id_pros.'/x') ?>">
		<?php else: ?>
			<a href="<?= base_url('prospektus/data_pros') ?>">
		<?php endif ?>
		
		<button class="btn btn-icon btn-icon-style-1 btn-blue mt-10" style="width: 120px;"><i class="ti-angle-left"></i><?= nbs(2) ?>K E M B A L I</button></a>
	</div>
	<div class="col-md-6">
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Data Detail</h2>
    </div>
    <div class="col-md-6">
        <a href="<?= base_url('prospektus/tampil_form_tambah/'.$data_pros['id_prospektus'].'/'.$detail) ?>"><button class="btn btn-icon btn-icon-style-1 btn-success mt-10 float-right" style="width: 120px;"><i class="ti-plus"></i><?= nbs(2) ?>TAMBAH</button></a>
    </div>
	
</div>
<?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body table-responsive">
				<table id="id_tabel" class="table table-hover w-100 display">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Nama Judul</th>
							<th>Isi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_judul->result_array() as $d): ?>
							<tr>
								<td width="10%" align="center"><?= $no++ ?></td>
								<td width="20%"><?= $d['nama'] ?></td>
								<td><?= word_limiter($d['isi'], 20) ?></td>
								<td width="20%" align="center">
									<a href="<?= base_url('prospektus/hapus_judul_det/'.$d['id_detail_pros'].'/'.$id_pros.'/'.$detail) ?>"><button class="btn btn-danger btn-sm" onclick = "return confirm('Anda yakin akan menghapus ini ?..')">Hapus</button></a><?= nbs(5) ?>
									<a href="<?= base_url('prospektus/tambah_sub_detail/'.$d['id_detail_pros'].'/'.$id_pros.'/'.$detail) ?>"><button class="btn btn-violet btn-sm btn-sm">Sub Judul</button></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>