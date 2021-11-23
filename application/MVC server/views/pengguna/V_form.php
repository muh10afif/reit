<div class="container">
    
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url('pengguna') ?>">Pengguna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->


    <!-- Title -->
    <div class="hk-pg-header">
        <div class="col-md-6">
            
    		<h2 class="hk-pg-title font-weight-600"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="user"></i></span></span>
            <?php if ($aksi == 'tambah'): ?>
                Tambah Pengguna
            <?php elseif ($aksi == 'edit'): ?>
                Edit Pengguna
            <?php else: ?>
                Detail Pengguna
            <?php endif ?>
            
            </h2>
    	</div>
        <div class="col-md-6">
            <?php if ($profil): ?>
                <a href="<?= base_url('pengguna/profil') ?>">
            <?php else: ?>
                <a href="<?= base_url('pengguna') ?>">
            <?php endif ?>

            <button class="btn btn-blue float-right btn-icon btn-icon-style-1" style="width: 150px;"><i class="ti-angle-left"></i><?= nbs(3) ?>K E M B A L I</button></a>
            
        </div>
    </div>
    <!-- menampilkan session -->
    <?= $this->session->userdata('pesan'); ?>
    <!-- /Title -->

    <?php if ($profil): ?>
        <?= form_open_multipart(($aksi == 'tambah') ? 'pengguna/simpan_data_pengguna/tambah' : 'pengguna/simpan_data_pengguna/edit/profil') ?>
    <?php else: ?>
        <?= form_open_multipart(($aksi == 'tambah') ? 'pengguna/simpan_data_pengguna/tambah' : 'pengguna/simpan_data_pengguna/edit') ?>
    <?php endif ?>
    

    <div class="card">
        <div class="card-body">
            <h2>Foto Profil</h2>
            <div class="row justify-content-md-center mt-10">
                <div class="col-md-6">
                    <?php if ($aksi == 'tambah'): ?>
                        <input type="file" id="input-file-now foto" name="foto" class="dropify" />
                    <?php elseif ($aksi == 'edit'): ?>
                        <?php $d = $d_pengguna['foto'] ?>
                        <?php if ($d != null): ?>
                            <input type="file" id="input-file-now foto" name="foto" class="dropify" data-default-file="<?= base_url('assets/foto_profil/'.base64_decode($d_pengguna['foto'])) ?>"/>
                            <input type="hidden" name="ft" value="<?= base64_decode($d_pengguna['foto']) ?>">
                        <?php else: ?>
                            <input type="file" id="input-file-now foto" name="foto" class="dropify"/>
                        <?php endif ?>
                    <?php else: ?> 
                        <div class="row justify-content-md-center mt-10">
                            <div class="col-md-6">
                                <?php $d = $d_pengguna['foto'] ?>
                                <?php if ($d != null) : ?>
                                    <img class="img-fluid rounded" width="100%" src="<?= base_url('assets/foto_profil/'.base64_decode($d_pengguna['foto'])) ?>">
                                <?php else: ?>
                                    <img class="img-fluid rounded" width="100%" src="<?= base_url('assets/dist/img/img-thumb.jpg') ?>">
                                <?php endif ?>
                                
                            </div>
                        </div>
                    <?php endif ?>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">

                <?php if ($aksi == 'tambah'): ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pengguna">Nama Pengguna</label>
                            <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control" placeholder="Masukkan Nama Pengguna" required="">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" required="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan E-mail" required="">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control custom-select d-block w-100" required="">
                                <option value="">--- Pilih Level ---</option>
                                <?php foreach ($level->result_array() as $lv): ?>
                                    <option value="<?= $lv['id_level'] ?>"><?= ucfirst($lv['level']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control custom-select d-block w-100" required="">
                                <option value="0">--- Pilih Status ---</option>
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                <?php elseif ($aksi == 'edit'): ?>

                    <input type="hidden" name="id_pengguna" value="<?= $d_pengguna['id'] ?>">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pengguna">Nama Pengguna</label>
                            <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control" value="<?= $d_pengguna['nama_pengguna'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="<?= $d_pengguna['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <?php if ($d_pengguna['password'] != null): ?>
                                <div class="mt-10"><em><mark>Isi field password! Jika ingin ganti password</mark></em></div>
                            <?php else: ?>
                                <div class="mt-10"><em><mark>Isi field password!</mark></em></div>
                            <?php endif ?>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?= $d_pengguna['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control custom-select d-block w-100">
                                <option value="">--- Pilih Level ---</option>
                                <?php foreach ($level->result_array() as $lv): ?>
                                    <option value="<?= $lv['id_level'] ?>" <?= ($lv['id_level'] == $d_pengguna['id_level']) ? 'selected' : '' ?>><?= ucfirst($lv['level']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control custom-select d-block w-100">
                                <option value="0" <?= ($d_pengguna['aktif'] == 0) ? 'selected' : '' ?>>--- Pilih Status ---</option>
                                <option value="1" <?= ($d_pengguna['aktif'] == 1) ? 'selected' : '' ?>>Aktif</option>
                                <option value="2" <?= ($d_pengguna['aktif'] == 2) ? 'selected' : '' ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pengguna">Nama Pengguna</label>
                            <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control " value="<?= $d_pengguna['nama_pengguna'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control " value="<?= $d_pengguna['username'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control " value="<?= $d_pengguna['email'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control custom-select d-block w-100 " disabled>
                                <option value="">--- Pilih Level ---</option>
                                <?php foreach ($level->result_array() as $lv): ?>
                                    <option value="<?= $lv['id_level'] ?>" <?= ($lv['id_level'] == $d_pengguna['id_level']) ? 'selected' : '' ?>><?= ucfirst($lv['level']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control custom-select d-block w-100 " disabled>
                                <option value="0" <?= ($d_pengguna['aktif'] == 0) ? 'selected' : '' ?>>--- Pilih Status ---</option>
                                <option value="1" <?= ($d_pengguna['aktif'] == 1) ? 'selected' : '' ?>>Aktif</option>
                                <option value="2" <?= ($d_pengguna['aktif'] == 2) ? 'selected' : '' ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                <?php endif ?>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h2>Detail Profil</h2>
            <div class="row mt-10">

                <?php if ($aksi == 'tambah'): ?>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan NIK" required="">
                        </div>
                        <div class="form-group">
                            <label for="sid">SID</label>
                            <input type="text" id="sid" name="sid" class="form-control" placeholder="Masukkan SID" required="">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tgl">Tanggal Lahir</label>
                            <input type="text" placeholder="" id="tgl" name="tgl_lahir" data-mask="99-99-9999" class="form-control" placeholder="Masukkan Tanggal Lahir">
                            <span class="form-text text-muted">dd/mm/yyyy</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="alamat">Alamat (Saat Ini)</label>
                            <textarea name="alamat" id="alamat" class="form-control" id="alamat" cols="5" rows="4" placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="provinsi" class="control-label">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control custom-select d-block w-100">
                                <option value="">-- Pilih Provinsi --</option>
                                <?php foreach ($d_provinsi as $p): ?>
                                    <option value="<?= $p->id_provinsi ?>"><?= ucwords($p->nama_provinsi) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota" class="control-label">Kota</label>
                            <select name="kota" id="kota" class="form-control custom-select d-block w-100">
                                <option value="">-- Pilih Kota --</option>
                                <?php foreach ($d_kota as $k): ?>
                                    <option class="<?= $k->id_provinsi_2 ?>" value="<?= $k->id_kota ?>"><?= ucwords($k->nama_kota) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kecamatan" class="control-label">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control custom-select d-block w-100">
                                <option value="">-- Pilih Kecamatan --</option>
                                <?php foreach ($d_kecamatan as $e): ?>
                                    <option class="<?= $e->id_kota_2 ?>" value="<?= $e->id_kec ?>"><?= ucwords($e->nama_kecamatan) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan" class="control-label">Kelurahan</label>
                            <select name="kelurahan" id="kelurahan" class="form-control custom-select d-block w-100">
                                <option value="">-- Pilih Kelurahan --</option>
                                <?php foreach ($d_kelurahan as $r): ?>
                                    <option class="<?= $r->id_kec_2 ?>" value="<?= $r->id_kel ?>"><?= ucwords($r->nama_kelurahan) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                <?php elseif ($aksi == 'edit'): ?>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-control" value="<?= $d_pengguna['nik'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="sid">SID</label>
                            <input type="text" id="sid" name="sid" class="form-control" value="<?= $d_pengguna['sid'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="<?= $d_pengguna['tempat_lahir'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tgl">Tanggal Lahir</label>
                            <input type="text" placeholder="" id="tgl" name="tgl_lahir" data-mask="99-99-9999" class="form-control" value="<?php $a = nice_date($d_pengguna['tanggal_lahir'], 'd-m-Y'); $b = $d_pengguna['tanggal_lahir']; ?> <?= ($b != null) ? $a : '' ?>">
                            <span class="form-text text-muted">dd/mm/yyyy</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="alamat">Alamat (Saat Ini)</label>
                            <textarea name="alamat" id="alamat" class="form-control" id="alamat" cols="5" rows="4"><?= $d_pengguna['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="provinsi" class="control-label">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control custom-select d-block w-100">
                                <option value="">-- Pilih Provinsi --</option>
                                <?php foreach ($d_provinsi as $p): ?>
                                    <option value="<?= $p->id_provinsi ?>" <?= ($p->id_provinsi == $selected['provinsi']) ? 'selected' : '' ?> ><?= ucwords($p->nama_provinsi) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota" class="control-label">Kota</label>
                            <select name="kota" id="kota" class="form-control custom-select d-block w-100">
                                <option value="">-- Pilih Kota --</option>
                                <?php foreach ($d_kota as $k): ?>
                                    <option class="<?= $k->id_provinsi_2 ?>" value="<?= $k->id_kota ?>" <?= ($k->id_kota == $selected['kota']) ? 'selected' : '' ?>><?= ucwords($k->nama_kota) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kecamatan" class="control-label">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control custom-select d-block w-100">
                                <option value="">-- Pilih Kecamatan --</option>
                                <?php foreach ($d_kecamatan as $e): ?>
                                    <option class="<?= $e->id_kota_2 ?>" value="<?= $e->id_kec ?>" <?= ($e->id_kec == $selected['kecamatan']) ? 'selected' : '' ?>><?= ucwords($e->nama_kecamatan) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan" class="control-label">Kelurahan</label>
                            <select name="kelurahan" id="kelurahan" class="form-control custom-select d-block w-100">
                                <option value="">-- Pilih Kelurahan --</option>
                                <?php foreach ($d_kelurahan as $r): ?>
                                    <option class="<?= $r->id_kec_2 ?>" value="<?= $r->id_kel ?>" <?= ($r->id_kel == $selected['kelurahan']) ? 'selected' : '' ?>><?= ucwords($r->nama_kelurahan) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    
                <?php else: ?>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-control" value="<?= $d_pengguna['nik'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sid">SID</label>
                            <input type="text" id="sid" name="sid" class="form-control" value="<?= $d_pengguna['sid'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="<?= $d_pengguna['tempat_lahir'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tgl">Tanggal Lahir</label>
                            <input type="text" placeholder="" id="tgl" name="tgl_lahir" data-mask="99-99-9999" class="form-control" value="<?= nice_date($d_pengguna['tanggal_lahir'], 'd-m-Y') ?>" disabled>
                            <span class="form-text text-muted">dd/mm/yyyy</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="alamat">Alamat (Saat Ini)</label>
                            <textarea name="alamat" id="alamat" class="form-control" id="alamat" cols="5" rows="4" disabled=""><?= $d_pengguna['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="provinsi" class="control-label">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control custom-select d-block w-100" disabled="">
                                <option value="">-- Pilih Provinsi --</option>
                                <?php foreach ($d_provinsi as $p): ?>
                                    <option value="<?= $p->id_provinsi ?>" <?= ($p->id_provinsi == $selected['provinsi']) ? 'selected' : '' ?> ><?= ucwords($p->nama_provinsi) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota" class="control-label">Kota</label>
                            <select name="kota" id="kota" class="form-control custom-select d-block w-100" disabled="">
                                <option value="">-- Pilih Kota --</option>
                                <?php foreach ($d_kota as $k): ?>
                                    <option class="<?= $k->id_provinsi_2 ?>" value="<?= $k->id_kota ?>" <?= ($k->id_kota == $selected['kota']) ? 'selected' : '' ?>><?= ucwords($k->nama_kota) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kecamatan" class="control-label">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control custom-select d-block w-100" disabled="">
                                <option value="">-- Pilih Kecamatan --</option>
                                <?php foreach ($d_kecamatan as $e): ?>
                                    <option class="<?= $e->id_kota_2 ?>" value="<?= $e->id_kec ?>" <?= ($e->id_kec == $selected['kecamatan']) ? 'selected' : '' ?>><?= ucwords($e->nama_kecamatan) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan" class="control-label">Kelurahan</label>
                            <select name="kelurahan" id="kelurahan" class="form-control custom-select d-block w-100" disabled="">
                                <option value="">-- Pilih Kelurahan --</option>
                                <?php foreach ($d_kelurahan as $r): ?>
                                    <option class="<?= $r->id_kec_2 ?>" value="<?= $r->id_kel ?>" <?= ($r->id_kel == $selected['kelurahan']) ? 'selected' : '' ?>><?= ucwords($r->nama_kelurahan) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                <?php endif ?>

                


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm" align="right">
            <?php if ($aksi != 'detail'): ?>
                <button type="submit" class="btn btn-purple btn-lg btn-icon btn-icon-style-1" style="width: 150px;"><i class="ti-save"></i><?= nbs(3) ?>S I M P A N</button>
            <?php endif ?>
        </div>
    </div>

    <?= form_close(); ?>


</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.chained.min.js"></script>

<script>
    $("#kota").chained("#provinsi");
    
</script>

<script type="text/javascript">
    $("#kecamatan").chained("#kota");
</script>

<script>
    $("#kelurahan").chained("#kecamatan");
</script>