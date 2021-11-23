<style type="text/css">
.card-img-top {
border-radius: 0px 0px 0px 0px;
}
.judul {
border-radius: 5px 5px 0px 0px;
}
/* Centered text */
.over {
position: absolute;
top: 45%;
left: 50%;
transform: translate(-50%, -50%);
}
</style>
<div class="container">
  <!-- Title -->
  <div class="hk-pg-header mt-10">
    <div class="col-md-6">
      <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><i class="material-icons">history</i></span></span>History Transaksi</h2>
    </div>
    
  </div>
  <?= $this->session->flashdata('pesan'); ?>
  <!-- /Title -->
  <!-- Row -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body table-responsive">
          
        <?php echo $this->session->flashdata('pesan_2'); ?>
        <table id="id_tabel" class="table table-hover table-bordered display">
          <thead class="thead-light">
            <tr align="center">
              <th width="20px;">No</th>
              <th>Kode Transaksi</th>
              <th>Jumlah Lot</th>
              <th>Total Bayar</th>
              <th>Tanggal Transaksi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            <?php foreach ($history as $var) : ?>
            <tr>
              <td align="center"><?php echo $no ?></td>
              <td><?php echo $var['kode_transaksi'] ?></td>
              <td align="right"><?php echo $var['total_lot'] ?></td>
              <td align="right">Rp. <?php echo number_format($var['total_bayar'],0,'.','.')?></td>
              <td align="center"><?= tgl_indo_timestamp($var['add_time']) ?></td>
              <td align="center" width="50px">
                <!-- <button type="button" class="btn btn-info btn-sm btn-icon btn-icon-style-1" data-toggle="modal" data-target="#modal-info<?php echo $var->id_tr_investor?>"><i class="fa fa-info"></i></button> -->

                <!-- <button type="button" class="btn btn-icon btn-icon-circle btn-warning btn-icon-style-2" data-toggle="modal" data-target="#modal-info<?php echo $var->kode_transaksi?>"><span class="btn-icon-wrap"><i class="icon-info"></i></span></button> -->

                <!--  <a href="<?php echo base_url()?>/Prospektus/hapus_anggota/" class="btn btn-orange btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="bottom" title="" data-original-title="Hapus"><span class="feather-icon feat" onclick="return confirm('Delete entry?')"><i class="mt-2" data-feather="trash-2"></i></span></a> -->

                <a href="<?= base_url("Prospektus/detail_history/".$var['kode_transaksi']) ?>">
                <button type="button" class="btn btn-icon btn-icon-circle btn-warning btn-icon-style-2" data-toggle="tooltip-pink" data-placement="top " title="" data-original-title="Detail"><span class="btn-icon-wrap"><i class="icon-info"></i></span></button></a>

              </td>
            </tr>

            <?php $no++; endforeach ?>
          </tbody>
        </table>

        </div>
      </div>

      
    </div>
    <!-- /Row -->
  </div>
  <!-- Button trigger modal -->
  <!-- <?php foreach ($history as $key) {
  $foto = base64_decode($key->file_foto);?>
  <div class="modal fade" id="modal-info<?php echo $key->id_tr_investor?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-history"></i><?= nbs(3) ?>Detail History</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 col-xs-12">
              <h6><i class="fa fa-map mb-2"></i> Kawasan <?php echo $key->nama_kawasan?> </h6>
              <img style="width:105%" src="<?php echo base_url()?>/assets/gambar/<?php echo $foto ?>" class="img-responsive"  alt="Image">
            </div>
            <div class="col-md-7 col-xs-12">
              <br>
              <div class="card text-white bg-primary ">
                <div class="card-body" style="margin-top:-35px;margin-bottom: -20px;">
                  <br><h5 class="text-white"><i class="fa fa-home "></i> Unit <?php echo $key->nama_unit ?></h5>
                  <table class="table table-hover table-responsive" style="background-color: #ffffffdb;">
                    <tr>
                      <td width="50%">Kode Transaksi</td>
                      <td class="text-left">: <?php echo $key->kode_transaksi ?></td>
                    </tr>
                    <tr>
                      <td width="50%">Jumlah Invest Lot</td>
                      <td class="text-left">: <?php echo $key->jumlah_lot ?> Lot</td>
                    </tr>
                    <tr>
                      <td width="50%">Total Harga</td>
                      <td class="text-left">: Rp.<?php echo number_format($key->harga) ?>.-</td>
                    </tr>
                  </table>
                </div>
              </div>
              
            </div>
            
          </div>
          <h5 style="margin-top:20px;"><i class="fa fa-list"></i> Lampiran daftar anggota yang ikut serta</h5>
          <table class="table table-hover" style="width: 100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Nilai Investasi</th>
              </tr>
            </thead>
            <tbody>
              <?php $n=1; ?>
              <?php foreach ($data_anggota as $agt) {;?>
              <tr>
                <td><?php echo $n?></td>
                <td><?php echo $agt->nama_anggota ?></td>
                <td>test</td>
              </tr>
              <?php $n++; } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
  <?php } ?> -->