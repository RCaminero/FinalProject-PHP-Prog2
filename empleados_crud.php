<?php
include_once("./include/conexion.php");

if (isset($_GET['accion'])) {
    $opcion = $_GET['accion'];
} else {
    $_SESSION['mensajeTexto'] = "Error identificando la opción";
    $_SESSION['mensajeTipo'] = "alert-danger";

    header("Location: ./empleados_mant.php");
}
switch ($opcion) {
        // Para insertar
    case 'INS':
        if (isset($_POST['guardar'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha = $_POST['fecha'];
            $usuario = $_POST['usuario'];
            $rol = $_POST['rol'];
            $sexo = $_POST['sexo'];

            $query = "
                    INSERT INTO `empleado`
                    (`Nombre`, 
                    `Apellido`,
                    `Fecha_nacimiento`,
                    `Id_usuario`,
                    `Id_rol_empleado`,
                    `Sexo`,
                    `Estado_empleado`) 
                    VALUES (
                    '$nombre',
                    '$apellido',
                    '$fecha',
                    '$usuario',
                    '$rol',
                    '$sexo',
                    'A')
                    ";

            $resultado = mysqli_query($link, $query);

            if (!$resultado) {
                // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos";
                $_SESSION['mensajeTipo'] = "alert-danger";

                header("Location: ./empleados_mant.php");
            } else {

                // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                $_SESSION['mensajeTipo'] = "alert-success";

                header("Location: ./empleados_mant.php");
            }
}
        break;
    case 'DLT':
        $id = $_GET['id'];

        $query = "UPDATE `empleado` SET             
                `Estado_empleado`='I'
                WHERE `Id_empleado` = '$id'";

        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./empleados_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./empleados_mant.php");
        }
    
        break;
        // Para actualizar
        // Para actualizar
    case 'UDT':
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha = $_POST['fecha'];
        $usuario = $_POST['usuario'];
        $rol = $_POST['rol'];
        $sexo = $_POST['sexo'];
        $estado = $_POST['estado'];

        $query = "UPDATE `empleado` SET 
                `Nombre`='$nombre',
                `Apellido` = '$apellido',
                `Fecha_nacimiento`='$fecha',
                `Sexo`='$sexo',
                `Id_usuario`='$usuario',
                `Id_rol_empleado`='$rol',
                `Estado_empleado`='$estado'
                WHERE `Id_empleado` = '$id'";

        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos $query";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./empleados_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./empleados_mant.php");
        }
        break;

    default:
        # Este punto falto en la clase
        $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
        $_SESSION['mensaje_tipo'] = "alert-danger";

        header("Location: ./empleados_mant.php");
        break;
}
