<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('admin/partial/head') ?>
</head>

<body id="page-top">
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
                <div class="row">
                 <br>
                 <br>
                 <br>
                 <br>
                          <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:3px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
                          <a href="<?php echo site_url('admin/barang/add') ?>" class="btn btn-warning"> Add New </a>
                        </div>
                        </div>
                  <br>
                 <br>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">

                      
                        
                        
                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
                          
                          <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Tabel <span class="table-project-n">Barang</span> Hampir Habis</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Barang</th>
                                  <th>Size</th>
                                  <th>Jumlah Stok</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1 ?>
                                <?php foreach ($view_user as $u): ?>
                                  <tr>
                                    <td width="5">
                                      <?php echo $i++?>
                                    </td>
                                    <td width="150">
                                      <?php echo $u->nama_barang ?>
                                    </td>
                                    <td width="150">
                                      <?php echo $u->size ?>
                                    </td>
                                    <td>
                                      <?php echo $u->jumlah_stok ?>
                                    </td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
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
        <?php $this->load->view('admin/partial/modal') ?>
     <?php $this->load->view('admin/partial/jquery') ?>
</body>

</html>
