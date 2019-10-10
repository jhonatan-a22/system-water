<?php 
session_start();
if($_SESSION['rol']!=1 && $_SESSION['rol']!=2 && $_SESSION['rol']!=3)
{
	header('location: ./');
}
	include "../conexion.php";


 ?>

 <span class="user"><?php echo $_SESSION['nombre'].'-'.$_SESSION['rol']?></span>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php
	include 'includes/scripts.php';
	?>
	<title>Lista de Afilados</title>
</head>
<body>
	<div class="header">
			
			<h1>Sistema OTB MAICA</h1>
			<div class="optionsBar">
				<p>Bolivia, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['nombre'].'-'.$_SESSION['rol']?></span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<nav>
			<ul>
				<?php 
				if($_SESSION['rol']==1 || $_SESSION['rol']==2)
				{
				?>
				<li><a href="index.php"><i class="fas fa-home"></i>  INICIO</a></li>
					
				<li class="principal">	
					<a href="#"><i class="fas fa-users"></i>  AFILIADOS</a>
					<ul>
						<?php 
						if($_SESSION['rol']==1)
						{
						?>
						<li><a href="registro_usuario.php"><i class="fas fa-user-plus"></i>  Nuevo Afiliado</a></li>
						<?php 
						} ?>
						<li><a href="lista_usuario.php"><i class="fas fa-users"></i>  Lista de Afiliados</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Facturas</a>
					<ul>
						<?php 
						if($_SESSION['rol']==1)
						{
						?>
						<li><a href="#">Nuevo Factura</a></li>
						<?php 
						} ?>
						<li><a href="#">Facturas</a></li>
					</ul>
				</li>
				<?php 
					} ?>
				<br>
				<?php 
				if($_SESSION['rol']==3)
				{
				?>
				<li class="principal"><a href="#"> <i class="fas fa-bars"></i> Menu</a>
					<ul>
						<li> <a href="afiliado.php">Mi perfil</a></li>
						<li><a href="">Meses cancelados</a></li>
						<li><a href="">Meses adeudados</a></li>
						<li><a href="">configuracion</a></li>
					</ul>
				</li>
				<?php 
					} ?>
			</ul>
</nav>
<div id="containerperfil">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="columsp">
					<img src="../fotos/<?php echo $foto; ?>"  width="150px" height="150px" align="center" />
					<br>
					<br>
					
				</div>
				<div class="columsp1">
					<label>Afiliado Nro:</label>
				<input type="text" name="idusuario" value="<?php  echo $_SESSION['idUser']?> " style="background-color:transparent; " >
				<label>Nombre:</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo $_SESSION['nombre']?>" style="background-color:transparent; " class="sinbordefondo" >
				<br>
				<label>Apellido:</label>
				<input type="text" name="apellido" id="apellido" placeholder="Apellido completo" value="<?php echo $_SESSION['apellido']?>" style="background-color:transparent; " class="sinbordefondo" >
				<br>
				<label>C.I.</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo  $_SESSION['user']?>" style="background-color:transparent; " class="sinbordefondo" >
				
				</div>
				
				<div class="columsp2">
				<input type="button" name="General" value="General" onclick="General();" class="bt">
				<input type="button" name="Acceso" value="Acceso" onclick="Acceso();" class="bt">
				<input type="button" name="Historico" value="Historico" class="bt">
				<input type="button" name="configuracion de Contraseña" value="configuracion" class="bt">
					<div class="columsp3" id="mostrarocultar">
					<label for="sector">sector:</label>
					<input type="text" name="sector" id="sector" value=" <?php echo  $_SESSION['sector']?>" style="background-color:transparent; ">
					<br>
					<label for="medidor">medidor:</label>
					<input type="text" name="medidor" id="medidor" value=" <?php echo $medidor;?>" style="background-color:transparent; ">
					<br>
					<label for="rol">Tipo de usuario:</label>
					<input type="text" name="rol" id="rol" value=" <?php echo  $_SESSION['rol']?>" style="background-color:transparent; ">
					
					</div>
					<div class="columsp3">
						<label>Telefono:</label>
						<input type="text" name="telefono" id="telefono" placeholder="telefono" value="<?php echo $telefono;?>" style="background-color:transparent; " class="sinbordefondo" >
						<label>Direccion:</label>
						<input type="text" name="direccion" id="direccion" placeholder="direccion" value="<?php echo $direccion;?>" style="background-color:transparent; " class="sinbordefondo" >
						<label>Provincia:</label>
						<input type="text" name="provincia" id="provincia" placeholder="provincia" value="<?php echo $provincia;?>" style="background-color:transparent; " class="sinbordefondo" >
					</div>
				</div>
			</form>
	</div>

</body>
</html>