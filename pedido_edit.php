<?php
include_once("./include/pcabeza_admin2.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = consultarPedido1($link, $id);
    $resultadoT = mostrarClientee($link);
    $resultadoTM = mostrarEmpleado($link);
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
            <h1 class="mt-4">Editar Pedido</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item"><a href="pedido_mant.php">Pedido</a></li>
                <li class="breadcrumb-item active">Editar Pedido</li>
            </ol>
            <div class="card mb-4">
                <div class="col-md-5 mx-auto">
                    <div class="card-body">
                        <article class="card-body mx-auto" style="max-width: 520px;">
                            <form action="pedido_crud.php?accion=UDT" method="post" enctype="multipart/form-data" autocomplete="off">
                                <h2><img src="./img/sublime.png" width="35" height="35" alt=""> Editar Pedido</h2>
                                <hr class="colorgraph">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id_pedido']; ?> ">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>
                                    </div>
                                    <select class="form-control border-input" required="" name="estado" id="estado">
                                        <option value="A" <?php if ($row['Estado_pedido'] == 'A') {
                                                                echo "selected";
                                                            } ?>> Activo </option>
                                        <option value="I" <?php if ($row['Estado_pedido'] == 'I') {
                                                                echo "selected";
                                                            } ?>> Inactivo </option>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-user"></i> </span>
                                </div>
                                <select class="form-control" name="cliente" id="cliente">
                                    <?php while ($rowT = mysqli_fetch_array($resultadoT)) { ?>
                                        <option value="<?php echo $rowT['Id_cliente'] ?>" <?php if ($rowT['Id_cliente'] == $row['Cliente_id_cliente']) {
                                                    echo 'selected';
                                                } ?>> <?php echo $rowT['Nombre'] . ' ' . $rowT['Apellido'] ?> </option>
                                                <?php } ?>
                                            </select>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-user-tie"></i> </span>
                                </div>
                                <select class="form-control" name="empleado" id="empleado">
                                    <?php while ($rowTM = mysqli_fetch_array($resultadoTM)) { ?>
                                        <option value="<?php echo $rowTM['Id_empleado'] ?>" <?php if ($rowTM['Id_empleado'] == $row['Empleado_id_empleado']) {
                                                    echo 'selected';
                                                } ?>> <?php echo $rowTM['Nombre'] . ' ' . $rowTM['Apellido'] ?> </option>
                                                <?php } ?>
                                            </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                                        </div>
                                        <input type="date" name="fecha" id="fecha" class="form-control input-lg" placeholder="Fecha del pedido" tabindex="3" required=""value="<?php echo $row['Fecha_pedido']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                                        </div>
                                        <input type="date" name="fechaentrega" id="fechaentrega" class="form-control input-lg" placeholder="Fecha de entrega" tabindex="3" required=""value="<?php echo $row['Fecha_entrega']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-credit-card"></i> </span>
                                    </div>
                                    <select class="form-control border-input" required="" name="metodo" id="metodo">
                                        <option value="Paypal" <?php if ($row['Metodo_pago'] == 'Paypal') {
                                                                echo "selected";
                                                            } ?>> Paypal </option>
                                        <option value="Contraentrega" <?php if ($row['Metodo_pago'] == 'Contraentrega') {
                                                                echo "selected";
                                                            } ?>> Contraentrega </option>
                                    </select>
                                </div>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-comments-dollar"></i> </span>
                                    </div>
                                    <select class="form-control border-input" required="" name="epago" id="epago">
                                        <option value="P" <?php if ($row['Estado_pago'] == 'P') {
                                                                echo "selected";
                                                            } ?>> Pagado </option>
                                        <option value="N" <?php if ($row['Estado_pago'] == 'N') {
                                                                echo "selected";
                                                            } ?>> No Pagado </option>
                                    </select>
                                </div>
                            <div class="form-group input-group">
                                <textarea rows="2" type="text" class="form-control" id="comentario" name="comentario" maria-describedby="descripcionAyuda" required="" tabindex="2" placeholder="Comentario"><?php echo $row['Comentario']; ?></textarea>  
                            </div>
                                        <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><a href="./pedido_mant.php" class="btn btn-secondary  btn-lg btn-block">Cancelar</a></div>
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

