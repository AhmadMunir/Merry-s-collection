<script>
  $(function(){
    load_custom()

      // Pusher
      Pusher.logToConsole = true;

      var pusher = new Pusher('47980f8443159a27e646', {
        cluster: 'ap1',
        forceTLS: true
      });

      var chat = pusher.subscribe('custom');
      chat.bind('custom', function(data){
        if (data.status == 'success') {
            load_custom();
          }
        }
      );

    }
  );

  function load_custom(){
    html ='';
    $.ajax({
      url : '<?php echo base_url("user/custom/get_custom") ?>',
      type : 'GET',
      dataType  : 'json',
      success : function(custom){
        if (custom.status=='1') {
          for (var i = 0; i < custom.custom.length; i++) {
            html += '<tr>'+
                    '<td class="product-name pull-left mt-20">'+
                      '<a href="<?php echo base_url('user/custom/cart_custom'); ?>" title="'+ custom.custom[i].nama_barang +'">'+ custom.custom[i].nama_barang + '</a>'+
                    '</td>'+
                    '<td class="product-prices"><span class="amount">'+ custom.custom[i].harga + '</span></td>'+
                    '<td class="product-stock-status"><span class="whislist-in-stok">'+ custom.custom[i].tanggal +'</span></td>'+
                    '<td class="product-remove">'+
                      '<a href="javascript:void(0);" class="delete_cart" data-id="' + custom.custom[i].id_temp_custom +'"><i class="zmdi zmdi-delete"></i></a>'+
                      '<td>'+
                    '</tr>';
          }
        }else {
          html += "Nothing Found";
        }
        $('.show_cartcustom').html(html);
      }
    });
  }

</script>
