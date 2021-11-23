<style type="text/css">
.card-img-top {
border-radius: 0px 0px 0px 0px;
}
.judul {
border-radius: 5px 5px 0px 0px;
}
</style>
<div class="container">
    <!-- Title -->
    <div class="hk-pg-header mt-10">
        <div>
            <h2 class="hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Edit Home</h2>
        </div>
        
    </div>
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <section class="hk-sec-wrapper" style="width: 100%;">
            <?= $this->session->flashdata('pesan'); ?>
            <?= $this->session->flashdata('pesan1'); ?>
            <?= $this->session->flashdata('pesan2'); ?>
            <?= $this->session->flashdata('pesan3'); ?>
            <?= $this->session->flashdata('pesan4'); ?>
            <?= $this->session->flashdata('pesan5'); ?>
            <?= $this->session->flashdata('pesan6'); ?>
            <?= $this->session->flashdata('pesan7'); ?>
            <?= $this->session->flashdata('pesan8'); ?>
            <div class="row">
                <div class="col-sm">
                    <div class="row">
                        <div class="col-3">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action <?= ($id_tab == '1') ? 'active' : '' ?>" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Background</a>
                                <a class="list-group-item list-group-item-action  <?= ($id_tab == '2') ? 'active' : '' ?>" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Promotion</a>
                                <a class="list-group-item list-group-item-action <?= ($id_tab == '3') ? 'active' : '' ?>" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Data Project</a>
                                <a class="list-group-item list-group-item-action <?= ($id_tab == '4') ? 'active' : '' ?>" id="list-settings-list" data-toggle="list" href="#video" role="tab" aria-controls="list-settings">Video</a>
                                 <a class="list-group-item list-group-item-action <?= ($id_tab == '5') ? 'active' : '' ?>" id="faq-list" data-toggle="list" href="#faq" role="tab" aria-controls="list-settings">FAQ</a>
                                 <a class="list-group-item list-group-item-action <?= ($id_tab == '6') ? 'active' : '' ?>" id="faq-list" data-toggle="list" href="#footer" role="tab" aria-controls="list-settings">Footer</a>
                                 <a class="list-group-item list-group-item-action <?= ($id_tab == '7') ? 'active' : '' ?>" id="faq-list" data-toggle="list" href="#news" role="tab" aria-controls="list-settings">News</a>
                                 <a class="list-group-item list-group-item-action <?= ($id_tab == '8') ? 'active' : '' ?>" id="faq-list" data-toggle="list" href="#disc" role="tab" aria-controls="list-settings">Disclaimer</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade <?= ($id_tab == '1') ? 'show active' : '' ?>" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class=" card card-body">
                                        <h4>Background</h4><br>
                                        <form action="<?php echo base_url('home/jumbotron_edit_proses')?>" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id_tab" value="1">
                                            <textarea class="form-control mb-2" name="title" rows="5"><?php echo $title_jumbotron ?></textarea>
                                            <input type="file" class="dropify" id="input-file-now" name="gb_jumbotron"  data-default-file="<?= base_url() ?>assets_frontend/images/bg/<?php echo $gb_jumbotron ;?>">
                                            <button type="submit" class="btn btn-outline-success pull-right mt-2">Update</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade <?= ($id_tab == '2') ? 'show active' : '' ?>" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                    <div class=" card card-body">
                                        <h4>Promotion Picture</h4><br>
                                        <form action="<?php echo base_url('home/inv_gb_edit_proses')?>" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id_tab" value="2">
                                            <input type="file" class="dropify" id="input-file-now" name="inv_gambar"  data-default-file="<?= base_url() ?>assets_frontend/images/all/<?php echo $inv_gambar ;?>">
                                            <button type="submit" class="btn btn-outline-success pull-right mt-2">Update</button>
                                        </form>
                                    <div class="col-md-12 col-lg-12 mt-4">
                                                    <textarea name="inv_title_promo" class="form-control" id="editor" rows="8"><?php echo $inv_title_promo ?>
                                                    </textarea>
                                                </div>
                                                <div class="row mt-4">
                                                     <div class="col-md-6 col-lg-6">
                                                    <input class="form-control bg-warning" type="text" name="inv_promo_title_cont1"
                                                    value="<?php echo $inv_promo_title_cont1;?>">
                                                    <textarea name="inv_promo_cont1" class="rounded-0 form-control" rows="5"><?php echo trim($inv_promo_cont1) ?>
                                                    </textarea>
                                                    <input class="form-control mt-4 bg-warning" type="text" name="inv_promo_title_cont3"
                                                    value="<?php echo $inv_promo_title_cont3;?>">
                                                    <textarea name="inv_promo_cont3" class="rounded-0 form-control" rows="5"><?php echo $inv_promo_cont3 ?>
                                                    </textarea>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <input class="form-control bg-warning" type="text" name="inv_promo_title_cont2" value="<?php echo $inv_promo_title_cont2;?>">
                                                    <textarea name="inv_promo_cont2" class="rounded-0 form-control" rows="5"><?php echo $inv_promo_cont2 ?>
                                                    </textarea>
                                                    <input class="form-control mt-4 bg-warning" type="text" name="inv_promo_title_cont4"
                                                    value="<?php echo $inv_promo_title_cont4;?>">
                                                    <textarea name="inv_promo_cont4" class="rounded-0 form-control" rows="5"><?php echo $inv_promo_cont4 ?>  </textarea>
                                                </div>
                                                </div>
                                               
                                    </div>
                                </div>
                                <div class="tab-pane fade <?= ($id_tab == '3') ? 'show active' : '' ?>" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                                      <div class=" card card-body">
                                        <h4>Data Project</h4><br>
                                        <form method="POST" action="<?php echo base_url('home/edit_data_project') ?>">
                                            <input type="hidden" name="id_tab" value="3">
                                            <table>
                                                <tr>
                                                    <td style="width:200px;">Project Terselesaikan</td>
                                                    <td style="width:10px;">:</td>
                                                    <td><input class="form-control mt-2" style="width: 100px;" type="number" name="proyek_selesai" value="<?php echo $inv_proyek_selesai ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Klien</td>
                                                    <td>:</td>
                                                    <td><input class="form-control mt-2" style="width: 100px;" type="number" name="client" value="<?php echo $inv_client ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Project Berjalan</td>
                                                    <td>:</td>
                                                    <td><input class="form-control mt-2" style="width: 100px;" type="number" name="proyek_berjalan" value="<?php echo $inv_proyek_berjalan ?>"></td>
                                                </tr>
                                            </table>
                                            <button type="submit" class="btn btn-outline-success pull-right mt-2">Update</button>
                                        </form>
                                    </div>
                                </div>

                                    <div class="tab-pane fade <?= ($id_tab == '4') ? 'show active' : '' ?>" id="video" role="tabpanel" aria-labelledby="list-settings-list">
                                      <div class=" card card-body">
                                        <h4>Video</h4><br>
                                        <?= $this->session->flashdata('pesan3'); ?>
                                        <form method="POST" action="<?php echo base_url('home/edit_video_proses') ?>">
                                            <input type="hidden" name="id_tab" value="4">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">https://youtube.com/embed/</span>
                                              </div>
                                              <input type="text" class="form-control" name="video" id="basic-url" placeholder="Masukan id video" aria-describedby="basic-addon3">
                                            </div>
                                             <!-- <div class=" embed-responsive-4by3">
                                                                         <iframe  class="embed-responsive-item" src="https://youtube.com/embed/<?php echo $vid_link  ?>"></iframe>
                                                                     </div> -->
                                             <textarea id="editor1" name="narasi" class="form-control"><?php echo $vid_narasi?></textarea>
                                             <button type="submit" class="btn btn-outline-success pull-right mt-2">Update</button>
                                        </form>
                                    </div>
                                </div>
                                   <div class="tab-pane fade <?= ($id_tab == '5') ? 'show active' : '' ?>" id="faq" role="tabpanel" aria-labelledby="list-settings-list">
                                    <div class=" card card-body">
                                    <h4>Cara Kerja Sistem Kami</h4><br>
                                    <a class="btn btn-primary mb-2" data-toggle="modal" href='#modal-id' style="width: 150px;">+ Tambah Data</a>
                                    <table class="table table-hover" id="table_faq" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>FAQ Judul</th>
                                                <th>FAQ Content</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php $no = 1 ; foreach ($data_faq as $row ) {?>
                                                <tr>
                                                    <form action="<?php echo base_url('Home/faq_update') ?>" method="POST" accept-charset="utf-8">
                                                        <input type="hidden" name="id_tab" value="5">
                                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                                    <td><?php echo $no ?></td>
                                                    <td><textarea  class="form-control" name="faq_judul"><?php echo $row->faq_judul;?></textarea></td>
                                                    <td><textarea cols="30" rows="5" class="form-control" name="faq_content"><?php echo $row->faq_content;?></textarea></td>
                                                    <td>
                                                        <a href="<?php echo base_url("home/faq_delete/$row->id")?>" onclick="return confirm('Are you sure you want to delete this item?');"class="btn  btn-outline-danger" data-toggle="tooltip" title="DELETE" ><i class="fa fa-times"></i></a>
                                                        <button type="submit" class="btn btn-outline-success" data-toggle="tooltip" title="UPDATE"><i class="fa fa-check"></i></button>
                                                       
                                                    </td>
                                                     </form>
                                                </tr>
                                                <?php $no++;} ?>
                                            </tbody>
                                        </table>
                                </div>
                                </div>

                                <div class="tab-pane fade <?= ($id_tab == '6') ? 'show active' : '' ?>" id="footer" role="tabpanel" aria-labelledby="list-settings-list">
                                <div class=" card card-body">
                                    <h4>Footer</h4><br>
                                    <?= $this->session->flashdata('pesan6'); ?>
                                    <form method="POST" action="<?php echo base_url('Home/footer_update') ?>">
                                        <div class="row">
                                             <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:90px;" id="basic-addon3">phone</span>
                                          </div>
                                          <input type="text" class="form-control" name="phone" id="basic-url" placeholder="Phone" aria-describedby="basic-addon3" value="<?php echo $phone_footer ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:90px;" id="basic-addon3">email</span>
                                          </div>
                                          <input type="text" class="form-control" name="email" id="basic-url" placeholder="Email" aria-describedby="basic-addon3" value="<?php echo $email_footer ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:90px;" id="basic-addon3">address</span>
                                          </div>
                                          <input type="text" class="form-control" name="address" id="basic-url" placeholder="Address" aria-describedby="basic-addon3" value="<?php echo $address_footer ?>">
                                        </div>
                                         <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:90px;" id="basic-addon3">facebook</span>
                                          </div>
                                          <input type="url" class="form-control" name="facebook" id="basic-url" placeholder="Masukan Link" aria-describedby="basic-addon3" value="<?php echo $facebook ?>">
                                        </div>
                                         <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:90px;" id="basic-addon3">instagram</span>
                                          </div>
                                          <input type="url" class="form-control" name="instagram" id="basic-url" placeholder="Masukan Link" aria-describedby="basic-addon3" value="<?php echo $instagram ?>">
                                        </div>
                                         <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:90px;" id="basic-addon3">twitter</span>
                                          </div>
                                          <input type="url" class="form-control" name="twitter" id="basic-url" placeholder="Masukan Link" aria-describedby="basic-addon3" value="<?php echo $twitter ?>">
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success mt-2 pull-right"> Update</button>
                                    </form>
                                    </div>
                                </div>    
                                <div class="tab-pane fade <?= ($id_tab == '7') ? 'show active' : '' ?>" id="news" role="tabpanel" aria-labelledby="list-settings-list">
                                 <div class=" card card-body">
                                    <h4>News</h4><br>
                                    <?= $this->session->flashdata('pesan7'); ?>
                                    <form method="POST" action="<?php echo base_url('Home/berita_update') ?>">
                                    <textarea name="berita" id="editor2"><?php echo $berita ?></textarea>
                                    <button type="submit" class="btn btn-outline-success mt-2 pull-right">Update</button>
                                    </form>
                                    </div>   
                                </div>

                                <div class="tab-pane fade <?= ($id_tab == '8') ? 'show active' : '' ?>" id="disc" role="tabpanel" aria-labelledby="list-settings-list">
                                     <div class="card card-body">
                                <h4>Disclaimer</h4><br>
                                <?= $this->session->flashdata('pesan8'); ?>
                                <form method="POST" action="<?php echo base_url('Home/disclaimer_update') ?>">
                                <textarea name="disclaimer" id="editor3"><?php echo $disclaimer ?></textarea>
                                <button type="submit" class="btn btn-outline-success mt-2 pull-right">Update</button>
                                </form>
                                </div>
                                </div>

                                </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add FAQ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('home/faq_add') ?>" method="POST" role="form">
                    <div class="form-group">
                        <input type="text"  name="faq_judul" class="form-control" placeholder="FAQ title">
                    </div>
                    <div class="form-group">
                        <textarea name="faq_content"  class="form-control" rows="3" required="required" placeholder="FAQ content"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>