           <section class="content">
            <section class="block">
                <div class="container">
                    <!--============ Section Title===================================================================-->
                    <div class="section-title clearfix" style="margin-top:-45px;">
                        <div class="float-left float-xs-none">
                            <h2><i class="fa fa-th-large"></i> <?php echo lang('investment_catalog') ?></h2>
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
                    <!--============ Items ==========================================================================-->
                    
                     
                    <div class="items grid grid-xl-3-items grid-lg-3-items grid-md-3-items">
                        <?php foreach ($data_blok as $row ) { ;
                        $foto = base64_decode($row->gambar); 
                        $date = date("d-m-Y", strtotime($row->add_time));
                        ?>
                        <div class="item" style="height: 350px;">
                            <!-- <div class="ribbon-featured" <?php if($row->jumlah_lot > 0){echo "hidden";} ?>>Sold Out</div> -->
                            <!--end ribbon-->
                            <div class="wrapper">
                               <div class="image">
                                    <h3>
                                        <a href="#" class="tag category"><?php echo lang('block') ?> <?php echo $row->nama_blok ?></a>
                                        <a href="#" class="title"><?php echo $row->nama_kawasan ?></a>
                                        <span class="tag"><?php echo lang('offer') ?></span>
                                    </h3>
                                    <a href="<?php echo base_url("frontend/Prospektus/unit/$row->id_blok") ?>" class="image-wrapper background-image">
                                        <img src="<?php echo base_url()?>assets/gambar/<?php echo $foto ?>" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#"><?php echo $row->alamat ?></a>
                                </h4>
                                <!-- <div class="price">Rp.<?php echo number_format($row->harga) ?></div> -->
                                <div class="meta">
                                    <figure>
                                        <i class="fa fa-calendar-o"></i><?php echo $date ?>
                                    </figure>
                                    <figure>
                                         <i class="fa fa-home"></i><?php echo $row->jumlah_unit ?> unit
                                    </figure>
                                </div>
                                <!--end meta-->
                                <!--end description-->
                                <div class="container" style="margin-top: 5px;height:30px; ">
                                <a href="<?php echo base_url("frontend/Prospektus/unit/$row->id_blok") ?>" class="btn btn-warning pull-right" style="color:#ffffff;"  >Detail</a>    
                                </div>
                            </div>
                        </div>
                        
                        <!--end item-->

                    <?php } ?>
                </div>
                    <!--============ End Items ================-->
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
  