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
        <header>
            <?php $this->load->view('home/partial/header') ?>
            <!-- Mobile Menu Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="shop-full.html">men</a></li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="dropdown header-top-hover ptb-10">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="my-account.html">my Acoount</a></li>
                                            <li><a href="login.html">Register</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu End -->
        </header>
        <!-- End of header area -->
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start Shop Full Grid View -->
            <div class="product-details-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                          <style>
                          .imga{
                            object-fit: contain;
                            object-position: center;

                            width: 470px;
                            height: 576px;
                          }

                          .imgb{
                            object-fit: contain;
                            object-position: center;

                            width: 104px;
                            height: 128px;
                          }
                          </style>
                            <div class="single-product-image">
                                <div id="product-img-content">
                                  <?php foreach ($cart as $key): ?>
                                    <div id="my-tab-content" class="tab-content mb-30">
                                    <?php
                                      $gbr = explode(',',$key->gambar);
                                      for ($i=0; $i <count($gbr) ; $i++) {
                                        if ($i==1) {?>
                                          <div class="tab-pane b-img active" id="view<?php echo $i+1 ;?>">
                                              <a class="venobox" href="<?php echo base_url('img/custom/').$gbr[$i]; ?>" data-gall="gallery" title=""><img class="imga" src="<?php echo base_url('img/custom/').$gbr[$i]; ?>" alt=""></a>
                                          </div>
                                        <?php ; } else {
                                          if ($gbr[$i]!='') {?>
                                            <div class="tab-pane b-img" id="view<?php echo $i+1 ;?>">
                                                <a class="venobox" href="<?php echo base_url('img/custom/').$gbr[$i]; ?>" data-gall="gallery" title=""><img class="imga" src="<?php echo base_url('img/custom/').$gbr[$i]; ?>" alt=""></a>
                                            </div>
                                          <?php ;}
                                        }
                                      }
                                    ?>
                                    </div>
                                    <div id="viewproduct" class="nav nav-tabs product-view bxslider" data-tabs="tabs">
                                    <?php
                                      for ($i=0; $i <count($gbr) ; $i++) {
                                        if ($i==1) {?>
                                          <div class="pro-view b-img active"><a href="#view<?php echo $i+1 ;?>" data-toggle="tab"><img class="imgb" src="<?php echo base_url('img/custom/').$gbr[$i]; ?>" alt=""></a></div>
                                        <?php ; } else {
                                          if ($gbr[$i]!='') {?>
                                            <div class="pro-view b-img"><a href="#view<?php echo $i+1 ;?>" data-toggle="tab"><img class="imgb" src="<?php echo base_url('img/custom/').$gbr[$i]; ?>" alt=""></a></div>
                                          <?php ;}
                                        }
                                      }
                                    ?>
                                  </div>
                                  <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="col-md-12">
                              <div class="order-info azure-bg p-30">
                                  <div class="billing-title text-uppercase mb-15">
                                      <h5><strong>your custom order</strong></h5>
                                  </div>
                                  <table>
                                      <tbody>
                                        <?php foreach ($cart as $key): ?>
                                          <tr>
                                            <th><?php echo $key->nama_barang ?></th>
                                            <td>$<?php echo $key->harga ?></td>
                                          </tr>
                                        <?php endforeach; ?>
                                          <tr class="total">
                                              <th>Order Total</th>
                                              <td>$<?php echo $key->harga ?></td>
                                          </tr>
                                      </tbody>
                                  </table>

                                  <div class="billing-title text-uppercase mt-40 pb-30">
                                      <h5><strong>SHIPPING address</strong></h5>
                                  </div>

                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingaddreaas">
                                            <h4 class="panel-title text-uppercase">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseaddress" aria-expanded="false" aria-controls="collapseaddress">
                                                    Address
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseaddress" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingaddreaas">
                                            <div class="panel-body">
                                              <select name="country" id="country">
                                                <option value="" selected >Country</option>
                                              </select>
                                            </br>
                                            </br class="inter" style="display:none;">
                                            <input type="text" id="province_inter" class="inter" placeholder="Add your province" style="display:none;">
                                            <!-- </br> -->
                                              <!-- <div class="cart-show-label show-label indo" id="province_id" style="display:none;"> -->
                                                  <select name="province" id="province" class="indo">
                                                    <option value="" selected >Province</option>
                                                  </select>
                                                </br class="inter" style="display:none;">
                                                </br>
                                                <input type="text" id="city_inter" class="inter" placeholder="Add your city" style="display:none;">
                                                <!-- </br> -->

                                              <!-- <div class="cart-show-label show-label mt-15 indo" id="city_id" style="display:none;"> -->
                                                <select name="city" id="city" class="indo">
                                                  <option value="" selected >CITY</option>
                                                </select>
                                                </br class="inter" style="display:none;">
                                              </br>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="panel panel-default">
                                          <div class="panel-heading" role="tab" id="headingTwo">
                                              <h4 class="panel-title text-uppercase">
                                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      Detail address
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                              <div class="panel-body">
                                                <textarea id="detail_address" placeholder="Input your detail adress"></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="panel panel-default">
                                          <div class="panel-heading" role="tab" id="headingkurir">
                                              <h4 class="panel-title text-uppercase">
                                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsekurir" aria-expanded="false" aria-controls="collapseTwo">
                                                      Sipping method
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="collapsekurir" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                              <div class="panel-body">
                                                <select name="kurir" id="kurir">
                                                  <option value="" selected > select Courier</option>
                                                  <option value="pos" > POS </option>
                                                  <option value="jne" > JNE </option>
                                                  <option value="tiki" > TIKI </option>
                                                </select>
                                                  </br>
                                                </br>
                                                <select name="service" id="service">
                                                  <option value="" selected > Select Service </option>
                                                </select>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="billing-title text-uppercase mt-40 pb-30">
                                      <h5><strong>payment method</strong></h5>
                                  </div>
                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                      <div class="panel panel-default">
                                          <div class="panel-heading" role="tab" id="headingOne">
                                              <h4 class="panel-title text-uppercase">
                                                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      direct bank transfer
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                              <div class="panel-body">
                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                              </div>
                                          </div>
                                      </div>
                                      <div class="panel panel-default">
                                          <div class="panel-heading" role="tab" id="headingTwo">
                                              <h4 class="panel-title text-uppercase">
                                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      cheque payment
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                              <div class="panel-body">
                                                  Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                              </div>
                                          </div>
                                      </div>
                                      <div class="panel panel-default">
                                          <div class="panel-heading" role="tab" id="headingThree">
                                              <h4 class="panel-title text-uppercase">
                                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                      paypal
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                              <div class="panel-body">
                                                <script
                                                src="https://www.paypal.com/sdk/js?client-id=AS6yMkPP1YEQ_1RPmSItB_hnP8uthx2dEREmoMSg9MMLiKebZ4VFRYbiOnKhR4nFoBYlr25YKcEiWgXl"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
                                                </script>
                                                <div id="paypal-button-container" style="pointer-events:none;"></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <a title="Add to Cart" href="#" class="button extra-small">
                                      <span>place order</span>
                                  </a>
                              </div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Of Shop Full Grid View -->
            <!-- Start Related Product Area -->

        </section>
        <!-- End page content -->
        <!-- Start footer area -->

        <?php $this->load->view('home/partial/footer2') ?>
        <?php $this->load->view('home/partial/jscartcustom') ?>
        <!-- End footer area -->
    </div>
    <!-- Body main wrapper end -->

</body>

</html>
