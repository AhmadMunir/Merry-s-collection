<!doctype html>
<html class="no-js" lang="en">


<head>
   <?php $this->load->view('admin/partial/head') ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
      <?php $this->load->view('admin/partial/sidebar') ?>

    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
              <?php $this->load->view('admin/partial/header') ?>

            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Dashboard v.1</a></li>
                                                <li><a href="index-1.html">Dashboard v.2</a></li>
                                                <li><a href="index-3.html">Dashboard v.3</a></li>
                                                <li><a href="product-list.html">Product List</a></li>
                                                <li><a href="product-edit.html">Product Edit</a></li>
                                                <li><a href="product-detail.html">Product Detail</a></li>
                                                <li><a href="product-cart.html">Product Cart</a></li>
                                                <li><a href="product-payment.html">Product Payment</a></li>
                                                <li><a href="analytics.html">Analytics</a></li>
                                                <li><a href="widgets.html">Widgets</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="file-manager.html">File Manager</a></li>
                                                <li><a href="contacts.html">Contacts Client</a></li>
                                                <li><a href="projects.html">Project</a></li>
                                                <li><a href="project-details.html">Project Details</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                                <li><a href="500.html">500 Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                                <li><a href="x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="code-editor.html">Code Editor</a>
                                                </li>
                                                <li><a href="tree-view.html">Tree View</a>
                                                </li>
                                                <li><a href="preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="images-cropper.html">Images Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="area-charts.html">Area Charts</a>
                                                </li>
                                                <li><a href="rounded-chart.html">Rounded Charts</a>
                                                </li>
                                                <li><a href="c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="sparkline.html">Sparkline Charts</a>
                                                </li>
                                                <li><a href="peity.html">Peity Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="login.html">Login</a>
                                                </li>
                                                <li><a href="register.html">Register</a>
                                                </li>
                                                <li><a href="lock.html">Lock</a>
                                                </li>
                                                <li><a href="password-recovery.html">Password Recovery</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <br />
            <br />
        </div>
        <div class="mailbox-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="hpanel mg-b-15">
                          <div class="single-product-tab-area mg-tb-15">
                            <!-- Single pro tab review Start-->
                            <div class="single-pro-review-area">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-tab-pro-inner">
                                      <ul id="myTab3" class="tab-review-design">
                                        <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i> Custom</a></li>
                                        <li><a href="#reviews"><i class="fa fa-file-image-o" aria-hidden="true"></i> Pictures</a></li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content custom-product-edit">
                                        <div class="product-tab-list tab-pane fade active in" id="description">
                                          <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                              <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                  <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                  <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                  <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                  <input type="text" class="form-control" name placeholder="Harga">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                  <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                                                  <input type="text" class="form-control" name="size" placeholder="Size">
                                                </div>

                                              </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                              <div class="input-group mg-b-pro-edt">
                                                <span>Deskripsi :</span>
                                              </div>
                                              <div class="input-group mg-b-pro-edt">

                                                <textarea name="deskripsi" id="deskripsi" cols="50" rows="10"></textarea>
                                              </div>
                                            </div>
                                          </div>
                                          <br />
                                        </div>
                                        <div class="product-tab-list tab-pane fade" id="reviews">
                                          <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <div class="review-content-section">
                                                <div class="row">
                                                  <div class="col-lg-4">
                                                    <div class="pro-edt-img">
                                                      <img src="img/new-product/5-small.jpg" alt="" />
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-8">
                                                    <div class="row">
                                                      <div class="col-lg-12">
                                                        <div class="product-edt-pix-wrap">
                                                          <div class="input-group">
                                                            <span class="input-group-addon">TT</span>
                                                            <input type="text" class="form-control" placeholder="Label Name">
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-lg-6">
                                                              <div class="form-radio">
                                                                <form>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                                                    </label>
                                                                  </div>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                                                    </label>
                                                                  </div>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Small Image
                                                                    </label>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                              <div class="product-edt-remove">
                                                                <button type="button" class="btn btn-danger waves-effect waves-light">Remove
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
                                                <div class="row">
                                                  <div class="col-lg-4">
                                                    <div class="pro-edt-img">
                                                      <img src="img/new-product/6-small.jpg" alt="" />
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-8">
                                                    <div class="row">
                                                      <div class="col-lg-12">
                                                        <div class="product-edt-pix-wrap">
                                                          <div class="input-group">
                                                            <span class="input-group-addon">TT</span>
                                                            <input type="text" class="form-control" placeholder="Label Name">
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-lg-6">
                                                              <div class="form-radio">
                                                                <form>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                                                    </label>
                                                                  </div>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                                                    </label>
                                                                  </div>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Small Image
                                                                    </label>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                              <div class="product-edt-remove">
                                                                <button type="button" class="btn btn-danger waves-effect waves-light">Remove
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
                                                <div class="row">
                                                  <div class="col-lg-4">
                                                    <div class="pro-edt-img">
                                                      <img src="img/new-product/7-small.jpg" alt="" />
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-8">
                                                    <div class="row">
                                                      <div class="col-lg-12">
                                                        <div class="product-edt-pix-wrap">
                                                          <div class="input-group">
                                                            <span class="input-group-addon">TT</span>
                                                            <input type="text" class="form-control" placeholder="Label Name">
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-lg-6">
                                                              <div class="form-radio">
                                                                <form>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                                                    </label>
                                                                  </div>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                                                    </label>
                                                                  </div>
                                                                  <div class="radio radiofill">
                                                                    <label>
                                                                      <input type="radio" name="radio"><i class="helper"></i>Small Image
                                                                    </label>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                              <div class="product-edt-remove">
                                                                <button type="button" class="btn btn-danger waves-effect waves-light">Remove
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
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                              <button type="button" class="btn btn-primary waves-effect waves-light m-r-10">Save</button>
                                              <button type="button" class="btn btn-warning waves-effect waves-light">Cancel</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/partial/modal') ?>
    <?php $this->load->view('admin/partial/jquery') ?>
    <?php $this->load->view('admin/custom/jscustom') ?>
</body>

</html>
