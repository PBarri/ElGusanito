<?php
include ("seguridadAdmin.php");

session_start();
$entrada = $_SESSION['entrada'];
$errores = $_SESSION['errores'];

//Inicializamos la variable:
if (!isset($entrada)) {
	$entrada['titulo'] = "";
	$entrada['contenido'] = "";
	$_SESSION['entrada'] = $entrada;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
		<title> Crear nueva noticia </title>
	</head>
	<body>
		<?php
		include ("static/ClubCabecera.html");
		?>

		<?php
	include ("static/MenuAdmin.php");
		?>

		<?php
	include ("static/NavigationAdmin.php");
		?>

		<div class="content">
			<div class="articulo">
				<form name="nuevaNoticia" method="post" enctype="multipart/form-data" action="tratamientoNoticia.php">
					<div id="tituloNoticia" class="noticia">
						<label for="titulo" class="label_noticias">Cabecera de la noticia:</label>
						<input id="titulo" name="titulo" class="input_noticias" type="text" size="30">
						</input>
					</div>
					<div id="contenidoNoticia" class="noticia">
						<label for="contenido" class="label_noticias">Contenido de la noticia:</label>
						<textarea id="contenido" name="contenido" class="noticia" rows="20" cols="80"></textarea>
					</div>
					<div id="imagenNoticia" class="noticia">
						<label for="imagenNoticia" class="label_noticias">Imagen:</label>
						<input id="imagenNoticia" name="imagenNoticia" class="input_noticias" type="file"/>
					</div>
					<div id="div_submit" class="div_submit">
						<button id="submit" type="submit" class="submit">
							PUBLICAR
						</button>
					</div>
				</form>
			</div>
		</div>
		<?php
			include ("static/ClubFooter.html");
		?>
	</body>
</html>
