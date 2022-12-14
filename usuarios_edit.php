<?php
include_once("./include/pcabeza_admin2.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row= consultarUsuario($link, $id);
    $resultadoTM = mostrarTipo($link);
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
            <h1 class="mt-4">Editar Usuarios</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item"><a href="usuarios_mant.php">Usuario</a></li>
                <li class="breadcrumb-item active">Editar usuarios</li>
            </ol>
            <div class="card mb-4">
                <div class="col-md-5 mx-auto">
                    <div class="card-body">
                        <article class="card-body mx-auto" style="max-width: 450px;">
                            <form action="usuarios_crud.php?accion=UDT" method="post" enctype="multipart/form-data" autocomplete="off">
                                <h2><img src="./img/sublime.png" width="35" height="35" alt=""> Editar Usuarios</h2>
                                <hr class="colorgraph">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['Id_usuario']; ?> ">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>
                                    </div>
                                    <select class="form-control border-input" required="" name="estado" id="estado">
                                        <option value="A" <?php if ($row['Estado_usuario'] == 'A') {
                                                                echo "selected";
                                                            } ?>> Activo </option>
                                        <option value="I" <?php if ($row['Estado_usuario'] == 'I') {
                                                                echo "selected";
                                                            } ?>> Inactivo </option>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-users"></i> </span>
                                    </div>
                                    <input type="text" name="usuario" id="usuario" class="form-control input-lg" placeholder="Usuario" tabindex="1" required="" value="<?php echo $row['Usuario'] ?>">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text"> <i class="fas fa-users-cog"></i> </span>
                                    <select class="form-control" name="nivel" id="nivel">
                                        <?php while ($rowTM = mysqli_fetch_array($resultadoTM)) { ?>
                                            <option value="<?php echo $rowTM['Id_tipo_acceso'] ?>" <?php  if ($rowTM['Id_tipo_acceso'] == $row['Id_tipo_acceso'])  { echo 'selected';} ?> > <?php echo $rowTM['Nivel'] ?> </option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
		                                <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
		                            </div>
			                        <input type="text" name="contrasena" id="contrasena" class="form-control input-lg" placeholder="Contraseña" tabindex="1" required="" value="<?php echo $row['Password'] ?>">
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><a href="./usuarios_mant.php" class="btn btn-secondary  btn-lg btn-block">Cancelar</a></div>
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