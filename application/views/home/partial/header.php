<script
    src="https://www.paypal.com/sdk/js?client-id=AS6yMkPP1YEQ_1RPmSItB_hnP8uthx2dEREmoMSg9MMLiKebZ4VFRYbiOnKhR4nFoBYlr25YKcEiWgXl"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>
<!-- <header> -->
    <div class="header-top-bar white-bg ptb-20">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="header-top">
                        <ul>
                            <li class="lh-50">
                                <a href="#" class="pr-20"><i class="zmdi zmdi-search"></i></a>
                                <div class="header-bottom-search header-top-down header-top-hover lh-35">
                                    <form class="header-search-box" action="#" method="POST">
                                        <div>
                                            <input type="text" value="" placeholder="Search" autocomplete="off">
                                            <button class="btn btn-search" type="submit">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="lh-50">
                                <a href="#" class="prl-20 text-uppercase">USD</a>
                                <div class="header-top-down header-top-hover pl-15 lh-35">
                                    <ul>
                                        <li><a href="#">USD</a></li>
                                        <!-- <li><a href="#">Uero</a></li>
                                        <li><a href="#">Taka</a></li>
                                        <li><a href="#">Pound</a></li>
                                        <li><a href="#">Rupi</a></li> -->
                                    </ul>
                                </div>
                            </li>
                            <li class="lh-50">
                                <a href="#" class="prl-20 text-uppercase">ENG</a>
                                <div class="header-top-down header-top-hover header-top-down-lang pl-15 lh-35 lh-35">
                                    <ul>
                                        <!-- <li><a href="#">Bengali</a></li> -->
                                        <li><a href="#">English</a></li>
                                        <!-- <li><a href="#">French</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">Spanish</a></li> -->
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="header-logo text-center">
                        <a href="<?php base_url('home') ?>">
                            <img width="150" height="48" alt="" src="<?php echo base_url('img/')?>logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="header-top header-top-right">
                        <ul>
                            <li class="lh-50">
                                <?php if ($this->session->userdata('status') =="login"){ ?>
                                  <a href="#" class="pr-20 text-uppercase"><?php echo $this->session->nama ?></a>
                                <?php }else { ?>
                                  <a href="#" class="pr-20 text-uppercase">Account</a>
                                <?php }?>

                                <div class="header-top-down header-top-hover pl-15 lh-35">
                                    <ul>
                                        <!-- <li><a href="login.html">Login</a></li> -->
                                        <li>
                                          <?php if ($this->session->userdata('status') =="login"){ ?>
                                            <a href="<?php echo base_url('user/profile') ?>">My Account</a>
                                          <?php }else { ?>
                                            <a href="<?php echo base_url('user/login') ?>">Login</a>
                                          <?php }?>
                                        </li>
                                        <li><a href="compare.html">My bag</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="<?php echo base_url('user/login/logout') ?>">Log Out</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="cart-link lh-50">
                                <a href="#" class="pl-20">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                    <span><div id="cart_itung">0</div></span>
                                </a>
                                <!-- <div class="mini-cart-inner header-top-down p-20">
                                    <ul class="cart-list">
                                        <li class="p-10 mb-15">
                                            <a href="#" class="product-image">
                                                <img src="<?php echo base_url('img/user/')?>shop/cart/1.jpg" alt="">
                                            </a>
                                            <div class="product-details ml-10">
                                                <a href="#" class="remove">
                                                    <i class="zmdi zmdi-close"></i>
                                                </a>
                                                <a href="#" class="product-name mb-10">Men’s Black T..</a>
                                                <span class="selected-color">Color:  Black</span>
                                                <span class="selected-size">$80.00</span>
                                            </div>
                                        </li>
                                        <li class="p-10 mb-15">
                                            <a href="#" class="product-image">
                                                <img src="<?php echo base_url('img/user/')?>shop/cart/2.jpg" alt="">
                                            </a>
                                            <div class="product-details ml-10">
                                                <a href="#" class="remove">
                                                    <i class="zmdi zmdi-close"></i>
                                                </a>
                                                <a href="#" class="product-name mb-10">Men’s Black T..</a>
                                                <span class="selected-color">Color:  white</span>
                                                <span class="selected-size">$65.00</span>
                                            </div>
                                        </li>
                                        <li class="p-10 mb-15">
                                            <a href="#" class="product-image">
                                                <img src="<?php echo base_url('img/user/')?>shop/cart/3.jpg" alt="">
                                            </a>
                                            <div class="product-details ml-10">
                                                <a href="#" class="remove">
                                                    <i class="zmdi zmdi-close"></i>
                                                </a>
                                                <a href="#" class="product-name mb-10">Men’s Black T..</a>
                                                <span class="selected-color">Color:  Red</span>
                                                <span class="selected-size">$100.00</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="border-bottom"></div>
                                    <div class="cart-footer text-center">
                                        <p class="total mtb-15">
                                            Subtotal:
                                            <span class="ml-35">$190.98</span>
                                        </p>
                                        <p class="buttons m-0">
                                            <a href="#" class="button extra-small">
                                                <span>Checkout</span>
                                            </a>
                                        </p>
                                    </div>
                                </div> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="header-area header-wrapper transparent-header">
        <div class="header-middle-area black-bg">
            <div class="container">
                <div class="full-width-mega-dropdown">
                    <div class="row">
                        <div class="col-md-12">
                            <nav id="primary-menu">
                                <ul class="main-menu text-center">
                                    <li><a href="<?php echo base_url('home') ?>">Home</a></li>
                                    <li><a href="<?php echo base_url('user/About') ?>">About</a></li>
                                    <li><a href="shop-full.html">CATEGORY</a></li>
                                    <li><a href="<?php echo base_url('user/custom') ?>">CUSTOM</a></li>
                                    <li><a href="<?php echo base_url('user/galeri') ?>">GALLERY</a></li>
                                    <?php if ($this->session->userdata('status') =="login"){ ?>
                                      <li><a href="<?php echo base_url('user/profile'); ?>">My Acoount</a></li>
                                      <li><a href="<?php echo base_url('user/cart') ?>">My Cart</a></li>
                                    <?php }else { ?>
                                      <li><a href="<?php echo base_url('user/login'); ?>">Login or Register</a></li>
                                      <li><a href="<?php echo base_url('user/Contact') ?>">Contact Us</a></li>
                                    <?php }?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <<li><a href="<?php echo base_url('home') ?>">Home</a></li>
                                <li><a href="<?php echo base_url('user/About') ?>">About</a></li>
                                <li><a href="shop-full.html">men</a></li>
                                <li><a href="<?php echo base_url('user/custom') ?>">CUSTOM</a></li>
                                <li><a href="<?php echo base_url('user/galeri') ?>">GALLERY</a></li>
                                <?php if ($this->session->userdata('status') =="login"){ ?>
                                  <li><a href="<?php echo base_url('user/profile'); ?>">My Acoount</a></li>
                                  <li><a href="<?php echo base_url('user/cart') ?>">My Cart</a></li>
                                <?php }else { ?>
                                  <li><a href="<?php echo base_url('user/login'); ?>">Login or Register</a></li>
                                  <li><a href="<?php echo base_url('user/Contact') ?>">Contact Us</a></li>
                                <?php }?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu End -->
</header>
