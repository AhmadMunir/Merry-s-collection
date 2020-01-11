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
                            <div class="wishlist-content">
                                <form action="#">
                                    <div class="wishlist-table table-responsive p-30 text-uppercase">
                                        <table id="mytable">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail"></th>
                                                    <th class="product-name"><span class="nobr">Product</span></th>
                                                    <th class="product-prices"><span class="nobr"> Price </span></th>
                                                    <th class="product-add-to-cart"><span class="nobr">Quantity</span></th>
                                                    <th class="product-stock-stauts"><span class="nobr"> Subtotal </span></th>
                                                    <th class="product-remove"><span class="nobr">Remove</span></th>
                                                </tr>
                                            </thead>
                                            <tbody class="show_cart">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="cart-requerment mt-50 clearfix">
                                            <div class="col-md-4 col-sm-6 clearfix">
                                                <div class="cart-title text-uppercase">
                                                    <h5 class="mb-30"><strong>ESTIMATE SHIPPING AND TAX</strong></h5>
                                                </div>
                                                <div class="shopping-tax">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="cart-show-label show-label">
                                                              <select name="country" id="country">
                                                                <option value="" selected >Country</option>
                                                              </select>
                                                            </div>
                                                            <div class="cart-show-label show-label mt-15 indo" style="display:none">
                                                              <select name="city" id="city">
                                                                <option value="" selected >CITY</option>
                                                              </select>
                                                            </div>
                                                            <div class="cart-show-label show-label mt-15 inter" style="display:none">
                                                                <input id="city_int" placeholder="City">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="cart-show-label show-label indo" style="display:none">
                                                                <select name="province" id="province">
                                                                  <option value="" selected >Province</option>
                                                                </select>
                                                            </div>
                                                            <div class="cart-show-label show-label mt-15 inter" style="display:none">
                                                                <input id="provice_int" placeholder="Province">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                      <div class="col-sm-6">
                                                        <div class="cart-show-label show-label mt-15">
                                                          <select name="kurir" id="kurir">
                                                            <option value="" selected > select Courier</option>
                                                            <option value="pos" > POS </option>
                                                            <option value="jne" > JNE </option>
                                                            <option value="tiki" > TIKI </option>
                                                          </select>
                                                        </div>
                                                      </div>
                                                      <div class="col-sm-6">
                                                        <div class="cart-show-label show-label mt-15">
                                                          <select name="service" id="service">
                                                            <option value="" selected > Select Service </option>
                                                          </select>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <!-- <a class="button extra-small pull-right mt-20" href="#" title="Add to Cart">
                                                    <span>Get a Quote</span>
                                                </a> -->
                                            </div>
                                            <div class="col-md-4 col-sm-6 clearfix">
                                                <div class="counpon-info ml-35">
                                                    <div class="cart-title text-uppercase">
                                                        <h5 class="mb-30"><strong>Address Detail</strong></h5>
                                                    </div>
                                                    <div class="cart-show-label show-label mt-15">
                                                        <input id="zip" placeholder="Zippostal Code">
                                                    </div>
                                                    <br>
                                                    <div class="coupon-discount">
                                                        <label class="pb-10">Enter Your Adress Detail</label>
                                                        <input id="detail_address" type="text" maxlength="60">
                                                    </div>
                                                  </br>
                                                    <!-- <a class="button extra-small pull-right mt-35" href="#" title="Add to Cart">
                                                        <span>Apply Coupon</span>
                                                    </a> -->
                                                    <?php foreach ($alamt as $ky) {
                                                      $al = $ky->alamat;
                                                      $kota = $ky->kota;
                                                      $id_kota = $ky->id_kota;
                                                      $provinsi =$ky->provinsi;
                                                      $negara = $ky->negara;
                                                      $kode_pos = $ky->kode_pos;
                                                      if ($al == null && $kota == null && $provinsi == null && $negara == null && $kode_pos == null) {
                                                        ?>
                                                        <center>
                                                          <h5 style="color : red;">Complete your address on profile or fill the shipping form</h5>
                                                        </center>
                                                        <?php
                                                      }elseif ($al == null or $kota == null or $provinsi == null or $negara == null or $kode_pos == null) {
                                                        ?>
                                                        <center>
                                                          <h5 style="color : red;">Complete your address on profile or fill the shipping form</h5>
                                                        </center>
                                                        <?php
                                                      }else {
                                                        ?>
                                                        <center>
                                                          <h7 id="address_from_this" style="color : green;"></h7>
                                                        </center>
                                                        <center>
                                                          <h7 id="address_from_db" style="color : green;">The package will deliver to <?php echo $al.", ".$kota.", ".$provinsi.", ".$negara; ?></h7>
                                                        </center>
                                                        <!-- <script
                                                        src="https://www.paypal.com/sdk/js?client-id=AS6yMkPP1YEQ_1RPmSItB_hnP8uthx2dEREmoMSg9MMLiKebZ4VFRYbiOnKhR4nFoBYlr25YKcEiWgXl"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
                                                        </script>
                                                        <div id="paypal-button-container"></div> -->
                                                      <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-offset-0 col-md-4 col-sm-offset-3 col-sm-6 clearfix">
                                                <div class="counpon-total ml-35">
                                                    <div class="cart-title text-uppercase">
                                                        <h5 class="mb-30"><strong>CART TOTAL</strong></h5>
                                                    </div>
                                                    <table>
                                                        <tbody>
                                                            <tr class="cart-subtotal">
                                                                <th>Subtotal</th>
                                                                <td id="result"></td>
                                                            </tr>
                                                            <tr class="cart-tax">
                                                              <th>Tax</th>
                                                              <td id="tax">-<td>
                                                              </tr>
                                                            <tr class="cart-shipping">
                                                                <th>Shipping</th>
                                                                <td id="shipping">-</td>
                                                            </tr>
                                                            <tr class="cart-total">
                                                                <th>Grand Total</th>
                                                                <td id="grand_total">USD 215.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div id="payment">
                                                      <?php
                                                        if ($al == null && $kota == null && $provinsi == null && $negara == null && $kode_pos == null) {
                                                          ?>
                                                          <!-- <center>
                                                            <h5 style="color : red;">Complete your address on profile or fill the shipping form</h5>
                                                          </center> -->
                                                          <?php
                                                        }elseif ($al == null or $kota == null or $provinsi == null or $negara == null or $kode_pos == null) {
                                                          ?>
                                                          <!-- <center>
                                                            <h5 style="color : red;">Complete your address on profile or fill the shipping form</h5>
                                                          </center> -->
                                                          <?php
                                                        }else {
                                                          ?>
                                                          <script
                                                          src="https://www.paypal.com/sdk/js?client-id=AS6yMkPP1YEQ_1RPmSItB_hnP8uthx2dEREmoMSg9MMLiKebZ4VFRYbiOnKhR4nFoBYlr25YKcEiWgXl"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
                                                          </script>
                                                          <div id="paypal-button-container"></div>
                                                        <?php }
                                                       ?>

                                                    </div>

                                                </div>
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


    <!-- jquery latest version -->
    <?php $this->load->view('home/partial/jquery') ?>
    <?php $this->load->view('home/partial/jscart') ?>

</body>

</html>
