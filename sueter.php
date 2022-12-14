<?php
    include_once("./include/pcabeza.php")
?>
<!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form action="./recibir.php" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="product__details__pic">
                                <div class="product__details__pic__left product__thumb nice-scroll">
                                    <a class="pt active" href="#producto-1">
                                        <img src="./img/productos/sueter-hombre.jpg" alt="">
                                    </a>
                                    <a class="pt" href="#producto-2">
                                        <img src="./img/productos/sueter-mujer.jpg" alt="">
                                    </a>
                                </div>
                                <div class="product__details__slider__content">
                                    <div class="product__details__pic__slider owl-carousel">
                                        <img data-hash="producto-1" class="product__big__img" src="./img/productos/sueter-hombre.jpg" alt="">
                                        <img data-hash="producto-2" class="product__big__img" src="./img/productos/sueter-mujer.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product__details__text">
                                <h3>T-SHIRT DRYFIT <span>Marca: M&T Confecciones</span></h3>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>( 15 estrellas )</span>
                                </div>
                                <div class="product__details__price">$ 400.0 <span>$ 450.0</span></div>
                                    <p>T-shirt en dryfit u ojo de ángel, disponible en varios colores y sizes.</p>
                                    <div class="product__details__widget">
                                        <ul>
                                            <li>
                                                <span>Colores disponibles:</span>
                                                <div class="color__checkbox">
                                                    <label for="white">
                                                        <input type="radio" name="color__radio" id="white" value = "Blanco" required>
                                                        <span class="checkmark white-bg"></span>
                                                    </label>
                                                    <label for="yellow">
                                                        <input type="radio" name="color" id="yellow" value= "Amarillo"required>
                                                        <span class="checkmark yellow-bg"></span>
                                                    </label>
                                                    <label for="black">
                                                        <input type="radio" name="color__radio" id="black" required>
                                                        <span class="checkmark black-bg"></span>
                                                    </label>
                                                    <label for="grey">
                                                        <input type="radio" name="color__radio" id="grey" required>
                                                        <span class="checkmark grey-bg"></span>
                                                    </label>
                                                    <label for="pink">
                                                        <input type="radio" name="color__radio" id="pink" required>
                                                        <span class="checkmark pink-bg"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <span>Sizes disponibles:</span>
                                                <div class="size__btn">
                                                    <label for="xs-btn">
                                                        <input type="radio" id="xs-btn" required>
                                                        xs
                                                    </label>
                                                    <label for="s-btn">
                                                        <input type="radio" id="s-btn" required>
                                                        s
                                                    </label>
                                                    <label for="m-btn">
                                                        <input type="radio" id="m-btn" required> 
                                                        m
                                                    </label>
                                                    <label for="l-btn">
                                                        <input type="radio" id="l-btn" required>
                                                        l
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__details__widget">
                                            <h6><b>Personalización*</b></h6>
                                            <input type="text" class="form-control input-lg" placeholder="Nombre, frase o iniciales" required=""><br>
                                            <h6><b>Personalización*</b></h6>
                                            <input type="text" class="form-control input-lg" placeholder="Nombre, frase o iniciales" required="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="product__details__button">
                                        <div class="quantity">
                                            <span>Cantidad:</span>
                                            <div class="pro-qty" >
                                            <input type="number" value="1" required="">
                                            </div>
                                        </div>
                                        <input type="submit" name= "agregar" value="Añadir al carrito" class="site-btn"></div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </form>
        </div>
</section>

<div class="col-md-6">
     <h4>Checkbox Buttons</h4>

    <div class="funkyradio">
    
        <div class="funkyradio-primary">
            <input type="checkbox" name="checkbox" id="checkbox2" checked/>
            <label for="checkbox2">Second Option primary</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="checkbox" id="checkbox3" checked/>
            <label for="checkbox3">Third Option success</label>
        </div>
        <div class="funkyradio-danger">
            <input type="checkbox" name="checkbox" id="checkbox4" checked/>
            <label for="checkbox4">Fourth Option danger</label>
        </div>
        <div class="funkyradio-warning">
            <input type="checkbox" name="checkbox" id="checkbox5" checked/>
            <label for="checkbox5">Fifth Option warning</label>
        </div>
        <div class="funkyradio-info">
            <input type="checkbox" name="checkbox" id="checkbox6" checked/>
            <label for="checkbox6">Sixth Option info</label>
        </div>
    </div>
</div>
</div>


<?php
    include_once("./include/ppie.php")
?>