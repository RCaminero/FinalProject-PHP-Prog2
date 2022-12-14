<?php
include_once("./include/pcabeza_admin2.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = consultarEmpleados($link, $id);
    $resultadoT = mostrarUsuario($link);
    $resultadoTM = mostrarRol($link);
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
            <h1 class="mt-4">Editar Empleados</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item"><a href="empleados_mant.php">Empleados</a></li>
                <li class="breadcrumb-item active">Editar Empleado</li>
            </ol>
            <div class="card mb-4">
                <div class="col-md-5 mx-auto">
                    <div class="card-body">
                        <article class="card-body mx-auto" style="max-width: 520px;">
                            <form action="empleados_crud.php?accion=UDT" method="post" enctype="multipart/form-data" autocomplete="off">
                                <h2><img src="./img/sublime.png" width="35" height="35" alt=""> Editar Empleado</h2>
                                <hr class="colorgraph">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['Id_empleado']; ?> ">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>
                                    </div>
                                    <select class="form-control border-input" required="" name="estado" id="estado">
                                        <option value="A" <?php if ($row['Estado_empleado'] == 'A') {
                                                                echo "selected";
                                                            } ?>> Activo </option>
                                        <option value="I" <?php if ($row['Estado_empleado'] == 'I') {
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
                                <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                                </div>
                                <input type="date" name="fecha" id="fecha" class="form-control input-lg" placeholder="Fecha de nacimiento" tabindex="3" required=""value="<?php echo $row['Fecha_nacimiento']; ?>">
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>
                                    </div>
                                    <select class="form-control border-input" required="" name="sexo" id="sexo">
                                        <option value="F" <?php if ($row['Sexo'] == 'F') {
                                                                echo "selected";
                                                            } ?>> Femenino </option>
                                        <option value="M" <?php if ($row['Sexo'] == 'M') {
                                                                echo "selected";
                                                            } ?>> Masculino </option>
                                    </select>
                                </div>
                                </div>
                                </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-users"></i> </span>
                                </div>
                                <select class="form-control" name="usuario" id="usuario">
                                    <?php while ($rowT = mysqli_fetch_array($resultadoT)) { ?>
                                        <option value="<?php echo $rowT['Id_usuario'] ?>" <?php if ($rowT['Id_usuario'] == $row['Id_usuario']) {
                                                                                                echo 'selected';
                                                                                            } ?>> <?php echo $rowT['Usuario'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                                <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-user-tag"></i> </span>
                                        </div>
                                        <select class="form-control" name="rol" id="rol">
                                            <?php while ($rowTM = mysqli_fetch_array($resultadoTM)) { ?>
                                                <option value="<?php echo $rowTM['Id_rol_empleado'] ?>" <?php  if ($rowTM['Id_rol_empleado'] == $row['Id_rol_empleado']) 
                                                 { echo 'selected';} ?> > <?php echo $rowTM['Nombre'] ?> </option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><a href="./empleados_mant.php" class="btn btn-secondary  btn-lg btn-block">Cancelar</a></div>
                                    <div class="col-xs-12 col-md-6"><input type="submit" name="registrarse" value="Guardar" class="btn btn-success btn-lg btn-block" tabindex="7"></div>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <br><br>
    <?php
    include_once("./include/ppie_admin2.php");
    ?>