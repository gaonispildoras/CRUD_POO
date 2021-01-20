<?php

class Usuarios{

    //Atributos
    public $conexion="";


    //Métodos

    public function __construct(){
        $host="localhost";
        $db="crud";
        $user="root";
        $pass="";
        
        $conexion=mysqli_connect($host,$user,$pass,$db);
        $this->conexion=$conexion;                  
    }
 

    function registro(){

    }

    function eliminar(){

    }

    function editar(){


    }


    function vacio_login(){
        if ($usuario=""){

            return true;
            
            

        }
        else{
            
            return false;
        }
    }

    function registro_login($usuario, $contraseña, $contraseña2, $correo, $admin){
        if($this->vacio_login()==false){

            if($admin=="normal"){
                if ($contraseña==$contraseña2){
                    $sql="INSERT INTO usuarios (usuario, contraseña, correo) VALUES ('$usuario', '$contraseña', '$correo')";
                    mysqli_query($this->conexion, $sql);
                    echo "Usuario registrado con éxito";
                }
                else{
                    echo "Las contraseñas no coinciden";
                }
                
            }
            else{
                if ($contraseña==$contraseña2){
                    $sql="INSERT INTO admin (usuario, contraseña, correo) VALUES ('$usuario', '$contraseña', '$correo')";
                    mysqli_query($this->conexion, $sql);
                    echo "Usuario registrado con éxito";
                }
                else{
                    echo "Las contraseñas no coinciden";
                }

            }

        }
        else{
            echo "debes rellenar todos los campos";
        }

    }


}
?>