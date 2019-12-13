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
            

                <div class="row">
                  <br>
                  <br>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">

                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
                          
                      
                      <form action="<?php base_url('admin/barang/edit') ?>" method="post" enctype="multipart/form-data">
                        <br>
                            <input type="hidden" name="id" value="<?php echo $tabel_barang->id_barang?>"/>

                            <div class="form-group">
                              <label for="nama_barang">Nama Barang</label>

                              <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>" type="text" name="nama_barang" value="<?php echo $tabel_barang->nama_barang?>" />
                              <div class="invalid-feedback">
                                <?php echo form_error('nama_barang')?>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="id_kategori">Nama Kategori</label>

                              <select class="form-control <?php form_error('nama_kategori')? 'is-invalid':'' ?>"
                                name="id_kategori" onchange="cek_kategori()" id="id_kategori">
                                  
                                  <option class="form-control" value='<?php echo $tabel_barang->id_kategori?>' selected=""><?php echo $tabel_barang->nama_kategori?>
                                  </option> 
                                  <?php
                                  foreach ($tabel_kategori as $kei) {?>
                                     <option class="form-control" value='<?php echo $kei->id_kategori ?>'><?php echo $kei->id_kategori?>
                                  </option>
                                 <?php }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="name">Gambar</label>
                              <input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid' :'' ?>" type="file" name="gambar" />
                              <input type="hidden" name="old_image" value="<?php echo $tabel_barang->gambar ?>"/>
                              <div class="invalid-feedback">
                                <?php echo form_error('gambar'); ?>
                              </div>
                            </div>
                             <div class="form-group">
                              <label for="nama_barang">Harga Barang</label>

                              <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>" type="number" name="harga" value="<?php echo $tabel_barang->harga?>" />
                              <div class="invalid-feedback">
                                <?php echo form_error('harga')?>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="nama_barang">Stok</label>

                              <input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>" type="number" name="stok" value="<?php echo $tabel_barang->stok?>" />
                              <div class="invalid-feedback">
                                <?php echo form_error('harga')?>
                              </div>
                            </div>
                            <input class="btn btn-success" type="submit" name="btn"value="Simpan">
                             <a href="<?php echo site_url('admin/barang') ?>" class="btn btn-primary">Back</a>
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
