<?php
require_once("../prueba.php");

$nombre = preg_replace("/\_/", " ", $_GET["nom"]);
$apellidos = preg_replace("/\_/", " ", $_GET["ape"]);
$edad = preg_replace("/\_/", " ", $_GET["edad"]);
$direcc = preg_replace("/\_/", " ", $_GET["dire"]);
$correo = preg_replace("/\_/", " ", $_GET["corr"]);

$sql = "INSERT INTO info_usuarios (nombre, apellidos, edad, correo, direccion) VALUES ('$nombre','$apellidos','$edad','$correo','$direcc')";

$query = $base->query($sql);

?>