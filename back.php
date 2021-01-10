<?php

class Usuarios{

    //Atributos
    public $dni;

    //Métodos

    function __construct($dni, $nombre, $apellido, $fecha){
            $dni=$_POST["dni"];
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $fecha=$_POST["fecha"];
    }

    function registrar(){


    }

    function eliminar(){

    }

    function editar(){



    }


}






?>