<?php 
	
	if(empty($_SESSION['active']))
	{
			header('location: ../');		
	}
 ?>
<header>
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
		<input type="checkbox" id="btn_menu">
		<label for="btn_menu" ><i class="fas fa-bars"></i></label>
		<?php include 'nav.php'; ?>
	</header>