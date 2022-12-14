<?php
error_reporting((0));
include_once("./include/pcabeza_admin2.php");

$resultado = mostrarPedidos1($link);
$resultadoT = mostrarClientee($link);
$resultadoTM = mostrarEmpleado($link);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Mantenimiento de Pedidos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item active">Pedidos</li>
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
                <div class="card-header"><a href="" class="btn btn-success " data-toggle="modal" data-target="#agregarPedido"><i class="fas fa-user-plus" style="color:white"></i> Agregar Pedido</a></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.de Pedido</th>
                                    <th>Cliente</th>
                                    <th>Empleado</th>
                                    <th>Fecha del pedido</th>
                                    <th>Fecha de entrega</th>
                                    <th>Método de pago</th>
                                    <th>Estado del pago</th>
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
                                        <td> <?php echo $row['cnombre'] . ' ' . $row['capellido'] ?> </td>
                                        <td> <?php echo $row['enombre'] . ' ' . $row['eapellido'] ?> </td>
                                        <td> <?php echo $row['Fecha_pedido'] ?> </td>
                                        <td> <?php echo $row['Fecha_entrega'] ?> </td>
                                        <td> <?php if ($row['Metodo_pago'] == 'Paypal') {
                                                    echo 'PayPal';
                                                } else {
                                                    echo 'Contra-Entrega';
                                                } ?> </td>
                                        <td> <?php if ($row['Estado_pago'] == 'P') {
                                                    echo 'Pago';
                                                } else {
                                                    echo 'No Pago';
                                                } ?> </td>
                                        <td> <?php if ($row['Estado_pedido'] == 'A') {
                                                    echo 'Activo';
                                                } else {
                                                    echo 'Inactivo';
                                                } ?> </td>
                                        <td> <a class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Editar" href="./pedido_edit.php?accion=UDT&id=<?php echo $row['id_pedido'] ?>"><i class="far fa-edit"></i></a></td>
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
                                               window.location='./pedido_crud.php?accion=DLT&id=<?php echo $row['id_pedido'] ?>';
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
    <div class="modal fade" id="agregarPedido" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="lineModalLabel"><img src="./img/sublime.png" width="35" height="35" alt=""> Registrar nuevo Pedido</h3>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                </div>
                <div class="modal-body">

                    <!-- Formulario de Registro -->
                    <article class="card-body mx-auto" style="max-width: 580px;">
                        <form action="pedido_crud.php?accion=INS" method="post" enctype="multipart/form-data" autocomplete="off">

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-user"></i> </span>
                                </div>
                                <select class="form-control" name="cliente" id="cliente">
                                    <?php while ($rowT = mysqli_fetch_array($resultadoT)) { ?>
                                        <option value="<?php echo $rowT['Id_cliente'] ?>"> <?php echo $rowT['Nombre'] . ' ' . $rowT['Apellido'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-user-tie"></i> </span>
                                </div>
                                <select class="form-control" name="empleado" id="empleado">
                                    <?php while ($rowTM = mysqli_fetch_array($resultadoTM)) { ?>
                                        <option value="<?php echo $rowTM['Id_empleado'] ?>"> <?php echo $rowTM['Nombre'] . ' ' . $rowTM['Apellido'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                                        </div>
                                        <input type="date" name="fecha" id="fecha" class="form-control input-lg" placeholder="Fecha del pedido" tabindex="3" required="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                                        </div>
                                        <input type="date" name="fechaentrega" id="fechaentrega" class="form-control input-lg" placeholder="Fecha de entrega" tabindex="3" required="">
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
                                <textarea rows="2" type="text" class="form-control" id="comentario" name="comentario" maria-describedby="descripcionAyuda" required="" tabindex="2" placeholder="Comentario"></textarea>
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