<?php
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionReservas.php");

session_start();
$conexion = conectarBD();
$reserva = array();
$errores = array();

$errores = reservar($reserva);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	header("Location:errorReserva.php");
} else {
	header("Location:exitoReserva.php");
}

function reservar($reserva) {
	global $conexion;

	if ($conexion == NULL) {
		$errores[] = "Se ha producido un error al conectarse a la base de datos. Vuelva a intentarlo en unos minutos";
	} else {

		$reserva["pista"] = $_POST["pista"];
		$reserva["tipoPista"] = $_POST["tipoPista"];
		$reserva["hora"] = $_POST["hora"];
		$reserva["fecha"] = $_POST["fecha_calendario"];
		$reserva["fechaMostrar"] = $_POST["datepicker"];
		$_SESSION["reserva"] = $reserva;
		$login = $_SESSION["login"];

		if (estaReservada($reserva["pista"], $reserva["hora"], $reserva["fecha"], $conexion) != 0) {
			$errores[] = "La pista ya se encuentra reservada";
		}
		if (existeHora($reserva["hora"], $reserva["pista"], $conexion) == 0) {
			$errores[] = "La hora es incorrecta";
		}
		if (existePista($reserva["pista"], $conexion) == 0) {
			$errores[] = "La pista seleccionada no existe";
		}
		if (maxReservas($login["dni"], $conexion) > 4) {
			$errores[] = "Ha alcanzado el máximo de reservas";
		}
		if (!(isset($reserva["pista"]) && strlen($reserva["pista"]) > 0)) {
			$errores[] = "No ha seleccionado una pista";
		}
		if (!(isset($reserva["hora"]) && strlen($reserva["hora"]) > 0)) {
			$errores[] = "No ha seleccionado una hora";
		}
		if (!(isset($reserva["fecha"]) && strlen($reserva["fecha"]) > 0)) {
			$errores[] = "No ha seleccionado una fecha";
		}
	}
	return $errores;
}

desconectarBD($conexion);
?>