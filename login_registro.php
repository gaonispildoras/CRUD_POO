<?php
require_once("conexion.php");

class Login_registro extends Conexion{

   

   public function __construct(){

   }

   public function registrar($usuario,$pass,$pass2,$correo,$admin){
      if($this->vacio_login()==false){

         if($admin=="normal"){
            if ($pass==$pass2){
               $sql="INSERT INTO usuarios (usuario , contraseña, correo) VALUES (:usuario , :pass, :correo)";
               $resultado = Conexion::__construct()->prepare($sql);
               $resultado->execute(array(":usuario"=>$usuario,":pass"=>$pass,":correo"=>$correo));
               
            }
            else{
               echo "Las contraseñas no coinciden";
            }
            
         }
         else{
            if ($pass==$pass2){
               $sql="INSERT INTO admin2 (usuario , contraseña, correo) VALUES (:usuario , :pass, :correo)";
               $resultado = Conexion::__construct()->prepare($sql);
               $resultado->execute(array(":usuario"=>$usuario,":pass"=>$pass,":correo"=>$correo));
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
   public function login($usuario, $pass){
      $sql="SELECT * FROM usuarios WHERE usuario=:usuario AND contraseña=:pass";
      $sql2="SELECT * FROM admin2 WHERE usuario=:usuario AND contraseña=:pass";

      $resultado = Conexion::__construct()->prepare($sql);
      $resultado->execute(array(":usuario"=>$usuario, ":pass"=>$pass));

      $resultado2 = Conexion::__construct()->prepare($sql2);
      $resultado2->execute(array(":usuario"=>$usuario, ":pass"=>$pass));

         if ($resultado->rowCount()==1){
            header("Location: index.php");
            
         }
         elseif($resultado2->rowCount()==1){
            header("Location: index.php");
            $this->session();
            $_SESSION["admin"]=true;
         }
         else{
            echo "El nombre de usuario o la contraseña no coinciden";
         }


   }

   public function vacio_login(){
      if ($usuario=""){ 

         return true;
      }
      else{    

         return false;
      }
   } 
   
   public function session(){
         return session_start();
      
   }

   public function exit_session(){
         return session_destroy();
   }

   public function logout(){
      if(isset($_POST["salir"])){
         $this->exit_session();
         header("Location: login.php");
     }
     
   }

}

?>