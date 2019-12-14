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

                          <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Barang</th>
                                  <th>Nama Kategori</th>
                                  <th>Harga</th>
                                  <th>Deskripsi</th>
                                  <th>Ukuran</th>
                                  <th>Gambar</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1?>
                                <?php foreach ($tabel_barang as $barang): ?>
                                  <tr>
                                    <td width="10">
                                      <?php echo $i++?>
                                    </td>
                                    <td width="150">
                                      <?php echo $barang->nama_barang ?>
                                    </td>
                                    <td width="150">
                                      <?php echo $barang->id_kategori; ?>
                                    </td>
                                    <!-- <td width="150">
                                      <img src="<?php echo base_url('img/barang/'.$barang->gambar) ?>" style="width: 70px;height: 70px;" />
                                    </td> -->
                                    <td width="150">
                                      <?php echo $barang->harga ?>
                                    </td>
                                    <!-- <td width="150">
                                      <?php echo $barang->stok ?>
                                    </td> -->
                                    <td width="150">
                                      <?php echo $barang->deskripsi ?>
                                    </td>
                                    <td>
                                      <a href="<?php echo site_url('admin/barang/edit/'.$barang->id_barang)?>" class="btn btn-danger">Lihat</a>
                                    </td>
                                    <td>
                                      <a href="<?php echo site_url('admin/barang/edit/'.$barang->id_barang)?>" class="btn btn-warning">Lihat</a>
                                    </td>

                                    <td width="150">
                                    <a href="<?php echo site_url('admin/barang/edit/'.$barang->id_barang)?>" class="btn btn-info">Edit</a>
                                    <a onclick="deleteConfirm('<?php echo site_url('admin/barang/delete/'.$barang->id_barang)?>')"
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
