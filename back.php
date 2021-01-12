<?php

class Usuarios{

    //Atributos
    public $dni="";
    public $nombre="";
    public $apellido="";
    public $fecha="";
    

    //Métodos

    function __construct($dni, $nombre, $apellido, $fecha){
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->fecha=$fecha;  
                  
    }

    function registrar(){
       if($this->vacio()==true){
           $sql="INSERT INTO usuarios (dni, nombre, apellido, fecha_nacimiento) VALUES ('$this->dni', '$this->nombre', '$this->apellido', '$this->fecha')";
           $registro=mysqli_query($this->conexion(), $sql);
           
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

    function conexion(){
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
       return $conexion;
       
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