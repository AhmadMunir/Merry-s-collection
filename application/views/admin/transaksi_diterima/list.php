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
        <form method="post" action="<?php echo base_url('admin/transaksi_diterima'); ?>">
        <!-- DataTables -->
        <br>
        <br>
        <br><br>
         <div class="col-lg-12 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:3px;">
        <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
        <div class="card mb-3">
          <h3>Pilih Bulan</h3>
          <br>
          <div class="card-header">
            <select class="form-control" id="bulan" name="bulan" required="required">Pilih Bulan
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
            <br>
            <select class="form-control" id="tahun" name="tahun" required="required">Pilih Tahun
              <?php foreach ($transaksi as $key) {
              ?>
              <option value="<?php echo $key->tgl ?>"><?php echo $key->tgl ?></option>
              <?php } ?>
            </select>
            <br>
            <button class="btn btn-primary">FILTER</button>           
      </form>
          </div>
        </div>
      </div>

          <br><br><br><br>
         
        <div class="admin-content analysis-progrebar-ctn res-mg-t-120">
          <div class="card-body">
            <div class="datatable-dashv1-list custom-datatable-overright">
             <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" width="100%" cellspacing="0">
                <thead align="center">
                  <tr>
                    <th>ID USER</th>  
                    <th>NAMA PELANGGAN</th>                                      
                    <th>TOTAL BELANJA</th>
                    <th>TANGGAL</th>
                    <th>ALAMAT PENGIRIMAN</th>
                    <th>STATUS</th>
                    <th>ID Transaksi</th> 
                    <th>OPSI</th>
                    
                  </tr>
                </thead>
                <tbody>
                 
                  <?php foreach ($transaksi_diterima as $key): ?>
                  <tr>
                    <td>
                      <?php echo $key->id_user ?>
                    </td>
                    <td>
                      <?php echo $key->nama_user ?>
                    </td>
                                     
                     <td>
                      <?php echo $key->total ?>
                    </td>
                    <td>
                      <?php echo $key->tanggal ?>
                    </td>
                    
                    <td>
                      <?php echo $key->alamat_pengiriman ?>
                    </td>
                   
                    <td>
                      <?php echo $key->status ?>
                    </td>
                    <td>
                      <?php echo $key->id_transaksi ?>
                    </td>
                    <td>
                      <a href="<?php echo site_url('admin/transaksi_diterima/edit/'.$key->id_transaksi)?>" class="btn btn-info">Edit</a>
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
