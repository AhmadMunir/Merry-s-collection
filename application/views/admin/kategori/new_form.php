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

              <?php if
              ($this->session->flashdata('success')): ?>
              <div class="alert alert-success" role="alert">
                <?php echo 
                $this->session->flashdata('success'); ?>
              </div>
            <?php endif;?>
            
              <br>
                  <br>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">

                      
                        
                        
                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
           
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      
                      <form action="<?php base_url('admin/kategori/add') ?>" method="post" enctype="multipart/form-data">
                        <br>
                                                   
                            <div class="form-group">
                              <label for="nama_kategori">Masukkan Kategori</label>

                              <input class="form-control <?php echo form_error('nama_kategori') ? 'is-invalid':'' ?>" type="text" name="nama_kategori" placeholder="Nama kategori" />
                              <div class="invalid-feedback">
                                <?php echo form_error('nama_kategori')?>
                              </div>
                            </div>
                            <input class="btn btn-success" type="submit" name="btn"value="Simpan">
                            <a href="<?php echo site_url('admin/kategori') ?>" class="btn btn-primary">Back</a>
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
