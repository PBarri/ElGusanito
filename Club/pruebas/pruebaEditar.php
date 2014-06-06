<?php
require_once("../gestionBD/gestionBD.php");
require_once("../gestionBD/gestionReservas.php");

session_start();
$conexion = conectarBD();
$reserva = $_SESSION["reserva1"];
$idReserva = $reserva[0];
echo $reserva[0]; echo "<br>";
$pista = $reserva[1];
echo $reserva[1]; echo "<br>";
$horario = $_POST["modHora1"];
echo $reserva[2]; echo "<br>";
$fecha = $_POST["fecha1"];
echo $reserva[3]; echo "<br>";
echo $reserva[4];

?>