<?php

include_once("./include/conexion.php");

if (isset($_GET['accion'])) {
    $opcion = $_GET['accion'];
} else {
    $_SESSION['mensajeTexto'] = "Error identificando la opción";
    $_SESSION['mensajeTipo'] = "alert-danger";

    header("Location: ./registro.php");
}

switch ($opcion) {
        // Para insertar
    case 'INS':
        if (isset($_POST['registrarse'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $usuario = $_POST['usuario'];
            $password = $_POST['contrasena'];

            $resultadoT = $link->query("SELECT * FROM `usuario` WHERE Usuario = '$usuario';");
            if(mysqli_num_rows($resultadoT) > 0){
                $_SESSION['registro'] = "Usuario ya existente.";
                $_SESSION['registro-tipo'] = "alert-danger";

                header("Location: ./registro.php");
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
                $_SESSION['registro'] = "Error Insertando en la Base de Datos";
                $_SESSION['registro-tipo'] = "alert-danger";

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
                $_SESSION['registro'] = "Se ha registrado existosamente.";
                $_SESSION['registro-tipo'] = "alert-success";
                header("Location: ./login.php");
            }
        }
        break;
}
}