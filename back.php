<?php
require_once("conexion.php");
require_once("librerias/TCPDF/tcpdf.php");



class Usuarios extends Conexion{




    public function __construct(){
             
    }
 

    function eliminar(){


    }

    function editar(){


    }

    function cargar_tabla(){
        $sql="SELECT nombre, apellidos, edad, correo, direccion FROM info_usuarios";
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
                        <td><a href='$_SERVER[PHP_SELF]?nom=$array[nombre]&ape=$array[apellidos]&age=$array[edad]&corr=$array[correo]&direc=$array[direccion]'><p>Ver</p></a><p>Editar</p><p>Eliminar</p></td>
                 </tr>       
                ";
            }
    }

    public function coger_datos(){
        if(isset($_GET["nom"])){
            $array1[]=$_GET["nom"];
            $array1[]=$_GET["ape"];
            
        }

        return $array1;
        echo $array1[0];

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
                <a href='$_SERVER[PHP_SELF]?ver_pdf=prueba'>Ver en PDF</a>
                <a href='$_SERVER[PHP_SELF]?desc_pdf=prueba'>Descargar PDF</a>
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
            $html = '
            <h1>Nombre: holaaa $prueba </h1>
            <h1>Apellidos: </h1>
            <h1>Edad: </h1>
            <h1>Correo Electrónico: </h1>
            <h1>Dirección: </h1> 
            ';


            // Print text using writeHTMLCell()
            $pdf->writeHTML($html);


            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output('example_001.pdf', 'I');

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
            <h1>Nombre:   </h1>
            <h1>Apellidos: </h1>
            <h1>Edad: </h1>
            <h1>Correo Electrónico: </h1>
            <h1>Dirección: </h1> 
            EOD;


            // Print text using writeHTMLCell()
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output('example_001.pdf', 'I');

        }
    }

}

?>