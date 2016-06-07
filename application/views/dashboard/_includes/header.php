<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>aDOGtion</title>

        <!-- Bootstrap -->
        <link href="<?= base_url('assets/dashboard/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/dashboard/css/style.css') ?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKS4I0ggrNrDmm0x-pF0UA3Q_dhl1I0qM" type="text/javascript"></script>
        <script src="<?= base_url('assets/dashboard/js/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
    </head>
    <body >
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('dashboard'); ?>">aDOGtion</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left" style="display: none" id="loadGif">
                        <li><a href="#"><i class="fa fa-refresh fa-spin fa-fw"></i></a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search" id="formSearchLocation" onsubmit="return searchLocationNear($('#inputSearchLocation'))" method="get" action="<?= base_url('dashboard'); ?>">
                        <div class="input-group" style="width: 400px">
                            <input type="text" class="form-control" id="inputSearchLocation" placeholder="(ej: Coyoacán, Ciudad de México)"name="search" value="<?= $this->input->get('search') ?>">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="getMyLocation();"><i class="fa fa-location-arrow "></i></button>
                                <button class="btn btn-default" type="submit"  ><i class="glyphicon glyphicon-search "></i></button>
                            </span>
                        </div>
                        
                    </form>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= base_url('dashboard') ?>">Buscar mascotas </a></li>
                        <li><a href="<?= base_url('publications') ?>">Mis publicaciones <?= count($this->request_pending) > 0 ? '<span class="badge alert-danger">'.count($this->request_pending).'</span>': ''; ?> </a></li>
                        <li><a href="<?= base_url('publications/adoptions'); ?>">Mis adopciones</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $this->session->user->first_name. ' '.$this->session->user->last_name ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url('dashboard/profile'); ?>"><i class="fa fa-user"></i> Mi perfil</a></li>
                                <li><a href="<?= base_url('dashboard/logout'); ?>"><i class="fa fa-sign-out"></i> Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>