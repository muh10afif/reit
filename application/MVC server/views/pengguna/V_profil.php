<style type="text/css">
	.data tr {
		border-top: hidden;
	}
</style>
<div class="container">

	<div class="row">
        <div class="col-xl-12 pa-0">
            <div class="profile-cover-wrap overlay-wrap">
                <div class="profile-cover-img bg-gradient-paradise"></div>
				<div class="bg-overlay bg-trans-dark-60"></div>
				<div class="container profile-cover-content py-50">
					<div class="hk-row"> 
						<div class="col-lg-6">
							<div class="media align-items-center">
								<div class="media-img-wrap  d-flex">
									<div class="avatar">
										<?php if ($d_pengguna['foto']): ?>
											<img src="<?= base_url() ?>assets/foto_profil/<?= base64_decode($d_pengguna['foto']) ?>" alt="user" class="avatar-img rounded-circle">
										<?php else: ?>
											<img src="<?= base_url() ?>assets/dist/img/avatarr.png" alt="user" class="avatar-img rounded-circle">
										<?php endif ?>
										
									</div>
								</div>
								<div class="media-body">
									<div class="text-white text-capitalize display-6 mb-5 font-weight-400"><?= ucwords($d_pengguna['nama_pengguna']) ?></div>
									<div class="font-14 text-white"><span class="mr-5"><span class="font-weight-500 pr-5"><?= ucwords($d_pengguna['nama_level']) ?></span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="button-list">
								<a href="#" class="btn btn-dark btn-wth-icon icon-wthot-bg btn-rounded"><span class="btn-text">Message</span><span class="icon-label"><i class="icon ion-md-mail"></i> </span></a>
								<a href="#" class="btn btn-icon btn-icon-circle btn-indigo btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
								<a href="#" class="btn btn-icon btn-icon-circle btn-sky btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
								<a href="#" class="btn btn-icon btn-icon-circle btn-purple btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-instagram"></i></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class="bg-white shadow-bottom">
				<div class="container">
					<ul class="nav nav-light nav-tabs" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Data</a>
					  </li>
					  <!-- <li class="nav-item">
					    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">-</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">-</a>
					  </li> -->
					</ul>
				</div>	
			</div>	

			<div class="row mt-20">
		        <div class="col-sm" align="right">
		                <a href="<?= base_url('pengguna/aksi_data/edit/'.$this->session->userdata('id_pengguna').'/profil') ?>"><button type="submit" class="btn btn-sm btn-purple btn-icon btn-icon-style-1" style="width: 100px;"><i class="icon-pencil"></i><?= nbs(3) ?>E D I T</button></a>
		        </div>
		    </div>

			<div class="tab-content" id="pills-tabContent">
			  	<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			 		<div class="card mt-20">
			 			<div class="card-body">
			 				<div class="row">
			 					<div class="col-md-6">
			 						<table class="table table-hover data">
			 							<tr>
			 								<th>Nama Pengguna</th>
			 								<td>:</td>
			 								<td><?= ucwords($d_pengguna['nama_pengguna']) ?></td>
			 							</tr>
			 							<tr>
			 								<th>Username</th>
			 								<td>:</td>
			 								<td><?= $d_pengguna['username'] ?></td>
			 							</tr>
			 						</table>
			 					</div>
			 					<div class="col-md-6">
			 						<table class="table table-hover data">
			 							<tr>
			 								<th>E-mail</th>
			 								<td>:</td>
			 								<td><?= $d_pengguna['email'] ?></td>
			 							</tr>
			 							<tr>
			 								<th>Level</th>
			 								<td>:</td>
			 								<td><?= $d_pengguna['level'] ?></td>
			 							</tr>
			 						</table>
			 					</div>
			 				</div>
			 			</div>
			 		</div>
			 		<div class="card mt-20">
			 			<div class="card-body">
			 				<div class="row">
			 					<div class="col-md-4">
			 						<table class="table table-hover data">
			 							<tr>
			 								<th>NIK</th>
			 								<td>:</td>
			 								<td><?= $d_pengguna['nik'] ?></td>
			 							</tr>
			 							<tr>
			 								<th>SID</th>
			 								<td>:</td>
			 								<td><?= $d_pengguna['sid'] ?></td>
			 							</tr>
			 							<tr>
			 								<th>Tempat Lahir</th>
			 								<td>:</td>
			 								<td><?= $d_pengguna['tempat_lahir'] ?></td>
			 							</tr>
			 							
			 						</table>
			 					</div>
			 					<div class="col-md-4">
			 						<table class="table table-hover data">
			 							<tr>
			 								<th>Tanggal Lahir</th>
			 								<td>:</td>
			 								<td><?= ($d_pengguna['tanggal_lahir']) ? tgl_indo($d_pengguna['tanggal_lahir']) : '' ?></td>
			 							</tr>
			 							<tr>
			 								<th>Alamat</th>
			 								<td>:</td>
			 								<td><?= $d_pengguna['alamat'] ?></td>
			 							</tr>
			 							<tr>
			 								<th>Provinsi</th>
			 								<td>:</td>
			 								<td><?= $provinsi['nama_provinsi'] ?></td>
			 							</tr>
			 							
			 						</table>
			 					</div>
			 					<div class="col-md-4">
			 						<table class="table table-hover data">
			 							<tr>
			 								<th>Kota</th>
			 								<td>:</td>
			 								<td><?= $kota['nama_kota'] ?></td>
			 							</tr>
			 							<tr>
			 								<th>Kecamatan</th>
			 								<td>:</td>
			 								<td><?= $kecamatan['nama_kecamatan'] ?></td>
			 							</tr>
			 							<tr>
			 								<th>Provinsi</th>
			 								<td>:</td>
			 								<td><?= $kelurahan['nama_kelurahan'] ?></td>
			 							</tr>
			 						</table>
			 					</div>
			 				</div>
			 			</div>
			 		</div>
				</div>
			  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">.ss..</div>
			  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">..cdv.</div>
			</div>
				
		</div>
    </div>
    <!-- /Row -->

</div>