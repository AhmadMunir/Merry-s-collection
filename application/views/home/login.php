<!doctype html>
<html class="no-js" lang="zxx">

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
          <?php if ($this->session->flashdata('success')): ?>
            <div class="row row-centered">
            <div class="alert alert-success col-md-6 col-centered" role="alert" a>
              <?php echo $this->session->flashdata('success');?>
            </div>
          </div>
          <?php  endif; ?>
            <!-- Start Wishlist Area -->
            <div class="login-section section-padding">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="registered-customers">
                                <div class="section-title text-uppercase mb-40">
                                    <h4>REGISTERED CUSTOMERS</h4>
                                </div>
                                <form action="<?php echo base_url('Login/loginL'); ?>" id="loginForm" method="post">
                                    <div class="login-account p-30 box-shadow">
                                        <p>If you have an account with us, Please log in.</p>
                                        <input type="text" placeholder="Username" required="" value="" name="usernameL" id="usernameL" class="form-control">
                                        <input type="password" placeholder="Password" required="" value="" name="passwordL" id="passwordL" class="form-control">
                                        <p><small><a href="<?php echo base_url('lupapass') ?>">Forgot our password?</a></small></p>
                                        <button type="submit" class="submit-btn">login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="registered-customers">
                                <div class="section-title text-uppercase mb-40">
                                    <h4>NEW CUSTOMERS</h4>
                                </div>
                                <form action="<?php echo base_url('Register/add'); ?>" id="loginForm" method="post"
                                  name="register_form" onsubmit="return validasi_input(this)">
                                    <div class="login-account p-30 box-shadow">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="nama" placeholder="Your Name" id="nama" required>
                                                <p id="nama_message" class="pesan-confirm"></p>
                                            </div>

                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="email" placeholder="Your E-mail" id="email" onkeyup="checkEmail()" required>
                                                <p id="email_message" class="pesan-confirm"></p>
                                            </div>
                                          </div>
                                            <div class="row">

                                            <div class="col-sm-12">
                                                  <input type="text" class="form-control" name="username" placeholder="Your Username" id="username" onkeyup="checkUsername()" required>
                                                <p id="username_message" class="pesan-confirm"></p>
                                            </div>

                                            <div class="col-sm-12">
                                              <input type="text" class="form-control" name="no_telp" placeholder="Your Phone" id="phone" required >
                                              <span id="phone_message" class="pesan-confirm"></span>
                                            </div>
                                          </div>
                                            <div class="row">
                                            <div class="col-sm-6">
                                              <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
                                            </div>
                                            <div class="col-sm-6">
                                              <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Your Password Again" onkeyup="checkPass()" required>
                                            </div>
                                            <div class="col-sm-6">
                                              <span id="message" class="pesan-confirm"></span>
                                            </div>
                                        </div>
                                        <div class="checkbox">
                                            <label class="mr-10">
                                                <small>
                                                    <input type="checkbox" name="signup">Sign up for our newsletter!
                                                </small>
                                            </label>
                                            <label>
                                                <small>
                                                    <input type="checkbox" name="signup">Receive special offers from our partners!
                                                </small>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input value="register" id="tombol_daftar" name="tombol_daftar" type="submit" class="submit-btn mt-20" onclick="checkregister()">Register</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="reset" class="submit-btn mt-20">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
        <!-- <footer id="footer" class="footer-area">
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
                                <p>Copyright <i class="fa fa-copyright"></i> 2018 <a href="https://freethemescloud.com/" target="_blank">Free Themes Cloud.</a> All rights reserved. </p>
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
        </footer> -->
        <?php $this->load->view('home/partial/footer2') ?>
        <!-- End footer area -->
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed js at the end of the document so the pages load faster -->

    <?php $this->load->view('home/partial/jquery') ?>

</body>

</html>
