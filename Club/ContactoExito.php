<?php
session_start();
$formulario = $_SESSION["formulario2"];
$_SESSION["formulario2"] = null;
$_SESSION["errores"] = null;
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
	<title> Consultas </title>
</head>
<body>
	<?php
	include ("static/ClubCabecera.html");
	?>

	<?php
	include ("static/ClubMenu.html");
	?>

	<?php
	include ("static/ClubNavigation.php");
	?>

	<div class="content">
		<div class="articulo">
			<p>
				Su propuesta ha sido enviada con éxito. Gracias por sus sugerencias.
			</p>
		</div>
	</div>
	<?php
		include ("static/ClubFooter.html");
	?>
</body>
</html> 