<?php
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionSocios.php");
session_start();
$_SESSION["login"] = "";
$login = array();
$errores = array();
$conexion = conectarBD();

function loguear($login) {
	global $conexion;

	if ($conexion == NULL) {
		$errores[] = "Se ha producido un error al conectarse a la base de datos. Vuelva a intentarlo en unos minutos";
	} else {

		$login["usuario"] = $_POST["usuario"];
		$login["password"] = $_POST["password"];
		$login["dni"] = dniPorUsuario($login["usuario"], $conexion);
		$_SESSION["login"] = $login;

		if (!(isset($login["usuario"]) && strlen($login["usuario"]) > 0)) {
			$errores[] = "Introduzca el usuario";
		}
		if (!(isset($login["password"]) && strlen($login["password"]) > 0)) {
			$errores[] = "Introduzca la contraseña";
		}
		if (!existeUsuario($login["usuario"], $conexion)) {
			$errores[] = "El usuario introducido no existe. Si no está registrado, hágalo ahora.";
		} else {
			if (validarUsuario($login["usuario"], $login["password"], $conexion) == 0) {
				$errores[] = "La contraseña no es correcta";
			}
		}
	}
	return $errores;
}

$errores = loguear($login);
if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	header("Location: errorLogin.php");
} else {
	header("Location: exitoLogin.php");
}

desconectarBD($conexion);

?>