<?php

    include_once("./include/conexion.php");

    if (isset($_GET['accion'])) {
        $opcion = $_GET['accion'];
    }else {
        $_SESSION['mensajeTexto'] = "Error identificando la opción";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./proveedor_mant.php");
    }

    switch ($opcion) {
        // Para insertar
        case 'INS':
            if(isset($_POST['guardar'])) {
                $nombre = $_POST['Nombre'];
                $telefono=$_POST['Telefono'];
                $direccion=$_POST['Direccion'];
                $pag_web=$_POST['Pag_web'];
                $descripcion = $_POST['Descripcion'];

                $query = "
                INSERT INTO `proveedor`
                (`Nombre`, 
                `Telefono`,
                `Direccion`,
                `Pag_web`,
                `Descripcion`, 
                `Estado_proveedor`) 
                VALUES (
                '$nombre',
                '$telefono',
                '$direccion',
                '$pag_web',
                '$descripcion',
                'A')
                ";


                $resultado = mysqli_query($link, $query);

                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";

                    header("Location: ./proveedor_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./proveedor_mant.php");

                }

            }
            break;
            case 'DLT':
                $id = $_GET['id'];
                       
                $query = "UPDATE `proveedor` SET             
                `Estado_proveedor`='I'
                WHERE `id_proveedor` = '$id'"; 
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./proveedor_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./proveedor_mant.php");
    
                }
                break;
            // Para actualizar
            case 'UDT':
                $id = $_POST['id'];
                $nombre = $_POST['Nombre'];
                $telefono=$_POST['Telefono'];
                $direccion=$_POST['Direccion'];
                $pag_web=$_POST['Pag_web'];
                $descripcion = $_POST['Descripcion'];
                $estado=$_POST['Estado_proveedor'];
    
                $query = "UPDATE `proveedor` SET 
                `Nombre`='$nombre',
                `Telefono`='$telefono',
                `Direccion`='$direccion',
                `Pag_web`='$pag_web',
                `Descripcion` = '$descripcion',
                `Estado_proveedor`='$estado'
                WHERE `id_proveedor` = '$id'";        
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./proveedor_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./proveedor_mant.php");
    
                }
            break;
    
            default:
                # Este punto falto en la clase
                $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
                $_SESSION['mensaje_tipo'] = "alert-danger";
    
                header("Location: ./proveedor_mant.php");
                break;
        }
    
    ?>
    