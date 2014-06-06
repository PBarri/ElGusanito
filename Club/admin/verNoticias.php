<?php
include("seguridadAdmin.php");
require_once("../gestionBD/gestionBD.php");
require_once("../gestionBD/gestionNoticias.php");

$conexion = conectarBD();
session_start();
if($conexion == NULL){
	$errores[] = "Se ha producido un error al conectar a la base de datos. Inténtelo de nuevo en unos minutos";
	$_SESSION['errores'] = $errores;
	header("Location: errorNoticia.php");
}

$noticias = verNoticias($conexion);

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="../Scripts/noticias.js"></script>
		<title> Inicio </title>
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
				foreach($noticias as $noticia){
					$id = $noticia[0];
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
						<tr class="eliminarNoticia">
							<th class="filaEliminar">
								<form name="eliminarNoticia" method="post" onsubmit='return borrar()' action="eliminarNoticia.php">
									<button id="botonBorrar" class="reserva" type="submit">
										Eliminar Noticia
									</button>
								</form>
							</th>
						</tr>
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