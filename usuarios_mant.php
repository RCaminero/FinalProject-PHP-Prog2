<?php
error_reporting(0);
include_once("./include/pcabeza_admin2.php");

$resultado = mostrarUsuario($link);
$resultadoTM = mostrarTipo($link);



?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Mantenimiento de Usuarios</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                <li class="breadcrumb-item active">Usuario</li>
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
                <div class="card-header"><a href="" class="btn btn-success " data-toggle="modal" data-target="#agregarUsuario"><i class="fas fa-user-plus" style="color:white"></i> Agregar Usuario</a></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Tipo de Acceso</th>
                                    <th>Estado</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($resultado)) { ?>
                                    <tr>
                                        <td> <?php echo $row['Usuario'] ?> </td>
                                        <td> <?php echo $row['Nivel'] ?> </td>
                                        <td> <?php if ($row['Estado_usuario'] == 'A') {
                                                    echo 'Activo';
                                                } else {
                                                    echo 'Inactivo';
                                                } ?> </td>
                                        <td> <a class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Editar" href="./usuarios_edit.php?accion=UDT&id=<?php echo $row['Id_usuario'] ?>"><i class="far fa-edit"></i></a></td>
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
                                               window.location='./usuarios_crud.php?accion=DLT&id=<?php echo $row['Id_usuario'] ?>';
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
    <div class="modal fade" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="lineModalLabel"><img src="./img/sublime.png" width="35" height="35" alt=""> Registrar nuevo Usuario</h3>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                </div>
                <div class="modal-body">


                    <!-- Formulario de Registro -->
                    <article class="card-body mx-auto" style="max-width: 580px;">
	                        <form action="usuarios_crud.php?accion=INS" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
		                                <span class="input-group-text"> <i class="fas fa-users"></i> </span>
		                            </div>
			                        <input type="text" name="usuario" id="usuario" class="form-control input-lg" placeholder="Usuario" tabindex="1" required="">
                                </div>
                             <div class="form-group input-group">
                             <span class="input-group-text"> <i class="fas fa-users-cog"></i> </span>                      
                        <select class="form-control" name="nivel" id="nivel">
                            <?php while ($rowTM = mysqli_fetch_array($resultadoTM)) { ?>
                                <option value="<?php echo $rowTM['Id_tipo_acceso'] ?>"> <?php echo $rowTM['Nivel'] ?> </option>
                            <?php } ?>        
                        </select>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
		                                <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
		                            </div>
			                        <input type="text" name="contrasena" id="contrasena" class="form-control input-lg" placeholder="Contraseña" tabindex="1" required="">
                                </div>
			                    <hr class="colorgraph">
			                    <div class="row">
                                    <div class="col-xs-12 col-md-6"><button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal"  role="button">Cerrar</button></div>
                                    <div class="col-xs-12 col-md-6"><input type="submit" name ="guardar" value="Guardar" class="btn btn-success btn-lg btn-block" tabindex="3"></div>
                                </div>
		                    </form>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</div>