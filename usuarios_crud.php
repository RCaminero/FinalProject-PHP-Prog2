<?php

    include_once("./include/conexion.php");

    if (isset($_GET['accion'])) {
        $opcion = $_GET['accion'];
    }else {
        $_SESSION['mensajeTexto'] = "Error identificando la opción";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./usuarios_mant.php");
    }

    switch ($opcion) {
        // Para insertar
        case 'INS':
            if(isset($_POST['guardar'])) {
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                $nivel = $_POST['nivel'];
                $resultadoT = $link->query("SELECT * FROM `usuario` WHERE Usuario = '$usuario';");
                if(mysqli_num_rows($resultadoT) > 0){
                    $_SESSION['mensajeTexto'] = "Usuario ya existente.";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./usuarios_mant.php");
                } else {
    
                $query = "
                    INSERT INTO `usuario`
                    (`Usuario`, 
                    `Password`,
                    `Estado_usuario`,
                    `Id_tipo_acceso`) 
                    VALUES (
                    '$usuario',
                    '$contrasena',
                    'A',
                    $nivel)
                    ";

                $resultado = mysqli_query($link, $query);

                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";

                    header("Location: ./usuarios_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./usuarios_mant.php");

                }

            }}
            break;
            case 'DLT':
                $id = $_GET['id'];
                       
                $query = "UPDATE `usuario` SET             
                `Estado_usuario`='I'
                WHERE `Id_usuario` = '$id'"; 
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./usuarios_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./usuarios_mant.php");
    
                }
                break;
            // Para actualizar
            case 'UDT':
                $id = $_POST['id'];
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                $nivel = $_POST['nivel'];
                $estado = $_POST['estado'];
    
                $query = "UPDATE `usuario` SET 
                `Usuario`='$usuario',
                `Id_tipo_acceso` = '$nivel',
                `Password`='$contrasena',
                `Estado_usuario`='$estado'
                WHERE `Id_usuario` = '$id'";        
    
                $resultado = mysqli_query($link, $query);
    
                if (!$resultado) {
                    // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-danger";
    
                    header("Location: ./usuarios_mant.php");
                } else{
                    // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                    $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
                    $_SESSION['mensajeTipo'] = "alert-success";
                    
                    header("Location: ./usuarios_mant.php");
    
                }
            break;
    
            default:
                # Este punto falto en la clase
                $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
                $_SESSION['mensaje_tipo'] = "alert-danger";
    
                header("Location: ./usuarios_mant.php");
                break;
        }
