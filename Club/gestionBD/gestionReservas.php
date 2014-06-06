<?php

/*
 * 	Funciones para gestionar las reservas
 */

function crearReserva($dni, $pista, $horario, $fecha, $fechaMostrar, $conexion) {
	try {
		$reserva = $conexion -> prepare('INSERT INTO Reservas(IdPista,DNI,IdHora,IdFecha, FechaMostrar) VALUES (:pista,:dni,:horario,:fecha, :fecha2)');
		$reserva -> bindParam(':pista', $pista);
		$reserva -> bindParam(':dni', $dni);
		$reserva -> bindParam(':horario', $horario);
		$reserva -> bindParam(':fecha', $fecha);
		$reserva -> bindParam(':fecha2', $fechaMostrar);
		$reserva -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $reserva;
}

function eliminarReserva($idReserva, $conexion) {
	try {
		$reserva = $conexion -> prepare('DELETE FROM Reservas WHERE IdReserva=:reserva');
		$reserva -> bindParam(':reserva', $idReserva);
		$reserva -> execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $reserva;
}

function editarFechaReserva($idReserva, $fecha, $sfecha, $conexion) {
	try {
		$reserva = $conexion -> prepare('UPDATE reservas SET IdFecha=:fecha, FechaMostrar=:sfecha WHERE IdReserva=:reserva');
		$reserva -> bindParam(':reserva', $idReserva);
		$reserva -> bindParam(':fecha', $fecha);
		$reserva -> bindParam(':sfecha', $sfecha);
		$reserva->execute();
	} catch(PDOException $e) {
		$_SESSION["exception"] = $e;
		return false;
	}
	return $reserva;
}

function editarHoraReserva($idReserva, $hora, $conexion){
	try{
		$reserva = $conexion->prepare('UPDATE reservas SET IdHora=:hora WHERE IdReserva=:reserva');
		$reserva->bindParam(':reserva', $idReserva);
		$reserva->bindParam(':hora', $hora);
		$reserva->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $reserva;
}

function reservasPorDNI($dni, $conexion){
	try{
		$reservas = $conexion -> prepare("SELECT * FROM reservas WHERE DNI=:dni ORDER BY IdFecha ASC");
		$reservas->bindParam(':dni',$dni);
		$reservas->execute();
	}catch(PDOException $e){
		$_SESSION["exception"]= $e;
		return false;
	}
	return $reservas;
}

function estaReservada($idPista, $idHora, $idFecha, $conexion){
	try{
		$reserva = $conexion->prepare("SELECT * FROM reservas WHERE IdPista=:pista AND IdHora=:horario AND IdFecha=:fecha");
		$reserva->bindParam(':pista', $idPista);
		$reserva->bindParam(':horario', $idHora);
		$reserva->bindParam(':fecha', $idFecha);
		$reserva->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $reserva->rowCount();
}

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

function existePista($idPista, $conexion){
	try{
		$pistas = $conexion->prepare("SELECT * FROM instalaciones WHERE IdPista=:pista");
		$pistas->bindParam(':pista',$idPista);
		$pistas->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $pistas->rowCount();
}

function maxReservas($dni, $conexion){
	try{
		$reservas = $conexion -> prepare("SELECT * FROM reservas WHERE DNI=:dni");
		$reservas->bindParam(':dni',$dni);
		$reservas->execute();
	}catch(PDOException $e){
		$_SESSION["exception"]= $e;
		return false;
	}
	return $reservas->rowCount();
}

function horasPorPista($idPista, $conexion){
	try{
		$horas = $conexion->prepare("SELECT IdHora FROM horarios WHERE IdPista=:pista ORDER BY IdHora ASC");
		$horas->bindParam(':pista', $idPista);
		$horas->execute();		
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $horas;
}

function deportePorPista($idPista, $conexion){
	try{
		$stmt = $conexion->prepare("SELECT TipoPista FROM instalaciones WHERE IdPista=:pista");
		$stmt->bindParam(':pista', $idPista);
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	$deporte = $stmt->fetch();
	return $deporte[0];
}

function reservas($conexion){
	try{
		$reservas = $conexion->prepare("SELECT * FROM reservas ORDER BY IdHora DESC");
		$reservas->execute();
	}catch(PDOException $e){
		$_SESSION["exception"] = $e;
		return false;
	}
	return $reservas;
}

?>