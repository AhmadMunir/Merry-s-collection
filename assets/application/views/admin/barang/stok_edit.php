<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('admin/partial/head') ?>
   <script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php $this->load->view('admin/partial/sidebar') ?>

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php $this->load->view('admin/partial/header') ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <br>
                 <br>
                 <br>
                 <br>
                          <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:3px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
                          <h4>Edit Stok</h4>
                        </div>
                        </div>
                <br>
                <br>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">

                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">

                      <form action="<?php base_url('admin/stok/edit') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $tabel_detail_stok->id_detail_stok?>"/>
                            
                              <input class="form-control <?php echo form_error('id_barang') ? 'is-invalid':'' ?>"  name="id_barang" value="<?php echo $tabel_detail_stok->id_barang?>" type="hidden">
                              <div class="invalid-feedback">
                                <?php echo form_error('id_barang')?>
                              </div>

                                <br>
                                    <b>Ukuran ke 1 :</b>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <input class="col-md-12" type="text" name="size" required placeholder="Ukuran" value="<?php echo $tabel_detail_stok->size?>">
                                      </div>
                                      <div class="col-md-6">
                                        <input class="col-md-12" type="text" name="deskripsi_ukuran" required placeholder="Deskripsi Singkat" value="<?php echo $tabel_detail_stok->deskripsi_ukuran?>">
                                      </div>
                                      <div class="col-md-3">
                                        <input class="col-md-12" type="text" name="jumlah_stok" required placeholder="Jumlah Stok" value="<?php echo $tabel_detail_stok->jumlah_stok?>">
                                      </div>
                                    </div>
                                    <div id="insert-form"></div>
                                    <hr>
                                  
                                <input class="btn btn-success" type="submit" name="btn"value="Simpan">
                                <a href="<?php echo site_url('admin/barang') ?>" class="btn btn-primary">Back</a>
                              </form>
                              <input type="hidden" id="jumlah-form" value="1">
                      
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>


        </div>
    </div>

    <!-- jquery
        ============================================ -->
     <?php $this->load->view('admin/partial/jquery') ?>
             
               
</body>

</html>
