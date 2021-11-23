           <section class="content">
            <section class="block">
                <div class="container">
                    <!--============ Section Title===================================================================-->
                    <div class="section-title clearfix">
                        <a class="btn-info btn-lg float-right mb-2" href="<?php echo base_url('frontend/Prospektus') ?>" style="font-size:13pt;font-family: sans-serif;" role="button"><i class="fa fa-angle-left"  aria-hidden="true"></i> &nbsp&nbsp<?php echo lang('back') ?></a>
                        <div class="float-left float-xs-none">
                            <label class="mr-3 align-text-bottom"><?php echo lang('sort_by') ?>: </label>
                            <select name="sorting" id="sorting" class="small width-200px" data-placeholder="Default Sorting" >
                                <option value="">Default Sorting</option>
                                <option value="1">Newest First</option>
                                <option value="2">Oldest First</option>
                                <option value="3">Lowest Price First</option>
                                <option value="4">Highest Price First</option>
                            </select>
                        </div>
                        <!-- <div class="float-right d-xs-none thumbnail-toggle">
                            <a href="#" class="change-class active" data-change-from-class="list" data-change-to-class="grid" data-parent-class="items">
                                <i class="fa fa-th"></i>
                            </a>
                        </div> -->
                    </div>
                    <div class="container mb-5">
                        
                    </div>

                    <!--============ Items ==========================================================================-->
                    <div class="items grid grid-xl-3-items grid-lg-3-items grid-md-3-items">
                        <?php foreach ($data_pros as $row ) { ;
                        $foto = base64_decode($row['file_foto']); 
                        $date = date("d-m-Y", strtotime($row['add_time']));
                        if ($row['jumlah_lot'] == 0) {$lot ="1";}else {$lot = $row['jumlah_lot'];}
                        $minimum = $row['harga'] / $lot ?>
                        <div class="item">
                            <div class="ribbon-featured" <?php if($row['jumlah_lot'] > 0){echo "hidden";} ?>><?php echo lang('sold_out') ?></div>
                            <!--end ribbon-->
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="#" class="tag category">Home</a>
                                        <a href="penawaran-detail.html" class="title"><?php echo $row['nama_kawasan'] ?></a>
                                        <span class="tag"><?php echo lang('offer') ?></span>
                                    </h3>
                                    <a href="#" class="image-wrapper background-image">
                                        <img src="<?php echo base_url()?>assets/gambar/<?php echo $foto ?>" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#"><?php echo $row['alamat'] ?></a>
                                </h4>
                                <div class="price">Rp.<?php echo number_format($row['harga']) ?></div>
                                <div class="meta">
                                    <figure>
                                        <i class="fa fa-calendar-o"></i><?php echo $date ?>
                                    </figure>
                                    <figure>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="description" style="">
                                   
                                        <table class="table table-hover" style="width: 100%;">
                                                <tr>
                                                    <td><?php echo lang('investor_target') ?></td>
                                                    <td>10%</td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('unit_type') ?></td>
                                                    <td><?php echo $row['nama_unit'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('investment_period') ?></td>
                                                    <td><?php echo $row['periode_investasi'] ?> Tahun</td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('min_invest') ?></td>
                                                    <td>Rp.<?php echo number_format($minimum)?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo lang('total_lot') ?></td>
                                                    <td><?php echo $row['jumlah_lot'] ?></td>
                                                </tr>
                                        </table>

                                    </div>
                                <!--end description-->
                                    <div class="container" style="margin-top: 5px;height:30px; ">
                                <a data-toggle="modal" href='#modal-id' class="btn btn-success pull-right <?php if($row['jumlah_lot'] < 1){echo "disabled";} ?>" style="color:#ffffff;"  ><i class="fa fa-check"></i> <?php echo lang('invest') ?></a>   
                                <a  href="<?php echo base_url("frontend/Prospektus/detail_prospektus/".$row['id_prospektus']) ?>" class="btn btn-warning pull-right mr-2 <?php if($row['jumlah_lot'] < 1){echo "disabled";} ?>" style="color:#ffffff;"  ><i class="fa fa-info-circle"></i> Detail</a> 
                                </div>
                            </div>

                        </div>
                        <?php } ?>
                        <!--end item-->
                    </div>
                    
                    <!--============ End Items ======================================================================-->
                    <div class="page-pagination">
                        <nav aria-label="Pagination">
                            <?php echo $pagination ?>
                        </nav>
                    </div>
                    <!--end page-pagination-->
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->
  <!-- modal investasi -->

 <div class="modal fade " id="modal-id" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('invest') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="#" >
        <div class="row">
            <div class="col-md-6 col-lg-6">
        </div>
        <div class="col-md-6 col-lg-6">
        </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><i class="fa fa-check"></i> <?php echo lang('invest') ?></button>
      </div>
    </div>
  </div>
</div>
  <!-- end modal -->          