<?php

include ("seguridadAdmin.php");

require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionSocios.php");
require_once ("../gestionBD/gestionReservas.php");

$conexion = conectarBD();
session_start();
if($conexion == NULL){
	$errores[] = "Se ha producido un error al conectar a la base de datos. Inténtelo de nuevo en unos minutos";
	$_SESSION['errores'] = $errores;
	header("Location: errorReservas.php");
}

$reservas = reservas($conexion);

function mes($fecha){
	$res = "";
	if($fecha == "January"){
		$res = "Enero";
	}
	if($fecha == "February"){
		$res = "Febrero";
	}
	if($fecha == "March"){
		$res = "Marzo";
	}
	if($fecha == "April"){
		$res = "Abril";
	}
	if($fecha == "May"){
		$res = "Mayo";
	}
	if($fecha == "June"){
		$res = "Junio";
	}
	if($fecha == "July"){
		$res = "Julio";
	}
	if($fecha == "August"){
		$res = "Agosto";
	}
	if($fecha == "September"){
		$res = "Septiembre";
	}
	if($fecha == "October"){
		$res = "Octubre";
	}
	if($fecha == "November"){
		$res = "Noviembre";
	}
	if($fecha == "December"){
		$res = "Diciembre";
	}
	return $res;
}

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
					<h2>RESERVAS</h2>
				</p>
				<table id="tablaReservas">
					<tr class="columnaCabecera">
						<th class="filaCabecera">ID</th>
						<th class="filaCabecera">Día</th>
						<th class="filaCabecera">Mes</th>
						<th class="filaCabecera">Año</th>
						<th class="filaCabecera">Deporte</th>
						<th class="filaCabecera">Pista</th>
						<th class="filaCabecera">DNI</th>
						<th class="filaCabecera">Nombre</th>
					</tr>
					
					<?php
					foreach ($reservas as $reserva) {
						$fecha = new DateTime($reserva[4]);
						$dia = $fecha -> format("d");
						$sfecha = $fecha -> format("F");
						$mes = mes($sfecha);
						$año = $fecha -> format("Y");
						$nombre = nombrePorDni($reserva[2], $conexion);
						$deporte = deportePorPista($reserva[1], $conexion);
						
					?>
						<tr class="columnaReservas">
							<th class="filaReserva"><?php echo $reserva[0]; ?></th>
							<th class="filaReserva"><?php echo $dia; ?></th>
							<th class="filaReserva"><?php echo $mes; ?></th>
							<th class="filaReserva"><?php echo $año; ?></th>
							<th class="filaReserva"><?php echo $deporte ; ?></th>
							<th class="filaReserva"><?php echo $reserva[1] ; ?></th>
							<th class="filaReserva"><?php echo $reserva[2]; ?></th>
							<th class="filaReserva"><?php echo $nombre; ?></th>
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