<?php
include_once("./include/pcabeza_admin2.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = consultarArticulos($link, $id);
    $resultadoT = mostrarproveedor($link);
    $resultadoTM = mostrarCatArticulo($link);
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
            <h1 class="mt-4">Editar articulo</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item"><a href="articulos_mant.php">Articulo</a></li>
                <li class="breadcrumb-item active">Editar articulo</li>
            </ol>
            <div class="card mb-4">
                <div class="col-md-5 mx-auto">
                    <div class="card-body">
                        <article class="card-body mx-auto" style="max-width: 520px;">
                            <form action="articulos_crud.php?accion=UDT" method="post" enctype="multipart/form-data" autocomplete="off">
                                <h2><img src="./img/sublime.png" width="35" height="35" alt=""> Editar articulo</h2>
                                <hr class="colorgraph">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['Id_articulo']; ?> ">
                                <div class="row">
                                    <div class="form-group input-group">
                                        <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>

                                        <select class="form-control border-input" required="" name="estado" id="estado">
                                            <option value="A" <?php if ($row['Estado_articulo'] == 'A') {
                                                                    echo "selected";
                                                                } ?>> Activo </option>
                                            <option value="I" <?php if ($row['Estado_articulo'] == 'I') {
                                                                    echo "selected";
                                                                } ?>> Inactivo </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-gifts"></i></i> </span>
                                        </div>
                                        <input type="text" name="articulo" id="articulo" class="form-control input-lg" placeholder="Articulo" tabindex="1" required="" value="<?php echo $row['Nombre']; ?>">
                                    </div>

                                    <div class="form-group input-group">
                                        <span class="input-group-text"> <i class="fas fa-tshirt"></i> </span>
                                        <select class="form-control" name="categoria" id="categoria">
                                            <?php while ($rowTM = mysqli_fetch_array($resultadoTM)) { ?>
                                                <option value="<?php echo $rowTM['Id_categoria_articulo'] ?>" <?php if ($rowTM['Id_categoria_articulo'] == $row['Categoria_articulo_id_categoria_articulo']) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>> <?php echo $rowTM['Nombre'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"> <i class="fas fa-shipping-fast"></i></span>
                                        <select class="form-control" name="proveedor" id="proveedor">
                                            <?php while ($rowTM = mysqli_fetch_array($resultadoT)) { ?>
                                                <option value="<?php echo $rowTM['id_proveedor'] ?>" <?php if ($rowTM['id_proveedor'] == $row['Proveedor_id_proveedor']) {
                                                                                                            echo 'selected';
                                                                                                        } ?>> <?php echo $rowTM['Nombre'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-coins"></i></span>
                                                </div>
                                                <input type="number" name="preciou" id="preciou" class="form-control input-lg" placeholder="PrecioXunidad" tabindex="1" required="" value="<?php echo $row['Precio_unidad']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-funnel-dollar"></i> </span>
                                                </div>
                                                <input type="number" name="itbis" id="itbis" class="form-control input-lg" placeholder="Itbis" tabindex="2" required="" value="<?php echo $row['Itbis']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-money-check-alt"></i></span>
                                                </div>
                                                <input type="number" name="envio" id="envio" class="form-control input-lg" placeholder="Envio" tabindex="1" required="" value="<?php echo $row['Envio']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-box-open"></i> </span>
                                                </div>
                                                <input type="number" name="stock" id="stock" class="form-control input-lg" placeholder="Stock" tabindex="2" required="" value="<?php echo $row['Stock']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-money-check-alt"></i></span>
                                                </div>
                                                <input type="number" name="preciot" id="preciot" class="form-control input-lg" placeholder="Precio total" tabindex="1" required="" value="<?php echo $row['Precio_total']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="far fa-credit-card"></i> </span>
                                                </div>
                                                <input type="number" name="precio" id="precio" class="form-control input-lg" placeholder="Precio de venta" tabindex="2" required="" value="<?php echo $row['Precio']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group input-group">
                                        <textarea rows="2" type="text" class="form-control" id="descripcion" name="descripcion" maria-describedby="descripcionAyuda" required="" tabindex="2" placeholder="Descripción"><?php echo $row['Descripcion']; ?></textarea>
                                    </div>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><a href="./articulos_mant.php" class="btn btn-secondary  btn-lg btn-block">Cancelar</a></div>
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