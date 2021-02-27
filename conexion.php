<?php

class Conexion{

    public function __construct(){
        $host="localhost";
        $db="crud";
        $user="prueba1";
        $pass="usuario";
        
        try{
            $base = new PDO ("mysql:host=$host;dbname=$db",$user, $pass);
            return $base;
        }
        catch(exception $e){
            echo "No ha sido posible la conexión: ".$e->getMessage();        
        }       
    }  
}
?> 