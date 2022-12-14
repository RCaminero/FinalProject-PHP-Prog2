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
                <div class="col-lg-12 text-right">
                    <div class="pagination__option">
                        <a href="./termos.php"><i class="fa fa-angle-left"></i></a>
                        <a href="./rompecabezas.php"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4 id="tazas">Textiles</h4>
                    </div>
                    <div class="row">
                        <?php
                            $resultado = $link ->query("SELECT * FROM articulo WHERE Categoria_articulo_id_categoria_articulo = 1 ORDER BY Id_articulo DESC") or die("ERROR");
                            while($fila = mysqli_fetch_array($resultado)){

                        ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo $fila['Imagen'];?>" alt="<?php echo $fila['Nombre'];?>">
                                        <ul class="product__hover">
                                            <li><a href="<?php echo $fila['Imagen'];?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="./formulario.php?id=<?php echo $fila['Id_articulo'];?>"><span><i class="fas fa-shopping-cart"></i></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="./formulario.php?id=<?php echo $fila['Id_articulo'];?>"><?php echo $fila['Nombre'];?></a></h6>
                                        <div class="product__price">$ <?php echo number_format($fila['Precio'],2);?></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        
                        <!-- <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->


<?php
	include_once("./include/ppie.php")
?>