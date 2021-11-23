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
		<h2 class=" pull-left hk-pg-title font-weight-600 mt-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Edit Home</h2>
	</div>
	
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
        	<div class="col-md-6 col-lg-6">
        		<div class=" card card-body">
        			<h4>Background</h4><br>
        			<form action="<?php echo base_url('Home_en/jumbotron_edit_proses')?>" method="POST" enctype="multipart/form-data">
        				<?= $this->session->flashdata('pesan'); ?>
                        <textarea class="form-control mb-2" name="title" rows="5"><?php echo $title_jumbotron ?></textarea>
        				<input type="file" class="dropify" id="input-file-now" name="gb_jumbotron"  data-default-file="<?= base_url() ?>assets_frontend/images/bg/<?php echo $gb_jumbotron ;?>">
        				<button type="submit" class="btn btn-outline-success pull-right mt-2">Update</button>
        			</form>
        		</div>
        	</div>
        	<div class="col-md-6 col-lg-6">
        		<div class=" card card-body">
        			<h4>Promotion Image</h4><br>
        			<form action="<?php echo base_url('Home_en/inv_gb_edit_proses')?>" method="POST" enctype="multipart/form-data">
        				<?= $this->session->flashdata('pesan1'); ?>
        				<input type="file" class="dropify" id="input-file-now" name="inv_gambar"  data-default-file="<?= base_url() ?>assets_frontend/images/all/<?php echo $inv_gambar ;?>">
        				<button type="submit" class="btn btn-outline-success pull-right mt-2">Update</button>
        			</form>
        		</div>
        	</div>
            <div class="col-lg-12 col-md-12 ">
                    <div class=" card card-body">
                    <h4>Promotion Content</h4><br>
                        <form action="<?php echo base_url('Home_en/inv_promo_update')?>" method="POST" >
                            <?= $this->session->flashdata('pesan5'); ?>
                            <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <textarea name="inv_title_promo" class="form-control" id="editor" rows="8"><?php echo $inv_title_promo ?>   
                                </textarea>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <input class="form-control bg-warning" type="text" name="inv_promo_title_cont1" 
                                value="<?php echo $inv_promo_title_cont1;?>">
                                <textarea name="inv_promo_cont1" class="rounded-0 form-control" rows="5"><?php echo trim($inv_promo_cont1) ?>
                                </textarea>
                                <input class="form-control mt-4 bg-warning" type="text" name="inv_promo_title_cont3" 
                                value="<?php echo $inv_promo_title_cont3;?>">
                                <textarea name="inv_promo_cont3" class="rounded-0 form-control" rows="5"><?php echo $inv_promo_cont3 ?>
                                </textarea>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <input class="form-control bg-warning" type="text" name="inv_promo_title_cont2" value="<?php echo $inv_promo_title_cont2;?>">
                                <textarea name="inv_promo_cont2" class="rounded-0 form-control" rows="5"><?php echo $inv_promo_cont2 ?>
                                </textarea>
                                <input class="form-control mt-4 bg-warning" type="text" name="inv_promo_title_cont4" 
                                value="<?php echo $inv_promo_title_cont4;?>">
                                <textarea name="inv_promo_cont4" class="rounded-0 form-control" rows="5"><?php echo $inv_promo_cont4 ?>  </textarea>
                            </div>
                            </div> 
                            <button type="submit" class="btn btn-outline-success pull-right mt-2">Update</button>
                        </form>
                </div>
            </div>
        		<div class="col-md-6 col-lg-6">   
        		<div class=" card card-body">
        			<h4>Project Data</h4><br>
        			<form method="POST" action="<?php echo base_url('Home_en/edit_data_project') ?>">
        				<?= $this->session->flashdata('pesan2'); ?>
        				<table>
        						<tr>
        							<td style="width:200px;">Finished Project</td>
        							<td style="width:10px;">:</td>
        							<td><input class="form-control mt-2" style="width: 100px;" type="number" name="proyek_selesai" value="<?php echo $inv_proyek_selesai ?>"></td>
        						</tr>
        						<tr>
        							<td>Total Client</td>
        							<td>:</td>
        							<td><input class="form-control mt-2" style="width: 100px;" type="number" name="client" value="<?php echo $inv_client ?>"></td>
        						</tr>
        						<tr>
        							<td>Ongoing Project</td>
        							<td>:</td>
        							<td><input class="form-control mt-2" style="width: 100px;" type="number" name="proyek_berjalan" value="<?php echo $inv_proyek_berjalan ?>"></td>
        						</tr>
        				</table>
        				<button type="submit" class="btn btn-outline-success pull-right mt-2">Update</button>
        			</form>
        		</div>
        	</div>
        	<div class="col-md-6 col-lg-6">
        		<div class=" card card-body">
        			<h4>Video</h4><br>
        			<?= $this->session->flashdata('pesan3'); ?>
        			<form method="POST" action="<?php echo base_url('Home_en/edit_video_proses') ?>">
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
            <div class="col-md-12 col-lg-12">
                <div class=" card card-body">
                    <h4>How Our System Works</h4><br>
                    <?php $no = 1 ; echo $this->session->flashdata('pesan4'); ?>
                    <a class="btn btn-primary mb-2" data-toggle="modal" href='#modal-id' style="width: 150px;">+ Tambah Data</a>
                    <table class="table table-hover" id="table_faq" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>FAQ Topic</th>
                                <th>FAQ Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($data_faq as $row ) {?>
                                <tr>
                                    <form action="<?php echo base_url('Home_en/faq_update') ?>" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <td><?php echo $no ?></td>
                                    <td><textarea  class="form-control" name="faq_judul"><?php echo $row->faq_judul;?></textarea></td>
                                    <td><textarea cols="30" rows="5" class="form-control" name="faq_content"><?php echo $row->faq_content;?></textarea></td>
                                    <td>
                                        <a href="<?php echo base_url("Home_en/faq_delete/$row->id")?>" onclick="return confirm('Are you sure you want to delete this item?');"class="btn  btn-outline-danger" data-toggle="tooltip" title="DELETE" ><i class="fa fa-times"></i></a>
                                        <button type="submit" class="btn btn-outline-success" data-toggle="tooltip" title="UPDATE"><i class="fa fa-check"></i></button>
                                       
                                    </td>
                                     </form>
                                </tr>
                                <?php $no++;} ?>
                            </tbody>
                        </table>
                </div>
            </div>
                
                <div class="col-md-6 col-lg-6">
                <div class=" card card-body">
                    <h4>Footer</h4><br>
                    <?= $this->session->flashdata('pesan6'); ?>
                    <form method="POST" action="<?php echo base_url('Home_en/footer_update') ?>">
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
                <div class="col-lg-6 col-md-6">
                    <div class=" card card-body">
                    <h4>News</h4><br>
                    <?= $this->session->flashdata('pesan7'); ?>
                    <form method="POST" action="<?php echo base_url('Home_en/berita_update') ?>">
                    <textarea name="berita" id="editor2"><?php echo $berita ?></textarea>
                    <button type="submit" class="btn btn-outline-success mt-2 pull-right">Update</button>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card card-body">
                    <h4>Disclaimer</h4><br>
                    <?= $this->session->flashdata('pesan8'); ?>
                    <form method="POST" action="<?php echo base_url('Home_en/disclaimer_update') ?>">
                    <textarea name="disclaimer" id="editor3"><?php echo $disclaimer ?></textarea>
                    <button type="submit" class="btn btn-outline-success mt-2 pull-right">Update</button>
                    </form>
                    </div>
                </div>       
		</div>		
	</div>
</div>

<div class="modal fade" id="modal-id">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                     <h4 class="modal-title">Tambah FAQ</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url('Home_en/faq_add') ?>" method="POST" role="form">
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

   



			