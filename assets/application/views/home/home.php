<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php $this->load->view('home/partial/head') ?>
    <a href="product-details.html">
        <style>
        .imga{
          object-fit: contain;
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
        <!-- Start of slider area -->
        <div class="slider-area">
            <div id="ensign-nivoslider" class="slides">
              <?php $n = 1;
              $k = 1;?>
              <?php foreach ($banner as $bnr): ?>
                <img src="<?php echo base_url('img/banner/').$bnr->baner?>" alt="" class="imgb" title="#htmlcaption<?php echo $n;?>"/>
                <?php $n++;?>
              <?php endforeach; ?>
              <?php foreach ($banner as $desk): ?>
                <div id="htmlcaption<?php echo $k;?>" class="nivo-html-caption slider-caption-1">
                    <div class="container slider-height">
                        <div class="row slider-height">
                            <div class="col-md-offset-5 col-md-7 slider-height">
                                <div class="slide-text">
                                    <div class="cap-title cap-main-title wow bounceInDown mb-35 text-uppercase text-white" data-wow-duration="0.5s" data-wow-delay="0s">
                                        <h2><strong><?php echo $desk->nama_baner ?></strong></h2>
                                    </div>
                                    <div class="cap-sub-title cap-main-title wow bounceInDown mb-40 text-uppercase text-white" data-wow-duration="1s" data-wow-delay="0s">
                                        <h2><?php echo $desk->tulisan_sedang ?></h2>
                                    </div>
                                    <div class="cap-sub-title wow bounceInDown mb-30 text-white" data-wow-duration="1.5s" data-wow-delay="0s">
                                        <p><?php echo $desk->tulisan_kecil ?></p>
                                    </div>
                                    <div class="cap-shop wow bounceInUp" data-wow-duration="2s" data-wow-delay=".5s">
                                        <a href="#" class="button extra-small text-uppercase">
                                            <span>Shop now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $k++ ?>
              <?php endforeach; ?>

                <!-- <img src="<?php //echo base_url('img/user/')?>slider/1-2.jpg" alt="" title="#htmlcaption2"/> -->
            </div>
            </div>
        <!-- End of slider area -->
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start Banner Area -->
            <br>
            <!-- Start Product List -->
            <div class="product-list-tab pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-menu section-title section-title  mb-30">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="first-item active">
                                        <a href="#arrival" aria-controls="arrival" role="tab" data-toggle="tab">NEW ARRIVAL</a>
                                    </li>
                                    <!-- <li role="presentation">
                                        <a href="#sale" aria-controls="sale" role="tab" data-toggle="tab">BEST SELES</a>
                                    </li> -->
                                    <li role="presentation">
                                        <a href="#featured" aria-controls="featured" role="tab" data-toggle="tab">MOST WANTED</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product-list tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="arrival">
                                <?php foreach ($new_arrival as $new): ?>
                                  <script type="text/javascript">
                                    var user = '<?=$this->session->userdata('id')?>'
                                    var url = '<?=base_url();?>'
                                  </script>
                                  <div class="col-md-3 col-sm-4">
                                      <div class="single-product mb-40">
                                          <div class="product-img-content mb-20">
                                              <div class="product-img">
                                                      <img class="imga" src="<?php echo base_url('img/barang/'.$new->pic)?>" alt="">
                                                  </a>
                                              </div>
                                              <!-- diskon -->
                                              <!-- <span class="new-label text-uppercase">-30%</span> -->
                                              <input  value="<?php echo $new->id_barang ?>" type="hidden" readonly disabled>
                                              <div class="product-action text-center">
                                                  <a href="javascript:void(0);" class="prev_product" data-id="<?php echo encrypt_url($new->id_barang); ?>"><i class="zmdi zmdi-eye"></i></i></a>
                                                  <a href="javascript:void(0);" class="add_cart" data-id="<?php echo encrypt_url($new->id_barang); ?>"><i class="zmdi zmdi-shopping-cart"></i></i></a>

                                                  <a href="#" title="Add to Wishlist">
                                                      <i class="zmdi zmdi-favorite"></i>
                                                  </a>
                                              </div>
                                          </div>
                                          <div class="product-content text-center text-uppercase">
                                              <a href="product-details.html" title="Ripcurl Furry Fleece"><?php echo $new->nama_barang; ?></a>
                                              <div class="rating-icon">
                                                  <i class="zmdi zmdi-star"></i>
                                                  <i class="zmdi zmdi-star"></i>
                                                  <i class="zmdi zmdi-star"></i>
                                                  <i class="zmdi zmdi-star-half"></i>
                                                  <i class="zmdi zmdi-star-half"></i>
                                              </div>
                                              <div class="product-price">
                                                  <span class="new-price">USD <?php echo $new->harga;?></span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                <?php endforeach; ?>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="sale">
                                <div class="col-md-3 col-sm-4">
                                    <div class="single-product mb-40">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="<?php echo base_url('img/user/')?>product/2.jpg" alt="">
                                                </a>
                                            </div>
                                            <span class="new-label red-color text-uppercase">sale</span>
                                            <div class="product-action text-center">
                                                <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="#" title="Add to cart">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Slim Shirt With Stretch">Slim Shirt With Stretch</a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">£ 177.00</span>
                                                <span class="old-price">£ 200.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="<?php echo base_url('img/user/')?>product/6.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action text-center">
                                                <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="#" title="Add to cart">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Tomas Box Logo T-Shirt">Tomas Box Logo T-Shirt</a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">£ 21.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="single-product mb-40">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="<?php echo base_url('img/user/')?>product/3.jpg" alt="">
                                                </a>
                                            </div>
                                            <span class="new-label text-uppercase">New</span>
                                            <div class="product-action text-center">
                                                <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="#" title="Add to cart">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Ripcurl Furry Fleece">Ripcurl Furry Fleece</a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">£ 38.00</span>
                                                <span class="old-price">£ 45.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="<?php echo base_url('img/user/')?>product/7.jpg" alt="">
                                                </a>
                                            </div>
                                            <span class="new-label red-color text-uppercase">sale</span>
                                            <div class="product-action text-center">
                                                <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="#" title="Add to cart">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Shirt in Bee Print">Shirt in Bee Print</a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">£ 21.65</span>
                                                <span class="old-price">£ 24.60</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="single-product mb-40">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="<?php echo base_url('img/user/')?>product/4.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action text-center">
                                                <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="#" title="Add to cart">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Skinny In Charcoal">Skinny In Charcoal</a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">£ 38.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="<?php echo base_url('img/user/')?>product/8.jpg" alt="">
                                                </a>
                                            </div>
                                            <span class="new-label text-uppercase">New</span>
                                            <div class="product-action text-center">
                                                <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="#" title="Add to cart">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Shirt in Bee Print">Shirt in Bee Print</a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">£ 21.65</span>
                                                <span class="old-price">£ 24.60</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 hidden-sm">
                                    <div class="single-product mb-40">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="<?php echo base_url('img/user/')?>product/1.jpg" alt="">
                                                </a>
                                            </div>
                                            <span class="new-label text-uppercase">-30%</span>
                                            <div class="product-action text-center">
                                                <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="#" title="Add to cart">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Ripcurl Furry Fleece">Ripcurl Furry Fleece</a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">£ 185.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="<?php echo base_url('img/user/')?>product/5.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action text-center">
                                                <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="#" title="Add to cart">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Twill Oversized ">Twill Oversized </a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">£ 150.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="featured">
                              <?php foreach ($most_wanted as $nw): ?>
                                <script type="text/javascript">
                                  var user = '<?=$this->session->userdata('id')?>'
                                  var url = '<?=base_url();?>'
                                </script>
                                <div class="col-md-3 col-sm-4">
                                    <div class="single-product mb-40">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                    <img class="imga" src="<?php echo base_url('img/barang/'.$nw->gambar)?>" alt="">
                                                </a>
                                            </div>
                                            <!-- diskon -->
                                            <!-- <span class="new-label text-uppercase">-30%</span> -->
                                            <input  value="<?php echo $nw->id_barang ?>" type="hidden" readonly disabled>
                                            <div class="product-action text-center">
                                                <a href="javascript:void(0);" class="prev_product" data-id="<?php echo encrypt_url($nw->id_barang); ?>"><i class="zmdi zmdi-eye"></i></i></a>
                                                <a href="javascript:void(0);" class="add_cart" data-id="<?php echo encrypt_url($nw->id_barang); ?>"><i class="zmdi zmdi-shopping-cart"></i></i></a>

                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Ripcurl Furry Fleece"><?php echo $nw->nama_barang; ?></a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">USD <?php echo $nw->harga;?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product List -->

            <!-- Start Sale  Area -->
            <div class="sale-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="section-title text-uppercase mb-40">
                                <h4>MERRYS COLLECTION</h4>
                            </div>
                            <div class="sale-list">
                              <?php foreach ($prod as $s): ?>
                                <script type="text/javascript">
                                  var user = '<?=$this->session->userdata('id')?>'
                                  var url = '<?=base_url();?>'
                                </script>
                                <div class="col-md-3 col-sm-4">
                                    <div class="single-product mb-40">
                                        <div class="product-img-content mb-20">
                                            <div class="product-img">
                                                    <img class="imga" src="<?php echo base_url('img/barang/'.$s->pic)?>" alt="">
                                                </a>
                                            </div>
                                            <!-- diskon -->
                                            <!-- <span class="new-label text-uppercase">-30%</span> -->
                                            <input  value="<?php echo $s->id_barang ?>" type="hidden" readonly disabled>
                                            <div class="product-action text-center">
                                                <a href="javascript:void(0);" class="prev_product" data-id="<?php echo encrypt_url($s->id_barang); ?>"><i class="zmdi zmdi-eye"></i></i></a>
                                                <a href="javascript:void(0);" class="add_cart" data-id="<?php echo encrypt_url($s->id_barang); ?>"><i class="zmdi zmdi-shopping-cart"></i></i></a>

                                                <a href="#" title="Add to Wishlist">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center text-uppercase">
                                            <a href="product-details.html" title="Ripcurl Furry Fleece"><?php echo $s->nama_barang; ?></a>
                                            <div class="rating-icon">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="new-price">USD <?php echo $s->harga;?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <?php endforeach; ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- End Of Sale  Area -->
            <!-- Start Testimonial Area -->
            <div class="testimonial-area">
                <div id="particles-js" class="pt-90 pb-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="testimonial-title text-white text-uppercase text-center mb-40">
                                    <h4>what customer saying</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="testimonial-list">
                                    <div class="single-testimonial text-center">
                                        <img alt="" src="<?php echo base_url('img/merrys-team.jpg')?>">
                                        <div class="testimonial-info white-bg clearfix">
                                            <div class="testimonial-author text-uppercase">
                                                <h5>Mariyanto</h5>
                                                <p>Founder</p>
                                            </div>
                                            <!-- <p>consectetur adipisicing elit, sed do eiusmod tempor  incididunt
    labore et dolore magna aliqua. Ut enim ad minim veniam,voluptate velit esse cillu nulla pariatur. Excepteur sint occaecat</p> -->
                                        </div>
                                    </div>
                                    <div class="single-testimonial text-center">
                                        <img alt="" src="<?php echo base_url('img/hans.PNG')?>">
                                        <div class="testimonial-info white-bg clearfix">
                                            <div class="testimonial-author text-uppercase">
                                                <h5>Hans</h5>
                                                <p>Co-Founder</p>
                                            </div>
                                            <!-- <p>consectetur adipisicing elit, sed do eiusmod tempor  incididunt
    labore et dolore magna aliqua. Ut enim ad minim veniam,voluptate velit esse cillu nulla pariatur. Excepteur sint occaecat</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Testimonial Area -->
            <!-- Start Blog Area -->
            <div class="blog-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="section-title text-uppercase mb-40">
                                <h4>latest blog</h4>
                            </div>
                        </div>
                    </div>
                    <div class="blog-list">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="single-blog">
                                    <div class="blog-image">
                                        <a href="#">
                                            <img alt="" src="<?php echo base_url('img/user/')?>blog/1.jpg">
                                        </a>
                                    </div>
                                    <div class="blog-content pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                    </div>
                                    <div class="blog-content blog-content-overlay pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <p>Adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Ut enim ad minim</p>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                        <a href="#" class="button extra-small mt-60 text-uppercase">
                                            <span>Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-blog">
                                    <div class="blog-image">
                                        <a href="#">
                                            <img alt="" src="<?php echo base_url('img/user/')?>blog/2.jpg">
                                        </a>
                                    </div>
                                    <div class="blog-content pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                    </div>
                                    <div class="blog-content blog-content-overlay pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <p>Adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Ut enim ad minim</p>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                        <a href="#" class="button extra-small mt-60 text-uppercase">
                                            <span>Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 hidden-sm">
                                <div class="single-blog rm-0">
                                    <div class="blog-image">
                                        <a href="#">
                                            <img alt="" src="<?php echo base_url('img/user/')?>blog/1.jpg">
                                        </a>
                                    </div>
                                    <div class="blog-content pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                    </div>
                                    <div class="blog-content blog-content-overlay pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <p>Adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Ut enim ad minim</p>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                        <a href="#" class="button extra-small mt-60 text-uppercase">
                                            <span>Read More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Blog Area -->
            <!-- Start Brand Area -->
            <div class="brand-area pb-90">
                <div class="container">
                    <div class="row">
                        <div class="brand-list">
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/5.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/6.png" alt="">
                                    </a>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>brand/3.png" alt="">
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
      <?php $this->load->view('home/partial/footer2') ?>
        <!-- End footer area -->
        <!--Quickview Product Start -->
        <?php $this->load->view('home/partial/preview_product') ?>
        <!--End of Quickview Product-->
    </div>
    <!-- Body main wrapper end -->

    <!-- modal pesan -->
    <div class="modal fade" id="modalpesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <?php $this->load->view('home/partial/jquery') ?>
    <?php $this->load->view('home/partial/jshome') ?>
    <?php $this->load->view('home/partial/pusher') ?>

    <!-- <script type="text/javascript">

      var status;
      var ukur = '';
      var status = '<?php echo $this->session->userdata('status')?>';

      $('.add_cart').on('click', function(){
        var id_barang = $(this).data("id");
        // var id_barang;
        // id_barang = $(this).data("id");
        if (qty == null) {
          qty == 1;
        }

        if ( status == 'login') {

          add_cart(id_barang);
        }else {
          Lobibox.notify('error',{
            img: url + 'img/notif/info.png',
            position: 'center top',
            msg: 'Login First TO add this item to cart'
          });

        }
      });

      function cek_qty(){
        $('#qty').val(1);
        var id = ($("input[name='ukuran']:checked").val());
        $.ajax({
          type : "POST",
          url : url + "home/cek_qty",
          data : {id_stok:id},
          dataType : "json",
          success : function(data){
            $('#qty').attr('max', data[0].jumlah_stok);
          }
        });
      }

      function add_cart(id){
        $.ajax({
          type : "POST",
          url : url + "user/cart/add_cart",
          data : {id:id},
          dataType : "json",
          success : function(){
            Lobibox.alert('success',
              {
                img: url + 'img/notif/centang.png',
                msg: 'Success add to cart'
              }
            );
          }
        });
      }



      function add_cart2(id){
        var qty = $('#qty').val();
        var ukuran = $("input[name='ukuran']:checked").val();
        $.ajax({
          type : "POST",
          url : url + "user/cart/add_cart2",
          data : {id:id, size : ukuran, qty : qty},
          dataType : "json",
          success : function(){
          }
        });
        notifsukses('Success add this item to cart');
        $('#productModal').modal('hide');
      }

      function notifsukses(msg){
        Lobibox.notify('success',{
          img: url + 'img/notif/info.png',
          position: 'center top',
          msg: msg
        });
      }

      $('.prev_product').on('click', function(){
        var id_barang = $(this).data("id");
        var size = '';
        var gambaraktiv = '';
        var gambar = '';
        var btn ='';

          $.ajax({
            type : "POST",
            url : url + "admin/barang/detail",
            data : {id_barang : id_barang},
            dataType : "json",
            success : function(data){
              $('#nama_prod').html(data.detail[0].nama_barang);
              $('#harga_prod').html(data.detail[0].harga);
              $('#deskripsi_produk').html(data.detail[0].deskripsi);
              $('#harga_produk').html('USD ' + data.detail[0].harga);

              // size += '<form id="myForm">';
              for (var i = 0; i < data.stok.length; i++) {
                if (data.stok[i].jumlah_stok != 0) {
                  size += '<li><label><input type="radio" name="ukuran" onclick="cek_qty()" class="ks" value='+data.stok[i].id_detail_stok+'>'+data.stok[i].size+'</label> </li>';
                }
              }
              // size += '</form>';
              $('#size_produk').html(size);

              gambaraktiv += '<div class="tab-pane b-img active" id="view1">'+
              '<a class="venobox" href="<?php echo base_url('img/barang/')?>'+data.gambar[0].gambar+'" data-gall="gallery" title=""><img class="iview1" src="" alt=""></a>'+
              '</div>';
              gambar +='<div class="pro-view b-img active"><a href="#view1" data-toggle="tab"><img class="iview1" src="" alt=""></a></div>';

              if (data.gambar[0].gambar2 != null){
                gambaraktiv += '<div class="tab-pane b-img" id="view2">'+
                '<a class="venobox" href="<?php echo base_url('img/barang/')?>'+data.gambar[0].gambar2+'" data-gall="gallery" title=""><img class="iview2" src="" alt=""></a>'+
                '</div>';
                gambar += '<div class="pro-view b-img"><a href="#view2" data-toggle="tab"><img class="iview2" src="" alt=""></a></div>';
              }
              if (data.gambar[0].gambar3 != null){
              gambaraktiv += '<div class="tab-pane b-img" id="view3">'+
              '<a class="venobox" href="<?php echo base_url('img/barang/')?>'+data.gambar[0].gambar3+'" data-gall="gallery" title=""><img class="iview3" src="" alt=""></a>'+
              '</div>';
              gambar += '<div class="pro-view b-img"><a href="#view3" data-toggle="tab"><img class="iview3" src="" alt=""></a></div>';
              }

              if (data.gambar[0].gambar4 != null){
              gambaraktiv += '<div class="tab-pane b-img" id="view4">'+
              '<a class="venobox" href="<?php echo base_url('img/barang/')?>'+data.gambar[0].gambar4+'" data-gall="gallery" title=""><img class="iview4" src="" alt=""></a>'+
              '</div>';
              gambar += '<div class="pro-view b-img"><a href="#view4" data-toggle="tab"><img class="iview4" src="" alt=""></a></div>'
              }

              // btn += '<button class="btn btn-large btn-primary add_cart" data-id="'+data.detail[0].id_barang+'"><span> ADD TO CART </span></button>';
              btn += '<a href="javascript:add_cart2(\''+data.detail[0].id_barang+ '\');" ><button class="btn btn-large btn-primary"><span> ADD TO CART </span></button></a>';
              $('#btn-add').html(btn);
              $('.gambaraktiv').html(gambaraktiv);
              $('.gambarkecil').html(gambar);

              $(".iview1").attr("src", '<?php echo base_url('img/barang/')?>'+data.gambar[0].gambar+'');
              $(".iview2").attr("src", '<?php echo base_url('img/barang/')?>'+data.gambar[0].gambar2+'');
              $(".iview3").attr("src", '<?php echo base_url('img/barang/')?>'+data.gambar[0].gambar3+'');
              $(".iview4").attr("src", '<?php echo base_url('img/barang/')?>'+data.gambar[0].gambar4+'');
            }
          });
        $('#productModal').modal('show');
      });
    </script> -->

</body>

</html>
