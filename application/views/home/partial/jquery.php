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

        //Pusher
        Pusher.logToConsole = true;

        var pusher = new Pusher('47980f8443159a27e646', {
          cluster: 'ap1',
          forceTLS: true
        });

        var channel = pusher.subscribe('notif-cart');
        channel.bind('my-event', function(data) {
          if (data.status == 'success') {
            $('#cart_itung').html(data.itung_cart);
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
          omkir = ship;
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
            value: sam,
            tax: omkir
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
