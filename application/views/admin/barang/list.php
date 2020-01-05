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
            <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                  <br>  
                  <br>  
                  <br>  
                  <br>
                  <div class="col-lg-12 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:3px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
                          <a href="<?php echo site_url('admin/barang/add') ?>" class="btn btn-warning"> Add New </a>
                        </div>
                        </div>
                        <br>  
                        <br>  
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
                                      <a href="<?php echo site_url('admin/barang/'.$barang->id_barang)?>" class="btn btn-danger">Lihat</a>
                                    </td>
                                    <td>
                                      <a href="<?php echo site_url('admin/gambar/'.$barang->id_barang)?>" class="btn btn-warning">Lihat</a>
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
