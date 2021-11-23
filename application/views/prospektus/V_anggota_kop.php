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
        <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><i class="material-icons">perm_identity</i></span></span>Anggota</h2>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-outline-primary mt-10 float-right" data-toggle="modal" data-target="#modal-add" ><i class="ti-plus"></i><?= nbs(2) ?>T A M B A H</button>
    </div>
        
</div>
    <?= $this->session->flashdata('pesan'); ?>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          <?php echo $this->session->flashdata('pesan_2'); ?>
            <table id="id_tabel" class="table table-hover display">
                <thead class="thead-light">
                        <tr align="center">
                            <th width="20px;">No</th>
                            <th>Nama anggota</th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($anggota->result() as $var ) { ?>
                        <tr>
                            <td align="center"><?php echo $no ?></td>
                            <td><?php echo $var->nama_anggota ?></td>
                            <td align="center">
                                <button type="button" class="btn btn-primary btn-sm btn-icon btn-icon-style-1" data-toggle="modal" data-target="#modal-edit<?php echo $no ?>"><i class="fa fa-edit"></i></button>
                                <a href="<?php echo base_url()?>/Prospektus/hapus_anggota/<?php echo $var->id_anggota; ?>" class="btn btn-orange btn-sm btn-icon btn-icon-style-1" data-toggle="tooltip-pink" data-placement="bottom" title="" data-original-title="Hapus"><span class="feather-icon feat" onclick="return confirm('Delete entry?')"><i class="mt-2" data-feather="trash-2"></i></span></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-edit<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus"></i><?= nbs(3) ?>EDIT ANGGOTA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               <form method="POST" action="<?php echo base_url()?>/Prospektus/update_anggota">
                                   <input type="hidden" name="id_anggota" value="<?php echo $var->id_anggota;?>">
                                   <input type="text" class="form-control" name="nama" placeholder="Nama Anggota" value="<?php echo $var->nama_anggota ?>">
                               
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i><?= nbs(3) ?>S I M P A N</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php $no++; } ?>
                    </tbody>
            </table>
        </div>
      </div>
        
</div>
<!-- /Row -->
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus"></i><?= nbs(3) ?>TAMBAH ANGGOTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="<?php echo base_url()?>/Prospektus/tambah_anggota">
           <input type="hidden" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna'); ?>">
           <input type="text" class="form-control" name="nama" placeholder="Nama Anggota">
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i><?= nbs(3) ?>S I M P A N</button>
        </form>
      </div>
    </div>
  </div>
</div>


