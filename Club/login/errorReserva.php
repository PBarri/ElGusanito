<?php
session_start();
$errores = $_SESSION["errores"];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Error</title>
		<link type="text/css" rel="stylesheet" href="../style.css">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
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
				foreach ($errores as $error) {
					echo "<h3><b>$error</b></h3></br></br>";
				}
				?>
				<p>Pulse <a href="ClubReserva.php">aquí</a> para volver al formulario.</p>
			</div>
		</div>
		<?php
		include ("static/ClubFooter.html");
		?>
	</body>
</html>