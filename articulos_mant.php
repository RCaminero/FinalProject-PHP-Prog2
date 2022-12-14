<?php
error_reporting(0);
include_once("./include/pcabeza_admin2.php");

$resultado = mostrarArticulos($link);
$resultadoT = mostrarproveedor($link);
$resultadoTM = mostrarCatArticulo($link);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Mantenimiento de articulos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item active">Articulos</li>
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
                <div class="card-header"><a href="" class="btn btn-success " data-toggle="modal" data-target="#agregarArticulo"><i class="fas fa-user-plus" style="color:white"></i> Agregar Articulo</a></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Articulo</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Proveedor</th>
                                    <th>Precio Unidad</th>
                                    <th>Itbis</th>
                                    <th>Precio Total</th>
                                    <th>Precio Venta</th>
                                    <th>Envío</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($resultado)) { ?>
                                    <tr>
                                        <td> <?php echo $row['Nombre'] ?> </td>
                                        <td> <?php echo $row['Descripcion'] ?> </td>
                                        <td> <?php echo $row['Categoria'] ?> </td>
                                        <td> <?php echo $row['Proveedor'] ?> </td>
                                        <td> <?php echo $row['Precio_unidad'] ?> </td>
                                        <td> <?php echo $row['Itbis'] ?> </td>
                                        <td> <?php echo $row['Precio_total'] ?> </td>
                                        <td> <?php echo $row['Precio'] ?> </td>
                                        <td> <?php echo $row['Envio'] ?> </td>
                                        <td> <?php echo $row['Stock'] ?> </td>
                                        <td> <?php if ($row['Estado_articulo'] == 'A') {
                                                    echo 'Activo';
                                                } else {
                                                    echo 'Inactivo';
                                                } ?> </td>
                                        <td> <a class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Editar" href="./articulos_edit.php?accion=UDT&id=<?php echo $row['Id_articulo'] ?>"><i class="far fa-edit"></i></a></td>
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
                                               window.location='./articulos_crud.php?accion=DLT&id=<?php echo $row['Id_articulo'] ?>';
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
    <div class="modal fade" id="agregarArticulo" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="lineModalLabel"><img src="./img/sublime.png" width="35" height="35" alt=""> Registrar nuevo articulo</h3>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                </div>
                <div class="modal-body">


                    <!-- Formulario de Registro -->
                    <article class="card-body mx-auto" style="max-width: 580px;">
                        <form action="articulos_crud.php?accion=INS" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-gifts"></i></i> </span>
                                    </div>
                                    <input type="text" name="articulo" id="articulo" class="form-control input-lg" placeholder="Articulo" tabindex="1" required="">
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-text"> <i class="fas fa-tshirt"></i> </span>
                                    <select class="form-control" name="categoria" id="categoria">
                                        <?php while ($rowTM = mysqli_fetch_array($resultadoTM)) { ?>
                                            <option value="<?php echo $rowTM['Id_categoria_articulo'] ?>"> <?php echo $rowTM['Nombre'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text"> <i class="fas fa-shipping-fast"></i></span>
                                    <select class="form-control" name="proveedor" id="proveedor">
                                        <?php while ($rowTM = mysqli_fetch_array($resultadoT)) { ?>
                                            <option value="<?php echo $rowTM['id_proveedor'] ?>"> <?php echo $rowTM['Nombre'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-coins"></i></span>
                                            </div>
                                            <input type="number" name="preciou" id="preciou" class="form-control input-lg" placeholder="PrecioXunidad" tabindex="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-funnel-dollar"></i> </span>
                                            </div>
                                            <input type="number" name="itbis" id="itbis" class="form-control input-lg" placeholder="Itbis" tabindex="2" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-money-check-alt"></i></span>
                                            </div>
                                            <input type="number" name="envio" id="envio" class="form-control input-lg" placeholder="Envio" tabindex="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-box-open"></i> </span>
                                            </div>
                                            <input type="number" name="stock" id="stock" class="form-control input-lg" placeholder="Stock" tabindex="2" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-money-check-alt"></i></span>
                                            </div>
                                            <input type="number" name="preciot" id="preciot" class="form-control input-lg" placeholder="Precio total" tabindex="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="far fa-credit-card"></i> </span>
                                            </div>
                                            <input type="number" name="precio" id="precio" class="form-control input-lg" placeholder="Precio de venta" tabindex="2" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <input type="file" name="imagen" id="imagen" class="form-control input-lg" placeholder="imagen" tabindex="1" required="">
                                </div>
                                <div class="form-group input-group">
                                    <textarea rows="2" type="text" class="form-control" id="descripcion" name="descripcion" maria-describedby="descripcionAyuda" required="" tabindex="2" placeholder="Descripción"></textarea>
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