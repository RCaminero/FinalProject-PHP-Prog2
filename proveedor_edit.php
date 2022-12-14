<?php
    include_once("./include/pcabeza_admin2.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $row = consultarProveedor($link, $id);            
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
                        <h1 class="mt-4">Editar Proveedores</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="mantenimientos.php">Mantenimientos</a></li>
                            <li class="breadcrumb-item"><a href="proveedor_mant.php">Proveedores</a></li>
                            <li class="breadcrumb-item active">Editar Proveedores</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="col-md-5 mx-auto">
                                <div class="card-body">
                                    <article class="card-body mx-auto" style="max-width: 450px;">
	                                    <form action="proveedor_crud.php?accion=UDT" method="post" enctype="multipart/form-data" autocomplete="off">
                                            <h2><img src="./img/sublime.png" width="35" height="35" alt=""> Editar Proveedores</h2>
                                            <hr class="colorgraph"> 
                                            <input type="hidden" name="id" id= "id" value="<?php echo $row['id_proveedor']; ?> ">  
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
		                                            <span class="input-group-text"> <i class="far fa-thumbs-up"></i> </span>
		                                        </div>
                                                <select class="form-control border-input" required="" name="Estado_proveedor" id="estado">
                                                    <option value="A" <?php if($row['Estado_proveedor'] == 'A'){echo "selected";}?>> Activo </option>
                                                    <option value="I" <?php if($row['Estado_proveedor'] == 'I'){echo "selected";}?>> Inactivo </option>
                                                </select>
                                            </div>
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
		                                            <span class="input-group-text"> <i class="fas fa-shopping-bag"></i> </span>
		                                        </div>
			                                    <input type="text" name="Nombre" id="nombre" class="form-control input-lg" placeholder="Nombre" tabindex="1" required="" value="<?php echo $row['Nombre']; ?>">
                                            </div>
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
		                                            <span class="input-group-text"> <i class="fas fa-phone-alt"></i> </span>
		                                        </div>
			                                    <input type="text" name="Telefono" id="telefono" class="form-control input-lg" placeholder="Teléfono" tabindex="1" required="" value="<?php echo $row['Telefono']; ?>">
                                            </div>

                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
		                                            <span class="input-group-text"> <i class="fas fa-search-location"></i> </span>
		                                        </div>
			                                    <textarea rows="2" type="text" class="form-control" id="direccion" name="Direccion" maria-describedby="descripcionAyuda" required="" tabindex="2" placeholder="Dirección" ><?php echo $row['Direccion']; ?></textarea>
                                            </div>

                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
		                                            <span class="input-group-text"> <i class="fas fa-laptop"></i> </span>
		                                        </div>
			                                    <input type="text" name="Pag_web" id="paginaweb" class="form-control input-lg" placeholder="Página Web" tabindex="1" required="" value="<?php echo $row['Pag_web']; ?>">
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
				                                <div class="col-xs-12 col-md-6"><a href="./proveedor_mant.php" class="btn btn-secondary  btn-lg btn-block">Cancelar</a></div>
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