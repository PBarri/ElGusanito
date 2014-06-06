<?php
require_once ("../gestionBD/gestionBD.php");

$conexion = conectarBD();
$idHora = "10:00";
$idPista = "1";

function existeHora($idHora, $idPista, $conexion){
	try{
		$hora = $conexion->prepare("SELECT * FROM horarios WHERE IdPista=:pista AND IdHora=:hora");
		$hora->bindParam(':pista', $idPista);
		$hora->bindParam(':hora', $idHora);
		$hora->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $hora->rowCount();
}

$prueba = existeHora($idHora, $idPista, $conexion);

if($prueba==0){
	echo "Fallo";
}else{
	echo "Exito";
}

desconectarBD($conexion);
?>