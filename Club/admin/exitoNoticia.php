<?php
include("seguridadAdmin.php");

require_once("../gestionBD/gestionBD.php");
require_once("../gestionBD/gestionNoticias.php");

session_start();

$conexion = conectarBD();

$noticia = $_SESSION['noticia'];

$titulo = $noticia['titulo'];
$contenido = $noticia['contenido'];
$imagen = $noticia['imagen'];

$_SESSION['noticia'] = "";
$_SESSION['errores'] = "";

$entrada = insertarEntrada($titulo, $contenido, $imagen, $conexion);

desconectarBD($conexion);
?>

<!DOCTYPE html>
	<head>
		<title>Entrada creada con éxito</title>
		<link type="text/css" rel="stylesheet" href="../style.css">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
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
				<?php
				if (!$entrada) {
					echo "<h2>Ups! Se ha producido un error mientras se procesaba su petición. Vuelva a intentarlo en unos minutos</h2>";
				} else {
					echo "<h2>Entrada creada con éxito</h2>";
				}
				?>
				<p>Pulse <a href="panelAdmin.php">aquí</a> para volver a incio, o <a href="nuevaNoticia.php">aquí</a> para crear otra noticia.</p>
			</div>
		</div>
		<?php
			include ("static/ClubFooter.html");
		?>
	</body>
</html>
