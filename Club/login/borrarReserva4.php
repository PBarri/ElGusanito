<?php
require_once("../gestionBD/gestionBD.php");
require_once("../gestionBD/gestionReservas.php");

session_start();
$conexion = conectarBD();
if ($conexion == NULL) {
	$errores[] = "Se ha producido un error al conectar a la base de datos. Inténtelo de nuevo en unos minutos";
	$_SESSION['errores'] = $errores;
	header("Location: errorReserva.php");
}
$reserva = $_SESSION["reserva4"];

$borrar = eliminarReserva($reserva[0], $conexion);

?>

<html>
	<head>
		<title>Reserva eliminada</title>
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
				if (!$borrar) {
					echo "<h2>Ups! Se ha producido un error mientras se procesaba su petición. Vuelva a intentarlo en unos minutos</h2>";
				} else {
					echo "<h2>Se ha borrado su reserva</h2>";
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

