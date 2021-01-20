<?php

class Conexion{

    public function __construct(){
        $host="localhost";
        $db="crud";
        $user="root";
        $pass="";
        
        $conexion=mysqli_connect($host,$user,$pass,$db);
       if($conexion==true){
           return $conexion;
       } 
       else {
            echo "no hecho";
       }
       
 
    }
    
}

?>