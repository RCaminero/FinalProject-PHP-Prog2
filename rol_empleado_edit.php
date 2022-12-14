<?php
    include_once("./include/pcabeza_admin2.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $row = consultarRol($link, $id);            
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
                        <h1 class="mt-4">Editar Rol del Empleado</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                            <li class="breadcrumb-item"><a href="rol_empleado_mant.php">Rol de Empleados</a></li>
                            <li class="breadcrumb-item active">Editar Rol de Empleado</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="col-md-5 mx-auto">
                                <div class="card-body">
                                    <article class="card-body mx-auto" style="max-width: 450px;">
	                                    <form action="rol_empleado_crud.php?accion=UDT" method="post" enctype="multipart/form-data" autocomplete="off">
                                            <h2><img src="./img/sublime.png" width="35" height="35" alt=""> Editar Rol de Empleados</h2>
                                            <hr class="colorgraph"> 
                                            <input type="hidden" name="id" id= "id" value="<?php echo $row['Id_rol_empleado']; ?> ">  
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
		                                            <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>
		                                        </div>
                                                <select class="form-control border-input" required="" name="Estado_rol" id="estado">
                                                    <option value="A" <?php if($row['Estado_rol'] == 'A'){echo "selected";}?>> Activo </option>
                                                    <option value="I" <?php if($row['Estado_rol'] == 'I'){echo "selected";}?>> Inactivo </option>
                                                </select>
                                            </div>
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
		                                            <span class="input-group-text"> <i class="fas fa-user-tag"></i> </span>
		                                        </div>
			                                    <input type="text" name="Nombre" id="nombre" class="form-control input-lg" placeholder="Nombre" tabindex="1" required="" value="<?php echo $row['Nombre']; ?>">
                                            </div>
                                    
                                            <div class="form-group input-group">
			                                    <textarea rows="4" type="text" class="form-control" id="descripcion" name="Descripcion" maria-describedby="descripcionAyuda" required="" tabindex="2" placeholder="Descripción" ><?php echo $row['Descripcion']; ?></textarea>
                                            </div>
			                                <div class="row">
				                                <div class="col-xs-12 col-sm-6 col-md-6">
				                                </div>
				                                <div class="col-xs-12 col-sm-6 col-md-6">
				                                </div>
			                                </div>
			                                <hr class="colorgraph">
			                                <div class="row">
				                                <div class="col-xs-12 col-md-6"><a href="./rol_empleado_mant.php" class="btn btn-secondary  btn-lg btn-block">Cancelar</a></div>
				                                <div class="col-xs-12 col-md-6"><input type="submit" name ="registrarse" value="Guardar" class="btn btn-success btn-lg btn-block" tabindex="7"></div>
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