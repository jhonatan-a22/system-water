<nav>
			<ul class="sidebar-menu">
				<?php 
				if($_SESSION['rol']==1 || $_SESSION['rol']==2)
				{
				?>
				<li><a href="index.php"><i class="fas fa-home"></i>  INICIO</a></li>
					
				<li class="principal">	
					<a href="#"><i class="fas fa-users"></i>  AFILIADOS <i class="fas fa-caret-down"></i></a>
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
					<a href="medidor.php"><i class="fas fa-stopwatch"></i> MEDIDOR</a>
				</li>
				<li class="principal">
					<a href="#"><i class="fas fa-folder"></i> Facturas <i class="fas fa-caret-down"></i></a>
					<ul>
						<?php 
						if($_SESSION['rol']==1)
						{
						?>
						<li><a href="#"><i class="far fa-folder-open"></i>  Nuevo Factura</a></li>
						<?php 
						} ?>
						<li><a href="#"> <i class="fas fa-file-pdf"></i> Facturas</a></li>
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
</aside>
