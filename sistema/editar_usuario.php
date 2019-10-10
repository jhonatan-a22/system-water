
<?php 
session_start();
if($_SESSION['rol']!=1)
{
	header('location: ./');
}
include '../conexion.php';
if(!empty($_POST))
	{

			
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellido']) ||empty($_POST['direccion'])||empty($_POST['provincia'])||empty($_POST['sector']) ||empty($_POST['telefono']) || empty($_POST['usuario'])||  empty($_POST['medidor']) || empty($_POST['rol']))

		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';

		}else{
			$idusuario 	= $_POST['idusuario'];
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

			$query = mysqli_query($conection,"SELECT * FROM usuario 
												WHERE (usuario = '$user' and idusuario!= $idusuario) or(medidor='$medidor' and idusuario!=idusuario)");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
			}else{
					if(empty($_POST['clave']))
					{
						$sql_update=mysqli_query($conection,"UPDATE usuario
																SET nombre='$nombre',apellido='$apellido',direccion='$direccion',provincia='$provincia',sector='$sector',telefono='$telefono',usuario='$user',medidor='$medidor',rol='$rol' where idusuario=$idusuario");	
					}
					else{
						$sql_update=mysqli_query($conection,"UPDATE usuario
																SET nombre='$nombre',apellido='$apellido',direccion='$direccion',provincia='$provincia',sector='$sector',telefono='$telefono',usuario='$user',clave='$clave',medidor='$medidor',rol='$rol' where idusuario=$idusuario");
					}
		
				if($sql_update){
					$alert='<p class="msg_save">Usuario actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizado el usuario.</p>';
				}

			}


		}

	}
/*MOSTRAR DATOS */
if(empty($_GET['id']))
{
	
	header('location:lista_usuario.php');
	mysqli_close($conection);
}
$iduser= $_GET['id'];

$sql = mysqli_query($conection,"SELECT u.idusuario,u.nombre, u.apellido, u.direccion,u.provincia,
(u.sector) as id_sector,(s.sector),(u.medidor)as id_medidor,(m.medidor),u.telefono, u.usuario, (u.rol) as idrol, (r.rol) as rol from usuario u inner join rol r on u.rol=r.idrol inner join sector s on u.sector=s.id_sector
inner join medidor m on u.medidor=m.id_medidor where idusuario=$iduser and estatus = 1");

mysqli_close($conection);

$result_sql= mysqli_num_rows($sql);

if($result_sql==0){
	header('location:lista_usuario.php');
}
else
{
	$option1='';
	$option2='';
	$option3='';
	while ($data=mysqli_fetch_array($sql)) 
	{
		$iduser  =$data['idusuario'];
		$nombre  =$data['nombre'];
		$apellido=$data['apellido'];
		$direccion  =$data['direccion'];
		$provincia  =$data['provincia'];
		$id_sector  =$data['id_sector'];
		$sector  =$data['sector'];
		if($id_sector==$id_sector){
			$option1='<option value="'.$id_sector.'"select>'.$sector.'</option>';
		}
		$id_medidor  =$data['id_medidor'];
		$medidor  =$data['medidor'];
		if($id_medidor==$id_medidor){
			$option2='<option value="'.$id_medidor.'"select>'.$medidor.'</option>';
		}
		$telefono  =$data['telefono'];
		$usuario =$data['usuario'];
		$idrol   =$data['idrol'];
		$rol     =$data['rol'];
		if($idrol==$idrol){
			$option3='<option value="'.$idrol.'"select>'.$rol.'</option>';
		}
		
		
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php
	include 'includes/scripts.php';
	?>
	<title> Actualizar Usuario</title>
</head>
<body>
	<?php
	include 'includes/header.php'; 
	?>
	<section id="container">
		<div class="form_register">
			<h1>Actualizar Usuario</h1>
			<hr>
			<div class="alert"> <?php echo isset($alert)? $alert: ''; ?></div>
			<div class="form" style="background-image:url(img/3.jpg);">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="colums">
					<center>
					<img src="../fotos/perfi.jpg"  width="110px" height="100px" align="center" />
					</center>
				<input type="hidden" name="idusuario" value=" <?php echo $iduser ?> ">
				<label class="usuario">C.I.:	</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario;?>">
				<label for="nombre">Nombre :</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo $nombre;?>">	
				<label for="apellido">apellido :</label>
				<input type="text" name="apellido" id="apellido" placeholder="Apellido completo" value="<?php echo $apellido;?>">
				<label for="direccion">direccion :</label>
				<input type="text" name="direccion" id="direccion" placeholder="direccion" value="<?php echo $direccion;?>">
				
				
				</div>
				<div class="columsp">
				<label for="provincia">Provincia :</label>
				<input type="text" name="provincia" id="provincia" placeholder="provincia" value="<?php echo $provincia;?>">
				<label for="telefono">telefono :</label>
				<input type="text" name="telefono" id="telefono" placeholder="telefono" value="<?php echo $telefono;?>">
				
				<label for="sector">sector :</label>
				<?php 
				include '../conexion.php';
				$query_sector=mysqli_query($conection,"SELECT * FROM sector");
				mysqli_close($conection);
				$result_sector =mysqli_num_rows($query_sector);

				

				 ?>

				<select name="sector" id="sector" class="notItemOne">
					<?php 

					echo $option1;

					if($result_sector>0)
					{
						while ($sector=mysqli_fetch_array($query_sector))
						{

					?>
					<option value="<?php echo $sector["id_sector"];?>"><?php echo $sector["sector"] ?></option> 
					<?php
						}
					}

					 ?>
				</select>
				<label for="medidor">medidor :</label>
				<?php 
				include '../conexion.php';
				$query_medidor=mysqli_query($conection,"SELECT * FROM medidor");
				mysqli_close($conection);
				$result_medidor =mysqli_num_rows($query_medidor);

				

				 ?>

				<select name="medidor" id="medidor" class="notItemOne">
					<?php 

					echo $option2;

					if($result_medidor>0)
					{
						while ($medidor=mysqli_fetch_array($query_medidor))
						{

					?>
					<option value="<?php echo $medidor["id_medidor"];?>"><?php echo $medidor["medidor"] ?></option> 
					<?php
						}
					}

					 ?>
				</select>
				<label class="clave">Clave :</label>
				<input type="password" name="clave" id="clave" placeholder="clave de acceso">
				<label for="rol">Tipo de usuario :</label>

				<?php 
				include '../conexion.php';
				$query_rol=mysqli_query($conection,"SELECT * FROM rol");
				mysqli_close($conection);
				$result_rol =mysqli_num_rows($query_rol);

				

				 ?>

				<select name="rol" id="rol" class="notItemOne">
					<?php 

					echo $option3;

					if($result_rol>0)
					{
						while ($rol=mysqli_fetch_array($query_rol))
						{

					?>
					<option value="<?php echo $rol["idrol"];?>"><?php echo $rol["rol"] ?></option> 
					<?php
						}
					}

					 ?>
				</select>
				</div>

				<input type="submit" value="Actualizar Usuario" class="btn_save">
			</form>
		</div>
		</div>
	</section>
	<?php
	include 'includes/footer.php'; 
	?>
</body>
</html>