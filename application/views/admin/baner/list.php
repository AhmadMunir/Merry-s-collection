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
                          <a href="<?php echo site_url('admin/baner/add') ?>" class="btn btn-warning"> Add New </a>
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
                                    <h1>Products <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
                        <option value="">Export Basic</option>
                        <option value="all">Export All</option>
                        <option value="selected">Export Selected</option>
                      </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                  
                          <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tulisan Besar</th>
                                  <th>Baner</th>
                                  <th>Tulisan Sedang</th>
                                  <th>Tulisan Sedang</th>
                                  <th>Tindakan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1?>
                                <?php foreach ($tabel_baner as $baner): ?>
                                  <tr>
                                    <td width="10">
                                      <?php echo $i++?>
                                    </td>
                                    <td width="150">
                                      <?php echo $baner->nama_baner ?>
                                    </td>
                                    <td width="150">
                                      <img src="<?php echo base_url('img/banner/'.$baner->baner) ?>" style="width: 100px;height: 70px;" />
                                    </td>
                                    <td width="150">
                                      <?php echo $baner->tulisan_sedang ?>
                                    </td>
                                    <td width="150">
                                      <?php echo $baner->tulisan_kecil ?>                                     
                                    </td>

                                    <td width="150">
                                    <a href="<?php echo site_url('admin/baner/edit/'.$baner->id_baner)?>" class="btn btn-info">Edit</a>
                                    <a onclick="deleteConfirm('<?php echo site_url('admin/baner/delete/'.$baner->id_baner)?>')"
                                    href="#!" class="btn btn-primary">Hapus</a>      
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
     <script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href',url);
      $('#deleteModal').modal();
    }
    </script>
</body>

</html>
