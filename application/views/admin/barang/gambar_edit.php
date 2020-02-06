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
                          <h4>Edit Gambar</h4>
                        </div>
                        </div>
                <br>
                <br>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">

                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">

                      <form action="<?php base_url('admin/gambar/add') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $tabel_gambar->id_gambar?>"/>
                            
                              <input class="form-control <?php echo form_error('id_barang') ? 'is-invalid':'' ?>"  name="id_barang" value="<?php echo $tabel_gambar->id_barang?>" type="hidden">
                              <div class="invalid-feedback">
                                <?php echo form_error('id_barang')?>
                              </div>
                             
                            <div class="form-group">
                              <label for="gambar">Gambar 1</label>
                              <input class="form-control <?php echo form_error('gambar') ? 'is-invalid':'' ?>"  name="gambar" type="file">
                              <input type="hidden" name="old_image" value="<?php echo $tabel_gambar->gambar ?>" />
                              <div class="invalid-feedback">
                                <?php echo form_error('gambar')?>
                              </div>
                             </div>

                             <div class="form-group">
                              <label for="gambar2">Gambar 2</label>
                              <input class="form-control <?php echo form_error('gambar2') ? 'is-invalid':'' ?>"  name="gambar2" type="file">
                             </div>
                               <input type="hidden" name="old_image2" value="<?php echo $tabel_gambar->gambar2 ?>" />
                             <div class="form-group">
                              <label for="gambar3">Gambar 3</label>                              
                              <input class="form-control <?php echo form_error('gambar3') ? 'is-invalid':'' ?>"  name="gambar3" type="file">
                             </div>
                               <input type="hidden" name="old_image3" value="<?php echo $tabel_gambar->gambar3 ?>" />
                             <div class="form-group">
                              <label for="gambar4">Gambar 4</label>

                              
                              <input class="form-control <?php echo form_error('gambar4') ? 'is-invalid':'' ?>"  name="gambar4" type="file">
                             </div>
                              <input type="hidden" name="old_image4" value="<?php echo $tabel_gambar->gambar4 ?>" />
                             <div class="form-group">
                              <label for="gambar5">Gambar 5</label>

                              
                              <input class="form-control <?php echo form_error('gambar5') ? 'is-invalid':'' ?>"  name="gambar5" type="file">
                             </div>
                              <input type="hidden" name="old_image5" value="<?php echo $tabel_gambar->gambar5 ?>" />
                                                   

                            
                            <input class="btn btn-success" type="submit" name="btn"value="Simpan">
                            <a href="<?php echo site_url('admin/gambar') ?>" class="btn btn-primary">Back</a>
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
