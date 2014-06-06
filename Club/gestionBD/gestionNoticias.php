<?php

/*
 * Funciones para gestionar las entradas
 */

function insertarEntrada($titulo, $contenido, $imagen, $conexion){
	try{
		$fecha = new DateTime();
		$sfecha = $fecha -> format("y-m-d g:i:s");
		$stmt = $conexion->prepare("INSERT INTO noticias(Titulo,Contenido,Imagen,Fecha) 
		VALUES(:titulo, :contenido, :imagen, :fecha)");
		$stmt->bindParam(':titulo', $titulo);
		$stmt->bindParam(':contenido', $contenido);
		$stmt->bindParam(':imagen', $imagen);
		$stmt->bindParam('fecha', $sfecha);
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $stmt;
}

function borrarEntrada($entrada, $conexion){
	try{
		$stmt = $conexion -> prepare("DELETE * FROM noticias WHERE ID=:id");
		$stmt->bindParam(':id', $entrada);
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $stmt;
}

function verNoticias($conexion){
	try{
		$stmt = $conexion -> prepare("SELECT * FROM noticias ORDER BY Fecha DESC");
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $stmt;
}

?>
