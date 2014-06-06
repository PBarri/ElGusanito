<?php
  
  $host="localhost";
  $usuario="root";
  $password="";
  $conexion=null;
  try{
    $conexion=new PDO("mysql:host=$host;dbname=elgusanito;charset=UTF-8",$usuario,$password);
      
      /* Indicar que queremos que lance excepciones en lugar de errores */
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conexion->query('SET NAMES utf8'); 
      
      $fecha=new DateTime();
      $sfecha=$fecha->format("y-m-d g:i:s");
	  $SQL = "INSERT INTO Socios(DNI,Nombre,Apellido1,Apellido2,Fecha_Nac,Email,Password) 
			VALUES ('prueba','prueba','prueba','prueba','$sfecha','prueba','prueba')";
      $filas=$conexion->exec($SQL);
      
      
    $conexion = null;  
  }catch(PDOException $e){
    echo "<h1>Excepcion capturada!</h1>";
  }
	
?>