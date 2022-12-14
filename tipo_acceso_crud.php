<?php

    include_once("./include/conexion.php");

    if (isset($_GET['accion'])) {
        $opcion = $_GET['accion'];
    }else {
        $_SESSION['mensajeTexto'] = "Error identificando la opción";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./tipo_acceso_mant.php");
    }

    switch ($opcion) {
        // Para insertar
        case 'INS':
            if(isset($_POST['guardar'])) {
                $nivel = $_POST['nivel'];
                $descripcion = $_POST['descripcion'];

                $query = "
                INSERT INTO `tipo_acceso`
                (`Nivel`, 
                `Descripcion`, 
                `Estado_tipo_acceso`) 
                VALUES (
                '$nivel',
                '$descripcion',
                'A')
                ";


                $resultado = mysqli_query($link, $query);

                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";

                    header("Location: ./tipo_acceso_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./tipo_acceso_mant.php");

                }

            }
            break;
            case 'DLT':
                $id = $_GET['id'];
                       
                $query = "UPDATE `tipo_acceso` SET             
                `Estado_tipo_acceso`='I'
                WHERE `Id_tipo_acceso` = '$id'"; 
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./tipo_acceso_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./tipo_acceso_mant.php");
    
                }
                break;
            // Para actualizar
            case 'UDT':
                $id = $_POST['id'];
                $nivel = $_POST['nivel'];
                $descripcion = $_POST['descripcion'];
                $estado_tipo_acceso = $_POST['estado'];
    
                $query = "UPDATE `tipo_acceso` SET 
                `Nivel`='$nivel',
                `Descripcion` = '$descripcion',
                `Estado_tipo_acceso`='$estado_tipo_acceso'
                WHERE `Id_tipo_acceso` = '$id'";        
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./tipo_acceso_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./tipo_acceso_mant.php");
    
                }
            break;
    
            default:
                # Este punto falto en la clase
                $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
                $_SESSION['mensaje_tipo'] = "alert-danger";
    
                header("Location: ./tipo_acceso_mant.php");
                break;
        }
    
    ?>
    