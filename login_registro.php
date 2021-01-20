<?php
include("conexion.php");

class Login_registro{

    public $con;


 public function __construct($dni,$nombre,$apellido){
    $this->con = new Conexion;
    $sql="INSERT INTO crud (dni , nombre) VALUES ('$dni', '$nombre', '$apellido')";
    mysqli_query($this->con, $sql);

 }

 public function crear(){



 }




}
$hola = new Login_registro(3555, "hola", "buenas");



?>