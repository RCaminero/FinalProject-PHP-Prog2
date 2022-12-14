<?php
    include_once("./include/pcabeza.php")
?>

<style>
    .product__hover li:hover a {
	background: #F00782;
}
</style>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home" style="color:#F00782"></i> Inicio</a>
                        <span>Catálogo</span>
                    </div>
                </div>
            </div>
        </div>
</div>

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">   
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4 id="tazas">Resultados para <?php echo $_GET['texto']?></h4>
                    </div>
                    <div class="row">
                        <?php
                            $resultado = $link ->query("SELECT * FROM articulo WHERE Nombre Like '%".$_GET['texto']."%' OR Precio LIKE'%".$_GET['texto']."%'");
                            while($fila = mysqli_fetch_array($resultado)){

                        ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo $fila['Imagen'];?>" alt="<?php echo $fila['Nombre'];?>">
                                        <ul class="product__hover">
                                            <li><a href="<?php echo $fila['Imagen'];?>" class="image-popup" alt=""><span class="arrow_expand"></span></a></li>
                                            <?php if ($fila[0]!= 17){?>
                                            <li><a href="./formulario.php?id=<?php echo $fila['Id_articulo'];?>"><span><i class="fas fa-shopping-cart"></i></span></a></li><?php }else{?>
                                            <li><a href="./form_textiles.php?id=<?php echo $fila['Id_articulo'];?>"><span><i class="fas fa-shopping-cart"></i></span></a></li><?php }?>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                    <?php if ($fila[0]!= 17){?>
                                    <h6><a href="./formulario.php?id=<?php echo $fila['Id_articulo'];?>"><?php echo $fila['Nombre'];?></h6></a><?php }else{?>
                                    <h6><a href="./form_textiles.php?id=<?php echo $fila['Id_articulo'];?>"><?php echo $fila['Nombre'];?></h6></a><?php }?>
                                        <div class="product__price">$ <?php echo number_format($fila['Precio'],2);?></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->


<?php
	include_once("./include/ppie.php")
?>