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
                                                    <th class="product-add-to-cart"><span class="nobr">Add to Cart </span></th>
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
                                                                <select>
                                                                    <option selected="selected" value="position">Country</option>
                                                                    <option value="Name">Bangladesh</option>
                                                                    <option value="Price">india</option>
                                                                    <option value="Price">Nepal</option>
                                                                </select>
                                                            </div>
                                                            <div class="cart-show-label show-label mt-15">
                                                                <select name="province" id="province">
                                                                  <option value="" selected >Province</option>
                                                                  <!-- <div id="provin" class="provin"> -->
                                                                  <!-- </div> -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="cart-show-label show-label">
                                                                <select name="city" id="city">
                                                                  <option value="" selected >CITY</option>
                                                                </select>
                                                            </div>
                                                            <div class="cart-show-label show-label mt-15">
                                                                <select>
                                                                    <option selected="selected" value="position">Zip/Postal Code</option>
                                                                    <option value="Name">1200</option>
                                                                    <option value="Price">1201</option>
                                                                    <option value="Price">1202</option>
                                                                    <option value="Price">1203</option>
                                                                    <option value="Price">1204</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                      <div class="col-sm-6">
                                                        <div class="cart-show-label show-label">
                                                          <select name="kurir" id="kurir">
                                                            <option value="" selected > select Courier</option>
                                                            <option value="pos" selected > POS </option>
                                                            <option value="jne" selected > JNE </option>
                                                            <option value="tiki" selected > TIKI </option>
                                                          </select>
                                                        </div>
                                                        <div class="cart-show-label show-label mt-15">
                                                          <select name="service" id="service">
                                                            <option value="" selected > Select Service </option>
                                                          </select>
                                                        </div>
                                                      </div>

                                                    </div>
                                                </div>
                                                <a class="button extra-small pull-right mt-20" href="#" title="Add to Cart">
                                                    <span>Get a Quote</span>
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-sm-6 clearfix">
                                                <div class="counpon-info ml-35">
                                                    <div class="cart-title text-uppercase">
                                                        <h5 class="mb-30"><strong>COUPON DISCOUNT</strong></h5>
                                                    </div>
                                                    <div class="coupon-discount">
                                                        <label class="pb-10">Enter Your Coupon Code Here</label>
                                                        <input type="text">
                                                    </div>
                                                    <a class="button extra-small pull-right mt-35" href="#" title="Add to Cart">
                                                        <span>Apply Coupon</span>
                                                    </a>
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
                                                            <tr class="cart-shipping">
                                                                <th>Shipping</th>
                                                                <td id="shipping">-</td>
                                                            </tr>
                                                            <tr class="cart-total">
                                                                <th>Grand Total</th>
                                                                <td>£215.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <script
                                                      src="https://www.paypal.com/sdk/js?client-id=AS6yMkPP1YEQ_1RPmSItB_hnP8uthx2dEREmoMSg9MMLiKebZ4VFRYbiOnKhR4nFoBYlr25YKcEiWgXl"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
                                                    </script>
                                                    <div id="paypal-button-container"></div>
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
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script>
    var sam = 0;
    var id_trans;
        $(document).ready(function(){
            // CALL FUNCTION SHOW PRODUCT
            show_province();
            show_product();

            function show_province(){
              $.ajax({
                url : '<?php echo site_url("shipping/province")?>',
                type : 'GET',
                dataType  : 'json',
                success : function(option){
                  var html = '';
                  html += '<option value="&nbsp"> Select Province </option>'
                  var i;
                  for(i=0; i<option.length; i++){
                    html += '<option value="'+option[i].id_province+'">'+option[i].province+'</option>';
                  }
                  $('#province').html(html);
                }
              });
            }

            // province on change
            $('#province').change(function(){
              html = '<option value="&nbsp"> Select City </option>'
              $('#city').html(html);

              var prov = $('#province').val();

              $.ajax({
                type  : 'POST',
                url : '<?php echo site_url("shipping/city")?>',
                dataType  : 'json',
                data : {id_province : prov},
                success : function(city){
                  // console.log('data : ', city);
                  var html = '';
                  html += '<option value="&nbsp"> Select City </option>'

                  var i;
                  for(i=0; i<city.length; i++){
                    html += '<option value="'+city[i].city_id+'">'+city[i].type+'&nbsp'+city[i].city_name+'</option>';
                  }
                  $('#city').html(html);
                }
              });
            });

            //cek ongkir
            $('#kurir').change(function(){
              // html = '<option value="&nbsp"> Selectn Courier </option>'
              // $('#kurir').html(html);

              var kurir = $('#kurir').val();
              var city = $('#city').val();

              $.ajax({
                type  : 'POST',
                url : '<?php echo site_url("shipping/cek_ongkir")?>',
                dataType  : 'json',
                data  : {'kurir' : kurir, 'city' :city},
                success : function(ongkir){
                  var html = '';
                  html += '<option value="&nbsp"> Select Service </option>'

                  var i;
                  for(i=0; i<ongkir.length; i++){
                    html +='<option value="'+ongkir[i].cost+'">'+ongkir[i].service+'&nbsp;-&nbsp;'+ongkir[i].cost+'</option>';
                  }
                  $('#service').html(html);
                }
              });
            });

            $('#service').change(function(){
              var ship = $('#service').val();
              $('#shipping').html(ship);
            });

            // FUNCTION SHOW PRODUCT
            function show_product(){
                $.ajax({
                    url   : '<?php echo site_url("user/cart/get_cart");?>',
                    type  : 'GET',
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var count = 1;
                        var i;
                        var sum = 0;
                        sum = data[0].total;

                        $('#result').text(sum);

                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                                    '<td class="product-thumbnail"><a href="#" title="'+ data[i].nama_barang +'"><img class="product-thumbnail" src="<?php echo base_url('img/barang/') ?>'+ data[i].gambar +'" alt="" ></a></td>'+
                                    '<td class="product-name pull-left mt-20">'+
                                      '<a href="#" title="'+ data[i].nama_barang +'">'+ data[i].nama_barang + '</a>'+
                                      '<p class="w-color m-0">'+
                                          '<label> Color : </label>'+
                                          'black'+
                                      '</p>'+
                                      '<p class="w-size m-0">'+
                                          '<label> Size : </label>'+
                                          'sl'+
                                      '</p>'+
                                    '</td>'+
                                    '<td class="product-prices price-'+ count++ + '"><span class="amount">'+ data[i].harga + '</span></td>'+
                                    '<td class="product-value">'+
                                      '<input type="number" value="'+ data[i].qty + '">'+
                                    '</td>'+
                                    '<td class="product-stock-status"><span class="whislist-in-stok">'+ data[i].subtotal +'</span></td>'+
                                    '<td class="product-remove">'+
                                      '<a href="javascript:void(0);" class="delete_cart" data-id="' + data[i].id_detail_temp_transaksi +'"><i class="zmdi zmdi-delete"></i></a>'+
                                      '<td>'+
                                    '</tr>';
                        }
                        $('.show_cart').html(html);
                    }

                });
            }
            // DELETE PRODUCT
            $('#mytable').on('click','.delete_cart',function(){
                var id_detail_temp_transaksi = $(this).data("id");
                $('#ModalDelete').modal('show');
                $('.id_detail_temp_transaksi').val(id_detail_temp_transaksi);
            });

            $('.btn-delete').on('click',function(){
                var id_detail_temp_transaksi = $('.id_detail_temp_transaksi').val();
                $.ajax({
                    url    : '<?php echo site_url("user/cart/delete");?>',
                    method : 'POST',
                    data   : {id: id_detail_temp_transaksi},
                    success: function(){
                        $('#ModalDelete').modal('hide');
                        show_product();
                    }
                });
            });
            // END DELETE PRODUCT

          });
    </script>
    <script>
    //function get total;
    function get_total(){
      $.ajax({
          url   : '<?php echo site_url("user/cart/get_cart");?>',
          type  : 'GET',
          async : true,
          dataType : 'json',
          success : function(data){
              id_trans = data[0].id_transaksi;
              sam = data[0].total;
              }
          });
      };
    paypal.Buttons({
        createOrder: function(data, actions) {
          // This function sets up the details of the transaction, including the amount and line item details.
          get_total();
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: sam
                // TODO: menambahkan fee
              }
            }]
          });
        },
        onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
        // var status;

        // show_product();
        return fetch('transaksi/add_trans_cart', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            id: id_trans,
            alamat: 'asds'
          })
        })
      ;
        alert('Transaction completed by ' + details.payer.name.given_name);

        });
      }
      }).render('#paypal-button-container');
    </script>



</body>

</html>
