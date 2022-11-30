<?php
//funcion para agregar productos


function agregarproductos();
{
  $conexion = conectarBaseDatos();
  //Verificando la conexion
            if(!$conexion){
                echo "Error de conexion con la base de datos";
                exit();

            }else{


$claveproducto = $_POST["claveproducto"];
$nombreproducto = $_POST["nombreproducto"];
$descripcionproducto = $_POST["descripcionproducto"];
$precioproducto = $_POST["precioproducto"];

//insertar valores  en la tabla productos
$consulta = "INSERT INTO productos (claveproducto,nombreproducto,descripcionproducto,precioproducto) VALUES ('$claveproducto','$nombreproducto','$descripcionproducto','$precioproducto')"

$datoInsertado = mysqli_query($conexion, $consulta);
                //Imprimiendo aviso
                if($datoInsertado){
                    echo "<script>alert('Datos del producto guardados correctamente.')</script>";
                     
                    
                }else{
                    echo "Error al guardar datos del producto.";
                }
            }
    
}




function consultarproductos (){
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

//funcioni

function eliminarproducto ($eliminar){
  $conexion = conectarBaseDatos();
  if(!$conexion){
     echo "Error de conexion en la base de datos";
     exit();
  }else{
    
     $consulta = "DELETE FROM productos WHERE claveproducto= '$eliminar'";
     $eliminado = mysqli_query($conexion, $consulta);

     if($eliminado){
         return true;
     }else
        {
         return false;
         }
    
  }
}


?>  
