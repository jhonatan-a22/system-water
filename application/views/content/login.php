
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="./vendors/images/favicon.png">
<title>Login - Sistema OTB MAICA</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url();?>vendors/theme/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url();?>vendors/theme/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url();?>vendors/theme/css/colors/blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" style="background:url(<?php echo base_url();?>vendors/images/login-register.jpg) center center/cover no-repeat!important;height:100%;position:fixed;">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form action="<?php echo base_url();?>login/login" method="POST" class="form-horizontal form-material" id="loginform">
        <a href="javascript:void(0)" class="text-center db"><img src="./vendors/images/admin-logo-dark.png" alt="Home" /><br/><img src="./vendors/images/admin-text-dark.png" alt="Home" /></a>  
        <?php if($this->session->flashdata("success")):?>
          <div class="alert alert-success">
            <span><?php echo $this->session->flashdata("success")?></span>
          </div>
        <?php endif; ?>
        <?php if($this->session->flashdata("error")):?>
          <br>
          <div class="alert alert-danger">
            <span><?php echo $this->session->flashdata("error")?></span>
          </div>
        <?php endif; ?>
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" name="usuario" type="text" required value="12556193" placeholder="Usuario">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="clave" type="password" required value="admin" placeholder="Contraseña">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Recuérdame </label>
            </div>
            
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Iniciar Sesion</button>
          </div>
        </div>
        
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Don't have an account? <a href="register2.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
          </div>
        </div>
      </form>
      
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>vendors/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="<?php echo base_url();?>vendors/theme/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url();?>vendors/theme/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>vendors/theme/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url();?>vendors/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
