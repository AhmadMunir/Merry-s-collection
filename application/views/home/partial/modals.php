<style>
.top-buffer { margin-top:10px; }
</style>
<?php
  foreach ($data_user as $key) {
    $nama = $key->nama_user;
    $username = $key->username;
    $dob = $key->dob;
    $email = $key->email;
    $s_email = $key->status_email;
    $address = $key->alamat;
    $city = $key->kota;
    $province = $key->provinsi;
    $country = $key->negara;
    $zipostal = $key->kode_pos;
    $id_kota = $key->id_kota;
    $id_prov = $key->id_prov;
    $id_neg = $key->id_neg;
  }
?>
<!-- modal profile -->
<div id="modal_profile" class="modal fade" role="dialog">
<div class="modal-dialog">
  <!-- konten modal-->
  <div class="modal-content">
    <!-- heading modal -->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Your Profile</h4>
    </div>
    <!-- body modal -->
    <div class="modal-body">
      <form action="<?php echo base_url('user/profile/saveprofile') ?>" method="post">
      <div class="row top-buffer">
        <div class="col col-md-3">
          Name
        </div>
        <div class="col col-md-9">
          <input name="nama" class="form-control" value="<?php echo $nama ?>" type="text">
        </div>
      </div>
      <div class="row top-buffer">
        <div class="col col-md-3">
          Email
        </div>
        <div class="col col-md-9">
          <input name="email" class="form-control" value="<?php echo $email ?>" type="email" id="email">
        </div>
      </div>
      <div class="row top-buffer">
        <div class="col col-md-3">
          Date Of Birth
        </div>
        <div class="col col-md-4">
          <input name="dob" class="form-control" type="date" value="<?php echo $dob ?>">
        </div>
      </div>
      </div>
    <!-- footer modal -->
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </form>
  </div>
</div>
</div>

<!-- modal address -->
<div id="modal_address" class="modal fade" role="dialog">
<div class="modal-dialog">
  <!-- konten modal-->
  <div class="modal-content">
    <!-- heading modal -->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Your Adress</h4>
    </div>
    <!-- body modal -->
    <div class="modal-body">
      <form action="<?php echo base_url('user/profile/saveaddress') ?>" method="post">
      <div class="row top-buffer" >
        <div class="col col-md-3">
          Address
        </div>
        <div class="col col-md-9">
          <textarea name="address"><?php echo $address ?></textarea>
        </div>
      </div>
      <div class="row top-buffer">
        <div class="col col-md-3">
          zipostal
        </div>
        <div class="col col-md-9">
          <input name="zipostal" class="form-control" value="<?php echo $zipostal ?>">
        </div>
      </div>
      <div class="row top-buffer">
        <div class="col col-md-3">
          Country
        </div>
        <input type="hidden" name="country_name" id="cn_name">
        <div class="col col-md-9">
          <input type="hidden" name="country_code" id="country_code">
          <input type="hidden" name="country_id" id="country_id">
          <select id="country" name="country">
            <option value="" selected >Country</option>
          </select>
        </div>
      </div>
      <div class="row top-buffer">
        <div class="col col-md-3">
          Province
        </div>
        <div class="col col-md-9">
          <input type="text" id="province_int" class="inter" name="province_inter" placeholder="Add your province" style="display:none;">
          <!-- </br> -->
            <!-- <div class="cart-show-label show-label indo" id="province_id" style="display:none;"> -->
                <input type="hidden" name="prov_name" id="prov_name">
                <select name="province" id="province" class="indo">
                  <option value="" selected >Province</option>
                </select>
        </div>
      </div>

      <div class="row top-buffer">
        <div class="col col-md-3">
          City
        </div>
        <div class="col col-md-9">
          <input type="hidden" name="city_name" id="city_name">
          <input type="text" id="city_int" class="inter" name="city_inter" placeholder="Add your city" style="display:none;">
          <!-- </br> -->

        <!-- <div class="cart-show-label show-label mt-15 indo" id="city_id" style="display:none;"> -->
          <select name="city" id="city" class="indo">
            <option value="" selected >CITY</option>
          </select>
        </div>
      </div>

      </div>
    <!-- footer modal -->
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </form>
  </div>
</div>
</div>
