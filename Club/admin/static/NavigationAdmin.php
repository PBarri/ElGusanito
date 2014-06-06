<?php include "seguridadAdmin.php";
	$login = $_SESSION["login"];
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ClubNavigation</title>
		<meta name="author" content="Pablo" />
		<!-- Date: 2011-12-15 -->
		<script type="text/javascript" src="../Scripts/cerrarSesionAdmin.js"></script>
	</head>
	<body>
		<div id="navigation">
			<div class="menu_lateral">
				<h4> 
					<p>Hola <?php echo $login["nombre"]; ?></p>
					<p><a id="logout" href="logoutAdmin.php" onclick="cerrarSesion()">Cerrar Sesión</a></p>
				</h4>
			</div></br>
			<div class="menu_lateral">	
				<p>
					<b><span class="ult_noticias">Últimas Noticias:</span></b>
				</p>
				<a id="noticia" href="../ClubNoticias.php">
					<p>
						- Oferta de lanzamiento de la página web
					</p>
					<p>
						- Renovación de cursos</br> de pádel y de tenis.
					</p>
				</a>
				<a id="noticia" href="../ClubNoticias.php">
					<p>
						- Renovación de cursos de escuelas deportivas de fútbol sala y baloncesto.
					</p>
				</a>
				<a id="noticia" href="../ClubNoticias.php">
					<p>
						- Inauguración de la nueva estatua de D. Fco. Javier Rodríguez.
					</p>
				</a>
			</div></br>
			<div class="menu_lateral2">
				<iframe src="https://www.google.com/calendar/embed?showPrint=0&amp;showTabs=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=24ut01m45dbt3rv0ishg62cjl0%40group.calendar.google.com&amp;color=%23B1440E&amp;ctz=Europe%2FMadrid"
				style="border:solid 1px #777" width="200" height="200" frameborder="0" scrolling="no"></iframe>
			</div>
		</div>
	</body>
</html>
