<?php
error_reporting((0));
include_once("./include/pcabeza_admin2.php");

$resultado = mostrarPedido_detalle($link);
$resultadoT = mostrarPedidos1($link);
$resultadoTM = mostrarArticulos($link);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Mantenimiento de Pedidos en detalles</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item active">Pedido en detalle</li>
            </ol>
            <?php
            if (isset($_SESSION['mensajeTexto'])) { ?>
                <div class="alert <?php echo $_SESSION['mensajeTipo'] ?> alert-dismissible fade show" role="alert">
                    <strong>Aviso:</strong> <?php echo $_SESSION['mensajeTexto'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                $_SESSION['mensajeTexto'] = null;
                $_SESSION['mensajeTipo'] = null;
            }
            ?>
            <div class="card mb-4">
                <div class="card-header"><a href="" class="btn btn-success " data-toggle="modal" data-target="#agregarPedido_detalle"><i class="fas fa-user-plus" style="color:white"></i> Agregar Pedido en detalle</a></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.de Pedido</th>
                                    <th>Articulo</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Color articulo</th>
                                    <th>Color Letras</th>
                                    <th>Envoltura</th>
                                    <th>Estado</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($resultado)) { ?>
                                    <tr>
                                        <td> <?php echo $row['id_pedido'] ?> </td>
                                        <td> <?php echo $row['Nombre'] ?> </td>
                                        <td> <?php echo $row['Precio'] ?> </td>
                                        <td> <?php echo $row['Cantidad'] ?> </td>
                                        <td> <?php echo $row['Total'] ?> </td>
                                        <td> <?php echo $row['Color_articulo'] ?> </td>
                                        <td> <?php echo $row['Color_letras'] ?> </td>
                                        <td> <?php echo $row['Envoltura'] . ' + $' . $row['Precio_envoltura'] ?> </td>
                                        <td> <?php if ($row['Estado_pedido_detalle'] == 'A') {
                                                    echo 'Activo';
                                                } else {
                                                    echo 'Inactivo';
                                                } ?> </td>
                                        <td> <a class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Editar" href="./pedido_detalle_edit.php?accion=UDT&id=<?php echo $row['id_pedido_detalle'] ?>"><i class="far fa-edit"></i></a></td>
                                        <td> <a class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Anular" onclick="$.confirm({
                                        title: 'Sublime Detalle: Aviso de anulacion',
                                        subtitle:'Aviso de anulacion',
                                        scapeKey:true,
                                        theme: 'modern',
                                        animation: 'zoom',
                                        closeAnimation: 'scaley',
                                        type: 'red',
                                        typeAnimated: true,
                                        icon:'fa fa-trash fa-trash fa-spin',
                                        content: 'Estas seguro/a de que deseas anular el registro?',
                                        buttons: {
                                            confirmar: {
                                            btnClass: 'btn-green',
                                            action: function () {
                                               window.location='./pedido_detalle_crud.php?accion=DLT&id=<?php echo $row['id_pedido_detalle'] ?>';
                                            }
                                        },
                                            cancelar: {
                                            btnClass: 'btn-danger',
                                            action:function () {
                                                $.alert('Accion cancelada');
                                                }
                                            }
                                            }
                                  })" href="#"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include_once("./include/ppie_admin2.php")
    ?>
    <!-- line modal -->
    <div class="modal fade" id="agregarPedido_detalle" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="lineModalLabel"><img src="./img/sublime.png" width="35" height="35" alt=""> Registrar nuevo Pedido_detalle</h3>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                </div>
                <div class="modal-body">

                    <!-- Formulario de Registro -->
                    <article class="card-body mx-auto" style="max-width: 580px;">
                        <form action="pedido_detalle_crud.php?accion=INS" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-gifts"></i></span>
                                </div>
                                <select class="form-control" name="pedido" id="pedido">
                                    <?php while ($rowTM = mysqli_fetch_array($resultadoT)) { ?>
                                        <option value="<?php echo $rowTM['id_pedido'] ?>"> <?php echo $rowTM['id_pedido'] . '-' . $rowTM['Comentario'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-gifts"></i></span>
                                </div>
                                <select class="form-control" name="articulo" id="articulo">
                                    <?php while ($rowT = mysqli_fetch_array($resultadoTM)) { ?>
                                        <option value="<?php echo $rowT['Id_articulo'] ?>"> <?php echo $rowT['Nombre'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fab fa-bitcoin"></i> </span>
                                        </div>
                                        <input type="number" name="precio" id="precio" class="form-control input-lg" placeholder="Precio" tabindex="3" required="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-sort-numeric-up"></i> </span>
                                        </div>
                                        <input type="number" name="cantidad" id="cantidad" class="form-control input-lg" placeholder="#" tabindex="3" required="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-money-bill-alt"></i> </span>
                                        </div>
                                        <input type="number" name="total" id="total" class="form-control input-lg" placeholder="Total" tabindex="3" required="">
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
                                        <input type="number" name="penvoltura" id="penvoltura" class="form-control input-lg" placeholder="Precio" tabindex="3" required="">

                                    </div>
                                </div>
                            </div>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-md-6"><button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal" role="button">Cerrar</button></div>
                                <div class="col-xs-12 col-md-6"><input type="submit" name="guardar" value="Guardar" class="btn btn-success btn-lg btn-block" tabindex="7"></div>
                            </div>
                        </form>
                </div>
                </article>
            </div>
        </div>
    </div>
</div>

</div>