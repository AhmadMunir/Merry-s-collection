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
                                    <div id="my-tab-content" class="tab-content mb-30">
                                        <div class="tab-pane b-img active" id="view1">
                                            <a class="venobox" href="images/product/product-details/1.jpg" data-gall="gallery" title=""><img src="images/product/product-details/1.jpg" alt=""></a>
                                        </div>
                                        <div class="tab-pane b-img" id="view2">
                                            <a class="venobox" href="images/product/product-details/2.jpg" data-gall="gallery" title=""><img src="images/product/product-details/2.jpg" alt=""></a>
                                        </div>
                                        <div class="tab-pane b-img" id="view3">
                                            <a class="venobox" href="images/product/product-details/3.jpg" data-gall="gallery" title=""><img src="images/product/product-details/3.jpg" alt=""></a>
                                        </div>
                                        <div class="tab-pane b-img" id="view4">
                                            <a class="venobox" href="images/product/product-details/4.jpg" data-gall="gallery" title=""><img src="images/product/product-details/4.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div id="viewproduct" class="nav nav-tabs product-view bxslider" data-tabs="tabs">
                                        <div class="pro-view b-img active"><a href="#view1" data-toggle="tab"><img src="images/product/product-details/s-1.jpg" alt=""></a></div>
                                        <div class="pro-view b-img"><a href="#view2" data-toggle="tab"><img src="images/product/product-details/s-2.jpg" alt=""></a></div>
                                        <div class="pro-view b-img"><a href="#view3" data-toggle="tab"><img src="images/product/product-details/s-3.jpg" alt=""></a></div>
                                        <div class="pro-view b-img"><a href="#view4" data-toggle="tab"><img src="images/product/product-details/s-4.jpg" alt=""></a></div>
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

        <!-- End footer area -->
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed js at the end of the document so the pages load faster -->


</body>

</html>
