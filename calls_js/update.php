<?php 
require_once("../prueba.php");

$sql = "UPDATE info_usuarios SET nombre = '$_GET[nom]', apellidos = '$_GET[ape]', edad = '$_GET[edad]', direccion = '$_GET[dire]', correo = '$_GET[corr]'  WHERE id_info = '$_GET[oculto]'";

$conexion = $base->query($sql);

?>

