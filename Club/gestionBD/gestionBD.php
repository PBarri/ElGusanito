<?php
    
    function conectarBD(){
    	
		$host = 'mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/';
		$usuario = 'admin72MGlSc';
		$password = "QJpac8B71W_z";
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
