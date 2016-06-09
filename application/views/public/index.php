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

<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top  fadeIn" data-wow-duration="3s" data-wow-delay="0s" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars fa-2x"></i>
            </button>
            <a class="navbar-brand page-scroll  fadeInRight" data-wow-duration="1s" data-wow-delay="1.4s" href="#page-top">
                <span class="logo">aDOGtion</span>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav  fadeInLeft" data-wow-duration="1s" data-wow-delay="1.4s">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#page-top">INICIO</a>
                </li>
                <li>
                    <a class="page-scroll" href="#adopta">ADOPTA</a>
                </li>
                <li>
                    <a class="page-scroll register" href="#registrate" >REGÍSTRATE</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#login">INICIA SESIÓN</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contacto">CONTACTO</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <img src="<?= base_url('assets/public/img/logo.png') ?>" alt="" class="wow fadeIn" data-wow-duration="4s" data-wow-delay=".4s">
        <div id="clock" class="wow fadeIn" data-wow-duration="6s" data-wow-delay=".6s"></div>
        <p class="intro-text wow fadeIn" data-wow-duration="7s" data-wow-delay=".7s">aDOGtion SOFTWARE</p>
        <ul class="list-inline lead">
            <li><a href="#adopta" class="btn btn-border btn-lg page-scroll wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.4s"><i class="fa fa-chevron-down"></i> ADOPTA</a></li>
            <li><a href="#registrate" class="btn btn-white btn-lg page-scroll wow fadeInRight" data-wow-duration="1s" data-wow-delay="1.4s"><i class="fa fa-chevron-down"></i> REGÍSTRATE</a></li>
        </ul>
    </div>
</header>


<!-- About Section -->
<section id="adopta" class="container-fluid text-center wow fadeIn">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <h2>¿Quieres adoptar una mascota cerca de tu zona?</h2>
            
            <p><a href="#" data-toggle="modal" data-target="#login">Inicia sesión</a> y encuentra a tu mascota ideal cerca de tu ubicación o del lugar que tu elijas.</p>
        </div>
    </div>
</section>

<!-- About2 Section -->
<section id="about2" class="container-fluid text-center wow fadeIn">
    <div class="col-lg-10 col-lg-offset-1">
      <h3><i class="icon icon-heading ion-android-favorite-outline" data-wow-duration="7s" data-wow-delay=".7s"></i> ¿POR QUÉ ADOPTAR?</h3>
      <p>Adoptar es mucho más gratificante de lo que te imaginas. El hecho de saber que ayudaste a un animalito que en verdad necesitaba cariño y ayuda te hace sentirte mucho mejor contigo mismo, y él se va a encargar de recordártelo todos los días. Vivir el proceso de su adopción te hace darte cuenta de que estas haciendo algo bueno y de que estas tomando la mejor decisión, estás ayudando de alguna forma a que este mundo sea mucho más humano.</p>
    </div>
</section>



<!-- Services Section -->
<section id="registrate" class="container-fluid text-center wow fadeIn">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="row">
          <div class="col-lg-10 col-lg-offset-1">
              <h3>¿Quieres adoptar o poner en adopción a una mascota?</h3>
          </div>
      </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <p>Regístrate y pon en adopción o adopta una mascota.</p>
                <p>Todos los campos con (*) son obligatorios.</p>
                <form id="registerUser" novalidate="" onsubmit="return register();">
                    <div class="alert alert-danger text-left" id="errorRegister" style="display: none">
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="text" class="form-control input-lg" placeholder="Nombre(s) *" id="name" required="" name="first_name">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="text" class="form-control input-lg" placeholder="Apellido(s) *" id="name" required="" name="last_name" >
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="text" class="form-control input-lg" placeholder="Correo *" id="name" name="email" required="">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="text" class="form-control input-lg" placeholder="Teléfono (10 dígitos) *" id="name" name="phone" required="">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="password" class="form-control input-lg" placeholder="Contraseña (mínimo 6 caracteres) *" id="name" name="password" required="">
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

<!-- Action2 Section -->
<section class="action3 container-fluid text-center wow fadeIn">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>No compres, Adopta</h2>
            <p>Al adoptar, le estamos dando un hogar a un animalito que pudo haber vivido una situación complicada, por ello los animales adoptados son sumamente agradecidos y amorosos con quien les brinda un hogar.</p>
            <p>Inicia sesión y encontra a tu mejor amigo.</p>
            <p><a href="#" data-toggle="modal" data-target="#login" class="btn btn-white btn-lg">Ingresar</a></p>
        </div>
    </div>
</section>


