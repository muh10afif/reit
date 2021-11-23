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
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><i class="material-icons">add_shopping_cart</i></span></span>Transaksi</h2>
    </div>
    <div class="col-md-6">
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'manager' || $this->session->userdata('level') == 'copywriter'): ?>
            <button class="btn btn-icon btn-icon-style-1 btn-green mt-10 float-right shadow-xl" style="width: 140px;" onclick="tambah_blok()"><i class="ti-plus"></i><?= nbs(2) ?><?php echo lang('add'); ?></button>
        <?php endif ?>
    </div>
		
</div>
    <?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body table-responsive">
                
            <?php echo $this->session->flashdata('pesan_1'); ?>
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr align="center">
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Jumlah Lot</th>
                        <th>Harga</th> 
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data_transaksi_kop->result())): ?>
                        <?php $no=1; $jt=0; $hg=0; ?>
                        <?php foreach ($data_transaksi_kop->result() as $key) { ?>
                        <tr>
                            <td align="center"><?php echo $no ?>.</td>
                            <td align="center"><?php echo $key->kode_transaksi; ?></td>
                            <td align="center"><?php echo number_format($key->jumlah_lot); ?></td>
                            <td align="center"><?php echo number_format($key->harga)?></td>
                            <td style="width: 20%;"  align="center">
                                    <a href="<?php echo base_url()?>/Prospektus/hapus_transaksi_kop/<?php echo $key->id_tr_investor?>/<?php echo base64_encode($kode_tr) ?>">
                                    <button class="btn btn-orange btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="right" title="" data-original-title="Hapus" onclick="return confirm('Yakin akan menghapus data ini ?')"><i data-feather="trash-2"></i></button></a>
                            </td>
                        </tr>
                        <?php $jt += $key->jumlah_lot ?>
                        <?php $hg += $key->harga ?>
                        <?php $no++; }; ?>
                        <tr style="font-weight: bold">
                            <td colspan="2" align="right">Total</td>
                            <td align="center"><?php echo $jt; ?></td>
                            <td align="center"><?php echo number_format($hg) ; ?></td>
                            <td  align="center">
                                <button type="button" class="btn btn-outline-success btn-rounded" data-toggle="modal" data-target="#modal_bayar"><i data-feather = "navigation"></i><?= nbs(3) ?> B A Y A R</button>
                            </td>
                        </tr>
                    <?php else: ?>  
                        <tr>
                            <td colspan="5" align="center">Transaksi Kosong</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>

            </div>
        </div> 
    </div>
<!-- /Row -->
</div>
<!-- Button trigger modal -->


<div class="modal fade" id="modal_bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header color-wrap bg-gradient-info">
        <h5 class="modal-title text-white" id="exampleModalLongTitle"><i data-feather="credit-card"></i><?= nbs(3) ?>Detail Bayar</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home">Cash</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu1">Transfer</a>
                </li>
              </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
            <form method="POST" action="<?php echo base_url();?>/Prospektus/tr_cash/<?php echo base64_encode($kode_tr) ?>">

            <input type="hidden" name="mt_bayar" value="<?= $hg ?>">
                <p>Kode Transaksi : <span style="font-weight: bold;"><?= $kode_tr ?></span></p>
                <p>Silahkan Bayar dengan metode Cash total: <span style="font-weight: bold;"> Rp. <?php echo number_format($hg,0,'.','.') ; ?> </span></p>

            <button type="submit" class="btn btn-info btn-rounded mt-3 mb-3 float-right"><i class="fa fa-money"></i><?= nbs(3) ?>B A Y A R</button>

            </form>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
            <form method="POST" action="<?php echo base_url();?>/Prospektus/tr_tf/<?php echo base64_encode($kode_tr) ?>">
                <?php  $unik  =  random_string('numeric', 3); $h_total  = $hg + $unik; ?>
                <input type="hidden" name="total" value="<?= $h_total ?>">
                <p>Kode Transaksi : <span style="font-weight: bold;"><?= $kode_tr ?></span></p>
                <p>Silahkan Bayar dengan metode Transfer total: <span style="font-weight: bold;"> Rp. <?php echo number_format($h_total,0,'.','.') ; ?> </span></p><br>
                
                <table class="table table-hover" align="left">
                    <tr>
                        <td>
                            <div class="custom-control custom-radio radio-cyan">
                                <input type="radio" id="customRadio7" name="bank" value="mandiri" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadio7">Bank Mandiri | 023449099999</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="custom-control custom-radio radio-cyan">
                                <input type="radio" id="customRadio8" name="bank" value="bca" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio8">Bank BCA | 043567889900</label>
                            </div>
                        </td>
                    </tr>
                </table>

                 <button type="submit" class="btn btn-success btn-rounded mt-3 mb-3 float-right"><i class="fa fa-money"></i><?= nbs(3) ?>B A Y A R</button>
            </form>
              
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary"><i class="fa fa-money"></i><?= nbs(3) ?>B A Y A R</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-money"></i><?= nbs(3) ?>METODE BAYAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">Cash</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu1">Transfer</a>
        </li>
      </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
    <form method="POST" action="<?php echo base_url();?>/Prospektus/tr_cash/<?php echo base64_encode($kode_tr) ?>">
    <input type="hidden" name="tr_transfer" value="cash">
    <input class="form-control form-control-lg number-separator" type="text" name="total" placeholder="Masukan Nominal">
     <button type="submit" class="btn btn-primary mt-4 float-right"><i class="fa fa-money"></i><?= nbs(3) ?>B A Y A R</button>
    </form>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
    <form method="POST" action="<?php echo base_url();?>/Prospektus/tr_tf/<?php echo base64_encode($kode_tr) ?>">
        <input type="hidden" name="tr_transfer" value="transfer">
        <select name="bank" id="bank" class="form-control" required="required">
            <option value="BRI">BRI</option>
            <option value="BCA">BCA</option>
        </select>
        <input class="form-control form-control-lg mt-2 number-separator" type="text" name="total_tf" placeholder="Masukan Nominal">
         <button type="submit" class="btn btn-primary mt-4 float-right"><i class="fa fa-money"></i><?= nbs(3) ?>B A Y A R</button>
    </form>
      
    </div>
    
  </div>
