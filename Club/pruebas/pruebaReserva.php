<?php
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionReservas.php");

session_start();
$conexion = conectarBD();
$reserva = $_SESSION["reserva"];
$pista = $reserva["pista"];
$horario = $reserva["hora"];
$fecha = $reserva["fecha"];
$fechaMostrar = $reserva["fechaMostrar"];
$login = $_SESSION["login"];
$dni = $login["usuario"];

echo $dni;

function reservar($reserva){
	global $conexion;
	$reserva["pista"] = $_POST["pista"];
	$reserva["tipoPista"] = $_POST["tipoPista"];
	$reserva["hora"] = $_POST["hora"];
	$reserva["fecha"] = $_POST["fecha_calendario"];
	$reserva["fechaMostrar"] = $_POST["datepicker"];
	$_SESSION["reserva"] = $reserva;
	$login = $_SESSION["login"];
	
	echo "<b>";
	echo $login["usuario"];
	echo "<br>";
	echo "HOLA";
	echo "</b><br><br>";
	
	echo maxReservas($login["usuario"], $conexion);
	
	if(estaReservada($reserva["pista"], $reserva["hora"], $reserva["fecha"], $conexion)!=0){
		$errores[] = "La pista ya se encuentra reservada";
	}
	if(existeHora($reserva["hora"], $reserva["pista"],$conexion)==0){
		$errores[] = "La hora es incorrecta";
	}
	if(existePista($reserva["pista"], $conexion)==0){
		$errores[] = "La pista seleccionada no existe";
	}
	if(maxReservas($login["usuario"], $conexion)>5){
		$errores[] = "Ha alcanzado el máximo de reservas";
	}
	if(!(isset($reserva["pista"]) && strlen($reserva["pista"])>0)){
		$errores[] = "No ha seleccionado una pista";
	}
	if(!(isset($reserva["hora"]) && strlen($reserva["hora"])>0)){
		$errores[] = "No ha seleccionado una hora";
	}
	if(!(isset($reserva["fecha"]) && strlen($reserva["fecha"])>0)){
		$errores[] = "No ha seleccionado una fecha";
	}
	return $errores;
}

$prueba = reservar($reserva);

desconectarBD($conexion);
?>