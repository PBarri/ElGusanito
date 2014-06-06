<?php
require_once ("gestionBD/gestionBD.php");
require_once ("gestionBD/gestionSocios.php");

$conexion = conectarBD();

session_start();

$formulario = $_SESSION["formulario"];
$usuario = $formulario["usuario"];
$dni = $formulario["dni"] . $formulario["letra"];
$nombre = $formulario["nombre"];
$apellido1 = $formulario["apellido1"];
$apellido2 = $formulario["apellido2"];
$email = $formulario["email1"];
$password = $formulario["pass1"];
$fecha_nac = $formulario["edad2"];
$foto = $formulario["foto"];

$_SESSION["formulario"] = "";
$_SESSION["errores"] = "";

$socio = insertarSocio($dni, $nombre, $apellido1, $apellido2, $fecha_nac, $email, $usuario, $password, $foto, $conexion);

?>
<!DOCTYPE html>
	<head>
		<title>Registro realizado con éxito</title>
		<link type="text/css" rel="stylesheet" href="style.css">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
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
				<?php
				if (!$socio) {
					echo "<h2>Ups! Se ha producido un error mientras se procesaba su petición. Vuelva a intentarlo en unos minutos</h2>";
				} else {
					echo "<h2>¡Enhorabuena! Ya es usted socio del club deportivo El Gusanito</h2>";
				}
				?>
				<p>Pulse <a href="ClubInicio.php">aquí</a> para volver a incio.</p>
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
