<?php
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionReservas.php");
session_start();
$conexion = conectarBD();

$idPista = "7";
$pistas = horasPorPista($idPista, $conexion);

foreach($pistas as $pista){
	$hora = new DateTime($pista[0]);
	echo $hora->format("H:i");
	echo "<br>";
}

desconectarBD($conexion);
?>