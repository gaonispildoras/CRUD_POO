<?php

class Conexion{

    public function __construct(){
        $host="localhost";
        $db="crud";
        $user="root";
        $pass="";
        
        try{
            $base = new PDO ("mysql:host=$host;dbname=$db",$user, $pass);
            return $base;
        }
        catch(exception $e){
            echo "No ha sido posible la conexión: ".$e->getMessage();        
        }
            
    }

    public function crear($usuario,$pass,$correo){
        $sql="INSERT INTO usuarios (usuario , contraseña, correo) VALUES (:usuario , :pass, :correo)";
        $resultado = $this->__construct()->prepare($sql);
        $resultado->execute(array(":usuario"=>$usuario,":pass"=>$pass,":correo"=>$correo));
     
    }
    
}

?>