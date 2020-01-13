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
                          <a href="<?php echo site_url('admin/galeri/add') ?>" class="btn btn-warning"> Add New </a>
                        </div>
                        </div>
                  <br>
                 <br>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">




                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">

                          <div class="table-responsive">
                             <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Judul Galeri</th>
                                    <th>Gambar 1</th>
                                    <th>Gambar 2</th>
                                    <th>Gambar 3</th>
                                    <th>Gambar 4</th>
                                    <th>Gambar 5</th>
                                    <th>Tindakan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1?>
                                  <?php foreach ($tabel_galeri as $galeri): ?>
                                    <tr>
                                      <td width="10">
                                        <?php echo $i++?>
                                      </td>
                                      <td width="150">
                                        <?php echo $galeri->judul ?>
                                      </td>
                                       <td width="150">
                                        <img src="<?php echo base_url('img/galeri/'.$galeri->gambar) ?>" style="width: 70px;height: 70px;" />
                                      </td> 
                                      <td width="150">
                                        <img src="<?php echo base_url('img/galeri/'.$galeri->gambar2) ?>" style="width: 70px;height: 70px;" />
                                      </td> 
                                      <td width="150">
                                        <img src="<?php echo base_url('img/galeri/'.$galeri->gambar3) ?>" style="width: 70px;height: 70px;" />
                                      </td> 
                                      <td width="150">
                                        <img src="<?php echo base_url('img/galeri/'.$galeri->gambar4) ?>" style="width: 70px;height: 70px;" />
                                      </td> 
                                      <td width="150">
                                        <img src="<?php echo base_url('img/galeri/'.$galeri->gambar5) ?>" style="width: 70px;height: 70px;" />
                                      </td> 
                                      
                                      <td width="200">
                                      <a href="<?php echo site_url('admin/galeri/edit/'.$galeri->id_galeri)?>" class="btn btn-info">Edit</a>
                                   
                                      <a onclick="deleteConfirm('<?php echo site_url('admin/galeri/delete/'.$galeri->id_galeri)?>')"
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
