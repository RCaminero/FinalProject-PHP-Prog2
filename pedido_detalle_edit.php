<?php
include_once("./include/pcabeza_admin2.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = consultarPedido_detalle($link, $id);
    $resultadoT = mostrarPedidos1($link);
    $resultadoTM = mostrarArticulos($link);
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
            <h1 class="mt-4">Editar Pedido_detalle</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item"><a href="pedido_detalle_mant.php">Pedido_detalle</a></li>
                <li class="breadcrumb-item active">Editar Pedido_detalle</li>
            </ol>
            <div class="card mb-4">
                <div class="col-md-5 mx-auto">
                    <div class="card-body">
                        <article class="card-body mx-auto" style="max-width: 520px;">
                            <form action="pedido_detalle_crud.php?accion=UDT" method="post" enctype="multipart/form-data" autocomplete="off">
                                <h2><img src="./img/sublime.png" width="35" height="35" alt=""> Editar Pedido_detalle</h2>
                                <hr class="colorgraph">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id_pedido_detalle']; ?> ">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>
                                    </div>
                                    <select class="form-control border-input" required="" name="estado" id="estado">
                                        <option value="A" <?php if ($row['Estado_pedido_detalle'] == 'A') {
                                                                echo "selected";
                                                            } ?>> Activo </option>
                                        <option value="I" <?php if ($row['Estado_pedido_detalle'] == 'I') {
                                                                echo "selected";
                                                            } ?>> Inactivo </option>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-gifts"></i></span>
                                </div>
                                <select class="form-control" name="pedido" id="pedido">
                                    <?php while ($rowT = mysqli_fetch_array($resultadoT)) { ?>
                                        <option value="<?php echo $rowT['id_pedido'] ?>" <?php if ($rowT['id_pedido']== $row['Pedido_id_pedido']) {
                                                    echo 'selected';
                                                } ?>> <?php echo $rowT['id_pedido'] . ' -' . $rowT['Comentario'] ?> </option>
                                                <?php } ?>
                                            </select>
                            </div>

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-gifts"></i></span>
                                </div>
                                <select class="form-control" name="articulo" id="articulo">
                                    <?php while ($rowT = mysqli_fetch_array($resultadoTM)) { ?>
                                        <option value="<?php echo $rowT['Id_articulo'] ?>" <?php if ($rowT['Id_articulo']== $row['Articulo_id_articulo']) {
                                                    echo 'selected';
                                                } ?>> <?php echo $rowT['Nombre'] ?> </option>
                                                <?php } ?>
                                            </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fab fa-bitcoin"></i> </span>
                                        </div>
                                        <input type="number" name="precio" id="precio" class="form-control input-lg" placeholder="Precio" tabindex="3" required=""value="<?php echo $row['Precio']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-sort-numeric-up"></i> </span>
                                        </div>
                                        <input type="number" name="cantidad" id="cantidad" class="form-control input-lg" placeholder="#" tabindex="3" required=""value="<?php echo $row['Cantidad']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-money-bill-alt"></i> </span>
                                        </div>
                                        <input type="number" name="total" id="total" class="form-control input-lg" placeholder="Total" tabindex="3" required=""value="<?php echo $row['Total']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-palette"></i> </span>
                                        </div>
                                        <select class="form-control border-input" required="" name="colora" id="colora">
                                            <option value="Blanco" <?php if ($row['Color_articulo'] == 'Blanco') {
                                                                        echo "selected";
                                                                    } ?>> Blanco </option>
                                            <option value="Negro" <?php if ($row['Color_articulo'] == 'Negro') {
                                                                        echo "selected";
                                                                    } ?>> Negro</option>
                                            <option value="Azul" <?php if ($row['Color_articulo'] == 'Azul') {
                                                                        echo "selected";
                                                                    } ?>>Azul</option>
                                            <option value="Rosa" <?php if ($row['Color_articulo'] == 'Rosa') {
                                                                        echo "selected";
                                                                    } ?>>Rosa</option>
                                            <option value="Verde" <?php if ($row['Color_articulo'] == 'Verde') {
                                                                        echo "selected";
                                                                    } ?>> Verde</option>
                                            <option value="Rojo" <?php if ($row['Color_articulo'] == 'Rojo') {
                                                                        echo "selected";
                                                                    } ?>> Rojo</option>
                                            <option value="Amarillo" <?php if ($row['Color_articulo'] == 'Amarillo') {
                                                                            echo "selected";
                                                                        } ?>> Amarillo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-paint-brush"></i> </span>
                                        </div>
                                        <select class="form-control border-input" required="" name="letras" id="letras">
                                            <option value="Negro" <?php if ($row['Color_letras'] == 'Negro') {
                                                                        echo "selected";
                                                                    } ?>> Negro</option>
                                            <option value="Blanco" <?php if ($row['Color_letras'] == 'Blanco') {
                                                                        echo "selected";
                                                                    } ?>> Blanco </option>
                                            <option value="Azul" <?php if ($row['Color_letras'] == 'Azul') {
                                                                        echo "selected";
                                                                    } ?>>Azul</option>
                                            <option value="Rosa" <?php if ($row['Color_letras'] == 'Rosa') {
                                                                        echo "selected";
                                                                    } ?>>Rosa</option>
                                            <option value="Verde" <?php if ($row['Color_letras'] == 'Verde') {
                                                                        echo "selected";
                                                                    } ?>> Verde</option>
                                            <option value="Rojo" <?php if ($row['Color_letras'] == 'Rojo') {
                                                                        echo "selected";
                                                                    } ?>> Rojo</option>
                                            <option value="Amarillo" <?php if ($row['Color_letras'] == 'Amarillo') {
                                                                            echo "selected";
                                                                        } ?>> Amarillo</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-tshirt"></i> </span>
                                        </div>
                                        <select class="form-control border-input" required="" name="size" id="size">
                                        <option selected="true" disabled="disabled">Size suéter</option>
                                            <option value="16" <?php if ($row['Size_sueter'] == '16') {
                                                                    echo "selected";
                                                                } ?>>16</option>
                                            <option value="XS" <?php if ($row['Size_sueter'] == 'XS') {
                                                                    echo "selected";
                                                                } ?>>X Small</option>
                                            <option value="S" <?php if ($row['Size_sueter'] == 'S') {
                                                                    echo "selected";
                                                                } ?>>Small</option>
                                            <option value="M" <?php if ($row['Size_sueter'] == 'M') {
                                                                    echo "selected";
                                                                } ?>>Medium</option>
                                            <option value="L" <?php if ($row['Size_sueter'] == 'L') {
                                                                    echo "selected";
                                                                } ?>> Large</option>
                                            <option value="XL" <?php if ($row['Size_sueter'] == 'XL') {
                                                                    echo "selected";
                                                                } ?>>X Large</option>
                                            <option value="XXL" <?php if ($row['Size_sueter'] == 'XXL') {
                                                                    echo "selected";
                                                                } ?>> XX Large</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i> </span>
                                        </div>
                                        <select class="form-control border-input" required="" name="tipo" id="tipo">
                                        <option selected="true" disabled="disabled">Tipo suéter</option>
                                            <option value="Mujer" <?php if ($row['Tipo_sueter'] == 'Mujer') {
                                                                    echo "selected";
                                                                } ?>>Para Mujer</option>
                                            <option value="Hombre" <?php if ($row['Tipo_sueter'] == 'Hombre') {
                                                                        echo "selected";
                                                                    } ?>>Para Hombre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-gift"></i> </span>
                                        </div>
                                        <select class="form-control border-input" required="" name="envoltura" id="envoltura">
                                            <option value="SI" <?php if ($row['Envoltura'] == 'SI') {
                                                                    echo "selected";
                                                                } ?>>Con envoltura</option>
                                            <option value="NO" <?php if ($row['Envoltura'] == 'NO') {
                                                                    echo "selected";
                                                                } ?>>Sin envoltura</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="far fa-money-bill-alt"></i> </span>
                                        </div>
                                        <input type="number" name="penvoltura" id="penvoltura" class="form-control input-lg" placeholder="Precio" tabindex="3" required=""value="<?php echo $row['Precio_envoltura']; ?>">
                                        </div>
                                </div>
                            </div>
                                        <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    </div>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><a href="./pedido_detalle_mant.php" class="btn btn-secondary  btn-lg btn-block">Cancelar</a></div>
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



