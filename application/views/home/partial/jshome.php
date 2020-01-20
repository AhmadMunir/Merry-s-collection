  <!-- <script src="https://js.pusher.com/5.0/pusher.min.js"></script> -->
<script>
  $(document).ready(function(){
    new_arriv();

    //Pusher
    // Pusher.logToConsole = true;

    var pusher = new Pusher('47980f8443159a27e646', {
      cluster: 'ap1',
      forceTLS: true
    });

    var pesananmasuk = pusher.subscribe('home');
    pesananmasuk.bind('my_event', function(data){
        if (data.status == 'success') {
          // $('#arrival').hide();
          // new_arriv();
          alert('asd');
        }
    });



    function new_arriv(){
      $.ajax({
          url   : '<?php echo site_url("home/get_newarrival");?>',
          type  : 'GET',
          async : true,
          dataType : 'json',
          success : function(data){
              var html = '';
              var count = 1;
              var i;

              if (data.status == 'gagal') {
                html += "Nothing here";
              }else {
                for(i=0; i<data.data.length; i++){
                 html+= '<div class="col-md-3 col-sm-4">'+
                          '<div class="single-product mb-40">'+
                          '<div class="product-img-content mb-20">'+
                                      '<div class="product-img">'+
                                              '<img class="imga" src="<?php echo base_url('img/barang/')?>'+data.data[i].pic+'" alt="">'+
                                          '</a>'+
                                      '</div>'+
                                      '<input  value="'+data.data[i].id_barang+'" type="hidden" readonly disabled>'+
                                      '<div class="product-action text-center">'+
                                          '<a href="javascript:void(0);" class="prev_product" data-id="'+data.data[i].id_barang+'"><i class="zmdi zmdi-eye"></i></i></a>'+
                                          '<a href="javascript:void(0);" class="direct_add" data-id="'+data.data[i].id_barang+'"><i class="zmdi zmdi-shopping-cart"></i></i></a>'+
                                          '<a href="#" title="Add to Wishlist">'+
                                              '<i class="zmdi zmdi-favorite"></i>'+
                                          '</a>'+
                                      '</div>'+
                                  '</div>'+
                                  '<div class="product-content text-center text-uppercase">'+
                                              '<a href="product-details.html" title="'+data.data[i].nama_barang+'">'+data.data[i].nama_barang+'</a>'+
                                              // '<div class="rating-icon"'>+
                                              //     '<i class="zmdi zmdi-star"></i>'+
                                              //     '<i class="zmdi zmdi-star"></i>'+
                                              //     '<i class="zmdi zmdi-star"></i>'+
                                              //     '<i class="zmdi zmdi-star-half"></i>'+
                                              //     '<i class="zmdi zmdi-star-half"></i>'+
                                              // '</div>'+
                                              '<div class="product-price">'+
                                                  '<span class="new-price">USD '+data.data[i].harga+'</span>'+

                                              '</div>'+
                                          '</div>'+
                          '</div>'+
                        '</div>';
                  //
                  //
                  //
                  //
                  // '</div>';
                  // html+= data.data[i].id_barang;
              }
              }
              $('#arrival').html(html);
          }

      });
    }

    $(document).on('click', '.direct_add', function(){
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

            var a = 0;
            // size += '<form id="myForm">';
            for (var i = 0; i < data.stok.length; i++) {
              if (data.stok[i].jumlah_stok != 0) {
                if (a == 0) {
                  size += '<li><label><input type="radio" name="ukuran" onclick="cek_qty()" checked class="ks" value='+data.stok[i].id_detail_stok+'>'+data.stok[i].size+'</label> </li>';
                }else {
                  size += '<li><label><input type="radio" name="ukuran" onclick="cek_qty()" class="ks" value='+data.stok[i].id_detail_stok+'>'+data.stok[i].size+'</label> </li>';
                }
              }
              a++;
            }
            // size += '</form>';
            $('#size_produka').html(size);
            btn += '<div id="addtocart"><a href="javascript:add_cart2(\''+data.detail[0].id_barang+ '\');" ><button class="btn btn-large btn-primary"><span> ADD TO CART </span></button></a></div>';
            $('.btn-add').html(btn);
          }
        });
      $('#drc').modal('show');
    });

    $(document).on('click', '.prev_product', function(){
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

            var a = 0;
            // size += '<form id="myForm">';
            for (var i = 0; i < data.stok.length; i++) {
              if (data.stok[i].jumlah_stok != 0) {
                btn += '<div id="addtocart"><a href="javascript:add_cart2(\''+data.detail[0].id_barang+ '\');" ><button class="btn btn-large btn-primary"><span> ADD TO CART </span></button></a></div>';
                if (a == 0) {
                  size += '<li><label><input type="radio" name="ukuran" onclick="cek_qty()" checked class="ks" value='+data.stok[i].id_detail_stok+'>'+data.stok[i].size+'</label> </li>';
                }else {
                  size += '<li><label><input type="radio" name="ukuran" onclick="cek_qty()" class="ks" value='+data.stok[i].id_detail_stok+'>'+data.stok[i].size+'</label> </li>';
                }
                $('#qty').fadeIn();
              }else {
                $('#qty').hide();

                btn += '<span style="color:red;">Out OF Stock</span>';
              }
              a++;
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

            $('.btn-add').html(btn);
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
  });
</script>
<script>
  var status;
  var ukur = '';
  var status = '<?php echo $this->session->userdata('status')?>';

  // $('.add_cart').on('click', function(){
    var id_barang = $(this).data("id");
    // var id_barang;
    // id_barang = $(this).data("id");
    if (qty == null) {
      qty == 1;
    }

    // if ( status == 'login') {
    //
    //   add_cart(id_barang);
    // }else {
    //   Lobibox.notify('error',{
    //     img: url + 'img/notif/info.png',
    //     position: 'center top',
    //     msg: 'Logiddn First TO add this item to cart'
    //   });
    //
    // }


  function cek_qty(){
    $('#qty').val(1);
    var id = ($("input[name='ukuran']:checked").val());
    $.ajax({
      type : "POST",
      url : url + "home/cek_qty",
      data : {id_stok:id},
      dataType : "json",
      success : function(data){
        if (data[0].jumlah_stok != 0) {
          $('#qty').attr('max', data[0].jumlah_stok);
        }else {
          $('#qty').attr('max', data[0].jumlah_stok);
          $('#qty').attr('min', data[0].jumlah_stok);
        }
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
    if (status != 'login') {
      notiferror('Login first to add this item to cart');
    }else {
      notifsukses('Success add this item to cart');
    }
    // new_arriv();
    $('#productModal').modal('hide');
    $('#drc').modal('hide');
  }

  function notifsukses(msg){
    Lobibox.notify('success',{
      img: url + 'img/notif/info.png',
      position: 'center top',
      msg: msg
    });
  }
  function notiferror(msg){
    Lobibox.notify('error',{
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

          var a = 0;
          // size += '<form id="myForm">';
          for (var i = 0; i < data.stok.length; i++) {
            if (data.stok[i].jumlah_stok != 0) {
              if (a == 0) {
                size += '<li><label><input type="radio" name="ukuran" onclick="cek_qty()" checked class="ks" value='+data.stok[i].id_detail_stok+'>'+data.stok[i].size+'</label> </li>';
              }else {
                size += '<li><label><input type="radio" name="ukuran" onclick="cek_qty()" class="ks" value='+data.stok[i].id_detail_stok+'>'+data.stok[i].size+'</label> </li>';
              }
            }
            a++;
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
          btn += '<div id="addtocart"><a href="javascript:add_cart2(\''+data.detail[0].id_barang+ '\');" ><button class="btn btn-large btn-primary"><span> ADD TO CART </span></button></a></div>';
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

    // $('#size_produk').;
</script>
