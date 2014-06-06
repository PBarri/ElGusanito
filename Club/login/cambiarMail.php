<?php
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionSocios.php");

session_start();
$conexion = conectarBD();
$login = $_SESSION["login"];
$email = $_POST["email"];

$mail = editarEmail($login["dni"], $email, $conexion);
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
				if (!$mail) {
				?>
				<p>
					Lo siento. Su email no ha podido cambiarse con éxito.
				</p>
				<p>
					Pulse <a href="ClubTuPerfil.php"><span style="color:black;">aquí</span></a> para volver a tu perfil.
				</p>
				<?php } else {?>
				<p>
					Su email se ha cambiado con éxito.
				</p>
				<p>
					Pulse <a href="ClubTuPerfil.php"><span style="color:black;">aquí</span></a> para volver a tu perfil.
				</p>
			</div>
		</div>
		<?php }?>
		<?php
		include ("static/ClubFooter.html");
		?>
	</body>
</html>
<?php
desconectarBD($conexion);
?>