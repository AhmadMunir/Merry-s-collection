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
         <div class="row ">
                <br>
                 <br>
                 <br>
                 <br>        
         <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:3px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
                          <h3>Home </h3>
                          <p>Halaman Utama Admin Merry's Collection</p>
                        </div>
                        </div>


                 <br><br><br><br><br><br>                      
         <div class="col-lg-11" style="margin-bottom:20px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-12">
                          <h3>Menu Re-Stock</h3>
                          <div class="col-lg-3">
                              <div class="panel panel-danger">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-sort-numeric-desc fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Barang Hampir</div>
                                              <div>HABIS</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/barang">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-money fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Transaksi yang</div>
                                              <div>DITERIMA</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/transaksi_diterima">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="panel panel-success">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-money fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Transaksi yang</div>
                                              <div>DIKIRIM</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/transaksi_dikirim">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          <br><br><br><br><br><br>
                        </div>
                        </div>

         <br><br><br><br><br><br><br><br><br><br>                  
         <div class="col-lg-11" style="margin-bottom:20px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-12">
                          <h3>Menu Input</h3>
                          <div class="col-lg-3">
                              <div class="panel panel-info">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-pencil-square fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Input</div>
                                              <div>KATEGORI</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/kategori">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="panel panel-success">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-folder-open fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Input</div>
                                              <div>BARANG</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/barang">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="panel panel-danger">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-picture-o fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Input</div>
                                              <div>BANER</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/baner">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-file-image-o fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Input</div>
                                              <div>GALERI</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/baner">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          <br><br><br><br><br><br>
                        </div>
                        </div>

                        <br><br><br><br><br><br><br><br><br><br>
                        <div class="col-lg-11" style="margin-bottom:20px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-12">
                          <h3>Menu Laporan</h3>
                          <div class="col-lg-3">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-list-alt fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Laporan</div>
                                              <div>BULANAN</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/laporan">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          
                          <br><br><br><br><br><br>
                        </div>
                        </div>

                        <br><br><br><br><br><br><br><br><br><br>
                        <div class="col-lg-11" style="margin-bottom:20px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-12">
                          <h3>Menu Pelanggan</h3>
                          <div class="col-lg-3">
                              <div class="panel panel-danger">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-user fa-3x"></i>
                                          </div>
                                          <div class="col-lg-9 text-right">
                                              <div class="huge">Data</div>
                                              <div>PELANGGAN</div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="admin/pelanggan">
                                    <div class="panel-footer">
                                        <span class="pull-left">Buka Menu</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    </a>
                              </div>
                          </div>
                          
                          <br><br><br><br><br><br>
                        </div>
                        </div>


    <!-- jquery
        ============================================ -->
     <?php $this->load->view('admin/partial/jquery') ?>
</body>

</html>
