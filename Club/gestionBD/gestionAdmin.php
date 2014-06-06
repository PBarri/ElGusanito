<?php

/*
 * Funciones para gestionar los socios
 */

function crearMonitor($dni, $nombre, $apellido1, $apellido2, $fecha_nac, $email, $nombreUsuario, $password, $conexion){
	$tipoUsuario = "monitor";
	try {
		$filas = $conexion->prepare("INSERT INTO socios(DNI,Nombre, Apellido1,Apellido2,Fecha_Nac,Email,Usuario,Password,TipoUsuario)
				VALUES (:dni,:nombre,:apellido1,:apellido2,:fecha_nac,:email,:usuario,:password,:tipoUsuario)");
		$filas->bindParam(':dni',$dni);
		$filas->bindParam(':nombre',$nombre);
		$filas->bindParam(':apellido1',$apellido1);
		$filas->bindParam(':apellido2',$apellido2);
		$filas->bindParam(':fecha_nac',$fecha_nac);
		$filas->bindParam(':email',$email);
		$filas->bindParam(':usuario',$nombreUsuario);
		$filas->bindParam(':password',$password);
		$filas->bindParam(':tipoUsuario',$tipoUsuario);
		$filas->execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $filas;
}

function crearCurso($nombre, $plazas, $idMonitor, $dia1, $fecha1, $dia2, $fecha2, $dia3, $fecha3, $conexion){
	try{
		$filas = $conexion->prepare("INSERT INTO cursos(NombreCurso, NumeroPlazas, idMonitor, Dia1, Fecha1, Dia2, Fecha2, Dia3, Fecha3)
		VALUES (:nombre, :plazas, :monitor, :dia1, :fecha1, :dia2, :fecha2, :dia3, :fecha3)");
		$filas->bindParam(':nombre', $nombre);
		$filas->bindParam(':plazas', $plazas);
		$filas->bindParam(':monitor', $idMonitor);
		$filas->bindParam(':dia1', $dia1);
		$filas->bindParam(':fecha1', $fecha1);
		$filas->bindParam(':dia2', $dia2);
		$filas->bindParam(':fecha2', $fecha2);
		$filas->bindParam(':dia3', $dia3);
		$filas->bindParam(':fecha3', $fecha3);
		$filas->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $filas;
}
?>