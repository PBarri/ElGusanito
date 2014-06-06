<?php
require_once ("../gestionBD/gestionBD.php");
require ("../gestionBD/gestionReservas.php");

session_start();
$conexion = conectarBD();
if ($conexion == NULL) {
	$errores[] = "Se ha producido un error al conectar a la base de datos. Inténtelo de nuevo en unos minutos";
	$_SESSION['errores'] = $errores;
	header("Location: errorReserva.php");
}
$reserva = $_SESSION["reserva1"];
$idReserva = $reserva[0];
$hora = $_POST["modHora1"];
$sfecha = $_POST["fecha1"];
$fecha = $_POST["fecha_calendario1"];

if (empty($hora)) {
	$errores[] = "No ha seleccionado una hora";
}
if (empty($fecha)) {
	$errores[] = "No ha seleccionado una fecha";
}

if (count($errores) == 0) {
	$editarHora = editarHoraReserva($idReserva, $hora, $conexion);
	if (!$editarHora) {
		$errores[] = "Se ha producido un error al modificar su reserva";
	} else {
		$editarFecha = editarFechaReserva($idReserva, $fecha, $sfecha, $conexion);
		if (!$editarFecha) {
			$errores[] = "Se ha producido un error al modificar su reserva";
			// Restauramos la hora original de la reserva:
			editarHoraReserva($idReserva, $reserva[3], $conexion);
		}
	}
}
?>
<html>
	<head>
		<title>Reserva modificada</title>
		<link type="text/css" rel="stylesheet" href="../style.css">
	</head>
	<body>
		<?php
		include ("static/ClubCabecera.html");
		?>
		<?php
		include ("static/MenuLogin.html");
		?>
		<?php
		include ("static/NavigationLogin.php");
		?>
		<div class="content">
			<div class="articulo">
				<?php
				if (count($errores) > 0) {
					foreach ($errores as $error) {
						echo "<h2>" . $error . "<h2>";
					}
				} else {
					echo "<h2>Se ha cambiado su reserva</h2>";
				}
				?>
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