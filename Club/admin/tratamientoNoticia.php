<?php

require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionNoticias.php");

session_start();

// Conectamos la BD
$conexion = conectarBD();

$noticia = $_SESSION['noticia'];

if (!isset($noticia)) {
	$_SESSION['noticia'] = "";
}

$errores = validarNoticia($noticia);

if (count($errores) > 0) {
	$_SESSION['errores'] = $errores;
	header("Location: errorNoticia.php");
} else {
	// Antes de mandar a exitoNoticia procesamos la imagen para guardarla en nuestro servidor.
	if (!empty($noticia['imagen'])) {

		// Movemos la foto a la carpeta image de nuestro servidor.
		$ruta = "../image/" . ereg_replace("([ ])*", "", basename($_FILES["imagenNoticia"]["name"]));
		move_uploaded_file($_FILES["imagenNoticia"]["tmp_name"], $ruta);
	}
	header("Location: exitoNoticia.php");
}

desconectarBD($conexion);

function validarNoticia($noticia) {
	global $conexion;

	// Comprobamos que no hay error de conexión a la BD
	if ($conexion == NULL) {
		$errores[] = "Error de conexión a la base de datos. Vuelva a intentarlo en unos minutos";
	} else {

		// Recogemos los campos del formulario.
		$noticia['titulo'] = $_POST['titulo'];
		$noticia['contenido'] = $_POST['contenido'];

		// Usamos la función ereg_replace para eliminar los espacios que puedan existir en el nombre del archivo subido.
		$noticia['imagen'] = ereg_replace("([ ])*", "", $_FILES["imagenNoticia"]["name"]);
		$_SESSION['noticia'] = $noticia;

		// Comprobamos que la imagen se ha subido bien y que no se ha pasado de 2MB de tamaño.
		if (!empty($noticia['imagen'])) {

			if (!is_uploaded_file($_FILES["imagenNoticia"]["tmp_name"])) {
				$errores[] = "Se ha producido un error al subir la imagen.";
			}
			if ($_FILES["imagenNoticia"]["size"] > 2000000) {
				$errores[] = "La imagen es demasiado grande.";
			}
			if ($_FILES["imagenNoticia"]["error"] != 0) {
				$errores[] = "Se ha producido un error.";
			}
			if ($_FILES["imagenNoticia"]["type"] != "image/jpeg") {
				$errores[] = "El formato de la imagen no es válido";
			}
		}
		// Comprobamos los distintos campos.
		if (empty($noticia['titulo'])) {
			$errores[] = "El campo título está vacío";
		}
		if (empty($noticia['contenido'])) {
			$errores[] = "El contenido está vacío";
		}
	}

	return $errores;
}
