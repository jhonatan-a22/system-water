<?php 
session_start();
if($_SESSION['rol']!=1 && $_SESSION['rol']!=2)
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
	<title>Lista de Afilados</title>
</head>
<body>
	<?php
	include 'includes/header.php'; 
	?>
	<section id="container">
		<?php
		$busqueda= strtolower($_REQUEST['busqueda']);
		if(empty($busqueda))
		{
			header("location: lista_usuario.php");
			mysqli_close($conection);
		}

		 ?>
		<h1>Lista de Afilados</h1>
		<a href="registro_usuario.php" class="btn_new"> crear usuario</a>
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value=" <?php echo $busqueda; ?> ">
			<input type="submit" value="Buscar" class="btn_search">
		</form>


		<table>
			<tr>
				<th>ID</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Direccion</th>
				<th>Provincia</th>
				<th>Sector</th>
				<th>Medidor</th>
				<th>Telefono</th>
				<th>Usuario</th>
				<th>Rol</th>
				<th>Acciones</th>
			</tr>
			<?php 

			//paginador
			$rol='';
			if($busqueda == 'administrador')
			{
				$rol="OR rol LIKE '%1%'";

			}else if ($busqueda=='supervisor') 
			{
				$rol="OR rol LIKE '%2%'";

			}else if ($busqueda=='vendedor') 
			{
				$rol="OR rol LIKE '%3%'";
			}
			$sql_registe=mysqli_query($conection," SELECT COUNT(*) AS total_registro 
								from usuario 
								where ( idusuario 	like '%$busqueda%' OR
										nombre 		like '%$busqueda%' OR
										apellido 	like '%$busqueda%' OR
										direccion	like '%$busqueda%' OR
										provincia	like '%$busqueda%' OR
										sector 		like '%$busqueda%' OR
										medidor 	like '%$busqueda%' OR
										telefono 	like '%$busqueda%' OR
										usuario 	like '%$busqueda%'
										$rol) 
										and estatus=1");
			$result_register=mysqli_fetch_array($sql_registe);
			$total_registro=$result_register['total_registro'];

			$por_pagina = 10;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else
			{
				$pagina=$_GET['pagina'];
			}	

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas=ceil($total_registro / $por_pagina);

			$query= mysqli_query($conection,"SELECT u.idusuario , u.nombre, u.apellido, u.direccion, u.provincia,s.sector ,m.medidor ,u.telefono ,u.usuario, r.rol
				FROM usuario u 
				INNER JOIN rol r 
				ON u.rol=r.idrol 
				INNER JOIN sector s 
				ON u.sector=s.id_sector 
				INNER JOIN medidor m 
				ON u.medidor=m.id_medidor 

				where ( u.idusuario 	like '%$busqueda%' OR
						u.nombre 		like '%$busqueda%' OR
						u.apellido 		like '%$busqueda%' OR
						u.direccion 	like '%$busqueda%' OR
						u.provincia 	like '%$busqueda%' OR
						s.sector 		like '%$busqueda%' OR
						m.medidor 		like '%$busqueda%' OR
						u.telefono 	 	like '%$busqueda%' OR
						u.usuario 		like '%$busqueda%' OR
						r.rol 			like '%$busqueda%' )
				and estatus=1 
				order by u.idusuario asc
					limit $desde,$por_pagina
					");
			mysqli_close($conection);
				$result = mysqli_num_rows($query);
				if($result>0)
				{
					while($data=mysqli_fetch_array($query)){
			?>	


						<tr>
							<td> <?php echo $data['idusuario'];?> </td>
							<td><?php echo $data['nombre'];?></td>
							<td><?php echo $data['apellido'];?></td>
							<td><?php echo $data['direccion'];?></td>
							<td><?php echo $data['provincia'];?></td>
							<td> <?php echo $data['sector'];?> </td>
							<td> <?php echo $data['medidor'];?> </td>
							<td> <?php echo $data['telefono'];?> </td>
							<td><?php echo $data['usuario'];?></td>
							<td><?php echo $data['rol'];?></td>
							<td>
								<a class="link_edit" href="editar_usuario.php?id=<?php echo $data['idusuario'];?>">Editar</a>

								<?php 

								if($data["idusuario"]!=1){?>	
									<a class="link_delete" href="eliminar_usuario.php?id=<?php echo $data['idusuario'];?>">Eliminar</a>
									<?php
								}

								 ?>
								
								
							</td>
						</tr>
			<?php
					}
				}


			 ?>
		</table>
		<?php 
		if($total_registro!=0)
		{
		 ?>
<div class="paginador">
	<ul>
		<?php 

		if($pagina !=1)
		{

		 ?>
		<li><a href="?pagina=<?php echo 1; ?>&busqueda= <?php echo $busqueda;?> ">|<</a></li>
		<li><a href="?pagina=<?php echo $pagina-1;?>"><<</a></li>
		<?php 
		}
			for ($i=1; $i <= $total_paginas; $i++) { 
				# code...
				if($i==$pagina)
				{
					echo '<li class="pageselected">'.$i.'</li>';
				}else
				{
				echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
				}
			}
			if($pagina != $total_paginas)
			{
		 ?>

		
		
		<li><a href="?pagina=<?php echo $pagina + 1;?>&busqueda= <?php echo $busqueda;?>">>></a></li>
		<li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda= <?php echo $busqueda;?>">>|</a></li>
		<?php } ?>
	</ul>
</div>
<?php 
		}
 ?>
	</section>
	<?php
	include 'includes/footer.php'; 
	?>
</body>
</html>