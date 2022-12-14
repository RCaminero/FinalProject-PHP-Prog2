<?php

include_once("./include/conexion.php");

if (isset($_GET['accion'])) {
    $opcion = $_GET['accion'];
} else {
    $_SESSION['mensajeTexto'] = "Error identificando la opción";
    $_SESSION['mensajeTipo'] = "alert-danger";

    header("Location: ./articulos_mant.php");
}

switch ($opcion) {
        // Para insertar
    case 'INS':
        if (isset($_POST['guardar'])) {
            $articulo = $_POST['articulo'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];
            $proveedor = $_POST['proveedor'];
            $preciou = $_POST['preciou'];
            $itbis = $_POST['itbis'];
            $preciototal = $_POST['preciot'];
            $precio = $_POST['precio'];
            $envio = $_POST['envio'];
            $stock = $_POST['stock'];
            $imagen = '';
            if (isset($_FILES['imagen'])) {
                $file = $_FILES['imagen'];
                $nombre = $file['name'];
                $tipo = $file['type'];
                $ruta_temporal = $file['tmp_name'];
                $size = $file['size'];
                $dimensiones = getimagesize($ruta_temporal);
                $width = $dimensiones[0];
                $height = $dimensiones[1];
                $carpeta = "img/productos/";
                if ($size > 3 * 1024 * 1024) {
                    $_SESSION['Imagen'] = "El tamaño máximo debe ser de 3MB.";
                    $_SESSION['ImagenT'] = "alert-danger";

                    header("Location: ./formulario.php");
                } else {
                    $src = $carpeta . $nombre;
                    move_uploaded_file($ruta_temporal, $src);
                    $imagen = "img/productos/" . $nombre;
                }
            } else {
                $imagen= NULL;
            }

            $query = "
                INSERT INTO `articulo`
                (`Nombre`, 
                `Proveedor_id_proveedor`, 
                `Categoria_articulo_id_categoria_articulo`,
                `Descripcion`,
                `Precio_unidad`,
                `Itbis`,
                `Precio_total`,
                `Precio`,
                `Imagen`,
                `Envio`,
                `Stock`,
                `Estado_articulo`)
                VALUES (
                '$articulo',
                '$proveedor',
                '$categoria',
                '$descripcion',
                '$preciou',
                '$itbis',
                '$preciototal',
                '$precio',
                '$imagen',
                '$envio',
                '$stock',
                'A')
                ";

            $resultado = mysqli_query($link, $query);

            if (!$resultado) {
                // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos";
                $_SESSION['mensajeTipo'] = "alert-danger";

                header("Location: ./articulos_mant.php");
            } else {
                // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                $_SESSION['mensajeTipo'] = "alert-success";

                header("Location: ./articulos_mant.php");
            }
        }
        break;

        // Para insertar

    case 'DLT':
        $id = $_GET['id'];
        $resultadoT = $link->query("SELECT * FROM `pedido_detalle` WHERE Articulo_id_articulo = '$id';");
        if (mysqli_num_rows($resultadoT) > 0) {
            $_SESSION['mensajeTexto'] = "Este articulo está asignado a un pedido activo, no se puede eliminar.";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./articulos_mant.php");
        } else {
            $query = "UPDATE `articulo` SET             
                `Estado_articulo`='I'
                WHERE `Id_articulo` = '$id'";

            $resultado = mysqli_query($link, $query);

            if (!$resultado) {
                // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
                $_SESSION['mensajeTipo'] = "alert-danger";

                header("Location: ./articulos_mant.php");
            } else {
                // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
                $_SESSION['mensajeTipo'] = "alert-success";

                header("Location: ./articulos_mant.php");
            }
        }
        break;
        // Para actualizar
    case 'UDT':
        $id = $_POST['id'];
        $articulo = $_POST['articulo'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $proveedor = $_POST['proveedor'];
        $preciou = $_POST['preciou'];
        $itbis = $_POST['itbis'];
        $preciototal = $_POST['preciot'];
        $precio = $_POST['precio'];
        $envio = $_POST['envio'];
        $stock = $_POST['stock'];
        $estado = $_POST['estado'];


        $query = "UPDATE `articulo` SET 
               `Nombre`= '$articulo',
                `Proveedor_id_proveedor`='$proveedor', 
                `Categoria_articulo_id_categoria_articulo`='$categoria',
                `Descripcion`= '$descripcion',
                `Precio_unidad`='$preciou',
                `Itbis`='$itbis',
                `Precio_total`='$preciototal',
                `Precio`='$precio',
                `Envio`='$envio',
                `Stock`='$stock',
                `Estado_articulo`='$estado'

                WHERE `Id_articulo` = '$id'";

        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos $query";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./articulos_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./articulos_mant.php");
        }
        break;

    default:
        # Este punto falto en la clase
        $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
        $_SESSION['mensaje_tipo'] = "alert-danger";

        header("Location: ./articulos_mant.php");
        break;
}
