<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('admin/partial/head') ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php $this->load->view('admin/partial/sidebar') ?>

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php $this->load->view('admin/partial/header') ?>

        <div class="content">
            

                <div class="row">
                  <br>
                  <br>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" style="margin-bottom:1px;">

                          <br>
                          <br>
                          <div class="admin-content analysis-progrebar-ctn res-mg-t-100">
    
                      <form action="<?php base_url('admin/custompelanggan_diterima/edit') ?>" method="post" enctype="multipart/form-data">
                        <br>
                            <input type="hidden" name="id_custom" value="<?php echo $tabel_custom->id_custom?>"/>
                            <div class="invalid-feedback">
                                <?php echo form_error('id_custom')?>
                              </div>

                             <div class="form-group">
                              <label for="status">Pilih STATUS</label>
                              <select class="form-control <?php form_error('status')? 'is-invalid':'' ?>"
                                name="status">

                                  <option class="form-control" value='' selected="">
                                  ----------Pilih Status----------</option>
                                 <option value="dikirim">DIKIRIM</option>
                                 <option value="dikirim">DIBUAT</option>
                                </select>
                            </div>

                            
                            </div>

                            <input class="btn btn-success" type="submit" name="btn"value="Simpan">
                             <a href="<?php echo site_url('admin/custompelanggan_diterima') ?>" class="btn btn-primary">Back</a>
                          </form>
                          <table id="trueid">
                            <thead>
                              <tr>
                              
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              
                                
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
     <?php $this->load->view('admin/partial/jquery') ?>
     <script type="text/javascript">
       
     $(document).ready( function () {
    $('#trueid').DataTable();
} );
     </script>
</body>

</html>
