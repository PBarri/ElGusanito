<?php
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionSocios.php");
session_start();
$conexion = conectarBD();
$login = $_SESSION["login"];
$socio = $_SESSION["socio"];

$borra = borrarSocio($login["dni"], $conexion);

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
				if(!$borra){
				?>
				<p>
					No se ha podido realizar la baja. ¿Sospechoso verdad?
					Ha sido culpa del Yeyo.
				</p>
				<?php
				}else{
				?>
				<p>
				<?php echo $socio[1];?>, se ha dado de baja correctamente. Pulse <a href="../ClubInicio.php"><span style="color:white;">aquí</span></a> para volver a la pagina de inicio.
				</p>
				<p>
					Esperamos tenerlo de vuelta pronto.
				</p>
				<?php
				}
				session_destroy();
				?>
			</div>
		</div>
		<?php
		include ("static/ClubFooter.html");
		?>
	</body>
</html>


?>
<?php
desconectarBD($conexion);
?>
