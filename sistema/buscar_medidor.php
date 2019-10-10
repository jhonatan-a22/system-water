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
		<h1><i class="fas fa-stopwatch"></i></h1>
		<form action="buscar_medidor.php" method="get" class="form_search_medidor">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" >
			<button type="submit" class="btn_search"><i class="fas fa-search" id="a"></i></button>
			<a href="#" class="btn_medidor" onclick="abrir();"><i class="fas fa-plus" ></i> Crear Medidor</a>			
		</form>
			<div class="registrar_medidor" id="vent">
			<h1><i class="fas fa-stopwatch"></i> Registro</h1>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
				<form action="registrar_medidor.php">
					<div class="medi1">
					<label>Medidor:</label>
					<input type="text" placeholder="Medidor">
					<label>Lec. Ant:</label>
					<input type="text" placeholder="Lectura Anterior">
					<label>Lec. Act:</label>
					<input type="text" placeholder="Lectura Actual">
					</div>
					<div class="medi2">
					<input type="submit" value="Registrar">
					<input type="button" value="Cancelar" onclick="cerrar();">
					</div>
				</form>
			</div>
		<table>
			<tr>
				<th>ID</th>
				<th>Medidor</th>
				<th>Lectura Anterior</th>
				<th>Lectura Actual</th>
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

			}else if ($busqueda=='afiliado') 
			{
				$rol="OR rol LIKE '%3%'";
			}
			$sql_registe=mysqli_query($conection," SELECT COUNT(*) AS total_registro 
								from medidor 
								where ( id_medidor 			like '%$busqueda%' OR
										medidor 			like '%$busqueda%' OR
										lectura_anterior 	like '%$busqueda%' OR
										lectura_actual 		like '%$busqueda%')");
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

			$query= mysqli_query($conection,"SELECT m.id_medidor , m.medidor, m.lectura_anterior, m.lectura_actual
				FROM medidor m 
				where ( m.id_medidor 		like '%$busqueda%' OR
						m.medidor 			like '%$busqueda%' OR
						m.lectura_anterior 	like '%$busqueda%' OR
						m.lectura_actual 	like '%$busqueda%')
				order by m.id_medidor asc
					limit $desde,$por_pagina
					");
			mysqli_close($conection);
				$result = mysqli_num_rows($query);
				if($result>0)
				{
					while($data=mysqli_fetch_array($query)){
			?>	


						<tr>
							<td> <?php echo $data['id_medidor'];?> </td>
							<td><?php echo $data['medidor'];?></td>
							<td><?php echo $data['lectura_anterior'];?></td>
							<td><?php echo $data['lectura_actual'];?></td>
							<td>
								<a class="link_edit" href="editar_medidor.php?id=<?php echo $data['id_medidor'];?>">Editar</a>

								<?php 

								{?>	
									<a class="link_delete" href="eliminar_medidor.php?id=<?php echo $data['id_medidor'];?>">Eliminar</a>
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