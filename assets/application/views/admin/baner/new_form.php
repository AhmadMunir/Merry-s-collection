<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('admin/partial/head') ?>
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
                      
                      <form action="<?php base_url('admin/baner/add') ?>" method="post" enctype="multipart/form-data">
                                       
                            <div class="form-group">
                              <label for="nama_baner">Nama baner</label>

                              <input class="form-control <?php echo form_error('nama_baner') ? 'is-invalid':'' ?>" type="text" name="nama_baner" placeholder="Nama baner" />
                              <div class="invalid-feedback">
                                <?php echo form_error('nama_baner')?>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="baner">Baner (1920 x 700)</label>

                              
                              <input class="form-control <?php echo form_error('baner') ? 'is-invalid':'' ?>" type="file" name="baner">
                              <div class="invalid-feedback">
                                <?php echo form_error('banner')?>
                              </div>
                             <div class="form-group">
                              <label for="tulisan_sedang">Tulisan Sedang</label>

                              <input class="form-control <?php echo form_error('tulisan_sedang') ? 'is-invalid':'' ?>" type="text" name="tulisan_sedang" placeholder="tulisan_sedang" />
                              <div class="invalid-feedback">
                                <?php echo form_error('tulisan_sedang')?>
                              </div>

                             <div class="form-group">
                              <label for="tulisan_kecil">Tulisan Kecil</label>

                              <input class="form-control <?php echo form_error('tulisan_kecil') ? 'is-invalid':'' ?>" type="text" name="tulisan_kecil" placeholder="tulisan_kecil" />
                              <div class="invalid-feedback">
                                <?php echo form_error('tulisan_kecil')?>
                              </div>
                              <br>

                            <input class="btn btn-success" type="submit" name="btn"value="Simpan">
                            <a href="<?php echo site_url('admin/baner') ?>" class="btn btn-primary">Back</a>
                          </form>
                          
                          
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
