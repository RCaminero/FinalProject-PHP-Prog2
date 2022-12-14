<?php

    include_once("./include/conexion.php");

    if (isset($_GET['accion'])) {
        $opcion = $_GET['accion'];
    }else {
        $_SESSION['mensajeTexto'] = "Error identificando la opción";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./cat_articulo_mant.php");
    }

    switch ($opcion) {
        // Para insertar
        case 'INS':
            if(isset($_POST['guardar'])) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];

                $query = "
                INSERT INTO `categoria_articulo`
                (`Nombre`, 
                `Descripcion`, 
                `Estado_categoria_articulo`) 
                VALUES (
                '$nombre',
                '$descripcion',
                'A')
                ";


                $resultado = mysqli_query($link, $query);

                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";

                    header("Location: ./cat_articulo_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./cat_articulo_mant.php");

                }

            }
            break;
            case 'DLT':
                $id = $_GET['id'];
                $resultadoT = $link->query("SELECT * FROM `articulo` WHERE Categoria_articulo_id_categoria_articulo = '$id';");
                if(mysqli_num_rows($resultadoT) > 0){
                        $_SESSION['mensajeTexto'] = "Esta categoria está asignada a un articulo de un pedido activo, no se puede eliminar.";
                        $_SESSION['mensajeTipo'] = "alert-danger";
        
                        header("Location: ./cat_articulo_mant.php");
                    } else {       
                $query = "UPDATE `categoria_articulo` SET             
                `Estado_categoria_articulo`='I'
                WHERE `Id_categoria_articulo` = '$id'"; 
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./cat_articulo_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./cat_articulo_mant.php");
    
                }}
                break;
            // Para actualizar
            case 'UDT':
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $estado = $_POST['estado'];
    
                $query = "UPDATE `categoria_articulo` SET 
                `Nombre`='$nombre',
                `Descripcion` = '$descripcion',
                `Estado_categoria_articulo`='$estado'
                WHERE `Id_categoria_articulo` = '$id'";        
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./cat_articulo_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./cat_articulo_mant.php");
    
                }
            break;
    
            default:
                # Este punto falto en la clase
                $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
                $_SESSION['mensaje_tipo'] = "alert-danger";
    
                header("Location: ./cat_articulo_mant.php");
                break;
        }
    
    ?>
    