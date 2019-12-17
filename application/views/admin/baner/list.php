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
                          
                          <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
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
