<?php
require_once("../gestionBD/gestionBD.php");
require_once("../gestionBD/gestionSocios.php");
session_start();
$conexion = conectarBD();
$login = $_SESSION["login"];
$pass = getPassword($login["usuario"], $conexion);

echo "Holaaaa";
echo $login["usuario"];
echo "<br>";

echo $pass[0];

?>