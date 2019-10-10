<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}
	
	include "../conexion.php";

	if(!empty($_POST))
	{

			
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellido']) ||empty($_POST['direccion'])|empty($_POST['provincia']) ||empty($_POST['sector']) ||empty($_POST['telefono']) || empty($_POST['usuario']) || empty($_POST['clave']) ||  empty($_POST['medidor']) || empty($_POST['rol']))

		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';

		}else{
			$nombre 	= $_POST['nombre'];
			$apellido 	=$_POST['apellido'];
			$direccion 	=$_POST['direccion'];
			$provincia 	=$_POST['provincia'];
			$sector 	=$_POST['sector'];
			$telefono 	=$_POST['telefono'];
			$user   	= $_POST['usuario'];
			$clave  	= md5($_POST['clave']);
			$medidor=$_POST['medidor'];
			$rol    	= $_POST['rol'];

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario = '$user'");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO usuario(nombre,apellido,direccion,provincia,sector,telefono,usuario,clave,medidor,rol)
																	VALUES('$nombre','$apellido','$direccion','$provincia','$sector','$telefono','$user','$clave','$medidor','$rol')");
				if($query_insert){
					$alert='<p class="msg_save">Usuario creado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al crear el usuario.</p>';
				}

			}


		}

	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1><i class="fas fa-user-plus"></i>  Registro usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<div class="form" style="background-image:url(img/3.jpg);">
				
		
			<form action="" method="post" enctype="multipart/form-data">
				<div class="colums">
					<center>
					<img src="../fotos/perfi.jpg"  width="110px" height="100px" align="center" />
					</center>
					<br>
					<label for="usuario"><b>C.I. :</b></label>
					<input type="text" name="usuario" id="usuario" placeholder="Usuario" onkeyPress="return solonumeros(event)">
					<label for="nombre"><b>Nombres :</b></label>
					<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" onkeyPress="return sololetras(event)">
					<label for="apellido"><b>Apellidos : </b></label>
					<input type="text" name="apellido" id="apellido" placeholder="apellido" onkeyPress="return sololetras(event)">
					<label for="direccion"><b>direccion : </b></label>
					<input type="text" name="direccion" id="direccion" placeholder="direccion" onkeyPress="return sololetras(event)">
					
				</div>
				<div class="columsp">
					<label for="telefono"><b>Telefono :</b></label>
					<input type="text" name="telefono" id="telefono" placeholder="telefono" onkeyPress="return solonumeros(event)">
					<label for="provincia"><b>Provincia :</b></label>
					<input type="text" name="provincia" id="provincia" placeholder="provincia" onkeyPress="return sololetras(event)">
					<label for="sector"><b>Sector :</b></label>
					<?php 

						$query_sector = mysqli_query($conection,"SELECT * FROM sector");
						
						$result_sector = mysqli_num_rows($query_sector);

					 ?>

					<select name="sector" id="sector">
						<?php 
							if($result_sector > 0)
							{
								while ($sector = mysqli_fetch_array($query_sector)) {
						?>
								<option value="<?php echo $sector["id_sector"]; ?>"><?php echo $sector["sector"] ?></option>
						<?php 
									# code...
								}
								
							}
						 ?>
					</select>
					
					
					<label for="rol"><b>Tipo Usuario :</b></label>
					<?php 

						$query_rol = mysqli_query($conection,"SELECT * FROM rol");
						
						$result_rol = mysqli_num_rows($query_rol);

					 ?>

					<select name="rol" id="rol">
						<?php 
							if($result_rol > 0)
							{
								while ($rol = mysqli_fetch_array($query_rol)) {
						?>
								<option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?></option>
						<?php 
									# code...
								}
								
							}
						 ?>
					</select>
					<label for="medidor"><b>Nro medidor :</b></label>
					<?php 

						$query_nro = mysqli_query($conection,"SELECT * FROM medidor");
						mysqli_close($conection);
						$result_nro = mysqli_num_rows($query_nro);

					 ?>
						 <select name="medidor" id="medidor">
						<?php 
							if($result_nro > 0)
							{
								while ($medidor = mysqli_fetch_array($query_nro)) {
						?>
								<option value="<?php echo $medidor["id_medidor"]; ?>"><?php echo $medidor["medidor"] ?></option>

<?php

								echo $medidor["medidor"];

								?>


						<?php 
									
								}
								
							}
						 ?>
					</select>
					<label for="clave"><b>Clave :</b></label>
					<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
				</div>	
				
				<button type="submit" class="btn_save"><i class="far fa-save"></i>		Crear Usuario</button>
				

			</form>
		</div>

		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>