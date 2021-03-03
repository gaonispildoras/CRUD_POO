<?php
require_once("conexion.php");

class Login_registro extends Conexion{

   

   public function __construct(){

   }

   public function registrar($usuario,$pass,$pass2,$correo,$admin){
     // if($this->vacio_login()==false){

         if($admin=="normal"){
            if ($pass==$pass2){
               $sql="INSERT INTO usuarios (usuario , pass, correo) VALUES (:usuario , :pass, :correo)";
               $resultado = Conexion::__construct()->prepare($sql);
               $resultado->execute(array(":usuario"=>$usuario,":pass"=>$this->encriptar_pass($pass),":correo"=>$correo));
               
            }
            else{
               echo "Las contraseñas no coinciden";
            }
            
         }
         else{
            if ($pass==$pass2){
               $sql="INSERT INTO admin2 (usuario , pass, correo) VALUES (:usuario , :pass, :correo)";
               $resultado = Conexion::__construct()->prepare($sql);
               $resultado->execute(array(":usuario"=>$usuario,":pass"=>$this->encriptar_pass($pass),":correo"=>$correo));
            }
            else{
               echo "Las contraseñas no coinciden";
            }

         }

     /* }
      else{
            echo "debes rellenar todos los campos";
      }*/
   }
   public function login($usuario, $pass){
      $sql="SELECT * FROM usuarios WHERE usuario=:usuario";
      $sql2="SELECT * FROM admin2 WHERE usuario=:usuario AND pass=:pass";

      $resultado = Conexion::__construct()->prepare($sql);
      $resultado->execute(array(":usuario"=>$usuario));
      $select=$resultado->fetch(PDO::FETCH_ASSOC);

      $resultado2 = Conexion::__construct()->prepare($sql2);
      $resultado2->execute(array(":usuario"=>$usuario, ":pass"=>$pass));

         if (password_verify($pass, $select["pass"])){
            header("Location: index.php");
            
         }
         elseif($resultado2->rowCount()==1){
            header("Location: index.php");
            $this->session();
            $_SESSION["admin"]=true;
         }
         else{
            echo "El nombre de usuario o la contraseña no coinciden";
            echo "<br>";
            print_r($select);
            echo "<br>";
            echo $select["pass"];
            echo "<br>";
            echo $pass;
            echo "<br>";
            
          }


   }

   public function encriptar_pass($pass){
         $hash = password_hash($pass, PASSWORD_DEFAULT);
         return $hash;
   }
   
   public function comparar_hash($pass1, $pass2){
         if(password_verify($pass1, $pass2)){
            return true;
         }
         else{
            echo "no";
         }
   }

   public function get_login($usuario, $pass){
      
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