<?php
session_start();
$formulario = array();
$errores = array();

if (!isset($_POST['correo'])) {
	$_SESSION["correo"] = "";
}

function validar($formulario) {
	// Primero se recogen todos los campos del formulario
	$formulario["persona"] = $_POST["persona"];
	$formulario["correo"] = $_POST["correo"];
	$formulario["asunto"] = $_POST["asunto"];
	$formulario["mensaje"] = $_POST["mensaje"];
	$_SESSION["formulario2"] = $formulario;

	// Expresión regular para comprobar el email
	$expresionMail = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';

	// Se comprueban los distintos campos
	if (!(isset($formulario["persona"]) && strlen($formulario["persona"]) > 0)) {
		$errores[] = "El campo <b>Nombre</b> está vacío";
	}

	if (!(isset($formulario["correo"]) && strlen($formulario["correo"]) > 0)) {
		$errores[] = "El campo <b>Email</b> está vacío";
	}

	if (!preg_match($expresionMail, $formulario["correo"])) {
		$errores[] = "El campo <b>Email</b> no es correcto.";
	}

	if (!(isset($formulario["asunto"]) && strlen($formulario["asunto"]) > 0)) {
		$errores[] = "El campo <b>Asunto</b> está vacío";
	}

	if (!(isset($formulario["mensaje"]) && strlen($formulario["mensaje"]) > 0)) {
		$errores[] = "El campo <b>Mensaje</b> está vacío";
	}
	return $errores;

}

$errores = validar($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	header("Location: ContactoError.php"); 
} else {
	$persona = $_POST["persona"];
	$correo = $_POST["correo"];
	$asunto = $_POST["asunto"];
	$mensaje = $_POST["mensaje"];
	$destino= "elgusanito@hotmail.com";
	$remitente = $_POST["correo"];
	mail($destino,$asunto,$mensaje,"FROM: $remitente");

	// Se eliminan las variables de sesion.
	$formulario = "";
	$errores = "";
	header("Location: ContactoExito.php"); 
	

}
?>