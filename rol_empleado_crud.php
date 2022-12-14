<?php

    include_once("./include/conexion.php");

    if (isset($_GET['accion'])) {
        $opcion = $_GET['accion'];
    }else {
        $_SESSION['mensajeTexto'] = "Error identificando la opción";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./rol_empleado_mant.php");
    }

    switch ($opcion) {
        // Para insertar
        case 'INS':
            if(isset($_POST['guardar'])) {
                $nombre = $_POST['Nombre'];
                $descripcion = $_POST['Descripcion'];

                $query = "
                INSERT INTO `rol_empleado`
                (`Nombre`, 
                `Descripcion`, 
                `Estado_rol`) 
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

                    header("Location: ./rol_empleado_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./rol_empleado_mant.php");

                }

            }
            break;
            case 'DLT':
                $id = $_GET['id'];
                $resultadoT = $link->query("SELECT * FROM `empleado` WHERE Id_rol_empleado = '$id';");
                if(mysqli_num_rows($resultadoT) > 0){
                        $_SESSION['mensajeTexto'] = "Este rol lo posee un empleado activo, no se puede eliminar.";
                        $_SESSION['mensajeTipo'] = "alert-danger";
        
                        header("Location: ./rol_empleado_mant.php");
                    } else {        
                $query = "UPDATE `rol_empleado` SET             
                `Estado_rol`='I'
                WHERE `Id_rol_empleado` = '$id'"; 
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./rol_empleado_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./rol_empleado_mant.php");
    
                }}
                break;
            // Para actualizar
            case 'UDT':
                $id = $_POST['id'];
                $nombre = $_POST['Nombre'];
                $descripcion = $_POST['Descripcion'];
                $estado=$_POST['Estado_rol'];
    
                $query = "UPDATE `rol_empleado` SET 
                `Nombre`='$nombre',
                `Descripcion` = '$descripcion',
                `Estado_rol`='$estado'
                WHERE `Id_rol_empleado` = '$id'";        
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./rol_empleado_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./rol_empleado_mant.php");
    
                }
            break;
    
            default:
                # Este punto falto en la clase
                $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
                $_SESSION['mensaje_tipo'] = "alert-danger";
    
                header("Location: ./rol_empleado_mant.php");
                break;
        }
    
    ?>
    