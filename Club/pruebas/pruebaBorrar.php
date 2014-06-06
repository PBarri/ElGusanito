<?php

  $host="localhost";
  $usuario="root";
  $password="";
  $DNI="prueba";
  $conexion=null;
  try{
    $conexion=new PDO("mysql:host=$host;dbname=elgusanito;charset=UTF-8",$usuario,$password);
      
      /* Indicar que queremos que lance excepciones en lugar de errores */
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conexion->query('SET NAMES utf8'); 
      
      $fecha=new DateTime();
      $sfecha=$fecha->format("y-m-d g:i:s");
	  $borra = $conexion->prepare('DELETE FROM Socios WHERE DNI=:dni');
	  $borra->bindParam(':dni',$DNI);
	  $borra->execute();
      
      
    $conexion = null;  
  }catch(PDOException $e){
    echo "<h1>Excepcion capturada!</h1>";
  }
  
?>
