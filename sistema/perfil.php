<?php 
session_start();
if($_SESSION['rol']!=3 )
{
	header('location: ./');
}
	include "../conexion.php";


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php
	include 'includes/scripts.php';
	?>
	<title>Sisteme OTB MAICA</title>
</head>
<body>
	<?php
	include 'includes/header.php'; 
	?>

	<div id="containerperfil">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="columsp1">
					
					<label>Afiliado Nro:</label>
				<input type="text" name="idusuario" value=" <?php echo $idusuario ?> " style="background-color:transparent; " >
				<label>Nombre:</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo['nombre']?>" style="background-color:transparent; " class="sinbordefondo" >
				<br>
				<label>Apellido:</label>
				<input type="text" name="apellido" id="apellido" placeholder="Apellido completo" value="<?php echo $apellido;?>" style="background-color:transparent; " class="sinbordefondo" >
				<br>
				<label>C.I.</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario;?>" style="background-color:transparent; " class="sinbordefondo" >
				
				</div>
				
				<div class="columsp2">
				<input type="button" name="General" value="General" onclick="General();" class="bt">
				<input type="button" name="Acceso" value="Acceso" onclick="Acceso();" class="bt">
				<input type="button" name="Historico" value="Historico" class="bt">
				<input type="button" name="configuracion de Contraseña" value="configuracion" class="bt">
					<div class="columsp3" id="mostrarocultar">
					<label for="sector">sector:</label>
					<input type="text" name="sector" id="sector" value=" <?php echo $sector;?>" style="background-color:transparent; ">
					<br>
					<label for="medidor">medidor:</label>
					<input type="text" name="medidor" id="medidor" value=" <?php echo $medidor;?>" style="background-color:transparent; ">
					<br>
					<label for="rol">Tipo de usuario:</label>
					<input type="text" name="rol" id="rol" value=" <?php echo $rol;?>" style="background-color:transparent; ">
					
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
			</form>*/
	</div>
	<?php
	include 'includes/footer.php'; 
	?>
</body>
</html>