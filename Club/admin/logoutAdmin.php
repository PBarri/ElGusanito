<?php
	session_start();
	$_SESSION["login"] = null;
	$_SESSION["usuario"] = null;
	$_SESSION["change"] = null;
	$_SESSION["socio"] = null;
	$_SESSION["admin"] = 0;
	
	session_destroy();
	Header("Location:../ClubInicio.php");	
?>