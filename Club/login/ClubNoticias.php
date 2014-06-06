<?php
include ("seguridad.php");
require_once("../gestionBD/gestionBD.php");
require_once("../gestionBD/gestionNoticias.php");

$conexion = conectarBD();

$noticias = verNoticias($conexion);

// Hace que empiece por la primera noticia.

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
		<title> Inicio </title>
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
				foreach($noticias as $noticia){
					$imagen = "../image/" . $noticia[3];  ?>
					<table class="tablaNoticias">
						<tr class="filaTitulo">
							<th class="filaTitulo"><?php echo $noticia[1]; ?></th>
						</tr>
						<?php
						if($noticia[3] != ""){
						?>
						<tr class="filaContenido">
							<th class="columnaContenido"><?php echo nl2br($noticia[2]); ?></th>
							<th class="columnaImagen"> <img src="<?php echo $imagen; ?>" class="imagen" /> </th>
						</tr>
						<?php }else{ ?>
							<tr class="filaContenido">
							<th class="columnaContenidoSinImagen"><?php echo nl2br($noticia[2]); ?></th>
						</tr>
						<?php } ?>
					</table>
					<br>
				<?php
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