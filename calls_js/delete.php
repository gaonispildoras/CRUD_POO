<?php
require_once("../prueba.php");

$sql="DELETE FROM info_usuarios WHERE id_info = $_GET[eliminar]";
$sql2="SELECT * FROM info_usuarios";

$resultado = $base->query($sql);
?>