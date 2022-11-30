<?php

  include "./libreria.php";

if(isset($_POST["usuario"])) {

      $resultadoIniciarSesion = iniciarSesion();
      if($resultadoIniciarSesion =="admin"){
        echo "<script>window.location.href = 'menuAdmin.php';</script>";
      
      }else if($resultadoIniciarSesion == "noEncontrado"){

        echo "<script>alert('Usuario no encontrado');</script>";
         
         
      }else{
          $datoContraseña=$_POST['password'];
         $datoCorreo = $_POST['correo'];
          $datoUsuario = $resultadoIniciarSesion;
          
          echo "<script>
                var usuarioS = '".$datoUsuario."';
                var correoS = '".$datoCorreo."';
                console.log(usuarioS + '    '+correoS );
                sessionStorage.setItem('usuarioSesion',usuarioS);
                sessionStorage.setItem('correoSesion',correoS);
       

                window.location.href = './principal.html';
              </script>";
             
              $_SESSION["usuarioSesion"] = $datoUsuario;
              $_SESSION["correoSesion"] = $datoCorreo;
             $_SESSION["contraseñaSesion"]=$datoContraseña;
              echo "<script>    
                window.location.href = './menuUser.php ';
              </script>";

      }
    
   }
  

  
?>
