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
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">

                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">

                      <form action="<?php base_url('admin/gambar/tambah') ?>" method="post" enctype="multipart/form-data">

                                  <?php
                                  foreach ($tabel_barang as $kei) {?>
                                     <input class="form-control"  name="id_barang" value='<?php echo $kei->id_barang?>'>

                                 <?php }
                                ?>
                                </select>

                            <div class="form-group">
                              <label for="gambar">Gambar</label>

                              
                              <input class="form-control <?php echo form_error('gambar') ? 'is-invalid':'' ?>" type="file" name="gambar">
                              <div class="invalid-feedback">
                                <?php echo form_error('gambar')?>
                              </div>
                             <div class="form-group">
                           

                            
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
