<!-- jquery latest version -->
<script src="<?php echo base_url('js/user/vendor/jquery-3.1.1.min.js'); ?>"></script>
<!-- Bootstrap framework js -->
<script src="<?php echo base_url('js/user/bootstrap.min.js') ?>"></script>
<!-- Particles js -->
<script src="<?php echo base_url('js/user/particles.js') ?>"></script>
<!-- All js plugins included in this file. -->
<script src="<?php echo base_url('js/user/plugins.js') ?>"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="<?php echo base_url('js/user/main.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/validasi.js') ?>"></script>

<!-- notification JS
============================================ -->
<script src="<?php echo base_url() ?>js/general/notifications/Notification.js"></script>
<script src="<?php echo base_url() ?>js/general/notifications/notification-active.js"></script>

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script>
var sam = 0;
var id_trans;
var omkir;
    $(document).ready(function(){
        // CALL FUNCTION SHOW PRODUCT
        // $('#cart_itung').html('html');
        show_province();
        show_product();
        set_tax()
        //
        // $('#paypal-button-container').hide();

        //Pusher
        // Pusher.logToConsole = true;

        var pusher = new Pusher('47980f8443159a27e646', {
          cluster: 'ap1',
          forceTLS: true
        });

        var channel = pusher.subscribe('notif-cart');
        channel.bind('my-event', function(data) {
          if (data.status == 'success') {
            $('#cart_itung').html(data.itung_cart);
            show_product();
            set_tax();
          }
        });

        itung_cart();
        function itung_cart(){
          $.ajax({
            url : '<?php echo site_url("user/cart/hitung_cart")?>',
            type : 'GET',
            success : function(data){

            }
          });
        }

        function set_tax(){
          $.ajax({
            url : '<?php echo base_url("user/cart/tax");?>',
            type : 'GET',
            dataType : 'json',
            success : function(tax){
              var html;
              html = tax;
              $('#tax').html(html);
            }
          });
        }

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

          var kurir = $('#kurir').val();
          var city = $('#city').val();
          // if ($('#city').val() == null) {
          //   var city = document.getElementById('default_city').value;
          // } else {
          //   var city = $('#city').val();
          // }

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
          var html;
          var ship = $('#service').val();
          $('#shipping').html(ship);
          omkir = ship;

          $.ajax({
            type  : 'POST',
            url : '<?php echo base_url("shipping/set_ship_session");?>',
            dataType  : 'json',
            data  : {'cost':$('#service').val(),
            'method':$('#kurir option:selected').text()+'-'+$('#service option:selected').text(),
             'a1':document.getElementById('detail_address').value,
             // 'a2':'Sukosari',
             'a3':$('#city').val(),
             'a4':$('#province').val(),
             'a5':$('#zip').val(),
             'a6':'US',},
          });
        });

        //input detail address

        $('#detail_address').on('input',function(){
          $('#detail_address').css("backgrounColor", "green");
          $('#address_from_db').hide();
          html = 'The package will deliver to '+document.getElementById('detail_address').value+
                  ', '+$('#city option:selected').text()+', '+$('#province option:selected').text();
          $('#address_from_this').html(html);
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

                }
            });
        });
        // END DELETE PRODUCT

        // country_name
        $('#country').change(function(){
          document.getElementById('cn_name').value = $('#country option:selected').text();
        });

        //prov name
        $('.prv').change(function(){
          document.getElementById('prov_name').value = $('#province option:selected').text();
        });

        //city name
        $('.city').change(function(){
          document.getElementById('city_name').value = $('#city option:selected').text();
        });


      });
</script>
<script>
  paypal.Buttons({
    createOrder: function() {
        return fetch('<?php echo base_url('payment/paypal/createorder/order');?>', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          }
        }).then(function(res) {
          return res.json();
        }).then(function(data) {
          return data.result.id; // Use the same key name for order ID on the client and server
        });
      },
      onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        // alert('Transaction completed by ' + details.payer.name.given_name);
        // Call your server to save the transaction
        return fetch('../payment/paypal/getorder/get', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            orderID: data.orderID
          })
        });
      });
    }
  }).render('#paypal-button-container');
</script>
<!-- <script>

paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        "intent": "CAPTURE",
         "application_context": {
           "return_url": "https://google.com",
           "cancel_url": "https://example.com",
           "brand_name": "EXAMPLE INC",
           "locale": "en-US",
           "landing_page": "BILLING",
           "shipping_preference": "SET_PROVIDED_ADDRESS",
           "user_action": "CONTINUE"
         },
         "purchase_units": [
           {
             "reference_id": "PUHF",
             "description": "Sporting Goods",

             "custom_id": "CUST-HighFashions",
             "soft_descriptor": "HighFashions",
             "amount": {
               "currency_code": "USD",
               "value": "230.00",
               "breakdown": {
                 "item_total": {
                   "currency_code": "USD",
                   "value": "180.00"
                 },
                 "shipping": {
                   "currency_code": "USD",
                   "value": "30.00"
                 },
                 "handling": {
                   "currency_code": "USD",
                   "value": "10.00"
                 },
                 "tax_total": {
                   "currency_code": "USD",
                   "value": "20.00"
                 },
                 "shipping_discount": {
                   "currency_code": "USD",
                   "value": "10"
                 }
               }
             },
             "items": [
               {
                 "name": "T-Shirt",
                 "description": "Green XL",
                 "sku": "sku01",
                 "unit_amount": {
                   "currency_code": "USD",
                   "value": "90.00"
                 },
                 "tax": {
                   "currency_code": "USD",
                   "value": "10.00"
                 },
                 "quantity": "1",
                 "category": "PHYSICAL_GOODS"
               },
               {
                 "name": "Shoes",
                 "description": "Running, Size 10.5",
                 "sku": "sku02",
                 "unit_amount": {
                   "currency_code": "USD",
                   "value": "45.00"
                 },
                 "tax": {
                   "currency_code": "USD",
                   "value": "5.00"
                 },
                 "quantity": "2",
                 "category": "PHYSICAL_GOODS"
               }
             ],
             "shipping": {
               "method": "United States Postal Service",
               "address": {
                 "name": {
                   "full_name":"John",
                   "surname":"Doe"
                 },
                 "address_line_1": "123 Townsend St",
                 "address_line_2": "Floor 6",
                 "admin_area_2": "San Francisco",
                 "admin_area_1": "CA",
                 "postal_code": "94107",
                 "country_code": "US"
               }
             }
           }
         ]
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
  // createOrder: function() {
  //   return fetch('<?php //echo base_url('payment/paypal/createorder/order');?>', {
  //     method: 'post',
  //     headers: {
  //       'content-type': 'application/json'
  //     }
  //   }).then(function(res) {
  //     return res.json();
  //   }).then(function(data) {
  //     return data.id; // Use the same key name for order ID on the client and server
  //   });
  // }
  }).render('#paypal-button-container');
</script> -->
