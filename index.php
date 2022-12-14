<?php
    include_once("./include/pcabeza.php");
    $resultado1 = $link ->query("SELECT * FROM articulo WHERE Id_articulo = 19") or die("ERROR");
    $resultado2 = $link ->query("SELECT * FROM articulo WHERE Id_articulo = 14") or die("ERROR");
    $resultado3 = $link ->query("SELECT * FROM articulo WHERE Id_articulo = 2") or die("ERROR");
    $resultado4 = $link ->query("SELECT * FROM articulo WHERE Id_articulo = 4 ") or die("ERROR");
    $resultado5 = $link ->query("SELECT * FROM articulo WHERE Id_articulo = 15 ") or die("ERROR");
    $resultado6 = $link ->query("SELECT Imagen FROM articulo WHERE Id_articulo = 13") or die("ERROR");
    $fila1 = mysqli_fetch_array($resultado1);
    $fila2 = mysqli_fetch_array($resultado2);
    $fila3 = mysqli_fetch_array($resultado3);
    $fila4 = mysqli_fetch_array($resultado4);
    $fila5 = mysqli_fetch_array($resultado5);
    $fila6 = mysqli_fetch_array($resultado6);
?>
 <!-- Categories Section Begin -->
 <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <a href="#"><div class="categories__item categories__large__item set-bg"
                    data-setbg="img/index/tazas.jpg">
                    <div class="categories__text">
                        <a href="./tazas.php"><h5>Tazas</h5></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/index/termos.jpg">
                            <div class="categories__text">
                                <a href="./termos.php"><h6>Termos</h6></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/index/textiles.jpg">
                            <div class="categories__text">
                               
                                <a href="./textiles.php"><h6>Textiles</h6></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/index/llaveros.jpg">
                            <div class="categories__text">
                                <a href="./regalos.php"><h6>Regalos</h6></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/index/rompecabeza.jpg">
                            <div class="categories__text">
                                <a href="./rompecabezas.php"><h6>Rompecabezas</h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->


<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Nuestras categorías</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Todos</li>
                    <li data-filter=".taza">Tazas</li>
                    <li data-filter=".termo">Termos</li>
                    <li data-filter=".textil">Textiles</li>
                    <li data-filter=".regalos">Regalos</li>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <div class="col-lg-3 col-md-4 col-sm-6 mix taza">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/productos/interiorrosa.jpg">
                        <ul class="product__hover">
                            <li><a href="img/productos/interiorrosa.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="./tazas.php"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Taza con Interior de color 11 oz</h6>
                        <div class="product__price">$ 350.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix textil">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/productos/cojincorazon.jpg">
                        <ul class="product__hover">
                            <li><a href="img/productos/cojincorazon.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="./textiles.php"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Cojin en forma de corazón</h6>
                        <div class="product__price">$ 550.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix termo">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/productos/botellaaluminio.jpg">
                        <ul class="product__hover">
                            <li><a href="img/productos/botellaaluminio.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="./termos.php"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Botella de agua 20 oz</h6>
                        <div class="product__price">$ 450.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix regalos">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/productos/destapador.jpg">
                        <ul class="product__hover">
                            <li><a href="img/productos/destapador.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="./regalos.php"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Destapador metalizado</h6>
                        <div class="product__price">$ 250.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->


<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-6.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span><b>¡No te quedes sin la tuya!</b></span>
                            <h1>Tazas sublimadas</h1>
                            <a href="./tazas.php">Pedir ahora</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span><b>¡No te quedes sin la tuya!</b></span>
                            <h1>Tazas sublimadas</h1>
                            <a href="./tazas.php">Pedir ahora</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span><b>¡No te quedes sin la tuya!</b></span>
                            <h1>Tazas sublimadas</h1>
                            <a href="./tazas.php">Pedir ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner Section End -->
<br><br>

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="img/index/navidad.jpg" width= "90" talt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Descuento</span>
                        <h2>Navidad 2020</h2>
                        <h5><span>Desde</span> 10%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>12</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>15</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->





<?php
    include_once("./include/ppie.php")
?>


