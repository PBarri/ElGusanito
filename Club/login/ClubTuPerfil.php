<?php
include ("seguridad.php");
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionSocios.php");
session_start();
$conexion = conectarBD();
$login = $_SESSION["login"];
$socio = getSocio($login["usuario"], $conexion);
$_SESSION["socio"] = $socio;
$fecha = new DateTime($socio[4]);
$sfecha = $fecha -> format("d-m-Y");
$foto = "../image/socios/" . $socio[9];
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
	<script type="text/javascript" src="../Scripts/jquery-1.7.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#botonModificar").click(function() {
				if($("#oculto").is(":hidden")) {
					$("#oculto").slideDown();
				} else {
					$("#oculto").slideUp();
				}
			});
		});

	</script>
	<script type="text/javascript">
		function borrar() {
			return confirm("¿Está seguro que desea darse de baja como socio?");
		}
	</script>
	<title> Tu Perfil </title>
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
			<u><b><h2>DATOS PERSONALES:</h2></b></u>
			</br>
			</br>
			<div id="fotoSocio" class="datos">
				<img class="foto" src="<?php echo $foto; ?>" />
				<form id="cambiarFoto" action="cambiarFoto.php" enctype="multipart/form-data" method="post">
					<div class="datos">
						<input type="file" name="foto" id="foto"/>
					</div>
					<div class="datos">
						<button id="submit" type="submit" class="submit">
							Cambiar Foto
						</button>
					</div>
				</form>
			</div>
			<div id="div_nombre" class="datos">
				<label id="label_nombre" for="nombre" class="perfil"><b>Nombre: </b></label>
				<input id="nombre" name="nombre" type="text" readonly="readonly" value="<?php echo $socio[1];?>"/>
			</div>
			</br>
			<div id="div_apellidos" class="datos">
				<label id="label_apellidos" for="apellido1" class="perfil"><b>Apellidos: </b></label>
				<input id="apellido1" name="apellido1" type="text" readonly="readonly" value="<?php echo $socio[2];?>"/>
				<input id="apellido2" name="apellido2" type="text" readonly="readonly" value="<?php echo $socio[3];?>"/>
			</div>
			</br>
			<div id="div_dni" class="datos">
				<label id="label_dni" for="dni" class="perfil"><b>DNI: </b></label>
				<input id="dni" name="dni" type="text" readonly="readonly" value="<?php echo $socio[0];?>"/>
			</div>
			</br>
			<div id="div_email" class="datos">
				<form name="cambiarMail" method="post" action="cambiarMail.php">
					<label id="label_email" for="email" class="perfil"><b>Tu email: </b></label>
					<input id="email" name="email" type="email" value="<?php echo $socio[5];?>"/>
					<input id="submitMail" class="submit" type="submit" value="MODIFICAR"/>
				</form>
			</div>
			</br>
			<div id="div_pass" class="datos">
				<label id="label_pass" class="perfil"><b>Contraseña: </b></label>
				<input id="botonModificar" class="submit" type="button" value="MODIFICAR"/>
				<div id="oculto" class="oculto">
					<form name="cambiarPass" method="post" action="cambiarPass.php">
						<div id="pass" class="datos">
							<label id="label_pass" for="pass" class="perfil">Contraseña Antigua: </label>
							<input id="pass" name="pass" type="password" />
						</div>
						<div id="pass2" class="datos">
							<label id="label_pass2" for="pass2" class="perfil">Contraseña Nueva: </label>
							<input id="pass2" name="pass2" type="password" />
						</div>
						<div id="pass3" class="datos">
							<label id="label_pass3" for="pass3" class="perfil">Repite la contraseña: </label>
							<input id="pass3" name="pass3" type="password" onchange="password()"/>
						</div>
						<input id="submitPass" type="submit" class="submit" value="MODIFICAR"/>
					</form>
				</div>
			</div>
			</br>
			<div id="div_nombre" class="datos">
				<label id="fecha_nac" for="fecha_nac" class="perfil"><b>Fecha de Nacimiento: </b></label>
				<input id="fecha_nac" name="fecha_nac" type="text" readonly="readonly" value="<?php echo $sfecha;?>"/>
			</div>
			</br>
			<br>
			<u><b><h2>BORRAR SOCIO:</h2></b></u>
			</br></br>
			Le recordamos, que al elegir la opción de eliminar su usario, no podrá acceder a la
			reserva de nuestras pistas mediante esta aplicación.
			<br>
			Esta acción no puede deshacerse.
			</br></br>
			<form name="formulario" action="borrarUsuario.php" method="post" onsubmit="return borrar()">
				<div id="div_submit">
					<button id="submit" type="submit" class="submit">
						BORRAR
					</button>
				</div>
			</form>
		</div>
	</div>
	<?php
	include ("static/ClubFooter.html");
	?>
</body>
</html> <?php
desconectarBD($conexion);
?>