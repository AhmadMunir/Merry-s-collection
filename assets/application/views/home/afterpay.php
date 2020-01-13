<?php // TODO: PANAH ke atas di pojok kanan atas?>
<!doctype html>
<html class="no-js" lang="zxx">
<!-- <button id="basicSuccess" class="btn btn-default">Default</button> -->

<head>
    <?php $this->load->view('home/partial/head') ?>
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
          <script type="text/javascript">
            var notif = '<?=$this->session->flashdata('success')?>';
            var ntf ='<?=$this->session->flashdata('ceke')?>';
            var url = '<?=base_url();?>'
          </script>
          <?php if ($this->session->flashdata('success')): ?>
            <!-- <script>
            $(document).ready(function () {
                      Lobibox.notify('success', {
                          msg: 'aaa'
                      });
                  });
            </script> -->
          <?php  endif; ?>
            <!-- Start Wishlist Area -->
            <div class="my-account-page section-padding">
              <div class="col-md-offset-5 col-centered">
                <span id="status_pembayaran">


                 </span>
              </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="procced-checkout">
                              <center>
                                <h4 class="procced-title text-uppercase pb-15 mb-20 center"><strong><span id="status"></span></strong></h4>
                              </center>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="addresses-lists">

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Wishlist Area -->

            <!-- Start Newsletter Area -->
            <?php $this->load->view('home/partial/newsletter');?>
            <!-- End Of Newsletter Area -->
        </section>
        <!-- End page content -->
        <!-- Start footer area -->
        <?php $this->load->view('home/partial/footer2')?>
        <!-- End footer area -->
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed js at the end of the document so the pages load faster -->

    <?php $this->load->view('home/partial/jquery') ?>
    <?php //$this->load->view('home/partial/modals') ?>

</body>

</html>
