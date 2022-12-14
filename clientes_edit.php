<?php
include_once("./include/pcabeza_admin2.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = consultarClientes($link, $id);
    $resultadoTM = mostrarUsuario($link);
} else {
    // este punto falto agregar en la clase
    $_SESSION['mensajeTexto'] = "Error Actualizando el Registro";
    $_SESSION['mensajeTipo'] = "alert-danger";

    header("Location: ejemplo_admin.php");
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Editar clientes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item"><a href="clientes_mant.php">Clientes</a></li>
                <li class="breadcrumb-item active">Editar cliente</li>
            </ol>
            <div class="card mb-4">
                <div class="col-md-5 mx-auto">
                    <div class="card-body">
                        <article class="card-body mx-auto" style="max-width: 520px;">
                            <form action="clientes_crud.php?accion=UDT" method="post" enctype="multipart/form-data" autocomplete="off">
                                <h2><img src="./img/sublime.png" width="35" height="35" alt=""> Editar cliente</h2>
                                <hr class="colorgraph">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['Id_cliente']; ?> ">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>
                                    </div>
                                    <select class="form-control border-input" required="" name="estado" id="estado">
                                        <option value="A" <?php if ($row['Estado_cliente'] == 'A') {
                                                                echo "selected";
                                                            } ?>> Activo </option>
                                        <option value="I" <?php if ($row['Estado_cliente'] == 'I') {
                                                                echo "selected";
                                                            } ?>> Inactivo </option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            </div>
                                            <input type="text" name="nombre" id="nombre" class="form-control input-lg" placeholder="Nombre" tabindex="1" required="" value="<?php echo $row['Nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            </div>
                                            <input type="text" name="apellido" id="apellido" class="form-control input-lg" placeholder="Apellido" tabindex="2" required="" value="<?php echo $row['Apellido']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-directions"></i> </span>
                                    </div>
                                    <input type="text" name="direccion" id="direccion" class="form-control input-lg" placeholder="Dirección" tabindex="3" required="" value="<?php echo $row['Direccion']; ?>">
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <input name="telefono" class="form-control" placeholder="Número telefónico" type="text" required="" value="<?php echo $row['Telefono']; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-users"></i> </span>
                                            </div>
                                            <select class="form-control" name="nivel" id="nivel">
                                                <?php while ($rowTM = mysqli_fetch_array($resultadoTM)) { ?>
                                                    <option value="<?php echo $rowTM['Id_Usuario'] ?>" <?php if ($rowTM['Id_usuario'] == $row['Id_usuario']) {
                                                    echo 'selected';
                                                } ?>> <?php echo $rowTM['Usuario'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                            </div>
                                            <input type="password" name="contrasena" id="contrasena" class="form-control input-lg" placeholder="Contraseña" tabindex="5" required="" value="<?php echo $row['Password']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><a href="./clientes_mant.php" class="btn btn-secondary  btn-lg btn-block">Cancelar</a></div>
                                    <div class="col-xs-12 col-md-6"><input type="submit" name="registrarse" value="Guardar" class="btn btn-success btn-lg btn-block" tabindex="7"></div>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <?php
    include_once("./include/ppie_admin2.php");
    ?>