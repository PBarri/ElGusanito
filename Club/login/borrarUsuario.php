<?php
session_start();
$login = $_SESSION["login"];
$socio = $_SESSION["socio"];
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
				<p>
				<?php echo $socio[1];?>, ¿seguro que quiere usted darse de baja?
				</p>
				<p>
					Piense en todas las oportunidades que está perdiendo, piense en sus hijos, 
					que ahora no tendrán donde practicar su deporte favorito.
				</p>
				<p>
					Si aun así quiere darse de baja, pulse en siguiente. Si le hemos convencido de que se quede,
					vuelva a su perfil <a href="ClubTuPerfil.php"><span style="color: white;">aquí</span></a>
				</p>
				<p>
					<form id="borrar" action="bajaDefinitiva.php">
						<input id="borrar" name="borrar" type="submit" value="SIGUIENTE">
					</form>
				</p>
			</div>
		</div>
		<?php
		include ("static/ClubFooter.html");
		?>
	</body>
</html>
