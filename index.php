<?php

//INCLUDE
require_once("back.php");
require_once("login_registro.php");

// MÉTODOS
$persona1 = new Login_registro;
$persona2 = new Usuarios;
$persona2->ver_pdf();
$persona2->descargar_pdf();
$persona1->session();
$persona1->logout();
$persona2->eliminar();
$persona2->editar();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    
    
    <title>Crud POO</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="tabla col-sm-6 col-md-8 col-lg-8 ">
                <table class="table table-hover table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                    </tr>
                    <?php $persona2->cargar_tabla(); ?>
                </table>
            </div>

            <div class="vista col-sm-6 col-md-4 col-lg-4 ">
            <?php $persona2->cargar_ver(); ?>
            <?php ?>
                
            </div>
        </div>
    </div>
<!-- Modal -->
<?php if (isset($_SESSION["admin"])){?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
<?php } ?>  
</div>
    <form action="" method="post">
        <button class="btn btn-danger" type="submit" name="salir">Exit</button>
    </form>
</body>
</html>

