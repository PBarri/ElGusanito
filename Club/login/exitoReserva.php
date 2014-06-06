<?php
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionReservas.php");

session_start();
$conexion = conectarBD();
$reserva = $_SESSION["reserva"];
$pista = $reserva["pista"];
$horario = $reserva["hora"];
$fecha = $reserva["fecha"];
$fechaMostrar = $reserva["fechaMostrar"];
$login = $_SESSION["login"];
$dni = $login["dni"];

$_SESSION["reserva"] = null;
$_SEESION["errores"] = null;

$reservar = crearReserva($dni, $pista, $horario, $fecha, $fechaMostrar,$conexion);
?>
<html>
	<head>
		<title>Reserva creada con éxito</title>
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
				if (!$reservar) {
					echo "<h2>Ups! Se ha producido un error mientras se procesaba su petición. Vuelva a intentarlo en unos minutos</h2>";
				} else {
					echo "<h2>Se ha creado su reserva</h2>";
				}
				?>
			</div>
		</div>
		<?php
		include ("static/ClubFooter.html");
		?>
	</body>
</html>
</html>
<?php
desconectarBD($conexion);
?>
