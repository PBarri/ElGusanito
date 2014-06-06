<?php
	session_start();
	if($_SESSION["logueado"]!=1){
		header("Location: ../ClubInicio.php");
		exit();
	}
?>