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

<<<<<<< HEAD



=======
                        
>>>>>>> cb520c0645f059611215c0d06f444bb77141b597
                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">

                          <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Tabel <span class="table-project-n">Data</span> Pelanggan</h1>
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
                                  <th>Nama Anggota</th>
                                  <th>Email</th>
                                  <th>Status Email</th>
                                  <th>No Telepon</th>
                                  <th>Riwayat Transaksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1 ?>
                                <?php foreach ($tabel_user as $user): ?>

                                  <tr>
                                    <td width="5">
                                      <?php echo $i++?>
                                    </td>
                                    <td width="150">
                                      <?php echo $user->nama_user ?>
                                    </td>
                                    <td width="150">
                                      <?php echo $user->email ?>
                                    </td>
                                    <td>
                                      <?php echo $user->status_email ?>
                                    </td>
                                    <td width="150">
                                      <?php echo $user->no_telp ?>
                                    </td>
                                    <td width="50">
                                    <a href="<?php echo site_url('admin/pelanggan/pelanggan/'.$user->id_user)?>" class="btn btn-success">Lihat</a>
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
