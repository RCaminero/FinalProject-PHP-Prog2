<?php
    include_once("./include/pcabeza.php");
    if(isset($_GET['id'])){
        $resultado = $link ->query("SELECT * FROM articulo WHERE Id_articulo=".$_GET['id']) or die("ERROR");
        if(mysqli_num_rows($resultado) > 0){
            $fila = mysqli_fetch_row($resultado);
        }else{
            header("Location: tazas.php");
        }

    }else{
        header("Location: tazas.php");
    }
    
?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home" style="color:#F00782"></i> Inicio</a>
                        <a href="./tazas.php"></i> Catálogo</a>
                        <span><?php echo $fila[3]; ?></span>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Breadcrumb End -->



    <!-- Product Details Section Begin -->
<section class="product-details spad">
    <?php if ($fila[2] == 2){?>
    <div class="col-lg-12 text-left">
        <div class="pagination__option">
            <a href="./termos.php"><i class="fa fa-angle-left"></i></a>
        </div>
    </div>
    <?php }?>
    <?php if ($fila[2] == 3){?>
    <div class="col-lg-12 text-left">
        <div class="pagination__option">
            <a href="./rompecabezas.php"><i class="fa fa-angle-left"></i></a>
        </div>
    </div>
    <?php }?>
    <?php if ($fila[2] == 4){?>
    <div class="col-lg-12 text-left">
        <div class="pagination__option">
            <a href="./tazas.php"><i class="fa fa-angle-left"></i></a>
        </div>
    </div>
    <?php }?>
    <?php if ($fila[2] == 5){?>
    <div class="col-lg-12 text-left">
        <div class="pagination__option">
            <a href="./regalos.php"><i class="fa fa-angle-left"></i></a>
        </div>
    </div>
    <?php }?>
    <?php if ($fila[2] == 1){?>
    <div class="col-lg-12 text-left">
        <div class="pagination__option">
            <a href="./textiles.php"><i class="fa fa-angle-left"></i></a>
        </div>
    </div>
    <?php }?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="product__details__pic">
            <?php if ($fila[0] == 5 OR $fila[0] == 4  OR $fila[0] == 17 OR $fila[0] == 15) {?>
                <div class="product__details__pic__left product__thumb nice-scroll">
                    <a class="pt active" href="#producto-1">
                        <img src="<?php echo $fila[11];?>" alt="">
                    </a>
                    <a class="pt" href="#producto-2">
                        <img src="<?php echo $fila[12]; ?>" alt="">
                    </a>
                <?php if ($fila[0] == 5 OR $fila[0] == 4 ) {?>
                    <a class="pt" href="#producto-3">
                        <img src="<?php echo $fila[14]; ?>" alt="">
                    </a>
                <?php }?>
                </div>
            <?php }?>
                <div class="product__details__slider__content">
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-hash="producto-1" class="product__big__img" src="<?php echo $fila[11]; ?>" alt="<?php echo $fila[3]; ?>" width="190" >
                    <?php if ($fila[0] == 5 OR $fila[0] == 4 OR $fila[0] == 17 OR  $fila[0] == 15)  {?> 
                        <img data-hash="producto-2" class="product__big__img" src="<?php echo $fila[12]; ?>" alt="<?php echo $fila[3]; ?>">
                    <?php }?>
                    <?php if ($fila[0] == 5 OR $fila[0] == 4)  {?> 
                        <img data-hash="producto-3" class="product__big__img" src="<?php echo $fila[14]; ?>" alt="<?php echo $fila[3]; ?>">
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <form action="./shop-cart.php?id=<?php echo $fila[0]; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="product__details__text">
                    <h3><?php echo $fila[3]; ?><span><?php echo $fila[4]; ?></span></h3>
                    <div class="product__details__price">$ <?php echo number_format($fila[5],2); ?></div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Colores disponibles:</span>
                                    <div class="form-group">
                                        <label for="color"></label>                        
                                        <select class="form-control" name="color" id="color">
                                        <?php if ($fila[0] == 3 OR $fila[0] == 6)  {?>
                                            <option value="Blanco" selected>Blanco</option> 
                                        <?php }?>
                                        <?php if ($fila[0] != 3 ){?>
                                            <option value="Negro">Negro</option>
                                            <option value="Azul">Azul</option> 
                                            <option value="Rosa">Rosa</option> 
                                            <option value="Rojo">Rojo</option>
                                        <?php }?>
                                     
                                        </select>
                                        <small id="colorAyuda" class="form-text text-muted">Este campo es obligatorio</small>
                                    </div>
                                    <span>Colores de letras:</span>
                                    <div class="form-group">
                                        <label for="color_letra"></label>                        
                                        <select class="form-control" name="color_letra" id="color_letra">
                                            <option value="Blanco"selected>Blanco</option> 
                                            <option value="Negro">Negro</option>
                                            <option value= NULL>Azul</option> 
                                            <option value="Rosa">Rosa</option> 
                                            <option value="Rojo">Rojo</option>
                                            <option value="Morado">Morado</option>
                                            <option value="Amarillo">Amarillo</option>
                                            <option value="Verde">Verde</option>
                                        </select>
                                        <small id="color_letraAyuda" class="form-text text-muted">Este campo es obligatorio</small>
                                    </div>
                                        <div class="col-md-6">
                                
                                </div>
                            
                                </div>
                            	
                                    <div class="color__checkbox">
                                       
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="product__details__widget">
                            <h5><b>Personalización *</b></h5>
                            <small>Este campo es obligatorio.</small>
                            <input type="text" class="form-control input-lg" name="frase" placeholder="Nombre, frase o iniciales" required=""><br>
                            
                            <h5><b>Imagen</b></h5>
                            <p>Adjunta la imagen deseada en el articulo.</p>
                            <input type="file" name="imagen"  id="imagen" accept="image/png,image/gif,image/jpeg"><br>
                            <?php 
                                if (isset($_SESSION['Imagen'])) { ?>
                                    <div class="alert <?php echo $_SESSION['ImagenT'] ?> alert-dismissible fade show" role="alert">
                                    <strong>Aviso:</strong> <?php echo $_SESSION['Imagen']?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                <?php
                                    $_SESSION['Imagen'] = null;
                                    $_SESSION['ImagenT'] = null;
                                }
                                ?>
                            <br>
                            <h5><b>¿Es un regalo?</b></h5>
                            <input type="checkbox" name="envoltura" id="envoltura" value="Si"> Envoltura (+RD$100.00)<br><br>
                           <div class="product__details__button">
                                </div>
                                    <?php sleep(20)?>
                                    <input name= "agregar" id = "agregar"type="submit" value="Añadir al carrito" class="site-btn"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

</script>


<?php
    include_once("./include/ppie.php");
?>

