
<!doctype html>

<html class="no-js" lang="zxx">

<link rel="stylesheet" href="style.css">

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
            <!-- Start About us Area -->
            <div class="about-us-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-uppercase text-center mb-40">
                                <h4>About us</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="about-page-cntent">
                                <h4 class="text-uppercase"><strong>OUR STORY</strong></h4>
                                <p>Merry's Collection stood since 2002, our founders Mariyanto and Hans have brought this vision to life and work to the needs of the leather lovers worldwide. We have a team of professionals from the beginning to make jackets, leather bags, leather shoes and suits etc.​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
                                </p>
                                <blockquote>
                                    <p>Since the establishment of Merrys Collection until now, our address is still at Jalan Padma Utara, right in front of Bali Coconut Hotel, Legian. The customers who visit and shop in our stores mostly from Australia, Europe, America or around the countries in Asia.​</p>
                                </blockquote>
                                <p>The amazing thing is the shopping to the store 70% of our guests from Aussie, Australia.Because satisfied with the service and quality of our products to our principle in business to go international.We also frequently visited by actress / actors from Jakarta to shop directly to stores or shopping via the Internet. Because we also serve shopping on line, both retail and wholesale.</p>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="img-element b-img">
                                <img src="<?php echo base_url('img/merrys-team.jpg');?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-uppercase text-center mtb-40">
                                <h4>The Owners</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="item-team text-center text-capitalize">
                                <div class="team-info">
                                    <div class="team-img mb-10">
                                        <center>
                                            <img class="mx-auto rounded-circle" src="<?php echo base_url('img/merrys-team.jpg')?>" alt="" width="175px" height="175px">
                                        </center>
                    <!-- <a href="../img/about/own.jpg" class="btn gallery-img">See More +</a> -->
                                        <h4>Mariyanto</h4>
                                        <p class="text-muted">Founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="item-team text-center text-capitalize">
                                <div class="team-info">
                                    <div class="team-img mb-10">
                                        <center>
                                            <img class="mx-auto rounded-circle" src="<?php echo base_url('img/hans.PNG')?>" alt="" width="175px" height="175px">
                                        </center>
                    <!-- <a href="../img/about/own.jpg" class="btn gallery-img">See More +</a> -->
                                        <h4>HanS</h4>
                                        <p class="text-muted">Co-Founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="bg-light" id="team">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading text-uppercase">About Location</h2>
                        </div>
                    </div>
                    <section class="medilife-video-area section-padding-100 bg-overlay bg-img" style="background-image: url(../img/bg-img/video.jpg);"></section>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-8">
                                <div class="video-box bg-overlay-black">
                                    <iframe width="1100" height="350" src="https://www.youtube.com/embed/4e_hgBrgBHg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="video-content">
                                    <h2></h2>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!-- End Of Newsletter Area -->
        </section>
        <!-- End page content -->
        <!-- Start footer area -->
        <?php $this->load->view('home/partial/footer2') ?>
        <!-- End footer area -->
    </div>


</body>

</html>
