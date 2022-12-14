<?php
include_once("./include/conexion.php");

if (isset($_GET['accion'])) {
    $opcion = $_GET['accion'];
} else {
    $_SESSION['mensajeTexto'] = "Error identificando la opción";
    $_SESSION['mensajeTipo'] = "alert-danger";

    header("Location: ./pedido_mant.php");
}
switch ($opcion) {
        // Para insertar
    case 'INS':
        if (isset($_POST['guardar'])) {
            $cliente = $_POST['cliente'];
            $empleado = $_POST['empleado'];
            $comentario = $_POST['comentario'];
            $fecha_pedido = $_POST['fecha'];
            $fecha_entrega = $_POST['fechaentrega'];
            $metodo = $_POST['metodo'];

            $query = "
                    INSERT INTO `pedido`
                    (`Cliente_id_cliente`, 
                    `Empleado_id_empleado`,
                    `Comentario`,
                    `Fecha_pedido`,
                    `Fecha_entrega`,
                    `Metodo_pago`,
                    `Estado_pago`,
                    `Estado_pedido`) 
                    VALUES (
                    '$cliente',
                    '$empleado',
                    '$comentario',
                    '$fecha_pedido',
                    '$fecha_entrega',
                    '$metodo',
                    'N',
                    'A')
                    ";

            $resultado = mysqli_query($link, $query);

            if (!$resultado) {
                // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos";
                $_SESSION['mensajeTipo'] = "alert-danger";

                header("Location: ./pedido_mant.php");
            } else {

                // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                $_SESSION['mensajeTipo'] = "alert-success";

                header("Location: ./pedido_mant.php");
            }
}
        break;
    case 'DLT':
        $id = $_GET['id'];

        $query = "UPDATE `pedido` SET             
                `Estado_pedido`='I'
                WHERE `id_pedido` = '$id'";

        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./pedido_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./pedido_mant.php");
        }
    
        break;
        // Para actualizar
        // Para actualizar
    case 'UDT':
        $id = $_POST['id'];
        $cliente = $_POST['cliente'];
        $empleado = $_POST['empleado'];
        $comentario = $_POST['comentario'];
        $fecha_pedido = $_POST['fecha'];
        $fecha_entrega = $_POST['fechaentrega'];
        $estado = $_POST['estado'];
        $epago = $_POST['epago'];
        $metodo = $_POST['metodo'];

        $query = "UPDATE `pedido` SET 
                `Cliente_id_cliente`='$cliente',
                `Empleado_id_empleado` = '$empleado',
                `Comentario`='$comentario',
                `Fecha_pedido`='$fecha_pedido',
                `Fecha_entrega`='$fecha_entrega',
                `Metodo_pago`='$metodo',
                `Estado_pago`='$epago',
                `Estado_pedido`='$estado'
                WHERE `id_pedido` = '$id'";

        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./pedido_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./pedido_mant.php");
        }
        break;

    default:
        # Este punto falto en la clase
        $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
        $_SESSION['mensaje_tipo'] = "alert-danger";

        header("Location: ./pedido_mant.php");
        break;
}
