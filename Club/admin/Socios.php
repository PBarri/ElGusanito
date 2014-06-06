<?php

include ("seguridadAdmin.php");

require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionSocios.php");

$conexion = conectarBD();
session_start();
if($conexion == NULL){
	$errores[] = "Se ha producido un error al conectar a la base de datos. Inténtelo de nuevo en unos minutos";
	$_SESSION['errores'] = $errores;
	header("Location: errorSocios.php");
}



$socios = socios($conexion);
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
		<title> Inicio </title>
	</head>
	<body>
		<?php
		include ("static/ClubCabecera.html");
		?>

		<?php
		include ("static/MenuAdmin.php");
		?>

		<?php
		include ("static/NavigationAdmin.php");
		?>

		<div class="content">
			<div class="articulo">
				<p>
					<h2>SOCIOS</h2>
				</p>
				<table id="tablaSocios">
					<tr class="columnaSocios">
						<th class="filaCabecera">Nombre</th>
						<th class="filaCabecera">Apellidos</th>
						<th class="filaCabecera">DNI</th>
						<th class="filaCabecera">Fecha Nacimiento</th>
						<th class="filaCabecera">Email</th>
						<th class="filaCabecera">Nombre Usuario</th>
						<th class="filaCabecera">Contraseña</th>
					</tr>
					
					<?php
					foreach ($socios as $socio) {
						$fecha = new DateTime($socio[4]);
						$sfecha = $fecha -> format("d-m-Y");
					?>
						<tr class="columnaSocios">
							<th class="filaSocios"><?php echo $socio[1] ?></th>
							<th class="filaSocios"><?php echo $socio[2]." ".$socio[3] ?></th>
							<th class="filaSocios"><?php echo $socio[0] ?></th>
							<th class="filaSocios"><?php echo $sfecha ?></th>
							<th class="filaSocios"><?php echo $socio[5] ?></th>
							<th class="filaSocios"><?php echo $socio[6] ?></th>
							<th class="filaSocios"><?php echo $socio[7] ?></th>
						</tr>
					<?php	
					}
					?>
				</table>
			</div>
		</div>
		<?php
		include ("static/ClubFooter.html");
		?>
	</body>
</html>
<?php
desconectarBD($conexion);
?>