<!-- Contact Section -->
<section id="contacto">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-5">
                <h2>¿Tienes dudas de como adoptar?</h2>
                <p>Si aún no estas seguro de como es el proceso de adopción en aDOGtion o
                    no sabes como poner en adopción a tu mascota, envianos un correo y pronto te ayudaremos
                    a despejar todas tus inquietudes.</p>
                <h5><i class="icon ion-android-mail"></i> adogtion.software@sumawebdesarrollo.com<br></h5>
            </div>
            <div class="col-md-5 col-md-offset-2">
                <h2>Contacto</h2>
                <form name="sentMessage"  novalidate="">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="text" class="form-control input-lg" placeholder="Nombre *" id="name" required="" data-validation-required-message="Please enter name">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="email" class="form-control input-lg" placeholder="Correo *" id="email" required="" data-validation-required-message="Please enter email">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input type="tel" class="form-control input-lg" placeholder="Teléfono *" id="phone" required="" data-validation-required-message="Please enter phone number">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <textarea rows="2" class="form-control input-lg" placeholder="Mensaje *" id="message" required="" data-validation-required-message="Please enter a message." aria-invalid="false"></textarea>
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-dark btn-lg">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="contact2" class="container-fluid text-center wow fadeIn">
    <div class="overlay"></div>
    <div class="row">
        <div class="col-md-3">
            <img src="<?= base_url('assets/public/img/logo-small.png') ?>">
        </div>
        <div class="col-md-6">
            <p>&copy; aDOGtion SOFTWARE 2016</p>
        </div>
    </div>
</section>

<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabelModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:0">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Iniciar Sesión</h4>
      </div>
      <div class="modal-body">
          <form   novalidate="" id="loginForm" onsubmit="return login();">
            <div class="alert alert-danger text-left" id="errorLogin" style="display: none"></div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <input type="email" class="form-control input-lg" placeholder="Correo" id="email" required="" name="email">
                    <span class="help-block text-danger"></span>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <input type="password" class="form-control input-lg" placeholder="Contraseña" id="phone" required="" name="password">
                    <span class="help-block text-danger"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-lg">Ingresar</button>
            <button type="button" class="btn btn-link pull-right" onclick="$('#login').modal('hide');$('#forgotPassword').modal('show')" ><small><i class="fa fa-lock"></i> Olvide mi contraseña</small></button>
            <br>
            <hr>
            <small>¿No tienes una cuenta?</small> <button type="button" class="btn btn-link text-center" onclick="$('#login').modal('hide');$('.register').trigger('click');">Regístrate</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Forgot password Modal -->
<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:0">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Recuperar Contraseña</h4>
      </div>
      <div class="modal-body">
        <form   novalidate="" id="loginResetPassword" onsubmit="return resetPassword();">
            <div class="alert alert-warning" id="alertRequestWarning" style="display: none">Enviando solicitud . . . </div>
            <div class="alert alert-danger text-left" id="errorResetPassword" style="display: none"></div>
            <div class="alert alert-success text-left" id="okResetPassword" style="display: none"></div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <p>Ingresa tu correo con el que te registraste para recuperar tu contraseña</p>
                  <input type="email" class="form-control input-lg" placeholder="Correo" id="email" required="" name="email" >
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-lg">Recuperar</button>
        </form>
      </div>
    </div>
  </div>
</div>

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
    $('body').vegas({
        transitionDuration: 2000,
        slides: [
            { src: '<?= base_url('assets/public/img/dog.jpg') ?>' }
        ],
        transition: 'swirlRight'
    });
    function register(){
        $.post('<?= base_url('welcome/register'); ?>', $('#registerUser').serialize(), function (response){
            if(response != '1'){
                $('#errorRegister').show();
                $('#errorRegister').html(response);
            }else{
                location.href = '<?= base_url('dashboard'); ?>';
            }
        });
        
        return false;
    }
    function login(){
        $.post('<?= base_url('welcome/login'); ?>', $('#loginForm').serialize(), function (response){
            if(response != '1'){
                $('#errorLogin').show();
                $('#errorLogin').html(response);
            }else{
                    location.href = '<?= base_url('dashboard'); ?>';
            }
        });
        
        return false;
    }
    function resetPassword(){
    $("#alertRequestWarning").show();
        $.post('<?= base_url('welcome/reset_password'); ?>', $('#loginResetPassword').serialize(), function (response){
            $("#alertRequestWarning").hide();
            if(response == '1'){
                $('#errorResetPassword').hide();
                
                $('#okResetPassword').show();
                $('#okResetPassword').html('Te hemos enviado un correo con las instrucciones para recuperar tu contraseña');
            }else{
                $('#errorResetPassword').show();
                $('#errorResetPassword').html(response);
                
                $('#okResetPassword').hide();
            }
        });
        
        return false;
    }
</script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url('assets/public/js/csoon.js') ?>"></script>

</body>
</html>
