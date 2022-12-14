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
            $pedido = $_POST['pedido'];
            $articulo = $_POST['articulo'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $total = $_POST['total'];
            $colora = $_POST['colora'];
            $color_letra = $_POST['letras'];
            $size = $_POST['size'];
            $tipo = $_POST['tipo'];
            $envoltura = $_POST['envoltura'];
            $penvoltura = $_POST['penvoltura'];

            $query = "
                    INSERT INTO `pedido_detalle`
                    (`Pedido_id_pedido`, 
                    `Articulo_id_articulo`,
                    `Color_articulo`,
                    `Color_letras`,
                    `Cantidad`,
                    `Envoltura`,
                    `Precio_envoltura`,
                    `Size_sueter`,
                    `Tipo_sueter`,
                    `Precio`,
                    `Total`,
                    `Estado_pedido_detalle`) 
                    VALUES (
                    '$pedido',
                    '$articulo',
                    '$colora',
                    '$color_letra',
                    '$cantidad',
                    '$envoltura',
                    '$penvoltura',
                    '$size',
                    '$tipo',
                    '$precio',
                    '$total',
                    'A')
                    ";

            $resultado = mysqli_query($link, $query);

            if (!$resultado) {
                // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos $query";
                $_SESSION['mensajeTipo'] = "alert-danger";

                header("Location: ./pedido_detalle_mant.php");
            } else {

                // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Se ha registrado existosamente. $query";
                $_SESSION['mensajeTipo'] = "alert-success";

                header("Location: ./pedido_detalle_mant.php");
            }
        }
        break;
    case 'DLT':
        $id = $_GET['id'];

        $query = "UPDATE `pedido_detalle` SET             
                `Estado_pedido_detalle`='I'
                WHERE `id_pedido_detalle` = '$id'";

        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./pedido_detalle_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./pedido_detalle_mant.php");
        }

        break;
        // Para actualizar
        // Para actualizar
    case 'UDT':
        $id = $_POST['id'];
        $pedido = $_POST['pedido'];
        $articulo = $_POST['articulo'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $total = $_POST['total'];
        $colora = $_POST['colora'];
        $color_letra = $_POST['letras'];
        $size = $_POST['size'];
        //if($size == '') { $size=Null; }
        $tipo = $_POST['tipo'];
        //if($tipo == '') { $tipo=Null; }
        $envoltura = $_POST['envoltura'];
        $penvoltura = $_POST['penvoltura'];
        $estado = $_POST['estado'];
       
        $query = "UPDATE `pedido_detalle` SET 
                `Pedido_id_pedido`='$pedido',
                `Articulo_id_articulo` = '$articulo',
                `Color_articulo`='$colora',
                `Color_letras`='$color_letra',
                `Cantidad`='$cantidad',
                `Envoltura`='$envoltura',
                `Precio_envoltura`='$penvoltura',
                `Size_sueter`='$size' ,
                `Tipo_sueter`='$tipo',
                `Precio`='$precio',
                `Total`='$total',
                `Estado_pedido_detalle`='$estado'
                WHERE `id_pedido_detalle` = '$id'" ;

        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos $query";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./pedido_detalle_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./pedido_detalle_mant.php");
        }
        break;

    default:
        # Este punto falto en la clase
        $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
        $_SESSION['mensaje_tipo'] = "alert-danger";

        header("Location: ./pedido_detalle_mant.php");
        break;
}
