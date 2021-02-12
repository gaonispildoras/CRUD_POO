<?php
require_once("conexion.php");
require_once("librerias/TCPDF/tcpdf.php");



class Usuarios extends Conexion{


    public function __construct(){
             
    }
 

    function eliminar(){
        if(isset($_GET["eliminar"])){
            if(isset($_SESSION["admin"])){
                $sql="DELETE FROM info_usuarios WHERE id_info = $_GET[id_info]";
                $resultado = Conexion::__construct()->prepare($sql);
                $resultado -> execute();
                
            }
            else{
                echo "No eres ADMIN, no puedes eliminar ningún usuario";
            }
        }

    }

    function editar(){
        if(isset($_GET["editar"])){
            if(isset($_SESSION["admin"])){
                
            }
            else{
                
                
                echo "No eres ADMIN, no puedes editar ningún usuario";

            }
        }
    }

    function cargar_tabla(){
        $sql="SELECT id_info, nombre, apellidos, edad, correo, direccion ROM info_usuarios";
        $resultado = Conexion::__construct()->prepare($sql);
        $resultado->execute();
            while($array=$resultado->fetch(PDO::FETCH_ASSOC)){
                echo 
                "<tr>
                        <td>$array[nombre]</td>
                        <td>$array[apellidos]</td>
                        <td>$array[edad]</td>
                        <td>$array[correo]</td>
                        <td>$array[direccion]</td>
                        <td><a href='$_SERVER[PHP_SELF]?nom=$array[nombre]&ape=$array[apellidos]&age=$array[edad]&corr=$array[correo]&direc=$array[direccion]'><button class='btn btn-info'>Ver</button></a>
                            <a href='$_SERVER[PHP_SELF]?nom=$array[nombre]&ape=$array[apellidos]&age=$array[edad]&corr=$array[correo]&direc=$array[direccion]&editar=editar' class='editar'><button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Editar</button></a>
                            <a href='$_SERVER[PHP_SELF]?eliminar=eliminar&id_info=$array[id_info]'><button class='btn btn-danger'>Eliminar</button></a>

                        </td>
                 </tr>       
                ";
            }
    }

    public function coger_datos(){
        $sql="SELECT nombre, apellidos, edad, correo, direccion FROM info_usuarios";
        $resultado = Conexion::__construct()->prepare($sql);
        $resultado->execute();

    }

     public function cargar_ver(){
        if(isset($_GET["nom"])){
            $nombre=$_GET["nom"];
            $apellido=$_GET["ape"];
            $edad=$_GET["age"];
            $correo=$_GET["corr"];
            $direccion=$_GET["direc"];
            echo "
                <h1>Nombre: $nombre</h1>
                <h1>Apellidos: $apellido</h1>
                <h1>Edad: $edad</h1>
                <h1>Correo Electrónico: $correo</h1>
                <h1>Dirección: $direccion</h1> 
                <a href='$_SERVER[PHP_SELF]?ver_pdf=prueba&nombre=$nombre&apellido=$apellido&edad=$edad&correo=$correo&direccion=$direccion'>Ver en PDF</a>
                <a href='$_SERVER[PHP_SELF]?desc_pdf=prueba&nombre=$nombre&apellido=$apellido&edad=$edad&correo=$correo&direccion=$direccion'>Descargar PDF</a>
            ";
        }
    }

    public function ver_pdf(){
        if(isset($_GET["ver_pdf"])){

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // Add a page
            // This method has several options, check the source code documentation for more information.
            $pdf->AddPage();

            
            
            // Set some content to print
            $html = " 
            <h1>Nombre: $_GET[nombre] </h1>
            <h1>Apellidos: $_GET[apellido] </h1>
            <h1>Edad: $_GET[edad] </h1>
            <h1>Correo Electrónico: $_GET[correo] </h1>
            <h1>Dirección: $_GET[direccion] </h1> 
            ";


            // Print text using writeHTMLCell()
            $pdf->writeHTML($html);


            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output("Informacion_$_GET[nombre].pdf", 'I');

        }
    }

    public function descargar_pdf(){
        if(isset($_GET["desc_pdf"])){

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // Add a page
            // This method has several options, check the source code documentation for more information.
            $pdf->AddPage();

            
            // Set some content to print
            $html = <<<EOD
            <h1>Nombre:  $_GET[nombre] </h1>
            <h1>Apellidos: $_GET[apellido]</h1>
            <h1>Edad: $_GET[edad]</h1>
            <h1>Correo Electrónico: $_GET[correo]</h1>
            <h1>Dirección: $_GET[direccion]</h1> 
            EOD;


            // Print text using writeHTMLCell()
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output("Informacion_$_GET[nombre].pdf", 'D');

        }
    }


}

?>