</div>
      </div>
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-primary"><i class="fa fa-money"></i><?= nbs(3) ?>B A Y A R</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="modal_buy" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Investasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="firstName">Investor ID</label>
                            <input class="form-control" id="firstName" placeholder="" value="" type="text"><br>
                            <label for="lastName">NIK</label>
                            <input class="form-control" id="lastName" placeholder="" value="" type="text"><br>
                            <label for="lastName">Nama</label>
                            <input class="form-control" id="lastName" placeholder="" value="" type="text"><br>
                            <label for="lastName">Alamat</label>
                            <textarea class="form-control" name="alamat"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="firstName">Telepon</label>
                            <input class="form-control" id="firstName" placeholder="" value="" type="text"><br>
                            <label for="lastName">Jumlah Lot</label>
                            <input class="form-control" id="lastName" placeholder="" value="" type="text"><br>
                            <label for="lastName">Metode Bayar</label>
                            <select name="metode" class="form-control">
                                <option value="">Cash</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times fa-lg"></i><?= nbs(3) ?>Close</button><?= nbs(5) ?>
                <button type="button" class="btn btn-success"><i class="fa fa-check fa-lg"></i><?= nbs(3) ?>Investasi</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Modal -->


<!-- Modal form tambah blok -->
<!-- <div class="modal fade" id="modal_blok" tabindex="-1" role="dialog" aria-labelledby="modal_blok" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <h5 class="modal-title" style="color: white;"><i class="ti-plus"></i><?= nbs(2) ?>Tambah Data Blok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="form_blok">
                <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="nama">Nama Blok</label>
                            <input class="form-control" id="nama" placeholder="Masukkan Nama Blok" type="text" name="nama"><br>
                            <label for="kawasan">Nama Kawasan</label>
                            <select name="kawasan" class="form-control">
                                <option value="">-- Pilih Nama Kawasan --</option>
                                <?php foreach ($kawasan as $k): ?>
                                    <option value="<?= $k['id_kawasan'] ?>"><?= $k['nama_kawasan'] ?></option>
                                <?php endforeach ?>
                            </select><br>
                            <label for="unit">Jumlah Unit</label>
                            <input type="number" class="form-control" placeholder="Masukkan Jumlah Unit" name="unit">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="gbr">Foto Thumbnail</label>
                            <input type="file" id="input-file-now gbr" name="foto" class="dropify" /><br>
                        </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?>B A T A L</button><?= nbs(5) ?>
                <button type="submit" class="btn btn-primary"><i class="ti-save"></i><?= nbs(2) ?>S I M P A N</button>
            </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Modal form Edit blok -->
<!-- <div class="modal fade" id="modal_edit_blok" tabindex="-1" role="dialog" aria-labelledby="modal_edit_blok" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #12ba12;">
                <h5 class="modal-title" style="color: white;"><i class="ti-pencil"></i><?= nbs(2) ?>Edit Data Blok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="form_edit_blok" enctype="multipart/form-data">
                <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="hidden" name="id">
                            <label for="nama">Nama Blok</label>
                            <input class="form-control" id="nama" placeholder="Masukkan Nama Blok" type="text" name="nama"><br>
                            <label for="kawasan">Nama Kawasan</label>
                            <select name="kawasan" class="form-control">
                                <option value="">-- Pilih Nama Kawasan --</option>
                                <?php foreach ($kawasan as $k): ?>
                                    <option value="<?= $k['id_kawasan'] ?>"><?= $k['nama_kawasan'] ?></option>
                                <?php endforeach ?>
                            </select><br>
                            <label for="unit">Jumlah Unit</label>
                            <input type="number" class="form-control" placeholder="Masukkan Jumlah Unit" name="unit"><br>
                            <label for="gbr">Foto Thumbnail</label>
                            <span class="badge badge-indigo mb-10">Foto Sebelumnya</span>
                            <div id="foto_baru">
                                
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            
                            <span class="badge badge-indigo mb-10 mt-10">Foto Baru</span>
                             <input type="file" id="input-file-now gbr" name="foto" class="dropify" />
                            <br>
                        </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="ti-close"></i><?= nbs(2) ?>B A T A L</button><?= nbs(5) ?>
                <button type="submit" class="btn btn-primary"><i class="ti-save"></i><?= nbs(2) ?>S I M P A N</button>
            </div>
            </form>
        </div>
    </div>
</div> -->
