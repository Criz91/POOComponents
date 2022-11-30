
<?php

  include "./libreria.php";
//checar que la variable post este creada de lo contrario te regresa al regs
  if(isset($_POST)){
    //realiza el registro y te redirecciona al menu
    registrarse();
    echo "<script>
confirm('Registro completado');
</script>";
    echo file_get_contents("index.html");

    
    guardado(  isset($_POST)   );

    
    
  }else{
    //Te regresa al menu de registro 
     echo "<script>
alert('Reintentar registro');
</script>";
    echo file_get_contents("index.html");
  }

/*

  function faseRegistro($opcion){
    if($opcion==1){
      //Registro
    }else{
      //InicioSesion
    
    }
  }

if(isset($_POST["botonRegistroInicio"])) {
   if($_POST["botonRegistroInicio"]=="registrar"){
      faseRegistro(1);
    }else{
      faseRegistro(2);
    }
}

if(isset($_POST["usuario"])) {
    if($_POST["tipoFormulario"]=="registro"){
      registrarse();
    }else{
      $resultadoIniciarSesion = iniciarSesion();
      if($resultadoIniciarSesion =="admin"){
        echo "<script>window.location.href = 'menuAdmin.php';</script>";
      
      }else if($resultadoIniciarSesion == "noEncontrado"){

        echo "<script>alert('Usuario no encontrado');</script>";
         
         
      }else{
          $datoContraseña=$_POST['password'];
          $datoUsuario = $_POST['usuario'];
          $datoCorreo = $resultadoIniciarSesion;
          
          /*echo "<script>
                var usuarioS = '".$datoUsuario."';
                var correoS = '".$datoCorreo."';
                console.log(usuarioS + '    '+correoS );
                sessionStorage.setItem('usuarioSesion',usuarioS);
                sessionStorage.setItem('correoSesion',correoS);
       

                window.location.href = './menuUser.html';
              </script>";*/
             /*
              $_SESSION["usuarioSesion"] = $datoUsuario;
              $_SESSION["correoSesion"] = $datoCorreo;
             $_SESSION["contraseñaSesion"]=$datoContraseña;
              echo "<script>    
                window.location.href = './menuUser.php ';
              </script>";

      }
    }
   }*/
  
?>
