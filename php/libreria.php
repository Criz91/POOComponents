<?php
function conectarBaseDatos(){
    //Inicializacion de datos de la conexion con la base de datos
           $server = "localhost";
            $puertodb = "3306";
            $usuario = "root";
            $password = "";
            $basedatos = "tienda";
            
            

          //conexion de la base de datos

          $conexion = mysqli_connect($server, $usuario, $password, $basedatos);
    return $conexion;
}


function registrarse()
{
  
  $conexion = conectarBaseDatos();
  //Verificando la conexion
            if(!$conexion){
                echo "Error de conexion con la base de datos";
                exit();

            }else{
                $usuario = $_POST["usuario"];
                $nombre = $_POST["nombre"];
                $correo = $_POST["correo"];
                $contraseña = $_POST["password"];
                $tipoUsuario = $_POST["tipoUsuario"];
                //Insertando dato
                $consulta = "INSERT INTO usuarios (Usuario, Nombre, Correo, Contraseña, TipoUsuario) VALUES ('$usuario', '$nombre', '$correo', '$contraseña','$tipoUsuario')";
                
                $datoInsertado = mysqli_query($conexion, $consulta);
                //Imprimiendo aviso
                if($datoInsertado){
                    echo "<script>alert('Usuario registrado correctamente')</script>";
                     
                    
                }else{
                    echo "Error al registrar";
                }
            }
    
}










function iniciarSesion()
{
    $conexion = conectarBaseDatos();
    if(!$conexion){
                echo "Error de conexion con la base de datos";
                exit();

            }else{
                $correo = $_POST["correo"]; 
                $contraseña = $_POST["password"];
                //Insertando dato
                $consulta = "SELECT * FROM usuarios WHERE Correo = '$correo'";
                
                $usuarioBuscado = mysqli_query($conexion, $consulta);
                $usuarioExiste = mysqli_fetch_array($usuarioBuscado);
                //Imprimiendo aviso
                if(isset($usuarioExiste["Correo"])){
                  
                  if($usuarioExiste["Correo"] == $correo && $usuarioExiste["Contraseña"]==$contraseña && $usuarioExiste["TipoUsuario"]=="admin"){
                    return "admin";

                  }else if($usuarioExiste["Correo"] == $correo && $usuarioExiste["Contraseña"]==$contraseña && $usuarioExiste["TipoUsuario"]=="user"){
                    
                    return (string)$usuarioExiste["Usuario"];
                    
                  }else{
                      return "noEncontrado";
                  }
                }else{
                  return "noEncontrado";
                }
               
    
            }
   
}


function consultarDatos(){
    $conexion = conectarBaseDatos();
    if(!$conexion){
        echo "Error de conexion con la base de datos";
                exit();
        
    }else{
        $consulta = "SELECT * FROM productos";
        $datosBD = mysqli_query($conexion, $consulta);
        return $datosBD;
    }
    
}



function tomarRegistro($registro, $valorRegistro){
    $conexion = conectarBaseDatos();

   
    if(!$conexion){
       echo "Error de conexion en la base de datos";
     exit();
    }else{
      $consulta = "SELECT * FROM productos WHERE $registro = '$valorRegistro'";
      $registros = mysqli_query($conexion, $consulta);
      return $registros;
      
    }
}

function tomar($valor){
 $conexion = conectarBaseDatos();
 if(!$conexion){
      
    }else{
      $consulta = "SELECT * FROM productos WHERE Codigo = '$valor'";
      $registros = mysqli_query($conexion, $consulta);
      return $registros;
      
    }

  
}

function eliminarRegistro($eliminar){
  $conexion = conectarBaseDatos();
  if(!$conexion){
     echo "Error de conexion en la base de datos";
     exit();
  }else{
    
     $consulta = "DELETE FROM productos WHERE Codigo= '$eliminar'";
     $eliminado = mysqli_query($conexion, $consulta);

     if($eliminado){
         return true;
     }else
        {
         return false;
         }
    
  }
}

function modificarRegistro($codigoModificar,$producto,$precio,$ventas,$cant){
    $conexion = conectarBaseDatos();
  if(!$conexion){
     echo "Error de conexion en la base de datos";
     exit();
  }else{
   
     $consulta = "UPDATE productos SET NombreProducto = '$producto',Precio = '$precio', CantVentas = '$ventas', Cantidad = '$cant' WHERE Codigo= '$codigoModificar'";
     $modificado = mysqli_query($conexion, $consulta);

     if($modificado){
         return true;
     }else
        {
         return false;
         }
    
  }
}

function agregarRegistro($codigo,$nombreProduct,$precio,$cantVentas,$cantProduct){
    $conexion = conectarBaseDatos();
    if(!$conexion){
       echo "Error de conexion en la base de datos";
       exit();
    }else{
     
        $consulta = "INSERT INTO productos (Codigo,NombreProducto,Precio,CantVentas,Cantidad) VALUES ('$codigo','$nombreProduct','$precio','$cantVentas','$cantProduct')";
        $agregado = mysqli_query($conexion, $consulta);
  
       if($agregado){
           return true;
       }else
          {
           return false;
           }
      
    }
}
function agregarproducto($claveproducto,$nombreproducto,$descripcionproducto,$precioproducto)

var i

function guardado(  i  ){
  


}

?>
