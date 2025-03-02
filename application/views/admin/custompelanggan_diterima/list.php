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
        <form method="post" action="<?php echo base_url('admin/custompelanggan_diterima'); ?>">
        <!-- DataTables -->
        <br>
        <br>
        <div class="card mb-3">
          <div class="card-header">
            <select id="bulan" name="bulan" required="required">Pilih Bulan
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
            <select id="tahun" name="tahun" required="required">Pilih Tahun
              <?php foreach ($custom as $key) {
              ?>
              <option value="<?php echo $key->tgl ?>"><?php echo $key->tgl ?></option>
              <?php } ?>              
              
            </select>
            <button>FILTER</button>           
      </form>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID Custom</th> 
                    <th>ID USER</th>
                    <th>NAMA USER</th>
                    <th>TANGGAL</th>
                    <th>ALAMAT PENGIRIMAN</th>
                    <th>RESI</th>
                    <th>STATUS</th>
                    <th>OPSI</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($custompelanggan_diterima as $key): ?>
                  <tr>
                    <td>
                      <?php echo $key->id_custom ?>
                    </td>
                    <td>
                      <?php echo $key->id_user ?>
                    </td>
                    <td>
                      <?php echo $key->nama_user ?>
                    </td>
                    <td>
                      <?php echo $key->tanggal ?>
                    </td>
                    <td>
                      <?php echo $key->alamat_pengiriman ?>
                    </td>
                    <td>
                      <?php echo $key->resi ?>
                    </td>
                    <td>
                      <?php echo $key->status ?>
                    </td>
                    <td>
                      <a href="<?php echo site_url('admin/custompelanggan_diterima/edit/'.$key->id_custom)?>" class="btn btn-info">Edit</a>
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
