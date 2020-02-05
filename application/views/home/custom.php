<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php $this->load->view('home/partial/head') ?>
                <?php $this->load->view('home/partial/jquery') ?>
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
            <!-- Start Shop Full Grid View -->
            <div class="product-details-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="single-product-image">
                                <div id="product-img-content">
                                    <h3>Your Custom</h3>
                                      <div class="wishlist-table table-responsive p-30 text-uppercase">
                                          <table id="mytable">
                                              <thead>
                                                  <tr>
                                                      <!-- <th class="product-thumbnail"></th> -->
                                                      <th class="product-name"><span class="nobr"><center>Product</center></span></th>
                                                      <th class="product-prices"><span class="nobr"> Total</span></th>
                                                      <th class="product-stock-stauts"><span class="nobr"> Created </span></th>
                                                      <th class="product-remove"><span class="nobr">Remove</span></th>
                                                  </tr>
                                              </thead>
                                              <tbody class="show_cartcustom">
                                              </tbody>
                                          </table>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <?php $this->load->view('chat/chat') ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Of Shop Full Grid View -->

        </section>
        <!-- End page content -->
        <!-- Start footer area -->
        <?php $this->load->view('home/partial/footer2') ?>
        <?php $this->load->view('home/partial/jscustom') ?>

        <!-- End footer area -->
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed js at the end of the document so the pages load faster -->


</body>

</html>
