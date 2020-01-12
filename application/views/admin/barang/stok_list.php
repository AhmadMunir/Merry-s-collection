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
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">

                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
                           

                          <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No</th>                                
                                  <th>Size</th>
                                  <th>Deskripsi Ukuran</th>
                                  <th>Jumlah Stok</th>
                                  <th>Tindakan</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                <?php $i=1?>                                
                                <?php foreach ($tabel_detail_stok as $stok): ?>
                                <td width="5">
                                  <?php echo $i++?>
                                </td>
                                <td width="150">
                                  <?php echo $stok->size ?>
                                </td>
                                <td width="150">
                                  <?php echo $stok->deskripsi_ukuran ?>
                                </td>
                                <td width="150">
                                  <?php echo $stok->jumlah_stok ?>
                                </td>
                                <td width="150">
                                    <a href="<?php echo site_url('admin/stok/edit/'.$stok->id_detail_stok)?>" class="btn btn-info">Edit</a>
                                    <a onclick="deleteConfirm('<?php echo site_url('admin/stok/delete/'.$stok->id_detail_stok)?>')"
                                    href="#!" class="btn btn-primary">Hapus</a>
                                  </td>
                                  </tr>
                                <?php endforeach; ?> 
                              </tbody>
                            </table>
                             <a href="<?php echo site_url('admin/barang') ?>" class="btn btn-danger">Kembali Ke Menu</a>
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
