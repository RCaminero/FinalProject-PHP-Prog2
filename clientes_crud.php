<?php

include_once("./include/conexion.php");

if (isset($_GET['accion'])) {
    $opcion = $_GET['accion'];
} else {
    $_SESSION['mensajeTexto'] = "Error identificando la opción";
    $_SESSION['mensajeTipo'] = "alert-danger";

    header("Location: ./clientes_mant.php");
}

switch ($opcion) {
        // Para insertar
    case 'INS':
        if (isset($_POST['guardar'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $usuario = $_POST['usuario'];
            $password = $_POST['contrasena'];
            $resultadoT = $link->query("SELECT * FROM `usuario` WHERE Usuario = '$usuario';");
            if(mysqli_num_rows($resultadoT) > 0){
                $_SESSION['mensajeTexto'] = "Usuario ya existente.";
                $_SESSION['mensajeTipo'] = "alert-danger";

                header("Location: ./clientes_mant.php");
            } else {

            $query = "
                INSERT INTO `usuario`
                (`Usuario`, 
                `Password`, 
                `Id_tipo_acceso`,
                `Estado_usuario`)
                VALUES (
                '$usuario',
                '$password',
                2,
                'A')
                ";

            $resultado = mysqli_query($link, $query);

            if (!$resultado) {
                // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Error Insertando en la Base de Datos";
                $_SESSION['mensajeTipo'] = "alert-danger";

                header("Location: ./clientes_mant.php");
            } else {
                $lastId = mysqli_insert_id($link);
                $query = "
                INSERT INTO `cliente`
                (`Nombre`, 
                `Apellido`, 
                `Direccion`,
                `Telefono`, 
                `Estado_cliente`,
                `Id_usuario`) 
                VALUES (
                '$nombre',
                '$apellido',
                '$direccion',
                '$telefono',
                'A',
                $lastId)
                ";
                $resultado = mysqli_query($link, $query);
                // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                $_SESSION['mensajeTexto'] = "Se ha registrado existosamente.";
                $_SESSION['mensajeTipo'] = "alert-success";

                header("Location: ./clientes_mant.php");
            }
        }}
        break;


        // Para anular

    case 'DLT':
        $id = $_GET['id'];
        $resultadoT = $link->query("SELECT * FROM `pedido` WHERE Cliente_id_cliente = '$id';");
        if(mysqli_num_rows($resultadoT) > 0){
                $_SESSION['mensajeTexto'] = "Este cliente está registrado en un pedido activo, no se puede eliminar.";
                $_SESSION['mensajeTipo'] = "alert-danger";

                header("Location: ./clientes_mant.php");
            } else {  
        $query = "UPDATE `cliente` SET             
                `Estado_cliente`='I'
                WHERE `Id_cliente` = '$id'";


        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./clientes_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./clientes_mant.php");
        }}
        break;
        // Para actualizar
    case 'UDT':
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $estado = $_POST['estado'];

        $query = "UPDATE `cliente` SET 
                `Nombre`='$nombre',
                `Apellido` = '$apellido',
                `Direccion`='$direccion',
                `Telefono`='$telefono',
                `Estado_cliente`='$estado'
                WHERE `Id_cliente` = '$id'";

        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-danger";

            header("Location: ./clientes_mant.php");
        } else {
            // echo("Alerta 0001: Registro Insertado en la Base de Datos");
            $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
            $_SESSION['mensajeTipo'] = "alert-success";

            header("Location: ./clientes_mant.php");
        }
        break;

    default:
        # Este punto falto en la clase
        $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
        $_SESSION['mensaje_tipo'] = "alert-danger";

        header("Location: ./clientes_mant.php");
        break;
}
