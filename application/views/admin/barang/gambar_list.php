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
                            <input type="hidden" name="id" value="<?php echo $tabel_gambar->id_barang?>"/>

                          <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  
                                  <th>Gambar 1</th>
                                  <th>Gambar 2</th>
                                  <th>Gambar 3</th>
                                  <th>Gambar 4</th>
                                  <th>Gambar 5</th>
                                  <th>Tindakan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $tabel_gambar ?>
                                  <tr>
                                    <td width="10">
                                      <?php echo $i++?>
                                    </td>
                                    
                                     <td width="150">
                                      <img src="<?php echo base_url('img/barang/'.$gambar->gambar) ?>" style="width: 70px;height: 70px;" />
                                    </td> 
                                    <td width="150">
                                      <img src="<?php echo base_url('img/barang/'.$gambar->gambar2) ?>" style="width: 70px;height: 70px;" />
                                    </td> 
                                    <td width="150">
                                      <img src="<?php echo base_url('img/barang/'.$gambar->gambar3) ?>" style="width: 70px;height: 70px;" />
                                    </td> 
                                    <td width="150">
                                      <img src="<?php echo base_url('img/barang/'.$gambar->gambar4) ?>" style="width: 70px;height: 70px;" />
                                    </td> 
                                    <td width="150">
                                      <img src="<?php echo base_url('img/barang/'.$gambar->gambar5) ?>" style="width: 70px;height: 70px;" />
                                    </td> 
                                    
                                    <td width="200">
                                    <a href="<?php echo site_url('admin/gambar/edit/'.$gambar->id_gambar)?>" class="btn btn-info">Edit</a>
                                 
                                    <a onclick="deleteConfirm('<?php echo site_url('admin/gambar/delete/'.$gambar->id_gambar)?>')"
                                    href="#!" class="btn btn-primary">Hapus</a>
                                    </td>
                                  </tr>
                                
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
