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
                      
                      <form action="<?php base_url('admin/barang/add') ?>" method="post" enctype="multipart/form-data">
                                       
                            <div class="form-group">
                              <label for="nama_barang">Masukkan Barang</label>

                              <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>" type="text" name="nama_barang" placeholder="Nama barang" />
                              <div class="invalid-feedback">
                                <?php echo form_error('nama_barang')?>
                              </div>

                              <label for="id_kategori">Pilih Kategori</label>
                              <select class="form-control <?php form_error('nama_kategori')? 'is-invalid':'' ?>"
                                name="id_kategori" onchange="cek_kategori()" id="id_kategori">
                                  
                                  <option class="form-control" value='' selected="">
                                  ----------Pilih Kategori----------</option> 
                                  <?php
                                  include "koneksi.php";
                                  $barang = mysqli_query($koneksi,"SELECT * FROM tabel_kategori");
                                  while ($row = mysqli_fetch_array($barang)) 
                                {
                                    echo "<option value = '$row[id_kategori]'>$row[nama_kategori]</option>";
                                }
                                ?>
                                </select>
                            </div>

                            <div class="form-group">
                              <label for="harga">Gambar</label>

                              
                              <input class="form-control <?php echo form_error('gambar') ? 'is-invalid':'' ?>" type="file" name="gambar">
                              <div class="invalid-feedback">
                                <?php echo form_error('gambar')?>
                              </div>
                             <div class="form-group">
                              <label for="harga">Harga</label>

                              <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>" type="number" name="harga" placeholder="Harga" />
                              <div class="invalid-feedback">
                                <?php echo form_error('harga')?>
                              </div>

                             <div class="form-group">
                              <label for="stok">Stok</label>

                              <input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>" type="number" name="stok" placeholder="stok" />
                              <div class="invalid-feedback">
                                <?php echo form_error('stok')?>
                              </div>
                              <br>

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
