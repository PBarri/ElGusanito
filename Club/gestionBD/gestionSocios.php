<?php

/*
 * Funciones para gestionar los socios
 */

function insertarSocio($dni, $nombre, $apellido1, $apellido2, $fecha_nac, $email, $nombreUsuario, $password, $foto, $conexion) {
	$tipoUsuario = "socio";
	try {
		$filas = $conexion->prepare("INSERT INTO socios(DNI,Nombre, Apellido1,Apellido2,Fecha_Nac,Email,Usuario,Password,TipoUsuario,Foto)
				VALUES (:dni,:nombre,:apellido1,:apellido2,:fecha_nac,:email,:usuario,:password,:tipoUsuario,:foto)");
		$filas->bindParam(':dni',$dni);
		$filas->bindParam(':nombre',$nombre);
		$filas->bindParam(':apellido1',$apellido1);
		$filas->bindParam(':apellido2',$apellido2);
		$filas->bindParam(':fecha_nac',$fecha_nac);
		$filas->bindParam(':email',$email);
		$filas->bindParam(':usuario',$nombreUsuario);
		$filas->bindParam(':password',$password);
		$filas->bindParam(':tipoUsuario',$tipoUsuario);
		$filas->bindParam(':foto', $foto);
		$filas->execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $filas;
}

function borrarSocio($DNI, $conexion) {
	try {
		$borra = $conexion -> prepare('DELETE FROM Socios WHERE DNI=:dni');
		$borra -> bindParam(':dni', $DNI);
		$borra -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $borra;
}

function editarNombreUsuario($dni, $usuario, $conexion){
	try{
		$editar = $conexion->prepare('UPDATE socios SET Usuario=:usuario WHERE DNI=:dni');
		$editar->bindParam(':usuario',$usuario);
		$editar->bindParam(':dni', $dni);
		$editar->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $editar;
}

function editarEmail($dni, $email, $conexion) {
	try {
		$editar = $conexion -> prepare('UPDATE Socios SET Email=:email WHERE DNI=:dni');
		$editar -> bindParam(':dni', $dni);
		$editar -> bindParam(':email', $email);
		$editar -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $editar;
}

function editarPass($dni, $pass, $conexion){
	try{
		$editar = $conexion->prepare("UPDATE Socios SET Password=:pass WHERE DNI=:dni");
		$editar->bindParam(':pass', $pass);
		$editar->bindParam(':dni', $dni);
		$editar->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $editar;
}

function existeDNI($dni, $conexion) {
	try {
		$stmt = $conexion -> prepare("SELECT DNI FROM socios WHERE DNI=:dni");
		$stmt -> bindParam(':dni', $dni);
		$stmt -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $stmt -> rowCount();
}

function existeEmail($email, $conexion) {
	try {
		$stmt = $conexion -> prepare("SELECT Email FROM socios WHERE Email=:email");
		$stmt -> bindParam(':email', $email);
		$stmt -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $stmt -> rowCount();
}

function existeUsuario($usuario, $conexion){
	try{
		$stmt = $conexion->prepare("SELECT * FROM socios WHERE Usuario=:usuario");
		$stmt->bindParam(':usuario',$usuario);
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $stmt->rowCount();
}

function validarUsuario($usuario, $password, $conexion) {
	try {
		$stmt = $conexion -> prepare("SELECT * FROM Socios WHERE Usuario=:usuario AND Password=:pass");
		$stmt -> bindParam(':usuario', $usuario);
		$stmt -> bindParam(':pass', $password);
		$stmt -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $stmt -> rowCount();
}

function nombrePorUsuario($usuario, $conexion) {
	$nombre = "";
	try {
		$stmt = $conexion -> prepare("SELECT Nombre FROM socios WHERE Usuario=:usuario");
		$stmt -> bindParam(':usuario', $usuario);
		$stmt -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	$nombre = $stmt -> fetch();
	return $nombre[0];
}

function dniPorUsuario($usuario, $conexion){
	$dni = "";	
	try{
		$stmt = $conexion->prepare("SELECT dni FROM socios WHERE Usuario=:usuario");
		$stmt->bindParam(':usuario', $usuario);
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	$dni = $stmt->fetch();
	return $dni[0];
}

function nombrePorDni($dni, $conexion){
	try{
		$stmt = $conexion->prepare("SELECT Nombre FROM socios WHERE DNI=:dni");
		$stmt->bindParam(':dni', $dni);
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	$nombre = $stmt->fetch();
	return $nombre[0];
}

function esSocio($usuario, $conexion){
	$socio = "";
	try{
		$stmt = $conexion -> prepare("SELECT TipoUsuario FROM Socios WHERE Usuario=:usuario");
		$stmt -> bindParam(':usuario', $usuario);
		$stmt -> execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	
	$socio = $stmt -> fetch();
	if($socio[0] == "socio"){
		return true;
	}else{
		return false;
	}
	
}

function esAdmin($usuario, $conexion){
	$admin = "";
	try{
		$stmt = $conexion -> prepare("SELECT TipoUsuario FROM Socios WHERE Usuario=:usuario");
		$stmt -> bindParam(':usuario', $usuario);
		$stmt -> execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	
	$admin = $stmt -> fetch();
	if($admin[0] == "admin"){
		return true;
	}else{
		return false;
	}
	
}

function getSocio($usuario, $conexion){
	try{	
		$socio = $conexion->prepare("SELECT * FROM socios WHERE Usuario=:usuario");
		$socio->bindParam(':usuario', $usuario);
		$socio->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $socio->fetch();
}

function socios($conexion){
	try{
		$tipo = "socio";
		$stmt = $conexion->prepare("SELECT * FROM Socios WHERE TipoUsuario=:tipo");
		$stmt->bindParam(':tipo', $tipo);
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $stmt;
}

function getPassword($usuario, $conexion){
	try{
		$pass = $conexion -> prepare("SELECT Password FROM socios WHERE Usuario=:usuario");
		$pass->bindParam(':usuario', $usuario);
		$pass->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $pass->fetch();
}

?>