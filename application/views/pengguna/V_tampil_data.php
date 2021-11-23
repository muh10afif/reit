<style type="text/css">
	#id_tabel_2 thead tr th {
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
	
<form method="POST" action="<?= base_url('pengguna/hapus_pengguna') ?>">
<!-- Title -->
<div class="hk-pg-header mt-10">
 
	<div class="col-md-12">
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="users"></i></span></span>Data Pengguna</h2>
    </div>
   
    <div class="col-md-12">
    	<button type="submit" class="btn btn-icon btn-icon-style-1 btn-danger mt-10" style="width: 110px;" onclick = "return confirm('Anda yakin akan menghapus ini ?..')"><i class="ti-trash"></i><?= nbs(2) ?>HAPUS</button>

        <a href="<?= base_url('pengguna/aksi_data/tambah') ?>"><button type="button" class="btn btn-icon btn-icon-style-1 btn-success mt-10 float-right" style="width: 110px;" onclick="tambah_unit()"><i class="ti-plus"></i><?= nbs(2) ?>TAMBAH</button></a>
    </div>
	
</div>
<?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body table-responsive">
				<table id="id_tabel_2" class="table table-hover table-bordered w-100 display">
					<thead class="thead-light">
						<tr>
							<th></th>
							<th>No</th>
							<th>Nama Pengguna</th>
							<th>Username</th>
							<th>Email</th>
							<th>Level</th>
							<th>Status</th>
							<th width="25%">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($data_pengguna->result_array() as $p): ?>
							<tr>
								<td align="center" id="tabel">
									<div class="custom-control custom-checkbox checkbox-pink" >
                                        <input type="checkbox" name="id_pengguna[]" value="<?= $p['id_pengguna'] ?>" class="custom-control-input" id="customCheck<?= $no ?>">
                                        <label class="custom-control-label" for="customCheck<?= $no ?>"><?= nbs(1) ?></label>
                                    </div>
								</td>
								<td align="center"><label for="customCheck<?= $no ?>"><?= $no ?>.</label>
								</td>
								<td><?= $p['nama_pengguna'] ?></td>
								<td><?= $p['username'] ?></td>
								<td><?= $p['email'] ?></td>
								<td><?= $p['nama_level'] ?></td>
								<td align="center">
									<?php if ($p['aktif'] == 1): ?>
										<h5><span class="badge badge-soft-success badge-pill">Aktif</span></h5>
									<?php else: ?>
										<h5><span class="badge badge-soft-danger badge-pill">Tidak Aktif</span></h5>
									<?php endif ?></td>
								<td align="center">
									<a href="<?= base_url('pengguna/aksi_data/edit/'.$p['id_pengguna']) ?>"><button type="button" class="btn btn-icon btn-icon-circle btn-sun btn-icon-style-2" data-toggle="tooltip-purple" data-placement="top" title="" data-original-title="EDIT"><span class="btn-icon-wrap"><i class="icon-pencil"></i></span></button></a>
									<?= nbs(3) ?>
									<a href="<?= base_url('pengguna/aksi_data/detail/'.$p['id_pengguna']) ?>"><button type="button" class="btn btn-icon btn-icon-circle btn-light btn-icon-style-2" data-toggle="tooltip-dark" data-placement="top" title="" data-original-title="DETAIL"><span class="btn-icon-wrap"><i class="icon-info"></i></span></button></a>
								</td>	
							</tr>
						<?php $no++; endforeach ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</form>

</div>