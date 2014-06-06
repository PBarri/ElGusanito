<?php

session_start();

$errores = $_SESSION["errores"];
$formulario = $_SESSION["formulario"];

if (!isset($formulario)) {
	$formulario["usuario"] = "";
	$formulario["dni"] = "";
	$formulario["letra"] = "";
	$formulario["nombre"] = "";
	$formulario["apellido1"] = "";
	$formulario["apellido2"] = "";
	$formulario["email"] = "";
	$formulario["edad"] = "";
	$formulario["edad2"] = "";
	$_SESSION["formulario"] = $formulario;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<title> Hazte Socio </title>
		<!-- Cargamos las librerías y los estilos del calendario -->
		<link rel="stylesheet" type="text/css" media="all" href="Scripts/jscalendar/calendar-brown.css"/>
		<script type="text/javascript" src="Scripts/jscalendar/calendar.js"></script>
		<script type="text/javascript" src="Scripts/jscalendar/lang/calendar-es.js"></script>
		<script type="text/javascript" src="Scripts/jscalendar/calendar-setup.js"></script>
		<!-- Cargamos el script de validacion -->
		<script type="text/javascript" src="Scripts/validarFormulario.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				$.datepicker.regional['es'] = {
					closeText : 'Cerrar',
					prevText : '&#x3c;Ant',
					nextText : 'Sig&#x3e;',
					currentText : 'Hoy',
					monthNames : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					dayNames : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
					dayNamesShort : ['Dom', 'Lun', 'Mar', 'Mie;', 'Juv', 'Vie', 'Sab'],
					dayNamesMin : ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
					weekHeader : 'Sm',
					dateFormat : 'DD d MM yy',
					firstDay : 1,
					isRTL : false,
					showMonthAfterYear : false,
					yearSuffix : ''
				};
				$.datepicker.setDefaults($.datepicker.regional['es']);
			});

			$(document).ready(function() {
				$("#datepicker").datepicker({
					altField : "#fecha_calendario",
					altFormat : "yy-mm-dd",
					hideIfNoPrevNext : true,
					numberOfMonths : 1,
					showAnim : 'slideDown',
					showOn: "button",
					buttonImage: "image/calendario.gif",
					changeMonth: "True",
					changeYear: "True",
					maxDate: "-6Y"
				});
			});

		</script>
	</head>
	<body>
		<?php
		include ("static/ClubCabecera.html");
		?><?php
		include ("static/ClubMenu.html");
		?><?php
		include ("static/ClubNavigation.php");
		?>

		<div class="content">
			<div class="articulo">
				<h2><b>¡REGÍSTRATE YA!</b></h2>
				<br>
				<br>
				<form name="formulario" method="post" action="tratamientoRegistro.php" enctype="multipart/form-data" onsubmit="return validar()">
					<fieldset>
						<div id="div_usuario" class="datos">
							<label id="label_usuario" for="nombreUsuario" class="datos">Nombre Usuario</label>
							<input id="nombreUsuario" name="nombreUsuario" type="text" required="" onchange="funcionUsuario()" value="<?php echo $formulario["usuario"];?>" />
						</div>
						<div id="div_dni" class="datos">
							<label id="label_dni" for="dni" class="datos">D.N.I.</label>
							<input id="dni" name="dni" type="text" maxlength="8" required="" onchange="funcionDNI()" value="<?php echo $formulario['dni'];?>"/>
							-
							<input id="letra" name="letra" type="text" maxlength="1" required="" onchange="letraDNI()" value="<?php echo $formulario['letra'];?>"/>
						</div>
						<div id="div_nombre" class="datos">
							<label id="label_nombre" for="nombre" class="datos">Nombre</label>
							<input id="nombre" name="nombre" type="text" required="" value="<?php echo $formulario['nombre'];?>" />
						</div>
						<div id="div_apellidos" class="datos">
							<label id="label_apellidos" for="apellido1" class="datos">Apellidos</label>
							<input id="apellido1" name="apellido1" type="text" required="" value="<?php echo $formulario['apellido1'];?>" />
							<input id="apellido2" name="apellido2" type="text" required="" value="<?php echo $formulario['apellido2'];?>" />
						</div>
						<div id="div_email" class="datos">
							<label id="label_email" for="email" class="datos">Tu email</label>
							<input id="email1" name="email1" type="email" required="" placeholder="me@example.com" onchange="esEmail()" value="<?php echo $formulario['email'];?>"/>
						</div>
						<div id="div_email2" class="datos">
							<label id="label_email2" for="email2" class="datos">Repite tu email</label>
							<input id="email2" name="email2" type="email" required="" onchange="email()"/>
						</div>
						<div id="div_pass" class="datos">
							<label id="label_pass" for="pass" class="datos">Contraseña</label>
							<input id="pass" name="pass" type="password" required=""/>
						</div>
						<div id="div_pass2" class="datos">
							<label id="label_pass2" for="pass2" class="datos">Repite la contraseña</label>
							<input id="pass2" name="pass2" type="password" required="" onchange="password()"/>
						</div>
						<div id="div_edad" class="datos">
							<label id="label_edad" for="edad" class="datos">Fecha de nacimiento</label>
							<input id="datepicker" name="datepicker" type="text" required="" placeholder="Click para seleccionar fecha" readonly="readonly" value="<?php echo $formulario['edad2'];?>"/>
							<input id="fecha_calendario" class="fecha_calendario" name="fecha_calendario" type="text" readonly="readonly" size="12" value="<?php echo $formulario['edad']; ?>"/>
						</div>
						<div id="div_foto" class="datos">
							<label id="label_fotos" for="foto" class="datos">Fotografía</label>
							<input id="foto" name="foto" type="file" />
						</div>
					</fieldset>
					<div id="div_submit" class="div_submit">
						<button id="submit" type="submit" class="submit">
							ENVIAR
						</button>
					</div>
				</form>
			</div>
		</div>
		<?php
		include ("static/ClubFooter.html");
		?>
	</body>
</html>
