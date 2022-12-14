  
<?php
    include_once("configuracion.php");

    // proceso de iniciar sesiones
    session_start();

    // crear variable de conexion
    $link = mysqli_connect($host, $user, $password, $database);

    // // Comprobar conexion
    // if (mysqli_connect_errno()){
    //     echo (mysqli_connect_errno() ." - ".mysqli_connect_error());
    //     exit();
    // } else {
    //     echo ("Conexion exitosa");
    //     # code...
    // }