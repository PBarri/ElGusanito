<?php
	
	session_start();
	
	$errores = $_SESSION['errores'];
	$correo =$_SESSION['correo'];
	
	if(!isset($correo)){
		$formulario['persona']="";
		$formulario['correo']="";
		$formulario['asunto']="";
		$formulario['mensaje']="";
		$_SESSION['correo'] = $correo;
	}
	$formulario = $_SESSION["formulario2"];
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="Scripts/validacionContacto.js" ></script>
		<title> Contacto </title>
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
					Usted puede contactar con nosotros:
				</p>
				<p>
					1.-	Vía telefónica: 904123456
				</p>
				<p>
					2.-	En las oficinas de nuestro Club: Polígono Carretera Amarilla, 50.
				</p>
				<p>
					3.-	Rellenando el siguiente formulario:
				</p>
				<form name="formulario" method="post" action="tratamientoContacto.php" enctype="multipart/form-data" onsubmit="return Validar()">
					<div id="divContactar">
						<div id="divPersona">
							<label id="labelPersona" for="persona">NOMBRE Y APELLIDOS:</label>
							<input id="persona" name="persona" class="persona" type="text" onchange="Persona()" value="<?php echo $formulario['persona'];?>"/>
						</div>
						<div id="divCorreo">
							<label id="labelCorreo" for="correo">TU E-MAIL:</label>
							<input id="correo" name="correo" class="correo" type="text" onchange="esEmail()" value="<?php echo $formulario['correo'];?>"/>
						</div>
						<div id="divAsunto">
							<label id="labelAsunto" for="asunto">ASUNTO:</label>
							<input id="asunto" name="asunto" class="asunto" type="text" onchange="Asunto()" value="<?php echo $formulario['asunto'];?>"/>
						</div><div id="error"></div>
					</div>
					<fieldset>
						<div id="divMensaje">
							<label id="labelMensaje" for="mensaje">TU MENSAJE:</label>
							<textarea id="mensaje" name="mensaje" onchange="Mensaje()" cols="53" rows="10"><?php echo $formulario['mensaje'];?></textarea>
						</div>
					</fieldset>
					<div id="divEnviar">
						<button id="enviar" type="submit">
							Enviar
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
