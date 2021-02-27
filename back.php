<?php
require_once("conexion.php");
require_once("librerias2/TCPDF/tcpdf.php");



class Usuarios extends Conexion{


    public function __construct(){
             
    }
 

    function eliminar(){
        if(isset($_GET["eliminar"])){
            if(isset($_SESSION["admin"])){
                $sql= "DELETE FROM info_usuarios WHERE id_info = $_GET[id_info]";
                $resultado = Conexion::__construct()->prepare($sql);
                $resultado -> execute();
                
            }
            else{
                echo "No eres ADMIN, no puedes eliminar ningún usuario";
            }
        }

    }

    function editar(){
        $this->cargar_modal();
            
    }
//echo "<td id='oculto'>$array[id_info]</td>";
// <input type='text' class='oculto' value='$array[id_info]'>
    function cargar_tabla(){
        $sql="SELECT id_info, nombre, apellidos, edad, correo, direccion FROM info_usuarios";
        $resultado = Conexion::__construct()->prepare($sql);
        $resultado->execute();
        $x=1;
            if(isset($_SESSION["admin"])){
                while($array=$resultado->fetch(PDO::FETCH_ASSOC)){
                    
                    echo 
                        "<tr>
                            <td>$array[nombre]</td>
                            <td>$array[apellidos]</td>
                            <td>$array[edad]</td>
                            <td>$array[correo]</td>
                            <td>$array[direccion]</td>
                            <td class='oculto'>$array[id_info]</td>
                            <td><a href='$_SERVER[PHP_SELF]?nom=$array[nombre]&ape=$array[apellidos]&age=$array[edad]&corr=$array[correo]&direc=$array[direccion]' class='btn btn-info'>Ver</a>
                                <button class='editar btn btn-primary datos_modal_$x' data-bs-toggle='modal' data-bs-target='#exampleModal'>Editar</button>
                                <a href='$_SERVER[PHP_SELF]?eliminar=eliminar&id_info=$array[id_info]'><button class='btn btn-danger'>Eliminar</button></a> 
                            </td>
                            
                        </tr>     
                        ";
                    $x++;   
                } 
            }
            else{
                while($array=$resultado->fetch(PDO::FETCH_ASSOC)){
                    echo
                        "<tr>
                            <td>$array[nombre]</td>
                            <td>$array[apellidos]</td>
                            <td>$array[edad]</td>
                            <td>$array[correo]</td>
                            <td>$array[direccion]</td>
                            <td><a href='$_SERVER[PHP_SELF]?nom=$array[nombre]&ape=$array[apellidos]&age=$array[edad]&corr=$array[correo]&direc=$array[direccion]'><button class='btn btn-info'>Ver</button></a>
                                <a ><button disabled class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Editar</button></a>
                                <a ><button disabled class='btn btn-danger'>Eliminar</button></a> 
                            </td>
                            
                        </tr>       
                    ";
                }
            }
    }

    public function coger_datos(){
        $sql= "SELECT nombre, apellidos, edad, correo, direccion FROM info_usuarios";
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

            ob_end_clean();
            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output("Información_$_GET[nombre].pdf", 'I');

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

            ob_end_clean();
            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output("Información_$_GET[nombre].pdf", 'D');

        }
    }


    public function cargar_modal(){
        
                    // Modal
            echo" 
                <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar Usuarios</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    
                    <div class='p500 modal-body'>
                    <div id='hola1' ></div>
                        <h3>Nombre</h3><input type='text' class='datos' id='nombre'>
                        <h3>Apellidos</h3><input type='text' class='datos' id='apellidos'>
                        <h3>Edad</h3><input type='text' class='datos' id='edad'>
                        <h3>Correo</h3><input type='text' class='datos' id='correo'>
                        <h3>Dirección</h3><input type='text' class='datos' id='direccion'>
                                          <input type='hidden' class='datos' id='id_us'>
                           
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                        <button type='button' class='cambios btn btn-primary'>Guardar Cambios</button>
                    </div>
                    </div>
            ";
        
    }


}

?>

