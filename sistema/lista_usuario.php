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
		
		<h1><i class="fas fa-users"></i>   Lista de Afilados</h1>
		<?php 
		if($_SESSION['rol']==1)
			{
		?>
		<a href="registro_usuario.php" class="btn_new"><i class="fas fa-user-plus"></i>  crear usuario</a>
		<?php 
			} 
		?>
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" >
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>


		<table>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>apellido</th>
				<th>direccion</th>
				<th>sector</th>
				<th>medidor</th>
				<th>Telefono</th>
				
				<?php 
				if($_SESSION['rol']==1)
					{
				?>
				<th>ci</th>
				<th>Rol</th>
				<th>Acciones</th>
				<?php 
					} 
				?>
			</tr>
			<?php 

			//paginador

			$sql_registe=mysqli_query($conection," SELECT COUNT(*) AS total_registro from usuario where estatus=1");

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

			$query= mysqli_query($conection,"SELECT u.idusuario , u.nombre, u.apellido, u.direccion, s.sector,m.medidor ,u.telefono, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol=r.idrol inner join medidor m on u.medidor=m.id_medidor inner join sector s on u.sector=s.id_sector where estatus=1 
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
							<td> <?php echo $data['sector'];?> </td>
							<td> <?php echo $data['medidor'];?> </td>
							<td> <?php echo $data['telefono'];?> </td>
							<?php 
							if($_SESSION['rol']==1)
								{
							?>
							<td><?php echo $data['usuario'];?></td>
							<td><?php echo $data['rol'];?></td>			
								<td>
									<a class="link_edit" href="editar_usuario.php?id=<?php echo $data['idusuario'];?>"><i class="fas fa-edit"></i>  Editar</a>
									<span>|</span>
									<?php 

									if($data["idusuario"]!=1){?>	
										<a class="link_delete" href="eliminar_usuario.php?id=<?php echo $data['idusuario'];?>"><i class="fas fa-trash-alt"></i>  Eliminar</a>
										<?php
									}

									 ?>
									 <span>|</span>
									 <a class="link_edit" href="perfil.php?id=<?php echo $data['idusuario'];?>"><i class="fas fa-edit"></i>  ver perfil</a>
									
									
								</td>
							<?php 
								} 
							?>
						</tr>
			<?php
					}
				}


			 ?>
		</table>
<div class="paginador">
	<ul>
		<?php 

		if($pagina !=1)
		{

		 ?>
		<li><a href="?pagina=<?php echo 1; ?>"><i class="fas fa-step-backward"></i>  </a></li>
		<li><a href="?pagina=<?php echo $pagina-1;?>"><i class="fas fa-backward"></i></a></li>
		<?php 
		}
			for ($i=1; $i <= $total_paginas; $i++) { 
				# code...
				if($i==$pagina)
				{
					echo '<li class="pageselected">'.$i.'</li>';
				}else
				{
				echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
				}
			}
			if($pagina != $total_paginas)
			{
		 ?>

		
		
		<li><a href="?pagina=<?php echo $pagina + 1;?>"><i class="fas fa-fast-forward"></i>  </a></li>
		<li><a href="?pagina=<?php echo $total_paginas; ?>"><i class="fas fa-step-forward"></i> </a></li>
		<?php } ?>
	</ul>
</div>

	</section>
	<?php
	include 'includes/footer.php'; 
	?>
</body>
</html>