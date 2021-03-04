<?php 
require_once("../prueba.php");

$nombre = preg_replace("/\_/", " ", $_GET["nom"]);
$apellidos = preg_replace("/\_/", " ", $_GET["ape"]);
$edad = preg_replace("/\_/", " ", $_GET["edad"]);
$direcc = preg_replace("/\_/", " ", $_GET["dire"]);
$correo = preg_replace("/\_/", " ", $_GET["corr"]);

$sql = "UPDATE info_usuarios SET nombre = '$nombre', apellidos = '$apellidos', edad = '$edad', direccion = '$direcc', correo = '$correo'  WHERE id_info = '$_GET[oculto]'";


$query = $base->query($sql);

?>

