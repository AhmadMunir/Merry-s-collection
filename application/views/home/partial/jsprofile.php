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
                  $('#detail_address').val(detail);
                  show_province();
                }else {
                  $('.inter').fadeIn();
                  $('.indo').hide();
                  country = '<option value="'+address.address[0].id_neg+'-'+address.address[0].kode_neg+'">'+address.address[0].negara+'</option>';
                  prvince = address.address[0].provinsi;
                  city = address.address[0].kota;
                  detail = address.address[0].alamat;

                  $('#country').html(country);
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
            // $('#provice_int').val("");
            // $('#city_int').val("");
            // $('#zip').val("");
            // $('#detail_address').val("");
            //
            show_province();
            // var html ="";
            // html += '<select name="kurir" id="kurir">'+
            //         '<option value="" selected > select Courier</option>'+
            //         '<option value="pos" > POS </option>'+
            //         '<option value="jne" > JNE </option>'+
            //         '<option value="tiki" > TIKI </option>'+
            //         '</select>';
            // $('#kurir').html(html);
            // var ht = ''
            // ht += '<option value="&nbsp"> Select Service </option>';
            // $('#service').html(ht);
          }else {
            $('.indo').hide();
            $('.inter').fadeIn();
            // $('#provice_int').val("");
            // $('#city_int').val("");
            // $('#zip').val("");
            // $('#detail_address').val("");
            //
            // var html ="";
            // html += '<select name="kurir" id="kurir">'+
            //         '<option value="" selected > select Courier</option>'+
            //         '<option value="jne" > International SHIPPING</option>'+
            //         '</select>';
            // $('#kurir').html(html);
            // var ht = ''
            // ht += '<option value="&nbsp"> Select Service </option>';
            // $('#service').html(ht);
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

        // country_name
        $('#country').change(function(){

          var myStr = $('#country').val();
          var strArray = myStr.split("-");

          document.getElementById('country_code').value = strArray[1];
          document.getElementById('country_id').value = strArray[0];
          document.getElementById('cn_name').value = $('#country option:selected').text();
        });

        //prov name
        $('#province').change(function(){
          document.getElementById('prov_name').value = $('#province option:selected').text();
        });

        //city name
        $('#city').change(function(){
          document.getElementById('city_name').value = $('#city option:selected').text();
        });


      });
</script>
