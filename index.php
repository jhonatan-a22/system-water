

<?php

  $alert='';
  session_start();
  if(!empty($_SESSION['active']))
  {
      header('location: sistema/');   
  }
  else
  {


  if(!empty($_POST))
  {
    if(empty($_POST['usuario'])|| empty($_POST['clave']))
    {
      $alert='Ingrese su usuario y clave';
    }
    else
    {
      require_once"conexion.php";

      $user=mysqli_real_escape_string($conection,$_POST['usuario']);
      $pass=md5(mysqli_real_escape_string($conection,$_POST['clave']));

      $query=mysqli_query($conection,"select * from usuario where usuario='$user'and clave='$pass'");
      mysqli_close($conection);
      $result=mysqli_num_rows($query);
      if ($result > 0)
      {
        $data=mysqli_fetch_array($query);
          
        $_SESSION['active']=true;
        $_SESSION['idUser']=$data['idusuario'];
        $_SESSION['nombre']=$data['nombre'];
$_SESSION['apellido']=$data['apellido'];        
        $_SESSION['user']=$data['usuario'];
        $_SESSION['rol']=$data['rol'];

        header('location: sistema/');
      }
      else
      {
        $alert='El usuario o la clave son incorrectos';
        session_destroy();
      }
    }
  }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>login sistema de OTB MAICA</title>
 <?php
  include 'includes/scripts.php';
  ?>
</head>
<body>

  
<div id="wrap">
  <div id="regbar">

    <div id="navthing">
      <h2>Sistema OTB MAICA</h2>
       <h3>Iniciar Sesion</h3>
       <section id="container">
         <form action="" method="post">
          <input type="text" name="usuario" placeholder="Usuario">
          <input type="password" name="clave" placeholder="Clave">
          <button type="submit">Ingresar</button>  
        </form>
      </section> 
    </div>
    <div>
      <?php
      include 'includes/nav.php'; 
       ?>
       
    </div>
  </div>
</div>
</body>
</html>