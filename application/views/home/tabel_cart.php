<tbody>
  <?php
  $no = 1;
  foreach ($cirt as $kay):
    ?>
    <tr>
        <td class="product-thumbnail"><a href="#" title="men’s black t-shirt"><img class="product-thumbnail" src="<?php echo base_url('img/barang/').$kay->gambar ?>" alt="" /></a></td>
        <td class="product-name pull-left mt-20">
            <a href="#" title="men’s black t-shirt"><?php echo $kay->nama_barang ?></a>
            <p class="w-color m-0">
                <label> Color :</label>
                black
            </p>
            <p class="w-size m-0">
                <label> size :</label>
                sl
            </p>
        </td>
        <td class="product-prices price-<?php echo $no++;?>"><span class="amount"><?php echo $kay->subtotal ?></span></td>
        <td class="product-stock-status"><span class="wishlist-in-stock">In Stock</span></td>
        <td class="product-value">
            <input type="number" value="<?php echo $kay->qty ?>">
        </td>
        <td class="product-remove">
          <a href="javascript:tas('<?php
                                  echo encrypt_url($kay->id_detail_temp_transaksi);
                                  ?>')" title="Add to cart" class="add_cart">
              <i class="zmdi zmdi-delete"></i>
          </a>
        </td>
      </tr>
  <?php endforeach; ?>
</tbody>
<script type="text/javascript">
        var user = '<?=$this->session->userdata('id')?>'
        var url = '<?=base_url();?>'

        var status;
        status = <?=$this->session->userdata('status')?>;
        function tas(ids){
          if ( status == 'login') {
            alert(ids);
          }else {
            $.ajax({
              type : "POST",
              url : url + "user/cart/delete",
              data : {id_temp_transaksi : ids},
              dataType : "json",
              beforeSend : function(e){
                if (e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success : function(response){
                $("#view").html(response.hasil);
              },
              error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.response);
              }
            });
          }
        };

</script>
