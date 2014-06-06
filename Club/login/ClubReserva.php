<?php
include ("seguridad.php");
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<title> Reserva </title>
	<script type="text/javascript" src="../Scripts/validarReserva.js"></script>
	<script type="text/javascript" src="../Scripts/cambiarSelects.js"></script>
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
				altField: "#fecha_calendario",
				altFormat: "yy-mm-dd",
				hideIfNoPrevNext:true,
				minDate: '0',
				maxDate: '+2M',
				numberOfMonths:2,
				showAnim: 'slideDown',
				stepMonths:'2'
			});
		});

	</script>
</head>
<body>
	<?php
	include ("../static/ClubCabecera.html");
	?>

	<?php
	include ("../login/static/MenuLogin.html");
	?>

	<?php
	include ("../login/static/NavigationLogin.php");
	?>

	<div class="content">
		<div class="articulo">
			<h2><b>¡RESERVA YA!</b></h2><br>
			<form name="reservar" method="post" action="reservar.php" enctype="multipart/form-data" onsubmit="return validarReserva()">
				<fieldset>
					<div id="div_tipoPista" class="datos">
						<label id="label_tipoPista" for="tipoPista" class="datos">Tipo de Pista</label>
						<select id="tipoPista" name="tipoPista" class="list" onchange="cambiarPistas()">
							<option value="0" selected>Seleccione su deporte: </option>
							<option value="1">Fútbol 11</option>
							<option value="2">Fútbol 7</option>
							<option value="3">Baloncesto</option>
							<option value="4">Pádel</option>
							<option value="5">Tenis</option>
						</select>
					</div>
					<div id="div_pistas" class="datos">
						<label id="label_pista" for="pista" class="datos">Numero de Pista: </label>
						<select id="pista" name="pista" class="list" onchange="cambiarHora()">
							<option value="0">Seleccione la pista</option>
						</select>
					</div>
					<div id="div_hora" class="datos">
						<label id="label_hora" for="hora" class="datos">Horario: </label>
						<select id="hora" name="hora" class="list">
							<option value="0">Seleccione la hora</option>
						</select>
					</div>
					<div id="div_fecha" class="datos">
						<label id="label_datepicker" for="datepicker" class="datos">Día: </label>
						<input id="datepicker" name="datepicker" type="text" readonly="readonly" placeholder="Click para seleccionar fecha"/>
						<input id="fecha_calendario" name="fecha_calendario" type="text" readonly="readonly" size="12"/>
					</div>
				</fieldset>
				<div id="div_Reservar" class="submit">
					<button id="reservar" type="submit" class="submit">
						RESERVA YA
					</button>
				</div>
			</form>
		</div>
	</div>
	<?php
	include ("../static/ClubFooter.html");
	?>
</body>
</html> 