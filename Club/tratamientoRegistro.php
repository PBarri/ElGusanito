<?php
require_once ("gestionBD/gestionBD.php");
require_once ("gestionBD/gestionSocios.php");

session_start();

// Creamos la conexion a la BD
$conexion = conectarBD();

$formulario = $_SESSION["formulario"];

if (!isset($formulario)) {
	$_SESSION["formulario"] = "";
}

function validar($formulario) {
	global $conexion;

	// Comprobamos que no hay error de conexion a la BD
	if ($conexion == NULL) {
		$errores[] = 'Error al conectarse a la base de datos. Vuelva a intentarlo en unos minutos.';
	} else {

		// Primero se recogen todos los campos del formulario
		$formulario["usuario"] = $_POST["nombreUsuario"];
		$formulario["dni"] = $_POST["dni"];
		$formulario["letra"] = $_POST["letra"];
		$formulario["nombre"] = $_POST["nombre"];
		$formulario["apellido1"] = $_POST["apellido1"];
		$formulario["apellido2"] = $_POST["apellido2"];
		$formulario["email1"] = $_POST["email1"];
		$formulario["email2"] = $_POST["email2"];
		$formulario["pass1"] = $_POST["pass"];
		$formulario["pass2"] = $_POST["pass2"];
		$formulario["edad"] = $_POST["datepicker"];
		$formulario["edad2"] = $_POST["fecha_calendario"];
		$formulario["foto"] = $_POST["dni"].$_POST["letra"].".jpg";
		$_SESSION["formulario"] = $formulario;

		// Expresiones regulares para comprobar el dni, la contraseña y el email
		$expresionDNI = '/^\d{1,8}$/';
		$expresionPass = '/^\w{1,15}$/';
		$expresionMail = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';

		// Se comprueban los distintos campos
		$tabla = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
		$modulo = $formulario["dni"] % 23;

		if (!(isset($formulario["usuario"]) && strlen($formulario["usuario"]) > 0)) {
			$errores[] = 'El campo <b>Usuario</b> está vacío';
		}
		if (!(isset($formulario["dni"]) && strlen($formulario["dni"]) > 0)) {
			$errores[] = 'El campo <b>DNI</b> está vacío';
		}
		if (!preg_match($expresionDNI, $formulario["dni"])) {
			$errores[] = 'El <b>DNI</b> no es correcto';
		}
		if ($formulario["letra"] != $tabla[$modulo]) {
			$errores[] = 'La <b>letra</b> no es correcta';
		}
		if (!(isset($formulario["nombre"]) && strlen($formulario["nombre"]) > 0)) {
			$errores[] = 'El campo <b>Nombre</b> está vacío';
		}
		if (!(isset($formulario["apellido1"]) && strlen($formulario["apellido1"]) > 0)) {
			$errores[] = 'El <b>primer apellido</b> está vacío';
		}
		if (!(isset($formulario["apellido2"]) && strlen($formulario["apellido2"]) > 0)) {
			$errores[] = 'El <b>segundo apellido</b> está vacío';
		}
		if (!(isset($formulario["email1"]) && strlen($formulario["email1"]) > 0)) {
			$errores[] = 'El campo <b>Email</b> está vacío';
		}
		if (!(isset($formulario["email2"]) && strlen($formulario["email2"]) > 0)) {
			$errores[] = 'Tiene que repetir su email';
		}
		if (!(isset($formulario["pass1"]) && strlen($formulario["pass1"]) > 0)) {
			$errores[] = 'El campo <b>Contraseña</b> está vacío';
		}
		if (!(isset($formulario["pass2"]) && strlen($formulario["pass2"]) > 0)) {
			$errores[] = 'Tiene que repetir la contraseña';
		}
		if (!(isset($formulario["edad2"]) && strlen($formulario["edad2"]) > 0)) {
			$errores[] = 'El campo <b>edad</b> está vacío';
		}
		// Comprobamos si las contraseñas son iguales
		$pass1 = $formulario["pass1"];
		$pass2 = $formulario["pass2"];
		if (strcmp($pass1, $pass2) != 0) {
			$errores[] = 'Las contraseñas tienen que ser iguales';
		}
		// Comprobamos que los email son iguales
		$email1 = $formulario["email1"];
		$email2 = $formulario["email2"];
		if (strcmp($email1, $email2) != 0) {
			$errores[] = 'Los email tienen que ser iguales';
		}
		// Comprobamos que el DNI, el email y el nombre de usuario no se encuentran en nuestra BD
		if (existeUsuario($formulario["usuario"], $conexion) != 0) {
			$errores[] = 'El nombre de usuario ya se encuentra registrado en nuestra base de datos';
		}
		$dni = $formulario["dni"] . $formulario["letra"];
		if (existeDNI($dni, $conexion) != 0) {
			$errores[] = 'El DNI introducido ya se encuentra registrado en nuestra base de datos';
		}
		if (existeEmail($formulario["email1"], $conexion) != 0) {
			$errores[] = 'El email introducido ya se encuentra registrado en nuestra base de datos';
		}
		
		// Realizamos las comprobaciones del archivo de imagen (para que no nos cuelen otra cosa).
		if(!empty($formulario["foto"])){
			if (!is_uploaded_file($_FILES["foto"]["tmp_name"])) {
				$errores[] = "Se ha producido un error al subir la imagen.";
			}
			if ($_FILES["foto"]["size"] > 2000000) {
				$errores[] = "La imagen es demasiado grande.";
			}
			if ($_FILES["foto"]["error"] != 0) {
				$errores[] = "Se ha producido un error.";
			}
			if ($_FILES["foto"]["type"] != "image/jpeg") {
				$errores[] = "El formato de la imagen no es válido";
			}
		}
	}
	return $errores;
}

$errores = validar($formulario);

if (count($errores) > 0) {
	$_SESSION['errores'] = $errores;
	header('Location: error.php');
} else {
	$ruta = "/image/socios/".$formulario["foto"];
	move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);
	header('Location: exitoRegistro.php');
}
desconectarBD($conexion);
?>