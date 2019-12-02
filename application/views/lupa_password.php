
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

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">

                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>

                      <input type="hidden" class="hide" name="token" id="token" value="">
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</html>
