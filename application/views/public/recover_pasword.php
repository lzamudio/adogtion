<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>aDOGtion</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/public/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/public/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/public/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/public/css/animate.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- Background Slider -->
    <link href="<?= base_url('assets/public/js/vegas/vegas.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/public/css/csoon.css') ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Preloader -->
<div id="preloader"><div id="status">&nbsp;</div></div>


<!-- Services Section -->
<section id="registrate" class="container-fluid text-center wow fadeIn">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="row">
          <div class="col-lg-10 col-lg-offset-1">
              <h3>Ingresa tu nueva contraseña</h3>
          </div>
      </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form method="post" action="<?= base_url('reset-password/'.$hash); ?>">
                    <?= display_error_msjs(); ?>
                    <?= display_success_msjs(); ?>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="password" class="form-control input-lg" placeholder="Contraseña *" id="name" name="password" required="">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="password" class="form-control input-lg" placeholder="Confirmar contraseña *" id="name" name="passconf" required="">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark btn-block">Registrarme</button>
                </form>
            </div>
        </div>

    </div>
</section>

<!-- jQuery -->
<script src="<?= base_url('assets/public/js/jquery.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets/public/js/bootstrap.min.js') ?>"></script>

<!-- Plugin JavaScript -->
<script src="<?= base_url('assets/public/js/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assets/public/js/jquery.countdown.min.js') ?>"></script>
<script src="<?= base_url('assets/public/js/device.min.js') ?>"></script>
<script src="<?= base_url('assets/public/js/wow.min.js') ?>"></script>
<script src="<?= base_url('assets/public/js/smoothscroll.js') ?>"></script>
<script src="<?= base_url('assets/public/js/form.js') ?>"></script>
<script src="<?= base_url('assets/public/js/jquery.placeholder.min.js') ?>"></script>

<!-- Background image -->
<script src="<?= base_url('assets/public/js/vegas/vegas.min.js') ?>"></script>

<script>
jQuery(window).load(function() {
    // will first fade out the loading animation
    jQuery("#status").fadeOut();
    // will fade out the whole DIV that covers the website.
    jQuery("#preloader").fadeOut("slow");
})
</script>
</body>
</html>
