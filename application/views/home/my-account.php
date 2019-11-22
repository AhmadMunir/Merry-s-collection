<?php // TODO: PANAH ke atas di pojok kanan atas?>
<!doctype html>
<html class="no-js" lang="zxx">
<!-- <button id="basicSuccess" class="btn btn-default">Default</button> -->

<head>
    <?php $this->load->view('home/partial/head') ?>
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
          <script type="text/javascript">
            var notif = '<?=$this->session->flashdata('success')?>';
            var url = '<?=base_url();?>'
          </script>
          <?php if ($this->session->flashdata('success')): ?>
            <!-- <script>
            $(document).ready(function () {
                      Lobibox.notify('success', {
                          msg: 'aaa'
                      });
                  });
            </script> -->
          <?php  endif; ?>
            <!-- Start Wishlist Area -->
            <div class="my-account-page section-padding">
              <div class="col-md-offset-5 col-centered">
                <span id="status_email">
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
                    }
                    if ($s_email == "unverified") {
                      echo "Please, Verify Your Email!";
                    }else {

                    }

                 ?></span>
              </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="procced-checkout">
                                <h4 class="procced-title text-uppercase pb-15 mb-20"><strong>My Account</strong></h4>
                                <p>Welcome to your account. Here you can manage all of your personal information and orders.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="addresses-lists">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="headingFour">
                                          <h4 class="panel-title">
                                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                  <i class="zmdi zmdi-home"></i>
                                                 <span>My personal information</span>
                                              </a>
                                          </h4>
                                      </div>
                                      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                          <div class="panel-body">
                                              <div class="coupon-info">
                                                  <h6 class="procced-title text-uppercase pb-15 mb-20">Your Information </h6>

                                                      <p class="form-row">
                                                      <p></p>
                                                      <p class="form-row">
                                                          <label><span class="required">*</span>Your Full Name</label>
                                                          <input type="text" value="<?php echo $nama ?>" disabled>
                                                      </p>
                                                      <p class="form-row">
                                                          <label><span class="required">*</span>E-mail address</label>
                                                          <input type="text" value="<?php echo $email ?>" disabled>
                                                      </p>
                                                      <p class="form-row">
                                                          <label><span class="required">*</span>Date Of Birth</label>
                                                          <input type="date" value="<?php echo $dob ?>" disabled>
                                                      </p>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_profile">Edit or Complete Your Profile</button>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="zmdi zmdi-home"></i>
                                                   <span>My Address</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="coupon-info">
                                                    <h6 class="procced-title text-uppercase pb-15 mb-20">Your addresses </h6>
                                                        <p class="form-row">
                                                            <label>Address<span class="required">*</span></label>
                                                            <input type="text" name="alamat" value="<?php echo $address ?>" disabled/>
                                                        </p>
                                                        <p class="form-row">
                                                            <label>Zippostal<span class="required">*</span></label>
                                                            <input type="text" value="<?php echo $zipostal; ?>" name="zipostal" disabled/>
                                                        </p>
                                                        <p class="form-row">
                                                            <label>City<span class="required">*</span></label>
                                                            <input type="text" value="<?php echo $city; ?>" name="city" disabled/>
                                                        </p>
                                                        <p class="form-row">
                                                            <label>Province<span class="required">*</span></label>
                                                            <input type="text" value="<?php echo $province ?>" name="provinsi" disabled/>
                                                        </p>
                                                        <div class="country-select shop-select">
                                                            <label>Country <span class="required">*</span></label>
                                                            <input type="text" value="<?php echo $country ?>" name="country" disabled/>
                                                            <!-- <select id="country" name="country">
                                                              <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                                              <option value="Afghanistan">Afghanistan</option>
                                                              <option value="Åland Islands">Åland Islands</option>
                                                              <option value="Albania">Albania</option>
                                                              <option value="Algeria">Algeria</option>
                                                              <option value="American Samoa">American Samoa</option>
                                                              <option value="Andorra">Andorra</option>
                                                              <option value="Angola">Angola</option>
                                                              <option value="Anguilla">Anguilla</option>
                                                              <option value="Antarctica">Antarctica</option>
                                                              <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                              <option value="Argentina">Argentina</option>
                                                              <option value="Armenia">Armenia</option>
                                                              <option value="Aruba">Aruba</option>
                                                              <option value="Australia">Australia</option>
                                                              <option value="Austria">Austria</option>
                                                              <option value="Azerbaijan">Azerbaijan</option>
                                                              <option value="Bahamas">Bahamas</option>
                                                              <option value="Bahrain">Bahrain</option>
                                                              <option value="Bangladesh">Bangladesh</option>
                                                              <option value="Barbados">Barbados</option>
                                                              <option value="Belarus">Belarus</option>
                                                              <option value="Belgium">Belgium</option>
                                                              <option value="Belize">Belize</option>
                                                              <option value="Benin">Benin</option>
                                                              <option value="Bermuda">Bermuda</option>
                                                              <option value="Bhutan">Bhutan</option>
                                                              <option value="Bolivia">Bolivia</option>
                                                              <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                              <option value="Botswana">Botswana</option>
                                                              <option value="Bouvet Island">Bouvet Island</option>
                                                              <option value="Brazil">Brazil</option>
                                                              <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                              <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                              <option value="Bulgaria">Bulgaria</option>
                                                              <option value="Burkina Faso">Burkina Faso</option>
                                                              <option value="Burundi">Burundi</option>
                                                              <option value="Cambodia">Cambodia</option>
                                                              <option value="Cameroon">Cameroon</option>
                                                              <option value="Canada">Canada</option>
                                                              <option value="Cape Verde">Cape Verde</option>
                                                              <option value="Cayman Islands">Cayman Islands</option>
                                                              <option value="Central African Republic">Central African Republic</option>
                                                              <option value="Chad">Chad</option>
                                                              <option value="Chile">Chile</option>
                                                              <option value="China">China</option>
                                                              <option value="Christmas Island">Christmas Island</option>
                                                              <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                              <option value="Colombia">Colombia</option>
                                                              <option value="Comoros">Comoros</option>
                                                              <option value="Congo">Congo</option>
                                                              <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                              <option value="Cook Islands">Cook Islands</option>
                                                              <option value="Costa Rica">Costa Rica</option>
                                                              <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                              <option value="Croatia">Croatia</option>
                                                              <option value="Cuba">Cuba</option>
                                                              <option value="Cyprus">Cyprus</option>
                                                              <option value="Czech Republic">Czech Republic</option>
                                                              <option value="Denmark">Denmark</option>
                                                              <option value="Djibouti">Djibouti</option>
                                                              <option value="Dominica">Dominica</option>
                                                              <option value="Dominican Republic">Dominican Republic</option>
                                                              <option value="Ecuador">Ecuador</option>
                                                              <option value="Egypt">Egypt</option>
                                                              <option value="El Salvador">El Salvador</option>
                                                              <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                              <option value="Eritrea">Eritrea</option>
                                                              <option value="Estonia">Estonia</option>
                                                              <option value="Ethiopia">Ethiopia</option>
                                                              <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                              <option value="Faroe Islands">Faroe Islands</option>
                                                              <option value="Fiji">Fiji</option>
                                                              <option value="Finland">Finland</option>
                                                              <option value="France">France</option>
                                                              <option value="French Guiana">French Guiana</option>
                                                              <option value="French Polynesia">French Polynesia</option>
                                                              <option value="French Southern Territories">French Southern Territories</option>
                                                              <option value="Gabon">Gabon</option>
                                                              <option value="Gambia">Gambia</option>
                                                              <option value="Georgia">Georgia</option>
                                                              <option value="Germany">Germany</option>
                                                              <option value="Ghana">Ghana</option>
                                                              <option value="Gibraltar">Gibraltar</option>
                                                              <option value="Greece">Greece</option>
                                                              <option value="Greenland">Greenland</option>
                                                              <option value="Grenada">Grenada</option>
                                                              <option value="Guadeloupe">Guadeloupe</option>
                                                              <option value="Guam">Guam</option>
                                                              <option value="Guatemala">Guatemala</option>
                                                              <option value="Guernsey">Guernsey</option>
                                                              <option value="Guinea">Guinea</option>
                                                              <option value="Guinea-bissau">Guinea-bissau</option>
                                                              <option value="Guyana">Guyana</option>
                                                              <option value="Haiti">Haiti</option>
                                                              <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                              <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                              <option value="Honduras">Honduras</option>
                                                              <option value="Hong Kong">Hong Kong</option>
                                                              <option value="Hungary">Hungary</option>
                                                              <option value="Iceland">Iceland</option>
                                                              <option value="India">India</option>
                                                              <option value="Indonesia">Indonesia</option>
                                                              <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                              <option value="Iraq">Iraq</option>
                                                              <option value="Ireland">Ireland</option>
                                                              <option value="Isle of Man">Isle of Man</option>
                                                              <option value="Israel">Israel</option>
                                                              <option value="Italy">Italy</option>
                                                              <option value="Jamaica">Jamaica</option>
                                                              <option value="Japan">Japan</option>
                                                              <option value="Jersey">Jersey</option>
                                                              <option value="Jordan">Jordan</option>
                                                              <option value="Kazakhstan">Kazakhstan</option>
                                                              <option value="Kenya">Kenya</option>
                                                              <option value="Kiribati">Kiribati</option>
                                                              <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                              <option value="Korea, Republic of">Korea, Republic of</option>
                                                              <option value="Kuwait">Kuwait</option>
                                                              <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                              <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                              <option value="Latvia">Latvia</option>
                                                              <option value="Lebanon">Lebanon</option>
                                                              <option value="Lesotho">Lesotho</option>
                                                              <option value="Liberia">Liberia</option>
                                                              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                              <option value="Liechtenstein">Liechtenstein</option>
                                                              <option value="Lithuania">Lithuania</option>
                                                              <option value="Luxembourg">Luxembourg</option>
                                                              <option value="Macao">Macao</option>
                                                              <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                              <option value="Madagascar">Madagascar</option>
                                                              <option value="Malawi">Malawi</option>
                                                              <option value="Malaysia">Malaysia</option>
                                                              <option value="Maldives">Maldives</option>
                                                              <option value="Mali">Mali</option>
                                                              <option value="Malta">Malta</option>
                                                              <option value="Marshall Islands">Marshall Islands</option>
                                                              <option value="Martinique">Martinique</option>
                                                              <option value="Mauritania">Mauritania</option>
                                                              <option value="Mauritius">Mauritius</option>
                                                              <option value="Mayotte">Mayotte</option>
                                                              <option value="Mexico">Mexico</option>
                                                              <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                              <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                              <option value="Monaco">Monaco</option>
                                                              <option value="Mongolia">Mongolia</option>
                                                              <option value="Montenegro">Montenegro</option>
                                                              <option value="Montserrat">Montserrat</option>
                                                              <option value="Morocco">Morocco</option>
                                                              <option value="Mozambique">Mozambique</option>
                                                              <option value="Myanmar">Myanmar</option>
                                                              <option value="Namibia">Namibia</option>
                                                              <option value="Nauru">Nauru</option>
                                                              <option value="Nepal">Nepal</option>
                                                              <option value="Netherlands">Netherlands</option>
                                                              <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                              <option value="New Caledonia">New Caledonia</option>
                                                              <option value="New Zealand">New Zealand</option>
                                                              <option value="Nicaragua">Nicaragua</option>
                                                              <option value="Niger">Niger</option>
                                                              <option value="Nigeria">Nigeria</option>
                                                              <option value="Niue">Niue</option>
                                                              <option value="Norfolk Island">Norfolk Island</option>
                                                              <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                              <option value="Norway">Norway</option>
                                                              <option value="Oman">Oman</option>
                                                              <option value="Pakistan">Pakistan</option>
                                                              <option value="Palau">Palau</option>
                                                              <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                              <option value="Panama">Panama</option>
                                                              <option value="Papua New Guinea">Papua New Guinea</option>
                                                              <option value="Paraguay">Paraguay</option>
                                                              <option value="Peru">Peru</option>
                                                              <option value="Philippines">Philippines</option>
                                                              <option value="Pitcairn">Pitcairn</option>
                                                              <option value="Poland">Poland</option>
                                                              <option value="Portugal">Portugal</option>
                                                              <option value="Puerto Rico">Puerto Rico</option>
                                                              <option value="Qatar">Qatar</option>
                                                              <option value="Reunion">Reunion</option>
                                                              <option value="Romania">Romania</option>
                                                              <option value="Russian Federation">Russian Federation</option>
                                                              <option value="Rwanda">Rwanda</option>
                                                              <option value="Saint Helena">Saint Helena</option>
                                                              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                              <option value="Saint Lucia">Saint Lucia</option>
                                                              <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                              <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                              <option value="Samoa">Samoa</option>
                                                              <option value="San Marino">San Marino</option>
                                                              <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                              <option value="Saudi Arabia">Saudi Arabia</option>
                                                              <option value="Senegal">Senegal</option>
                                                              <option value="Serbia">Serbia</option>
                                                              <option value="Seychelles">Seychelles</option>
                                                              <option value="Sierra Leone">Sierra Leone</option>
                                                              <option value="Singapore">Singapore</option>
                                                              <option value="Slovakia">Slovakia</option>
                                                              <option value="Slovenia">Slovenia</option>
                                                              <option value="Solomon Islands">Solomon Islands</option>
                                                              <option value="Somalia">Somalia</option>
                                                              <option value="South Africa">South Africa</option>
                                                              <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                              <option value="Spain">Spain</option>
                                                              <option value="Sri Lanka">Sri Lanka</option>
                                                              <option value="Sudan">Sudan</option>
                                                              <option value="Suriname">Suriname</option>
                                                              <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                              <option value="Swaziland">Swaziland</option>
                                                              <option value="Sweden">Sweden</option>
                                                              <option value="Switzerland">Switzerland</option>
                                                              <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                              <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                              <option value="Tajikistan">Tajikistan</option>
                                                              <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                              <option value="Thailand">Thailand</option>
                                                              <option value="Timor-leste">Timor-leste</option>
                                                              <option value="Togo">Togo</option>
                                                              <option value="Tokelau">Tokelau</option>
                                                              <option value="Tonga">Tonga</option>
                                                              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                              <option value="Tunisia">Tunisia</option>
                                                              <option value="Turkey">Turkey</option>
                                                              <option value="Turkmenistan">Turkmenistan</option>
                                                              <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                              <option value="Tuvalu">Tuvalu</option>
                                                              <option value="Uganda">Uganda</option>
                                                              <option value="Ukraine">Ukraine</option>
                                                              <option value="United Arab Emirates">United Arab Emirates</option>
                                                              <option value="United Kingdom">United Kingdom</option>
                                                              <option value="United States">United States</option>
                                                              <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                              <option value="Uruguay">Uruguay</option>
                                                              <option value="Uzbekistan">Uzbekistan</option>
                                                              <option value="Vanuatu">Vanuatu</option>
                                                              <option value="Venezuela">Venezuela</option>
                                                              <option value="Viet Nam">Viet Nam</option>
                                                              <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                              <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                              <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                              <option value="Western Sahara">Western Sahara</option>
                                                              <option value="Yemen">Yemen</option>
                                                              <option value="Zambia">Zambia</option>
                                                              <option value="Zimbabwe">Zimbabwe</option>
                                                            </select> -->
                                                        </div>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_address">Edit or Complete Your Address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                    <i class="zmdi zmdi-format-list-numbered"></i>
                                                   <span>My credit slips</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="coupon-info">
                                                    <h6 class="procced-title text-uppercase pb-15 mb-20">Your addresses </h6>
                                                    <p class="text-black">To add a new address, please fill out the form below.</p>
                                                </div>
                                                <div class="default-bg">
                                                    <p class="alert text-white">You have not placed any orders.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                    <i class="zmdi zmdi-folder-outline"></i>
                                                   <span>My addresses</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <div class="coupon-info">
                                                    <h6 class="procced-title text-uppercase pb-15 mb-20">Your addresses </h6>
                                                    <p class="text-black">To add a new address, please fill out the form below.</p>
                                                </div>
                                                <div class="default-bg">
                                                    <p class="alert text-white">You have not placed any orders.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="myaccount-link-list">
                                    <div class="panel panel-default mb-5">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a  href="wishlist.html">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                    <span>My wishlists</span>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="panel panel-default m-0">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a  href="cart.html">
                                                    <i class="zmdi zmdi-format-list-numbered"></i>
                                                    <span>Order history and details</span>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Wishlist Area -->

            <!-- Start Brand Area -->
            <div class="brand-area pb-90">
                <div class="container">
                    <div class="row">
                        <div class="brand-list">
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>scroll
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/5.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/6.png" alt="">
                                    </a>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Brand Area -->
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


    <!-- Placed js at the end of the document so the pages load faster -->

    <?php $this->load->view('home/partial/jquery') ?>
    <<?php $this->load->view('home/partial/modals') ?>


</body>

</html>
