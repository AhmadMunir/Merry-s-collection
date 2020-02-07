<script>
var sam = 0;
var id_trans;
var omkir = 0;
var tot;
var taxs;
    $(document).ready(function(){
        // CALL FUNCTION SHOW PRODUCT
        // $('#cart_itung').html('html');
        load_address();
        show_country();
        // show_product();
        // set_tax();
        // grand_tot();
        //
        // $('#paypal-button-container').hide();

        //Pusher
        // Pusher.logToConsole = true;

        var pusher = new Pusher('47980f8443159a27e646', {
          cluster: 'ap1',
          forceTLS: true
        });

        var trasi = pusher.subscribe('transaksi');
        trasi.bind('my-event', function(data){
          if (data.stts == 'trans_sukses') {
            // alert(data.message);
            // location.reload(true);
            alert('sukses');
            // $('#cartt').hide();
            // $('#afterpay').fadeIn();
            // $('#status_pembayaran').html('Tansaction success, go to profile to check your history transaction.');
          }
        });

        var channel = pusher.subscribe('notif-cart');
        channel.bind('my-event', function(data) {
          if (data.status == 'success') {
            $('#cart_itung').html(data.itung_cart);
            // show_product();
            // set_tax();
            // grand_tot();
          }else if (data.status == 'error') {
            // alert(data.ket);
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

        // function set_tax(){
        //   $.ajax({
        //     url : '<?php echo base_url("user/cart/tax");?>',
        //     type : 'GET',
        //     dataType : 'json',
        //     success : function(tax){
        //       var html = 'USD ';
        //       html += tax;
        //       taxs = tax;
        //       $('#tax').html(html);
        //     }
        //   });
        // }
        function load_address(){
          $.ajax({
            url : '<?php echo base_url("user/custom/get_address") ?>',
            type  : 'GET',
            dataType  : 'json',
            success : function(address){
              var country = '';
              var prvince = '';
              var city = '';
              var detail = '';
              var zip = '';
              if (address.status == 1) {
                if (address.address[0].id_neg == 'idn' ) {
                  $('.inter').hide();
                  $('.indo').fadeIn();
                  country = '<option value="'+address.address[0].id_neg+'-'+address.address[0].kode_neg+'">'+address.address[0].negara+'</option>';
                  prvince = '<option value="'+address.address[0].id_prov+'">'+address.address[0].provinsi+'</option>';
                  city = '<option value="'+address.address[0].id_kota+'">'+address.address[0].kota+'</option>';

                  detail = address.address[0].alamat;

                  $('#country').html(country);
                  $('#province').html(prvince);
                  $('#city').html(city);
                  $('#zip').val(address.address[0].kode_pos);
                  $('#detail_address').val(detail);
                }else {
                  $('.inter').fadeIn();
                  $('.indo').hide();
                  country = '<option value="'+address.address[0].id_neg+'-'+address.address[0].kode_neg+'">'+address.address[0].negara+'</option>';
                  prvince = address.address[0].provinsi;
                  city = address.address[0].kota;
                  detail = address.address[0].alamat;

                  $('#country').html(country);
                  $('#zip').val(address.address[0].kode_pos);
                  $('#province_inter').val(prvince);
                  $('#city_inter').val(city);
                  $('#detail_address').val(detail);
                }
              }else {

              }
              show_country();
            }
          });
        }

        function show_country(){
          $.ajax({
            url : '<?php echo site_url("shipping/country_db")?>',
            type : 'GET',
            dataType  : 'json',
            success : function(option){
              var current = $('#country option:selected').text();
              var currentval = $('#country').val();
              var html = '';
              // html += '<option value="&nbsp"> Select Country </option>';
              if (current != '') {
                html += '<option value="'+currentval+'">'+current+'</option>';
              }
              html += '<option value="idn-ID">Indonesia</option>';
              var i;
              for(i=0; i<option.length; i++){
                html += '<option value="'+option[i].id_country+'-'+option[i].code+'">'+option[i].country+'</option>';
              }
              $('#country').html(html);
            }
          });
        }

        $('#country').change(function(){
          var cn = $('#country').val();
          if (cn === 'idn-ID') {
            $('.indo').fadeIn();
            $('.inter').hide();
            $('#provice_int').val("");
            $('#city_int').val("");
            $('#zip').val("");
            $('#detail_address').val("");

            show_province();
            var html ="";
            html += '<select name="kurir" id="kurir">'+
                    '<option value="" selected > select Courier</option>'+
                    '<option value="pos" > POS </option>'+
                    '<option value="jne" > JNE </option>'+
                    '<option value="tiki" > TIKI </option>'+
                    '</select>';
            $('#kurir').html(html);
            var ht = ''
            ht += '<option value="&nbsp"> Select Service </option>';
            $('#service').html(ht);
          }else {
            $('.indo').hide();
            $('.inter').fadeIn();
            $('#provice_int').val("");
            $('#city_int').val("");
            $('#zip').val("");
            $('#detail_address').val("");

            var html ="";
            html += '<select name="kurir" id="kurir">'+
                    '<option value="" selected > select Courier</option>'+
                    '<option value="jne" > International SHIPPING</option>'+
                    '</select>';
            $('#kurir').html(html);
            var ht = ''
            ht += '<option value="&nbsp"> Select Service </option>';
            $('#service').html(ht);
          }
        });

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

          var cn = $('#country').val();
          if (cn === 'idn-ID') {
          var kurir = $('#kurir').val();
          var city = $('#city').val();

          $.ajax({
            type  : 'POST',
            url : '<?php echo site_url("shipping/cek_ongkir")?>',
            dataType  : 'json',
            data  : {'kurir' : kurir, 'city' :city},
            success : function(ongkir){
              var html = '';
              html += '<option value="&nbsp"> Select Service </option>';

              var i;
              for(i=0; i<ongkir.length; i++){
                html +='<option value="'+ongkir[i].cost+'">'+ongkir[i].service+'&nbsp;-&nbsp; USD '+ongkir[i].cost+'</option>';
              }
              $('#service').html(html);
            }
          });
        }else {

            $.ajax({
              type  : 'POST',
              url : '<?php echo site_url("shipping/ongkir_in")?>',
              dataType  : 'json',
              data  : {'dest' : cn},
              success : function(ongkir){
                var html = '';
                html += '<option value="&nbsp"> Select Service </option>';

                var i;
                for(i=0; i<ongkir.length; i++){
                  html +='<option value="'+ongkir[i].cost+'">'+ongkir[i].service+'&nbsp;-&nbsp; USD '+ongkir[i].cost+'</option>';
                }
                $('#service').html(html);
              }
            });
        }
          // if ($('#city').val() == null) {
          //   var city = document.getElementById('default_city').value;
          // } else {
          //   var city = $('#city').val();
          // }


        });

        $('#service').change(function(){
          var html;
          var ship = 'USD '
          ship += $('#service').val();
          $('#shipping').html(ship);
          omkir = $('#service').val();
          var myStr = $('#country').val();
          var strArray = myStr.split("-");

          var cn = strArray[0];
          // alert(strArray[0]);
          if (cn === 'idn') {
            $.ajax({
              type  : 'POST',
              url : '<?php echo base_url("shipping/set_ship_session");?>',
              dataType  : 'json',
              data  : {'cost':$('#service').val(),
              'method':$('#kurir option:selected').text()+'-'+$('#service option:selected').text(),
              'a1':document.getElementById('detail_address').value,
              // 'a2':'Sukosari',
              'a3':$('#city option:selected').text(),
              'a4':$('#province option:selected').text(),
              'a5':$('#zip').val(),
              'a6':'ID',},
            });
            document.getElementById("paypal-button-container").style.pointerEvents = "auto";
            grand_tot();
          }else {
            $.ajax({
              type  : 'POST',
              url : '<?php echo base_url("shipping/set_ship_session");?>',
              dataType  : 'json',
              data  : {'cost':$('#service').val(),
              'method':$('#kurir option:selected').text()+'-'+$('#service option:selected').text(),
              'a1':document.getElementById('detail_address').value,
              // 'a2':'Sukosari',
              'a3':$('#city_int').val(),
              'a4':$('#province_int').val(),
              'a5':$('#zip').val(),
              'a6':strArray[1],},
            });
            document.getElementById("paypal-button-container").style.pointerEvents = "auto";
            grand_tot();
          }


        });

        $('#detail_address').on('keyup', function(){
          var html;
          var ship = 'USD '
          ship += $('#service').val();
          $('#shipping').html(ship);
          omkir = $('#service').val();

          var myStr = $('#country').val();
          var strArray = myStr.split("-");

          var cn = strArray[0];
          if (cn === 'idn') {
            $.ajax({
              type  : 'POST',
              url : '<?php echo base_url("shipping/set_ship_session");?>',
              dataType  : 'json',
              data  : {'cost':$('#service').val(),
              'method':$('#kurir option:selected').text()+'-'+$('#service option:selected').text(),
              'a1':document.getElementById('detail_address').value,
              // 'a2':'Sukosari',
              'a3':$('#city option:selected').text(),
              'a4':$('#province option:selected').text(),
              'a5':$('#zip').val(),
              'a6':'ID',},
            });
            document.getElementById("paypal-button-container").style.pointerEvents = "auto";
            grand_tot();
          }else {
            $.ajax({
              type  : 'POST',
              url : '<?php echo base_url("shipping/set_ship_session");?>',
              dataType  : 'json',
              data  : {'cost':$('#service').val(),
              'method':$('#kurir option:selected').text()+'-'+$('#service option:selected').text(),
              'a1':document.getElementById('detail_address').value,
              // 'a2':'Sukosari',
              'a3':$('#city_int').val(),
              'a4':$('#provice_int').val(),
              'a5':$('#zip').val(),
              'a6':strArray[1],},
            });
            document.getElementById("paypal-button-container").style.pointerEvents = "auto";
            grand_tot();
          }

        });

        //grand_total
        function grand_tot(){
          if (parseInt(tot)>0) {
            gr = parseInt(tot)+parseInt(taxs)+parseInt(omkir);
            $('#grand_total').html(gr);
          }else {
            $('#grand_total').html(0);
          }
        }

        //input detail address

        $('#detail_address').on('input',function(){
          $('#detail_address').css("backgrounColor", "green");
          $('#address_from_db').hide();
          html = 'The package will deliver to '+document.getElementById('detail_address').value+
                  ', '+$('#city option:selected').text()+$('#city_int').val()+', '+$('#province option:selected').text()+$('#provice_int').val();
          $('#address_from_this').html(html);
        });

        // FUNCTION SHOW PRODUCT
        // function show_product(){
        //     $.ajax({
        //         url   : '<?php echo site_url("user/cart/get_cart");?>',
        //         type  : 'GET',
        //         async : true,
        //         dataType : 'json',
        //         success : function(data){
        //             var html = '';
        //             var count = 1;
        //             var i;
        //             var sum = 'USD ';
        //
        //
        //             // $('#result').text(sum);
        //
        //             if (data.status == 'gagal') {
        //               $('#result').text('-');
        //               html += "Nothing here";
        //               document.getElementById("checkout").style.pointerEvents = "none";
        //             }else {
        //               for(i=0; i<data.data.length; i++){
        //                 html += '<tr>'+
        //                         '<td class="product-thumbnail"><a href="#" title="'+ data.data[i].nama_barang +'"><img class="product-thumbnail" src="<?php echo base_url('img/barang/') ?>'+ data.data[i].gambar +'" alt="" ></a></td>'+
        //                         '<td class="product-name pull-left mt-20">'+
        //                           '<a href="#" title="'+ data.data[i].nama_barang +'">'+ data.data[i].nama_barang + '</a>'+
        //                           '<p class="w-color m-0">'+
        //                               '<label> Color : </label>'+
        //                               'black'+
        //                           '</p>'+
        //                           '<p class="w-size m-0">'+
        //                               '<label> Size :  </label>'+
        //                               ' '+data.data[i].size+
        //                           '</p>'+
        //                         '</td>'+
        //                         '<td class="product-prices price-'+ count++ + '"><span class="amount">'+ data.data[i].harga + '</span></td>'+
        //                         '<td class="product-value">'+
        //                           '<span>'+data.data[i].qty+'</span>'+
        //                         '</td>'+
        //                         '<td class="product-stock-status"><span class="whislist-in-stok">'+ data.data[i].subtotal +'</span></td>'+
        //                         '<td class="product-remove">'+
        //                           '<a href="javascript:void(0);" class="delete_cart" data-id="' + data.data[i].id_detail_temp_transaksi +'"><i class="zmdi zmdi-delete"></i></a>'+
        //                           '<td>'+
        //                         '</tr>';
        //             }
        //             sum += data.data[0].total;
        //             tot = data.data[0].total;
        //             document.getElementById("checkout").style.pointerEvents = "auto";
        //             $('#result').text(sum);
        //             }
        //             $('.show_cart').html(html);
        //         }
        //
        //     });
        // }
        // DELETE PRODUCT

        // $('#mytable').on('click','.delete_cart',function(){
        //     var id_detail_temp_transaksi = $(this).data("id");
        //     $('#ModalDelete').modal('show');
        //     $('.id_detail_temp_transaksi').val(id_detail_temp_transaksi);
        // });

        // $('.btn-delete').on('click',function(){
        //     var id_detail_temp_transaksi = $('.id_detail_temp_transaksi').val();
        //     $.ajax({
        //         url    : '<?php echo site_url("user/cart/delete");?>',
        //         method : 'POST',
        //         data   : {id: id_detail_temp_transaksi},
        //         success: function(){
        //             $('.show_cart').html('');
        //             $('#ModalDelete').modal('hide');
        //         }
        //     });
        // });
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
        return fetch('<?php echo base_url('payment/paypal/custom/createordercustom/order');?>', {
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
        return fetch('../payment/paypal/custom/getordercustom/get', {
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
