<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | jeweler - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/admin/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/owl.carousel.css">
    <link rel="stylesheet" href="css/admin/owl.theme.css">
    <link rel="stylesheet" href="css/admin/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/admin/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/admin/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url("css/style.css")?>">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/admin/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/admin/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="index.html" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Registration</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo base_url('Register/registeradminloh'); ?>" id="loginForm" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Name</label>
                                    <input class="form-control" name="nama">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email Address</label>
                                    <input class="form-control" name="email">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input class="form-control" name="username">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Phone number</label>
                                    <input class="form-control" name="no_telpon">
                                </div>
                                <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks" checked> Sigh up for our newsletter
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn">Register</button>
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/admin/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/admin/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/admin/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/admin/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/admin/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/admin/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/admin/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/admin/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/admin/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/admin/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/admin/metisMenu/metisMenu.min.js"></script>
    <script src="js/admin/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/admin/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/admin/icheck/icheck.min.js"></script>
    <script src="js/admin/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/admin/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/admin/main.js"></script>
</body>

</html>
