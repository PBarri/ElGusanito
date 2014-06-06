<?php
    
    function conectarBD(){
    	
		$host = 'localhost';
		$usuario = 'root';
		$password = "";
		$conexion = null;
		
		try{
			$conexion = new PDO("mysql:host=$host;dbname=elgusanito",$usuario,$password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			$_SESSION["exception"] = $e;
			header("Location: error.php");
		}
		return $conexion;		
    }
	
	function desconectarBD($conexion){
		
		$conexion = null;
		
	}
    
?>