<?php
require_once ("../gestionBD/gestionBD.php");
require_once ("../gestionBD/gestionSocios.php");

session_start();
$conexion = conectarBD();
$login = $_SESSION["login"];
$passUsuario = getPassword($login["usuario"], $conexion); 
$passAntiguo = $_POST["pass"];
$pass1 = $_POST["pass2"];
$pass2 = $_POST["pass3"];
$errores = array();

if(strcmp($passUsuario[0], $passAntiguo)==0){
	if(strcmp($pass1, $pass2)!=0){
		$errores[] = "Las contraseñas introducidas tienen que coincidir";
	}else{
		$password = editarPass($login["dni"], $pass1, $conexion);
	}
}else{
	$errores[] = "No ha introducido su contraseña correctamente";
}
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
				
				foreach($errores as $error){
					echo $error;
					echo "<br>";
				}
				
				if (!$password) {
				?>
				<p>
					Lo siento. Su contraseña no ha podido cambiarse con éxito.
				</p>
				<p>
					Pulse <a href="ClubTuPerfil.php"><span style="color:black;">aquí</span></a> para volver a tu perfil.
				</p>
				<?php } else {?>
				<p>
					Su contraseña se ha cambiado con éxito.
				</p>
				<p>
					Pulse <a href="ClubTuPerfil.php"><span style="color:black;">aquí</span></a> para volver a tu perfil.
				</p>
			</div>
		</div>
		<?php }
		include ("static/ClubFooter.html");
		?>
	</body>
</html>
<?php
desconectarBD($conexion);
?>