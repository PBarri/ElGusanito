<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ClubNavigation</title>
		<meta name="author" content="Pablo" />
		<!-- Date: 2011-12-15 -->
		<script type="text/javascript" src="Scripts/validarLogin.js"></script>
		<style type="text/css">
			@import url(style.css);
		</style>
		<script type="text/javascript" src="calendar.js"></script>
	</head>
	<body>
		<div id="navigation">
			<div class="menu_lateral">
				<form name="login" method="post" action="../Club/login/login.php" enctype="multipart/form-data" onsubmit="return login()">
					<table id="table" align="center" cellpadding="2" cellspacing="2" border="0" width="20px">
						<tr>
							<td align="center" colspan="2" bgcolor="#2E9AFE">Zona de socios:</td>
						</tr>
						<tr>
							<td>
							<input id="usuario" name="usuario" type="text" size="20 px" placeholder="Nombre Usuario" />
							</td>
						</tr>
						<tr>
							<td>
							<input id="password" name="password" type="password" size="20 px" placeholder="Contraseña"/>
							</td>
						</tr>
					</table>
					<table id="table" align="center" cellpadding="2" cellspacing="2" border="0" width="20px">
						<tr>
							<td align="left"><input id="submitlogin" type="submit" value="ENTRAR"/></td>
							<td align="right"><a id="registrarse" href="ClubHazteSocio.php">Registrarse</a></td>
						</tr>
					</table>
				</form>
			</div></br>
			<div class="menu_lateral">
				<p>
					<b><span class="ult_noticias">Últimas Noticias:</span></b>
				</p>
				<a id="noticia" href="ClubNoticias.php">
					<p>
						- Oferta de lanzamiento de la página web
					</p>
					<p>
						- Renovacion cursos</br> de padel y tenis
					</p></a>
				<a id="noticia" href="ClubNoticias.php">
					<p>
						- Renovacion cursos escuelas deportivas de futbol sala y baloncesto
					</p></a>
				<a id="noticia" href="ClubNoticias.php">
					<p>
						- Inauguración de una nueva estatua de D. Fco. Javier Rodriguez
					</p></a>
			</div></br>
			<div class="menu_lateral2">
				<iframe src="https://www.google.com/calendar/embed?showPrint=0&amp;showTabs=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=24ut01m45dbt3rv0ishg62cjl0%40group.calendar.google.com&amp;color=%23B1440E&amp;ctz=Europe%2FMadrid"
				style=" border:solid 1px #777 " width="200" height="200" frameborder="0" scrolling="no"></iframe>
			</div>
		</div>
	</body>
</html>
