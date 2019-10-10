<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>vendors/images/favicon.png">
    <title>Sistema OTB MAICA</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url();?>vendors/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url();?>vendors/theme/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>vendors/theme/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url();?>vendors/colors/megna-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Datatable responsive -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/datatable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/datatable/css/responsive.bootstrap4.min.css">
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo base_url();?>inicio">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                        <!--This is dark logo icon <img src="./vendors/images/admin-logo.png" alt="home" class="dark-logo" />--><!--This is light logo icon--><img src="<?php echo base_url();?>vendors/images/admin-logo-dark.png" alt="home" class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                        <!--This is dark logo text <img src="./vendors/images/admin-text.png" alt="home" class="dark-logo" /> --><!--This is light logo text--><img src="<?php echo base_url();?>vendors/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span>
                    </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)"> <i class="mdi mdi-gmail"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        
                        <!-- /.dropdown-messages -->
                    </li>

                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0)"> <img src="<?php echo base_url();?>vendors/images/user.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"> <?php echo $this->session->userdata("nombres");?> </b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box" style="text-align: center;">
                                    <div class="u-text">
                                        <h4><?php echo $this->session->userdata("nombres") .' '. $this->session->userdata("apellidos");?></h4>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>inicio/perfil"><i class="ti-user"></i> Mi perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-power-off"></i> Salir</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Menu</span></h3> </div>
                <ul class="nav" id="side-menu">
                    <li class="user-pro">
                        <a href="javascript:void(0)" class="waves-effect"><img src="<?php echo base_url();?>vendors/images/user.png" alt="user-img" class="img-circle"> <span class="hide-menu"> <?php echo $this->session->userdata("nombres") .' '. $this->session->userdata("apellidos");?> </span>
                        </a>
                    </li>

                    <li> <a href="<?php echo base_url();?>inicio" class="waves-effect"><i class="mdi mdi-home fa-fw"></i> <span class="hide-menu"> INICIO </span></a> 
                    </li>
                <?php if ( $this->session->userdata("rol")==1 || $this->session->userdata("rol")==2 ): ?>
                    <li> <a href="javascript:void(0)" class="waves-effect <?php echo ($this->uri->segment(1)=='sectores' OR $this->uri->segment(1)=='usuarios') ? 'active' : ''?>"><i class="mdi mdi-table fa-fw"></i> <span class="hide-menu"> AFILIADOS <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>sectores"><i class="mdi mdi-satellite-variant fa-fw"></i><span class="hide-menu"> SECTORES </span></a></li>
                            <li><a href="<?php echo base_url(); ?>usuarios"><i class=" mdi mdi-account-multiple-outline fa-fw"></i><span class="hide-menu"> LISTA DE AFILIADOS </span></a></li>
                        </ul>
                    </li>
                <?php endif ?>
                    <li class="devider"></li>
                <?php if ( $this->session->userdata("rol")==1 || $this->session->userdata("rol")==2 || $this->session->userdata("rol")==3 ): ?>
                    <li> <a href="<?php echo base_url(); ?>medidores" class="waves-effect"><i  class="mdi mdi-settings fa-fw"></i> <span class="hide-menu"> MEDIDOR </span></a> 
                    </li>
                <?php endif ?>
                <?php if ( $this->session->userdata("rol")==1 || $this->session->userdata("rol")==2 ): ?>
                    <li> <a href="javascript:void(0)" class="waves-effect <?php echo ($this->uri->segment(1)=='facturacion') ? 'active' : ''?>"><i class="mdi mdi-table fa-fw"></i> <span class="hide-menu"> FACTURAS <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>facturacion/precios"><i class="mdi mdi-cash fa-fw"></i><span class="hide-menu"> PRECIO M3 </span></a></li>
                            <li><a href="<?php echo base_url(); ?>facturacion"><i class="mdi mdi-file-document-box fa-fw"></i><span class="hide-menu"> FACTURAS </span></a></li>
                            <li><a href="<?php echo base_url(); ?>facturacion/search"><i class="mdi mdi-cart-outline fa-fw"></i><span class="hide-menu"> PAGAR </span></a></li>
                        </ul>
                    </li>
                <?php endif ?>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->

