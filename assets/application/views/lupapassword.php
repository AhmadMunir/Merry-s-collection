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
            <div class="alert alert-success col-md-6 col-centered" role="alert">
              <?php echo $this->session->flashdata('success');?>
            </div>
          </div>
          <?php  endif; ?>
            <!-- Start Wishlist Area -->
            <div class="login-section section-padding">
                <div class="container">
                  <?php if ($username=='a'){ ?>
                    <div class="row">
                      <center>
                        <div class="col-md-6">
                          <div class="login-account p-30 box-shadow">
                            <form name="form1" action="<?php echo base_url('lupapass/reset'); ?>"method="post">
                              <input class="form-control" type="email" name="email" value="" placeholder="Input Your Email" required id="email">
                              <input  type="submit" name="simpan" value="Send Reset Password Link">
                            </form>
                          </div>
                        </div>
                      </center>
                    </div>
                  <?php }else {?>
                    <div class="row">
                      <center>
                        <div class="col-md-6">
                          <div class="login-account p-30 box-shadow">
                            <form name="form1" action="<?php echo base_url('lupapass/update'); ?>"method="post">
                              <div class="row">
                                <input type="hidden" value="<?php echo $username ?>" name="username">
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
                              <input  type="submit" name="simpan" value="Send Reset Password Link">
                            </form>
                          </div>
                        </div>
                      </center>
                    </div>
                <?php  } ?>


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


    <!-- Placed js at the end of the document so the pages load faster -->

    <?php $this->load->view('home/partial/jquery') ?>
    <script>
    function ValidateEmail(inputText)
        {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(inputText.value.match(mailformat))
        {
        document.form1.email.focus();
        return true;
        }
        else
        {
        alert("You have entered an invalid email address!");
        document.form1.email.focus();
        return false;
        }
        }

    </script>

</body>

</html>
