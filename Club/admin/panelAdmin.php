<?php include("seguridadAdmin.php");?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
    <title>
      Inicio
    </title>
</head>
  
<body>

<?php include("static/ClubCabecera.html"); ?>

<?php include("static/MenuAdmin.php"); ?>

<?php include("static/NavigationAdmin.php"); ?>


<div class="content">
	<div class="articulo">
		<h2>PANEL DE ADMINISTRADOR</h2>
		<br>
		<h3>Desde aquí podrá cambiar diversos aspectos del club.</h3>
		<br>
		En la pestaña "Ver Socios" podrá acceder a los datos de todos los socios registrados en este momento.
		<br><br>
		En la pestaña "Crear Noticia" podrá crear una nueva noticia, que le aparecerá a todos los socios en el panel "Noticias".
		<br><br>
		En la pestaña "Ver Noticias" podrá ver las noticias que ya hay creadas, y eliminar las que quieras.
    </div>
</div>

<?php include("static/ClubFooter.html"); ?>

</body>
</html>
