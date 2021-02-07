<?php
//INCLUDE
include("login_registro.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Crud POO</title>
</head>
<body>
<script>
$(function(){
    $("#registro").hide();
    var oculto=false;
        $("#relog").click(function(){
            if(oculto==false){
                $("#registro").show();
                $("#login").hide();
                oculto=true;
            }
            else{
                $("#registro").hide();
                $("#login").show();
                oculto=false;
            }
        });
});
</script>

    <div id="relog"><h2><span>Login</span> | <span>Registro</span></h2> </div>

        <form action="" method="post" id="login" class="form">
            <div><span>Usuario: </span><input type="text" name="usuario_l"></div>
            <div><span>Contraseña: </span> <input type="password" name="contraseña_l"></div>
            <button type="submit" class="btn btn-primary" name="enviar_l">Enviar</button>
        </form>

        <form action="" method="post" id="registro">
            <div><span>Usuario: </span><input type="text" name="usuario_r"></div>
            <div><span>Contraseña: </span> <input type="password" name="contraseña_r"></div>
            <div><span>Confirmar Contraseña: </span> <input type="password" name="contraseña_r2"></div>
            <div><span>Correo Electrónico: </span><input type="text" name="correo"></div>
            <div><span>Elige el tipo de cuenta: </span><select name="admin[]" id=""><option value="admin" >Admin</option><option value="normal" >Normal</option></select></div>
            <button type="submit" class="btn btn-primary" name="enviar_r">Enviar</button>
        </form>
</body>
</html>

<?php

if(isset($_POST["enviar_r"])){
    $admin=$_POST["admin"];

    $persona = new Login_registro;
    $persona->vacio_login();
    $persona->registrar("$_POST[usuario_r]", "$_POST[contraseña_r]","$_POST[contraseña_r2]","$_POST[correo]", "$admin[0]");
    
}

elseif(isset($_POST["enviar_l"])){
    $persona = new Login_registro;
    $persona->vacio_login();
    $persona->login("$_POST[usuario_l]", "$_POST[contraseña_l]");

}

?>
