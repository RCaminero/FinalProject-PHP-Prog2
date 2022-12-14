<?php
// incluimos conexion
include_once("./include/conexion.php");
include_once("./include/consultas.php");


if (isset($_SESSION['Id_usuario'])) {
    # code...
    $idusuario = $_SESSION['Id_usuario'];
    $row = consultarUsuarios($link, $idusuario);
} else {
    # code...
    // $_SESSION['mensajeTexto'] = "Error Acceso al Sistema no Registrado";
    // $_SESSION['mensajeTipo'] = "alert-danger";
    header("Location: login.php");
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sublime Detalle</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

    <!-- CSS personalizado -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Jquery confirm -->
    <link rel="stylesheet" href="./package/jquery-confirm-v3.3.4/dist/jquery-confirm.min.css"/>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        <a class="navbar-brand" href="admin.php"><img src="./img/loogo.png" width="170" height="50" class="d-inline-block align-top" alt="" loading="lazy"></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
				<div class="input-group-append">
				<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
				</div>
                </div>
			</form>-->
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw" style="color:#F00782"></i><?php echo $row['Usuario']; ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Configuración</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" onclick="$.confirm({
                                        title: 'Sublime Detalle: Aviso de salida',
                                        subtitle:'Aviso de anulacion',
                                        scapeKey:true,
                                        theme: 'modern',
                                        animation: 'zoom',
                                        closeAnimation: 'scaley',
                                        type: 'red',
                                        typeAnimated: true,
                                        icon:'far fa-question-circle fa-spin',
                                        content: 'Estas seguro/a de que deseas Cerrar Sesión?',
                                        buttons: {
                                            confirmar: {
                                            btnClass: 'btn-green',
                                            action: function () {
                                               window.location='./include/cerrar.php';
                                            }
                                        },
                                            cancelar: {
                                            btnClass: 'btn-danger',
                                            action:function () {
                                                $.alert('Accion cancelada');
                                                }
                                            }
                                            }
                                  })" >Salir</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>

                        <div class="sb-sidenav-menu-heading">Reportes</div>
                        <a class="nav-link" href="./ReporteClientes.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                            Clientes
                        </a><a class="nav-link" href="./ReporteArticulosStock.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-gifts"></i></div>
                            Productos en stock
                        </a>
                        <a class="nav-link" href="./ReportePedidos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shipping-fast"></i></div>
                            Pedidos
                        </a><a class="nav-link" href="./ReporteComentarios.php">
                            <div class="sb-nav-link-icon"><i class="far fa-comments"></i></div>
                            Comentarios
                        </a>

                        <div class="sb-sidenav-menu-heading">Configuración</div>
                        <a class="nav-link" href="./mantenimientos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                            Mantenimientos
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Sesión iniciada como:</div>
                    <small><i><?php echo $row['Usuario']; ?></i></small>
                </div>
            </nav>
        </div>