<?php
require_once("../gestionBD/gestionBD.php");
require_once("../gestionBD/gestionSocios.php");

session_start();
$conexion = conectarBD();

$login = $_SESSION["login"];
$login["nombre"] = nombrePorUsuario($login["usuario"], $conexion);

$_SESSION["login"] = $login;
$_SESSION["errores"] = null;

if(esSocio($login["usuario"], $conexion)){
	$_SESSION["logueado"] = 1;
	header("Location: ClubInicio.php");
}
if(esAdmin($login["usuario"], $conexion)){
	echo "Es un admin";
	$_SESSION["admin"] = 1;
	header("Location:../admin/panelAdmin.php");
}

?>