<?php
include ("seguridad.php");
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionReservas.php");
?>
<?php
session_start();
$login = $_SESSION["login"];
$conexion = conectarBD();
if($conexion == NULL){
	$errores[] = "Se ha producido un error al conectar a la base de datos. Inténtelo de nuevo en unos minutos";
	$_SESSION['errores'] = $errores;
	header("Location: errorReserva.php");
}
$reservas = reservasPorDNI($login["dni"], $conexion);
$reserva1 = $reservas -> fetch();
$reserva2 = $reservas -> fetch();
$reserva3 = $reservas -> fetch();
$reserva4 = $reservas -> fetch();
$reserva5 = $reservas -> fetch();
$_SESSION["reserva1"] = $reserva1;
$_SESSION["reserva2"] = $reserva2;
$_SESSION["reserva3"] = $reserva3;
$_SESSION["reserva4"] = $reserva4;
$_SESSION["reserva5"] = $reserva5;
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
	<script type="text/javascript" src="../Scripts/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="../Scripts/tusReservas.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../Scripts/calendarioReservas.js"></script>
	<title > Tus Reservas </title>
</head>
<body>
	<?php
	include ("static/ClubCabecera.html");
	?><?php
	include ("static/MenuLogin.html");
	?><?php
	include ("static/NavigationLogin.php");
	?>

	<div class="content">
		<div class="articulo">
			<p>
				<h2><b>TUS RESERVAS:</b></h2>
				<br>
			</p><?php
			if ($reserva1 != false) {
				$idPista = $reserva1[1];
				$pistas = horasPorPista($idPista, $conexion);
				echo "<div id='contenedor1' class='contenedor'>";
				echo "<div id='reserva1' class='reserva'>";
				$hora = new DateTime($reserva1[3]);
				echo "<b>Identificador de su reserva:</b> $reserva1[0]";
				echo "<br>";
				echo "<b>Pista:</b> $reserva1[1]";
				echo "<br>";
				echo "<b>Hora:</b> ";
				echo $hora -> format("H:i");
				echo "<br>";
				echo "<b>Fecha:</b> $reserva1[5]";
				echo "<br>";
				echo "</div>";
				echo "<div id='form1' class='formulario'>";
				echo "<form name='borrarReserva1' method='post' action='borrarReserva1.php' onsubmit='return borrar()'>
						<button id='botonBorrar' class='reserva' type='submit'>Eliminar</button></form>";
				echo "<button id='botonModificar1' class='reserva' type='button'>Modificar</button>";
				echo "</div>";
				echo "<div id='mod1' class='oculto'>";
				echo "<form name='modificar1' method='post' action='modificarReserva1.php' onsubmit='return modificarUno()'>";
				echo "<br>";
				echo "<div> ";
				echo "<label id='modHora1 for='modHora1'><b>Hora: </b>";
				echo "<select id='modHora1' name='modHora1'>";
				echo "<option value='0'>Seleccione una hora</option>";
				foreach ($pistas as $pista) {
					$fecha = new DateTime($pista[0]);
					$sfecha = $fecha -> format("H:i");
					echo "<option>$sfecha</option>";
				}
				echo "</select>";
				echo "</div>";
				echo "<br>";
				echo "<div>";
				echo "<label id='label_datepicker' for='fecha1'><b>Fecha: </b></label>";
				echo "<input id='fecha1' name='fecha1' type='text' readonly='readonly' placeholder='Seleccione Fecha'/>";
				echo "<input id='fecha_calendario1' name='fecha_calendario1' class='fecha_calendario' type='text' readonly='readonly' size='12' />";
				echo "</div><br>";
				echo "<div>";
				echo "<button id='botonMod' class='reserva' type='submit'>Guardar</button></form>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			?><br><?php
			if ($reserva2 != false) {
				$idPista = $reserva2[1];
				$pistas = horasPorPista($idPista, $conexion);
				echo "<div id='contenedor2' class='contenedor'>";
				echo "<div id='reserva2' class='reserva'>";
				$hora = new DateTime($reserva2[3]);
				echo "<b>Identificador de su reserva:</b> $reserva2[0]";
				echo "<br>";
				echo "<b>Pista:</b> $reserva2[1]";
				echo "<br>";
				echo "<b>Hora:</b> ";
				echo $hora -> format("H:i");
				echo "<br>";
				echo "<b>Fecha:</b> $reserva2[5]";
				echo "<br>";
				echo "</div>";
				echo "<div id='form2' class='formulario'>";
				echo "<form name='borrarReserva2' method='post' action='borrarReserva2.php' onsubmit='return borrar()'>
			<button id='botonBorrar' class='reserva' type='submit'>Eliminar</button></form>";
				echo "<button id='botonModificar2' class='reserva' type='button'>Modificar</button>";
				echo "</div>";
				echo "<div id='mod2' class='oculto'>";
				echo "<form name='modificar2' method='post' action='modificarReserva2.php' onsubmit='return modificarDos()'>";
				echo "<br>";
				echo "<div> ";
				echo "<label id='modHora2' for='modHora2'><b>Hora: </b>";
				echo "<select id='modHora2' name='modHora2'>";
				echo "<option value='0'>Seleccione una hora</option>";
				foreach ($pistas as $pista) {
					$fecha = new DateTime($pista[0]);
					$sfecha = $fecha -> format("H:i");
					echo "<option>$sfecha</option>";
				}
				echo "</select>";
				echo "</div>";
				echo "<br>";
				echo "<div>";
				echo "<label id='label_datepicker' for='fecha2'><b>Fecha: </b></label>";
				echo "<input id='fecha2' name='fecha2' type='text' readonly='readonly' placeholder='Seleccione Fecha'/>";
				echo "<input id='fecha_calendario2' name='fecha_calendario2' class='fecha_calendario' type='text' readonly='readonly' size='12' />";
				echo "</div><br>";
				echo "<div>";
				echo "<button id='botonMod' class='reserva' type='submit'>Guardar</button></form>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			?><br><?php
			if ($reserva3 != false) {
				$idPista = $reserva3[1];
				$pistas = horasPorPista($idPista, $conexion);
				echo "<div id='contenedor3' class='contenedor'>";
				echo "<div id='reserva3' class='reserva'>";
				$hora = new DateTime($reserva3[3]);
				echo "<b>Identificador de su reserva:</b> $reserva3[0]";
				echo "<br>";
				echo "<b>Pista:</b> $reserva3[1]";
				echo "<br>";
				echo "<b>Hora:</b> ";
				echo $hora -> format("H:i");
				echo "<br>";
				echo "<b>Fecha:</b> $reserva3[5]";
				echo "<br>";
				echo "</div>";
				echo "<div id='form3' class='formulario'>";
				echo "<form name='borrarReserva3' method='post' action='borrarReserva3.php' onsubmit='return borrar()'>
			<button id='botonBorrar' class='reserva' type='submit'>Eliminar</button></form>";
				echo "<button id='botonModificar3' class='reserva' type='button'>Modificar</button>";
				echo "</div>";
				echo "<div id='mod3' class='oculto'>";
				echo "<form name='modificar3' method='post' action='modificarReserva3.php' onsubmit='return modificarTres()'>";
				echo "<br>";
				echo "<div> ";
				echo "<label id='modHora3' for='modHora3'><b>Hora: </b>";
				echo "<select id='modHora3' name='modHora3'>";
				echo "<option value='0'>Seleccione una hora</option>";
				foreach ($pistas as $pista) {
					$fecha = new DateTime($pista[0]);
					$sfecha = $fecha -> format("H:i");
					echo "<option>$sfecha</option>";
				}
				echo "</select>";
				echo "</div>";
				echo "<br>";
				echo "<div>";
				echo "<label id='label_datepicker' for='fecha3'><b>Fecha: </b></label>";
				echo "<input id='fecha3' name='fecha3' type='text' readonly='readonly' placeholder='Seleccione Fecha'/>";
				echo "<input id='fecha_calendario3' name='fecha_calendario3' class='fecha_calendario' type='text' readonly='readonly' size='12' />";
				echo "</div><br>";
				echo "<div>";
				echo "<button id='botonMod' class='reserva' type='submit'>Guardar</button></form>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			?><br><?php
			if ($reserva4 != false) {
				$idPista = $reserva4[1];
				$pistas = horasPorPista($idPista, $conexion);
				echo "<div id='contenedor4' class='contenedor'>";
				echo "<div id='reserva4' class='reserva'>";
				$hora = new DateTime($reserva4[3]);
				echo "<b>Identificador de su reserva:</b> $reserva4[0]";
				echo "<br>";
				echo "<b>Pista:</b> $reserva4[1]";
				echo "<br>";
				echo "<b>Hora:</b> ";
				echo $hora -> format("H:i");
				echo "<br>";
				echo "<b>Fecha:</b> $reserva4[5]";
				echo "<br>";
				echo "</div>";
				echo "<div id='form4' class='formulario'>";
				echo "<form name='borrarReserva4' method='post' action='borrarReserva4.php' onsubmit='return borrar()'>
			<button id='botonBorrar' class='reserva' type='submit'>Eliminar</button></form>";
				echo "<button id='botonModificar4' class='reserva' type='button'>Modificar</button>";
				echo "</div>";
				echo "<div id='mod4' class='oculto'>";
				echo "<form name='modificar4' method='post' action='modificarReserva4.php' onsubmit='return modificarCuatro()'>";
				echo "<br>";
				echo "<div> ";
				echo "<label id='modHora4' for='modHora4'><b>Hora: </b>";
				echo "<select id='modHora4' name='modHora4'>";
				echo "<option value='0'>Seleccione una hora</option>";
				foreach ($pistas as $pista) {
					$fecha = new DateTime($pista[0]);
					$sfecha = $fecha -> format("H:i");
					echo "<option>$sfecha</option>";
				}
				echo "</select>";
				echo "</div>";
				echo "<br>";
				echo "<div>";
				echo "<label id='label_datepicker' for='fecha4'><b>Fecha: </b></label>";
				echo "<input id='fecha4' name='fecha4' type='text' readonly='readonly' placeholder='Seleccione Fecha'/>";
				echo "<input id='fecha_calendario4' name='fecha_calendario4' class='fecha_calendario' type='text' readonly='readonly' size='12' />";
				echo "</div><br>";
				echo "<div>";
				echo "<button id='botonMod' class='reserva' type='submit'>Guardar</button></form>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			?><br><?php
			if ($reserva5 != false) {
				$idPista = $reserva5[1];
				$pistas = horasPorPista($idPista, $conexion);
				echo "<div id='contenedor5' class='contenedor'>";
				echo "<div id='reserva5' class='reserva'>";
				$hora = new DateTime($reserva5[3]);
				echo "<b>Identificador de su reserva:</b> $reserva5[0]";
				echo "<br>";
				echo "<b>Pista:</b> $reserva5[1]";
				echo "<br>";
				echo "<b>Hora:</b> ";
				echo $hora -> format("H:i");
				echo "<br>";
				echo "<b>Fecha:</b> $reserva5[5]";
				echo "<br>";
				echo "</div>";
				echo "<div id='form5' class='formulario'>";
				echo "<form name='borrarReserva5' method='post' action='borrarReserva5.php' onsubmit='return borrar()'>
			<button id='botonBorrar' class='reserva' type='submit'>Eliminar</button></form>";
				echo "<button id='botonModificar5' class='reserva' type='button'>Modificar</button>";
				echo "</div>";
				echo "<div id='mod5' class='oculto'>";
				echo "<form name='modificar5' method='post' action='modificarReserva5.php' onsubmit='return modificarCinco()'>";
				echo "<br>";
				echo "<div> ";
				echo "<label id='modHora5' for='modHora5'><b>Hora: </b>";
				echo "<select id='modHora5' name='modHora5'>";
				echo "<option value='0'>Seleccione una hora</option>";
				foreach ($pistas as $pista) {
					$fecha = new DateTime($pista[0]);
					$sfecha = $fecha -> format("H:i");
					echo "<option>$sfecha</option>";
				}
				echo "</select>";
				echo "</div>";
				echo "<br>";
				echo "<div>";
				echo "<label id='label_datepicker' for='fecha5'><b>Fecha: </b></label>";
				echo "<input id='fecha5' name='fecha5' type='text' readonly='readonly' placeholder='Seleccione Fecha'/>";
				echo "<input id='fecha_calendario5' name='fecha_calendario5' class='fecha_calendario' type='text' readonly='readonly' size='12' />";
				echo "</div><br>";
				echo "<div>";
				echo "<button id='botonMod' class='reserva' type='submit'>Guardar</button></form>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			?>
			<br>
		</div>
	</div>
	<?php
	include ("static/ClubFooter.html");
	?>
</body>
</html> <?php
desconectarBD($conexion);
?>