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
                <span id="status_email">
                  <?php
                    foreach ($data_user as $key) {
                      $nama = $key->nama_user;
                      $username = $key->username;
                      $dob = $key->dob;
                      $email = $key->email;
                      $s_email = $key->status_email;
                      $address = $key->alamat;
                      $city = $key->kota;
                      $province = $key->provinsi;
                      $country = $key->negara;
                      $zipostal = $key->kode_pos;
                    }
                    if ($s_email == "unverified") {
                      echo "Please, Verify Your Email!";
                    }else {

                    }

                 ?></span>
              </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="procced-checkout">
                                <h4 class="procced-title text-uppercase pb-15 mb-20"><strong>My Account</strong></h4>
                                <p>Welcome to your account. Here you can manage all of your personal information and orders.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="addresses-lists">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="headingFour">
                                          <h4 class="panel-title">
                                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                  <i class="zmdi zmdi-home"></i>
                                                 <span>My personal information</span>
                                              </a>
                                          </h4>
                                      </div>
                                      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                          <div class="panel-body">
                                              <div class="coupon-info">
                                                  <h6 class="procced-title text-uppercase pb-15 mb-20">Your Information </h6>

                                                      <p class="form-row">
                                                      <p></p>
                                                      <p class="form-row">
                                                          <label><span class="required">*</span>Your Full Name</label>
                                                          <input type="text" value="<?php echo $nama ?>" disabled>
                                                      </p>
                                                      <p class="form-row">
                                                          <label><span class="required">*</span>E-mail address</label> &nbsp;
                                                          <?php
                                                          if ($s_email == "unverified") {
                                                            echo '<a href="../activeemail" >Click Here For Activate Your Email</a>';
                                                          }else {

                                                          }
                                                           ?>
                                                          <input type="text" value="<?php echo $email ?>" disabled>
                                                      </p>
                                                      <p class="form-row">
                                                          <label><span class="required">*</span>Date Of Birth</label>
                                                          <input type="date" value="<?php echo $dob ?>" disabled>
                                                      </p>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_profile">Edit or Complete Your Profile</button>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="zmdi zmdi-home"></i>
                                                   <span>My Address</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="coupon-info">
                                                    <h6 class="procced-title text-uppercase pb-15 mb-20">Your addresses </h6>
                                                        <p class="form-row">
                                                            <label>Address<span class="required">*</span></label>
                                                            <input type="text" name="alamat" value="<?php echo $address ?>" disabled/>
                                                        </p>
                                                        <p class="form-row">
                                                            <label>Zippostal<span class="required">*</span></label>
                                                            <input type="text" value="<?php echo $zipostal; ?>" name="zipostal" disabled/>
                                                        </p>
                                                        <p class="form-row">
                                                            <label>City<span class="required">*</span></label>
                                                            <input type="text" value="<?php echo $city; ?>" name="city" disabled/>
                                                        </p>
                                                        <p class="form-row">
                                                            <label>Province<span class="required">*</span></label>
                                                            <input type="text" value="<?php echo $province ?>" name="provinsi" disabled/>
                                                        </p>
                                                        <div class="country-select shop-select">
                                                            <label>Country <span class="required">*</span></label>
                                                            <input type="text" value="<?php echo $country ?>" name="country" disabled/>

                                                        </div>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_address">Edit or Complete Your Address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                    <i class="zmdi zmdi-format-list-numbered"></i>
                                                   <span>My credit slips</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="coupon-info">
                                                    <h6 class="procced-title text-uppercase pb-15 mb-20">Your addresses </h6>
                                                    <p class="text-black">To add a new address, please fill out the form below.</p>
                                                </div>
                                                <div class="default-bg">
                                                    <p class="alert text-white">You have not placed any orders.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                    <i class="zmdi zmdi-folder-outline"></i>
                                                   <span>My addresses</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <div class="coupon-info">
                                                    <h6 class="procced-title text-uppercase pb-15 mb-20">Your addresses </h6>
                                                    <p class="text-black">To add a new address, please fill out the form below.</p>
                                                </div>
                                                <div class="default-bg">
                                                    <p class="alert text-white">You have not placed any orders.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="myaccount-link-list">
                                    <div class="panel panel-default mb-5">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a  href="wishlist.html">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                    <span>My wishlists</span>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="panel panel-default m-0">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a  href="<?php echo base_url('user/transaksi'); ?>">
                                                    <i class="zmdi zmdi-format-list-numbered"></i>
                                                    <span>Order history and details</span>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Wishlist Area -->

            <!-- Start Brand Area -->
            <div class="brand-area pb-90">
                <div class="container">
                    <div class="row">
                        <div class="brand-list">
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>scroll
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/5.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/6.png" alt="">
                                    </a>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Brand Area -->
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
        <footer id="footer" class="footer-area">
            <div class="footer-top-area gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget">
                                <div class="footer-widget-img pb-30">
                                    <a href="#">
                                        <img src="images/logo/logo-2.png" alt="">
                                    </a>
                                </div>
                                <ul class="toggle-footer text-white">
                                    <li class="mb-30 pl-45">
                                        <i class="zmdi zmdi-pin"></i>
                                        <p>House No 08, Road No 08, <br>
                                        Din Bari, Dhaka, Bangladesh</p>
                                    </li>
                                    <li class="mb-30 pl-45">
                                        <i class="zmdi zmdi-email"></i>
                                        <p>Username@gmail.com <br>
                                        Damo@gmail.com</p>
                                    </li>
                                    <li class="pl-45">
                                        <i class="zmdi zmdi-phone"></i>
                                        <p>+660 256 24857<br>
                                        +660 256 24857</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="text-white footer-information">
                                <h4 class="pb-40 m-0 text-uppercase">information</h4>
                                <ul class="footer-menu">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Hot Sale</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>best Seller</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Suppliers</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Our Store</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Deal of The Day</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="text-white footer-account">
                                <h4 class="pb-40 m-0 text-uppercase">MY ACCOUNT</h4>
                                <ul class="footer-menu">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>My Account</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Personal Information</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Discount</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Orders History</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Payment</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="text-white footer-about-us">
                                <h4 class="pb-40 m-0 text-uppercase">about us</h4>
                                <p>Lorem ipsum dolor sit amet, consecteir our adipisicing elit, sed do eiusmod tempor the incididunt ut labore et dolore magnaa liqua. Ut enim minimn.</p>
                                <ul class="footer-social-icon">
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom black-bg ptb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="copyright text-white">
                                <p>Copyright <i class="fa fa-copyright"></i> 2018 <a href="https://freethemescloud.com/" target="_blank" >Free Themes Cloud.</a> All rights reserved. </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-img">
                                <img src="images/payment.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer area -->
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed js at the end of the document so the pages load faster -->

    <?php $this->load->view('home/partial/jquery') ?>
    <?php $this->load->view('home/partial/modals') ?>

</body>

</html>
