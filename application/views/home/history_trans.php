<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <?php $this->load->view('home/partial/head') ?>
  <a href="product-details.html">
      <style>
      .imga{
        object-fit: none;
        object-position: center;

        width: 270px;
        height: 330px;
      }

      .imgb{
        object-fit: none;
        object-position: center;

        width: 1346px;
        height: 510px;
      }
      .product-thumbnail{
        object-fit: contain;
        object-position: center;

        width: 125px;
        height: 125x;
      }
      </style>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">

        <!-- Start of header area -->
        <?php $this->load->view('home/partial/header') ?>
        <!-- End of header area -->
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start Wishlist Area -->
            <div class="wishlist-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                          <!-- Static Table Start -->
                          <div class="data-table-area mg-tb-15">
                              <div class="container-fluid">
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="sparkline13-list">
                                              <div class="sparkline13-hd">
                                                  <div class="main-sparkline13-hd">
                                                      <h1>Your <span class="table-project-n">History</span> Transaction</h1>
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
                                                                  <th data-field="state" data-checkbox="true"></th>
                                                                  <th data-field="id">No</th>
                                                                  <th data-field="id_transaksi" data-editable="true">ID Transaction</th>
                                                                  <th data-field="tgl" data-editable="true">DATE</th>
                                                                  <th data-field="address" data-editable="true">Ship to</th>
                                                                  <th data-field="total" data-editable="true">total</th>
                                                                  <th data-field="resi" data-editable="true">resi</th>
                                                                  <th data-field="Details" data-editable="true">Detail</th>
                                                                  <!-- <th data-field="email" data-editable="true">Total Sales</th>
                                                                  <th data-field="action">Action</th> -->
                                                              </tr>
                                                          </thead>
                                                          <tbody id="show_transs">
                                                            <?php $i = 1;  foreach ($trans as $key) {?>
                                                              <tr>
                                                                           <td></td>
                                                                            <td><?php echo $i++; ?></td>
                                                                           <td> <?php echo $key->id_transaksi; ?> </td>
                                                                           <td><?php echo $key->tanggal; ?> </td>
                                                                            <td> <?php echo $key->alamat_pengiriman; ?></td>
                                                                            <td> <?php echo $key->total; ?></td>
                                                                            <td> <?php echo $key->resi; ?></td>
                                                                             <td><a href="javascript:detail('<?php echo $key->id_transaksi; ?>')"<button class="btn btn-primary" id="detail">Detail</button></td>+
                                                                            </tr>
                                                          <?php  } ?>

                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Static Table End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Wishlist Area -->
            <!-- Start Newsletter Area -->
            <div class="newsletter-area">
                <div class="container">
                    <div class="row">
                        <div class="newsletter-content default-bg clearfix ptb-40">
                            <div class="col-md-offset-2 col-md-3 col-sm-5">
                                <div class="newsletter-title text-white text-uppercase">
                                    <h4>NewsLetter Sign-Up</h4>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-7">
                                <div class="signup-form">
                                    <form class="news-form" action="#">
                                        <input type="text" placeholder="Enter your email address..." class="f-form">
                                        <button class="submit text-uppercase">subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Newsletter Area -->
        </section>
        <!-- End page content -->
        <!-- Start footer area -->
        <?php $this->load->view('home/partial/footer2') ?>
        <!-- End footer area -->
    </div>
    <!-- Body main wrapper end -->

    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-info">
                Are you sure to delete this item ?
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id_detail_temp_transaksi" class="id_detail_temp_transaksi">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary btn-delete">Yes</button>
        </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="Modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-info">
                <div id="detail_trans">
                  <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="false" data-cookie="false"
                      data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="false" data-toolbar="#toolbar">
                      <thead>
                          <tr>
                              <!-- <th data-field="state" data-checkbox="false"></th> -->
                              <th data-field="id">No</th>
                              <th data-field="Item" data-editable="true">Item</th>
                              <th data-field="qty" data-editable="true">QTY</th>
                              <th data-field="tax" data-editable="true">TAX</th>
                              <th data-field="subtotal" data-editable="true">Subtotal</th>
                              <!-- <th data-field="email" data-editable="true">Total Sales</th>
                              <th data-field="action">Action</th> -->
                          </tr>
                      </thead>
                      <tbody id="show_dtrans">

                      </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">

        </div>
        </div>
    </div>
    </div>


    <!-- jquery latest version -->
    <?php $this->load->view('home/partial/jquery') ?>
    <script src="<?php echo base_url();?>js/general/data-table/bootstrap-table.js"></script>
    <script src="<?php echo base_url();?>js/general/data-table/tableExport.js"></script>
    <script src="<?php echo base_url();?>js/general/data-table/data-table-active.js"></script>
    <script src="<?php echo base_url();?>js/general/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo base_url();?>js/general/data-table/colResizable-1.5.source.js"></script>
    <script src="<?php echo base_url();?>js/general/data-table/bootstrap-table-export.js"></script>
    <script>
        $(document).ready(function(){
          // $.ajax({
          //     url   : '<?php //echo site_url("user/transaksi/get_transaksi");?>',
          //     type  : 'GET',
          //     async : true,
          //     dataType : 'json',
          //     success : function(data){
          //         var html = '';
          //         var count = 1;
          //         var i;
          //
          //         for(i=0; i<data.length; i++){
          //             html += '<tr>'+
          //                 '<td></td>'+
          //                 '<td>'+ count++ +'</td>'+
          //                 '<td>'+ data[i].id_transaksi +'</td>'+
          //                 '<td>'+ data[i].tanggal +'</td>'+
          //                 '<td>'+ data[i].alamat +'</td>'+
          //                 '<td>'+ data[i].total +'</td>'+
          //                 '<td>detail</td>'+
          //                 '</tr>';
          //         }
          //         $('#show_transs').html(html);
          //     }
          //
          // });
            // CALL FUNCTION SHOW
            // show_trans();
            //
            // // FUNCTION SHOW PRODUCT
            // function show_trans(){
            //
            // }

          });
        function detail(id){
          var html = '';
          var count =1;
          $.ajax({
            type  : 'POST',
            url : '<?php echo site_url("user/transaksi/get_detail")?>',
            dataType  : 'json',
            data  : {id : id},
            success : function(data){
              for (var i = 0; i < data.length; i++) {
                html += '<tr><td>'+count++ +'</td>'+
                        '<td>'+data[i].nama_barang +'</td>'+
                        '<td>'+data[i].qty +'</td>'+
                        '<td>'+data[i].tax +'</td>'+
                        '<td>'+data[i].subtotal +'</td>'+
                        '<tr>';
              }

              $('#show_dtrans').html(html);
            }
          });
          $('#Modaldetail').modal('show');
        }

    </script>
<!-- /opt/lampp/htdocs/merrys/js/general/data-table -->

</body>

</html>
