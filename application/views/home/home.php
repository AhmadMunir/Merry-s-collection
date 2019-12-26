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
                                    <li role="presentation">
                                        <a href="#sale" aria-controls="sale" role="tab" data-toggle="tab">BEST SELES</a>
                                    </li>
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
                                                      <img class="imga" src="<?php echo base_url('img/barang/'.$new->gambar)?>" alt="">
                                                  </a>
                                              </div>
                                              <!-- diskon -->
                                              <!-- <span class="new-label text-uppercase">-30%</span> -->
                                              <input  value="<?php echo $new->id_barang ?>" type="hidden" readonly disabled>
                                              <div class="product-action text-center">
                                                  <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                      <i class="zmdi zmdi-eye"></i>
                                                  </a>
                                                  <a href="javascript:tes('<?php
                                                                          echo encrypt_url($new->id_barang);
                                                                          ?>')" title="Add to cart" class="add_cart">
                                                      <i class="zmdi zmdi-shopping-cart"></i>
                                                  </a>
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
                                                  <span class="new-price">IDR <?php echo $new->harga;?></span>
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
                                <div class="col-md-3 col-sm-4">
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
                                <div class="col-md-3 hidden-sm">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product List -->
            <!-- Start Service Area -->
            <div class="service-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="single-item text-white pl-120">
                                <i class="zmdi zmdi-shopping-cart"></i>
                                <h4>FREE SHipping</h4>
                                <p>Lorem ipsum dolor sit amet, onsectetur adipisicing</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-item text-white pl-120">
                                <i class="zmdi zmdi-headset"></i>
                                <h4>24/7 SUPPORT</h4>
                                <p>Lorem ipsum dolor sit amet, onsectetur adipisicing</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-item text-white pl-120 rm-0">
                                <i class="zmdi zmdi-balance-wallet"></i>
                                <h4>100% MONEY BACK</h4>
                                <p>Lorem ipsum dolor sit amet, onsectetur adipisicing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Service Area -->
            <!-- Start Sale  Area -->
            <div class="sale-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="section-title text-uppercase mb-40">
                                <h4>on sale</h4>
                            </div>
                            <div class="sale-list">
                                <div class="sinlge-sale mb-30 clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="<?php echo base_url('img/user/')?>sale/1.jpg" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                    <span class="old-price">£190.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sinlge-sale mb-30 clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="<?php echo base_url('img/user/')?>sale/2.jpg" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                    <span class="old-price">£190.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sinlge-sale clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="<?php echo base_url('img/user/')?>sale/3.jpg" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                    <span class="old-price">£190.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="section-title text-uppercase mb-40">
                                <h4>Top Rated</h4>
                            </div>
                            <div class="sale-list">
                                <div class="sinlge-sale mb-30 clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="<?php echo base_url('img/user/')?>sale/4.jpg" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sinlge-sale mb-30 clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="<?php echo base_url('img/user/')?>sale/5.jpg" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                    <span class="old-price">£190.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sinlge-sale clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="<?php echo base_url('img/user/')?>sale/6.jpg" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 hidden-sm">
                            <div class="offer-banner">
                                <a href="#">
                                    <img src="<?php echo base_url('img/user/')?>sale/offer.jpg" alt="">
                                </a>
                                <!-- CountDown -->
                                <div class="product-cuntdown white-bg text-center">
                                    <div class="timer">
                                        <div data-countdown="2018/06/01"></div>
                                    </div>
                                </div>
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
                                        <img alt="" src="<?php echo base_url('img/user/')?>testimonial/1.jpg">
                                        <div class="testimonial-info white-bg clearfix">
                                            <div class="testimonial-author text-uppercase">
                                                <h5>ANIKA MOLLIK</h5>
                                                <p>chairmen</p>
                                            </div>
                                            <p>consectetur adipisicing elit, sed do eiusmod tempor  incididunt
    labore et dolore magna aliqua. Ut enim ad minim veniam,voluptate velit esse cillu nulla pariatur. Excepteur sint occaecat</p>
                                        </div>
                                    </div>
                                    <div class="single-testimonial text-center">
                                        <img alt="" src="<?php echo base_url('img/user/')?>testimonial/2.jpg">
                                        <div class="testimonial-info white-bg clearfix">
                                            <div class="testimonial-author text-uppercase">
                                                <h5>Ashim Kumar</h5>
                                                <p>CEO</p>
                                            </div>
                                            <p>consectetur adipisicing elit, sed do eiusmod tempor  incididunt
    labore et dolore magna aliqua. Ut enim ad minim veniam,voluptate velit esse cillu nulla pariatur. Excepteur sint occaecat</p>
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
        <footer id="footer" class="footer-area">
            <div class="footer-top-area gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget">
                                <div class="footer-widget-img pb-30">
                                    <a href="#">
                                        <img src="<?php echo base_url('img/user/')?>logo/logo-2.png" alt="">
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
                                <p>Merry's Collection stood since 2002, our founders Mariyanto and Hans have brought this vision to life and work to the needs of the leather lovers worldwide. We have a team of professionals from the beginning to make jackets, leather bags, leather shoes and suits etc.</p>
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
                                <img src="<?php echo base_url('img/user/')?>payment.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer area -->
        <!--Quickview Product Start -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="single-product-image">
                                    <div id="product-img-content">
                                        <div id="my-tab-content" class="tab-content mb-20">
                                            <div class="tab-pane b-img active" id="view1">
                                                <a class="venobox" href="<?php echo base_url('img/user/')?>product/product-details/1.jpg" data-gall="gallery" title=""><img src="<?php echo base_url('img/user/')?>product/product-details/1.jpg" alt=""></a>
                                            </div>
                                            <div class="tab-pane b-img" id="view2">
                                                <a class="venobox" href="<?php echo base_url('img/user/')?>product/product-details/2.jpg" data-gall="gallery" title=""><img src="<?php echo base_url('img/user/')?>product/product-details/2.jpg" alt=""></a>
                                            </div>
                                            <div class="tab-pane b-img" id="view3">
                                                <a class="venobox" href="<?php echo base_url('img/user/')?>product/product-details/3.jpg" data-gall="gallery" title=""><img src="<?php echo base_url('img/user/')?>product/product-details/3.jpg" alt=""></a>
                                            </div>
                                            <div class="tab-pane b-img" id="view4">
                                                <a class="venobox" href="<?php echo base_url('img/user/')?>product/product-details/4.jpg" data-gall="gallery" title=""><img src="<?php echo base_url('img/user/')?>product/product-details/4.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div id="viewproduct" class="nav nav-tabs product-view bxslider" data-tabs="tabs">
                                            <div class="pro-view b-img active"><a href="#view1" data-toggle="tab"><img src="<?php echo base_url('img/user/')?>product/product-details/s-1.jpg" alt=""></a></div>
                                            <div class="pro-view b-img"><a href="#view2" data-toggle="tab"><img src="<?php echo base_url('img/user/')?>product/product-details/s-2.jpg" alt=""></a></div>
                                            <div class="pro-view b-img"><a href="#view3" data-toggle="tab"><img src="<?php echo base_url('img/user/')?>product/product-details/s-3.jpg" alt=""></a></div>
                                            <div class="pro-view b-img"><a href="#view4" data-toggle="tab"><img src="<?php echo base_url('img/user/')?>product/product-details/s-4.jpg" alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details-content">
                                    <div class="product-content text-uppercase">
                                        <a href="product-details.html" title="Slim Shirt With Stretch">Slim Shirt With Stretch</a>
                                        <div class="rating-icon pb-20 mt-10">
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star-half"></i>
                                            <i class="zmdi zmdi-star-half"></i>
                                        </div>
                                        <div class="product-price pb-20">
                                            <span class="new-price">£ 185.00</span>
                                            <span class="old-price">£ 200.00</span>
                                        </div>
                                    </div>
                                    <div class="product-view pb-20">
                                        <h4 class="product-details-tilte text-uppercase">overview</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. luptate. </p>
                                    </div>
                                    <div class="product-size text-uppercase pb-30">
                                        <h4 class="product-details-tilte text-uppercase pb-10">size</h4>
                                        <ul>
                                            <li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>
                                        </ul>
                                    </div>
                                    <div class="product-attributes clearfix">
                                        <div class="product-color text-uppercase pb-30">
                                            <h4 class="product-details-tilte text-uppercase pb-10">color</h4>
                                            <ul>
                                                <li class="color-1"><a href="#"></a></li>
                                                <li class="color-2"><a href="#"></a></li>
                                                <li class="color-3"><a href="#"></a></li>
                                                <li class="color-4"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                        <div class="pull-left" id="quantity-wanted">
                                            <h4 class="product-details-tilte text-uppercase pb-10">quantity</h4>
                                            <input type="number" value="1">
                                        </div>
                                    </div>
                                    <div class="product-action-shop text-center mb-30">
                                        <a href="#" title="Quick view">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <a href="#" title="Add to cart">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                                        <a href="#" title="Add to Wishlist">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>
                                    <div class="socialsharing-product">
                                        <h4 class="product-details-tilte text-uppercase pb-10">share this on</h4>
                                        <button type="button"><i class="zmdi zmdi-facebook"></i></button>
                                        <button type="button"><i class="zmdi zmdi-instagram"></i></button>
                                        <button type="button"><i class="zmdi zmdi-rss"></i></button>
                                        <button type="button"><i class="zmdi zmdi-twitter"></i></button>
                                        <button type="button"><i class="zmdi zmdi-pinterest"></i></button>
                                    </div>
                                </div>
                                <!-- .product-info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script type="text/javascript">

      var status;
      status = <?=$this->session->userdata('status')?>;
      function tes(ids){
        if ( status == 'login') {
          Lobibox.window({
              title: 'Window title',
              content: '...'
          });
        }else {
          $.ajax({
            type : "POST",
            url : url + "user/cart/add_cart",
            data : {id_barang : ids},
            dataType : "json",
            success : function(){
              $('#modalpesan').modal('show');
            }
          });
        }
      };
    </script>

</body>

</html>
