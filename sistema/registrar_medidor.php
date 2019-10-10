<?php
	include "../conexion.php";

	if(!empty($_POST))
	{

			
		$alert='';
		if(empty($_POST['medidor'])||  empty($_POST['lectura_anterior']) || empty($_POST['lectura_actual']) || empty($_POST['estado']))

		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
			include 'medidor.php';

		}else{
			$medidor 	= $_POST['medidor'];
			$lectura_anterior 	=$_POST['lectura_anterior'];
			$lectura_actual 	=$_POST['lectura_actual'];
			$estado 	=$_POST['estado'];

			$query = mysqli_query($conection,"SELECT * FROM medidor WHERE medidor = '$medidor'");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				
				$alert='<p class="msg_error">El nro del medidor existente.</p>';
				 include 'medidor.php'; 
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO medidor(medidor,lectura_anterior,lectura_actual)
																	VALUES('$medidor','$lectura_anterior','$lectura_actual','$estado')");
				if($query_insert){
					$alert='<p class="msg_save">Medidor creado correctamente.</p>';
					include 'medidor.php';
				}else{
					$alert='<p class="msg_error">Error al crear el medidor.</p>';
					include 'medidor.php';
				}

			}


		}

	}

 ?>
