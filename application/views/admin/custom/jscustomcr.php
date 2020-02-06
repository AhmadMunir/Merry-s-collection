<script>
  $(function(){
    load_picture();
  });

  function load_picture(){
    id = <?php echo $this->uri->segment(4) ?>;
    html = '';
    gbr = '';
    $.ajax({
      url : '<?php echo base_url("admin/custom/get_picture"); ?>',
      type  : 'POST',
      data  : {id : id},
      dataType : 'json',
      success : function(pic){
        if (pic.status == 0) {
          $('#pic_cs').html('Tidak ada gambar ditemukan');
          // alert('Tidak ada Gambar');
        }else if (pic.status == 1) {
          for (var i = 0; i < pic.pic.length; i++) {
            gbr += pic.pic[i].pic + ',';

            html += `<div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="review-content-section">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="pro-edt-img">
                      <a target="_blank" href="<?php echo base_url('img/custom/'); ?>${pic.pic[i].pic}">
                        <img src="<?php echo base_url('img/custom/'); ?>${pic.pic[i].pic}" alt="" />
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="product-edt-pix-wrap">
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="product-edt-remove">
                                  <button type="button" onclick="deleteConfirm('${pic.pic[i].id_pic}')" class="btn btn-danger waves-effect waves-light">Remove
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>`

          }
          document.getElementById("gambar").value = gbr;
          $('#pic_cs').html(html);
        }
      }
    });
  }

  function deleteConfirm(id){
    $('#picbtn-delete').attr('href','javascript:delpic('+id+')');
    $('#picdeleteModal').modal();
  }

  function delpic(id){
    $.ajax({
      url : '<?php echo base_url("admin/custom/del_picture"); ?>',
      type  : 'POST',
      data  : {id : id},
      dataType : 'json',
      success : function(del){
        if (del.status == 1) {
          load_picture();
        }else {
          alert('Terjadi Error, Harap Coba lagi atau Reload Halaman ini');
        }
      }
    });
    $('#picdeleteModal').modal('hide');
  }

  function goBack() {
  window.history.back();
}
</script>
