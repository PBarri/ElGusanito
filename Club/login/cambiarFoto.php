<?php

require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionSocios.php");

session_start();
$conexion = conectarBD();
$login = $_SESSION["login"];

$socio = getSocio($login["usuario"], $conexion);

if ($conexion == NULL) {
	$errores[] = "Error de conexión a la base de datos. Vuelva a intentarlo en unos minutos";
} else {
	$foto = ereg_replace("([ ])*", "", $_FILES["imagenNoticia"]["name"]);
	if (empty($foto)) {
		header("Location: ClubTuPerfil.php");
	} else {
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
if(count($errores) == 0){
	$ruta = "../image/socios/".$socio[0].".jpg";
	$foto = move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Club El Gusanito</title>
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
if(count($errores) > 0){
foreach($errores as $error){
echo $error;
echo "<br>";
}
}else{

if (!$foto) {
				?>
				<p>
					Lo siento. Su foto no ha podido cambiarse con éxito.
				</p>
				<p>
					Pulse <a href="ClubTuPerfil.php"><span style="color:black;">aquí</span></a> para volver a tu perfil.
				</p>
				<?php } else {?>
				<p>
					Su foto se ha cambiado con éxito.
				</p>
				<p>
					Pulse <a href="ClubTuPerfil.php"><span style="color:black;">aquí</span></a> para volver a tu perfil.
				</p>
				<?php }
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
