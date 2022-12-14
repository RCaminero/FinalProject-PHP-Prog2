<?php
    include_once("./include/conexion.php");
    $arreglo=$_SESSION['carrito'];
   
    


    if (isset($_GET['b'])) {
        $opcion = $_GET['b'];
    }else {
        echo "ERROR EN ACCION";

        header("Location: ./shop-cart.php");
    }


    switch ($opcion) {
            // Para cancelar pedido
        case 'D':
        
            foreach($arreglo as $key => $value){
                $imagen_ref = $value['Imagen_ref'];
                unlink($imagen_ref);
            }
            header("Location: ./shop-cart.php");
            
               
            
        break;
    }
    


          // case 'DLT':
            //     header("Location: ./shop-cart.php");
    //             $id = $_GET['id'];
                       
    //             $query = "UPDATE `categoria_articulo` SET             
    //             `Estado_categoria_articulo`='I'
    //             WHERE `Id_categoria_articulo` = '$id'"; 
    
    //             $resultado = mysqli_query($link, $query);
    
    //             if (!$resultado) {
    //                 // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
    //                 $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
    //                 $_SESSION['mensajeTipo'] = "alert-danger";
    
    //                 header("Location: ./cat_articulo_mant.php");
    //             } else{
    //                 // echo("Alerta 0001: Registro Insertado en la Base de Datos");
    //                 $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
    //                 $_SESSION['mensajeTipo'] = "alert-success";
                    
    //                 header("Location: ./cat_articulo_mant.php");
    
    //             }
    //             break;
    //         // Para actualizar
    //         case 'UDT':
    //             $id = $_POST['id'];
    //             $nombre = $_POST['nombre'];
    //             $descripcion = $_POST['descripcion'];
    //             $estado = $_POST['estado'];
    
    //             $query = "UPDATE `categoria_articulo` SET 
    //             `Nombre`='$nombre',
    //             `Descripcion` = '$descripcion',
    //             `Estado_categoria_articulo`='$estado'
    //             WHERE `Id_categoria_articulo` = '$id'";        
    
    //             $resultado = mysqli_query($link, $query);
    
    //             if (!$resultado) {
    //                 // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
    //                 $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
    //                 $_SESSION['mensajeTipo'] = "alert-danger";
    
    //                 header("Location: ./cat_articulo_mant.php");
    //             } else{
    //                 // echo("Alerta 0001: Registro Insertado en la Base de Datos");
    //                 $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
    //                 $_SESSION['mensajeTipo'] = "alert-success";
                    
    //                 header("Location: ./cat_articulo_mant.php");
    
    //             }
    //         break;
    
    //         default:
    //             # Este punto falto en la clase
    //             $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
    //             $_SESSION['mensaje_tipo'] = "alert-danger";
    
    //             header("Location: ./cat_articulo_mant.php");
    //             break;
        
    
    ?>
    