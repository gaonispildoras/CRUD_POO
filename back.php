<?php

class Usuarios{

    //Atributos
    public $conexion="";


    //Métodos

    function __construct(){
        $host="localhost";
        $db="crud";
        $user="root";
        $pass="";
        
        $conexion=mysqli_connect($host,$user,$pass,$db);
       if($conexion==true){
           echo "hecho";
       } 
       else {
            echo "no hecho";
       }
       
       $this->conexion=$conexion;                  
    }
 

    function registrar($dni, $nombre, $apellido, $fecha){
       if($this->vacio()==true){
           $sql="INSERT INTO usuarios (dni, nombre, apellido, fecha_nacimiento) VALUES ('$dni', '$nombre', '$apellido', '$fecha')";
           echo "<h1>$sql</h1>";
           $registro=mysqli_query($this->conexion, $sql);
           
                if($registro){
                    echo "WE DID IT!!";
                }
                else{
                    echo "NOPE";
                    
                }
       }else {
           echo "Debes rellenar todos los campos";
       }

    }

    function eliminar(){

    }

    function editar(){


    }


    function vacio(){
        if ($this->dni="" || $this->nombre="" || $this->apellido="" || $this->fecha=""){

            return $vacio=false;
            

        }
        else{
            
            return $vacio=true;
        }
    }


}
?>