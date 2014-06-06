<?php
require_once("../gestionBD/gestionBD.php");
$conexion = conectarBD();

$socio = "49070704C";
$pass = "pablo665";


	try {
		if($conexion==null){
			echo "Fallo de conexion";
		}
		$stmt -> $conexion -> prepare("SELECT COUNT(*) FROM Socios WHERE dni=:dni AND password=:pass");
		$stmt -> bindParam(':dni', $socio);
		$stmt -> bindParam(':pass', $pass);
		$stmt -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		echo $e;
	}
	$row = $stmt->rowCount();
	if($row>0){
		echo "Bienvenido";
	}else{
		echo "Fallo al loguear";
	}
	


desconectarBD($conexion);
?>